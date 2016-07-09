
<div class="tile">
    <div style="background-image: url('assets/img/{{ $type }}s/{{ $route }}.png')">
        {{ $name }}
        <a href="{{ route($type, ['name' => $route]) }}"></a>
    </div>
</div>