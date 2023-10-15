<form action="{{ $action }}" method="post">
    @csrf
	@method($method)
    @foreach ($items as $item)
        <div class="form-group">
            <input type="{{ $item['type'] }}" class="form-control"
                @isset($item['placeholder'])placeholder="{{ $item['placeholder'] }}"@endisset
                @isset($item['value'])value="{{ $item['value'] }}"@endisset
                @isset($item['name'])name="{{ $item['name'] }}"@endisset>
        </div>
    @endforeach
</form>
