@setup

    # Load .env file.
    require __DIR__.'/vendor/autoload.php';
    (new \Dotenv\Dotenv(__DIR__, '.env'))->load();

    # Setup variables.
    $localDir           = env('ENVOY_LOCAL_DIR');
    $repository         = 'git@deployer:frnkly/frnk.ca.git';
    $baseDir            = env('ENVOY_REPO_DIR');
    $releasesDir        = "{$baseDir}/releases";
    $liveDir            = env('ENVOY_LIVE_DIR');
    $newReleaseName     = date('Ymd-His');
    $productionServer   = env('ENVOY_PRODUCTION_SERVER');

    // Generate a random app key.
    $appKey = '';
    $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ `~!@#$%^&*()_+-={}[]:"|;<>?,./';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < 32; ++$i) {
        $appKey .= $keyspace[random_int(0, $max)];
    }

    /**
     * Logs a message to the console.
     * Credits: TODO: find credits and put them here.
     *
     * @param string $message
     * @return string
     */
    function msg($message) {
        return "echo '\033[32m" . $message . "\033[0m';\n";
    }
@endsetup



{{-- Servers --}}

@servers(['local' => '127.0.0.1', 'production' => $productionServer])



{{-- Zero downtime deployment --}}

{{-- Credits: https://serversforhackers.com/video/deploying-with-envoy-cast --}}
{{-- Credits: https://dyrynda.com.au/blog/an-envoyer-like-deployment-script-using-envoy --}}
{{-- Credits: https://murze.be/2015/11/zero-downtime-deployments-with-envoy --}}



@macro('deploy', ['on' => 'production'])

    git-clone
    setup-app
    composer-install
    update-permissions
    update-symlinks
    optimize
    purge-releases

@endmacro

@task('deploy-code', ['on' => 'production'])

    cd {{ $liveDir }}
    git pull origin master

@endtask

@task('git-clone')

    {{ msg('Cloning git repository...') }}

    # Check if the release directory exists. If it doesn't, create one.
    [ -d {{ $releasesDir }} ] || mkdir -p {{ $releasesDir }};

    # cd into the releases directory.
    cd {{ $releasesDir }};

    # Clone the repository into a new folder.
    git clone --depth 1 {{ $repository }} {{ $newReleaseName }}  &> /dev/null;

    # Configure sparse checkout.
    cd {{ $newReleaseName }};
    git config core.sparsecheckout true;
    echo "*" > .git/info/sparse-checkout;
    echo "!storage" >> .git/info/sparse-checkout;
    git read-tree -mu HEAD;

@endtask

@task('setup-app')

    {{ msg('Setting up app...') }}

    # cd into new folder.
    cd {{ $releasesDir }}/{{ $newReleaseName }};

    # Create .env file
    touch .env
    echo APP_ENV=production >> .env
    echo APP_DEBUG=false >> .env
    echo APP_KEY='{{ $appKey }}' >> .env
    echo CACHE_DRIVER=file >> .env

@endtask

@task('composer-install')

    {{ msg('Installing composer dependencies...') }}

    # cd into new folder.
    cd {{ $releasesDir }}/{{ $newReleaseName }};

    # Install composer dependencies.
    composer self-update &> /dev/null;
    composer install --prefer-dist --no-scripts --no-dev -q -o &> /dev/null;

@endtask

@task('update-permissions')

    {{ msg('Updating directory owner and permissions...') }}

    # cd into releases folder
    cd {{ $releasesDir }};

    # Update group owner and permissions
    chgrp -R www-data {{ $newReleaseName }};
    chmod -R ug+rwx {{ $newReleaseName }};
    chmod -R 1777 {{ $newReleaseName }}/storage;

@endtask

@task('update-symlinks')

    {{ msg('Creating symlink to latest release...') }}

    # Make sure the persistent storage directory exists.
    #[ -d {{ $baseDir }}/storage ] || mkdir -p {{ $baseDir }}/storage;
    mkdir -p {{ $baseDir }}/storage/app;
    mkdir -p {{ $baseDir }}/storage/framework/sessions;
    mkdir -p {{ $baseDir }}/storage/framework/views;
    mkdir -p {{ $baseDir }}/storage/logs;

    # Remove the storage directory and replace with persistent data
    rm -rf {{ $releasesDir }}/{{ $newReleaseName }}/storage;
    cd {{ $releasesDir }}/{{ $newReleaseName }};
    ln -nfs {{ $baseDir }}/storage storage;
    chmod -R 1777 {{ $baseDir }}/storage;

    ln -nfs {{ $releasesDir }}/{{ $newReleaseName }} {{ $liveDir }};
    chgrp -h www-data {{ $liveDir }};

@endtask

@task('optimize')

    {{ msg('Optimizing...') }}

    #cd {{ $releasesDir }}/{{ $newReleaseName }};
    cd {{ $liveDir }};

    # Optimize installation.
    php artisan cache:clear;
    composer dump-autoload;

    # Clear the OPCache
    #sudo service php5-fpm restart

@endtask

@task('purge-releases')

    {{ msg('Purging old releases...') }}

    # This will list our releases by modification time and delete all but the 5 most recent.
    purging=$(ls -dt {{ $releasesDir }}/* | tail -n +5);

    if [ "$purging" != "" ]; then
        echo Purging old releases: $purging;
        rm -rf $purging;
    else
        echo "No releases found for purging at this time";
    fi

@endtask

@task('init', ['on' => 'production'])

    # Check apps directory.
    {{ msg('Checking apps directory...') }}
    mkdir -p {{ $baseDir }};
    mkdir -p {{ $releasesDir }};

    # Make sure the persistent storage directory exists.
    mkdir -p {{ $baseDir }}/storage;
    mkdir -p {{ $baseDir }}/storage/app;
    mkdir -p {{ $baseDir }}/storage/framework/sessions;
    mkdir -p {{ $baseDir }}/storage/framework/views;
    mkdir -p {{ $baseDir }}/storage/logs;

@endtask



{{-- Local tasks --}}

@task('build', ['on' => 'local'])

    cd {{ $localDir }}

    # Update bower dependencies.
    # TODO: update bower: https://www.npmjs.com/package/bower-update
    {{ msg('Updating bower dependencies...') }}
    bower update &> /dev/null

    # Update npm dependencies.
    # TODO: update npm: https://www.npmjs.com/package/npm-check-updates
    {{ msg('Updating node dependencies...') }}
    npm update &> /dev/null

    # Build front-end assets.
    {{ msg('Building assets...') }}
    gulp --production &> /dev/null
    gulp --production --back &> /dev/null

@endtask



{{-- Testing Envoy --}}

@story('test')

    test-local
    test-prod

@endstory

@task('test-local', ['on' => 'local'])

    {{ msg('Testing Envoy on localhost...') }}

    ls

@endtask

@task('test-prod', ['on' => 'production'])

    {{ msg('Testing Envoy on production server...') }}
    ssh -T git@deployer

@endtask
