<form action="{{ $action }}" method="post">
    @csrf
    @method($method)
    @foreach ($items as $item)
        <div class="form-group">
            @if ($item['type'] === 'select')
                <select class="custom-select form-control" id="exampleSelectBorder"
                    @isset($item['name'])name="{{ $item['name'] }}"@endisset>
                    @foreach ($item['elements'] as $element)
                        <option @isset($element['disabled'])disabled="disabled"@endisset
                            @isset($element['selected']){{ $element['selected'] }} @endisset
                            @isset($element['value'])value="{{ $element['value'] }}"@endisset
                            >
                            {{ $element['text'] }}</option>
                    @endforeach
                </select>
            @else
                <input type="{{ $item['type'] }}" class="form-control"
                    @isset($item['placeholder'])placeholder="{{ $item['placeholder'] }}"@endisset
                    @isset($item['value'])value="{{ $item['value'] }}"@endisset
                    @isset($item['name'])name="{{ $item['name'] }}"@endisset>
            @endif
        </div>
    @endforeach
</form>
