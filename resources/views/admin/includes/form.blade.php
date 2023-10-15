<form action="{{ $action }}" method="post">
    @csrf
    @method($method)
    @foreach ($items as $item)
        <div class="form-group">
            @if ($item['type'] === 'select')
                <select class="select form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"
                    @isset($item['name'])name="{{ $item['name'] }}"@endisset>
                    @foreach ($item['elements'] as $element)
                        <option @isset($element['disabled'])disabled="disabled"@endisset
                            @isset($element['selected']){{ $element['selected'] }} @endisset
                            @isset($element['value'])value="{{ $element['value'] }}"@endisset>
                            {{ $element['text'] }}</option>
                    @endforeach
                </select>
            @elseif($item['type'] === 'textarea')
                <textarea class="form-control" @isset($item['placeholder'])placeholder="{{ $item['placeholder'] }}"@endisset
                    @isset($item['value'])value="{{ $item['value'] }}"@endisset
                    @isset($item['name'])name="{{ $item['name'] }}"@endisset cols="30" rows="10">
        </textarea>
            @elseif($item['type'] === 'select_multiple')
                <select class="select_multiple" multiple="multiple" style="width: 100%;"
                    @isset($item['name'])name="{{ $item['name'] }}[]"@endisset
                    @isset($item['placeholder'])data-placeholder="{{ $item['placeholder'] }}"@endisset>
                    @foreach ($item['elements'] as $element)
                        <option @isset($element['disabled'])disabled="disabled"@endisset
                            @isset($element['selected']){{ $element['selected'] }} @endisset
                            @isset($element['value'])value="{{ $element['value'] }}"@endisset>
                            {{ $element['text'] }}</option>
                    @endforeach
                </select>
                </textarea>
            @elseif($item['type'] === 'file')
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" 
                        @isset($item['name'])name="{{ $item['name'] }}[]"@endisset
                        >
                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                    </div>
                    {{-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div> --}}
                </div>
            @else
                <input type="{{ $item['type'] }}" class="form-control"
                    @isset($item['placeholder'])placeholder="{{ $item['placeholder'] }}"@endisset
                    @isset($item['value'])value="{{ $item['value'] }}"@endisset
                    @isset($item['name'])name="{{ $item['name'] }}"@endisset>
            @endif
        </div>
    @endforeach
</form>
