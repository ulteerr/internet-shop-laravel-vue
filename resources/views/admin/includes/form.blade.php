<form action="{{ $action }}" method="post" enctype="multipart/form-data" class="col-12"
    @isset($files_multiple)data-files={{ $files_multiple }}@endisset
    @isset($model)data-model={{ $model }}@endisset
    @isset($id)data-id={{ $id }}@endisset>
    @csrf
    @method($method)
    <div class="form-group form-group-errors">
        @if ($errors->any())
            <div class="errors-block alert alert-danger">
                <p class="h4">Объект не добавлен. Исправьте ошибки и попробуйте еще раз</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @foreach ($items as $item)
        <div class="form-group">
            @isset($item['label'])
                <label for="">{{ $item['label'] }}</label>
            @endisset
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
                    @isset($item['name'])name="{{ $item['name'] }}"@endisset cols="30" rows="10">
@isset($item['value'])
{{ $item['value'] }}
@endisset
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
                <div class="input-file-row">
                    <label class="input-file">
                        <input type="file" name="{{ $item['name'] }}" accept="{{ $item['accept'] }}"
                            @isset($item['value'])value="{{ $item['value'] }}@endisset">
                        <span>{{ $item['title'] }}</span>
                    </label>
                    <div class="input-file-list"></div>
                </div>
            @elseif($item['type'] === 'files')
                <div class="input-group">
                    <div class="drop-zone">
                        <input type="file" name="{{ $item['name'] }}[]" class="drop-zone-file-input"
                            accept="{{ $item['accept'] }}" multiple style="display:none;">
                        <div class="drop-zone-select-images"
                            value="<h3>{{ $item['title'] }}</h3>
                            <p>{{ $item['text'] }}</p>">
                            @if (isset($item['elements']))
                                @foreach ($item['elements'] as $element)
                                    <div class="drop-zone-select-image drop-zone-select-image-store">
                                        <img src="{{ $element }}" alt="">
                                        <a class="drop-zone-select-image-remove">x</a>
                                    </div>
                                @endforeach
                            @else
                                <h3>{{ $item['title'] }}</h3>
                                <p>{{ $item['text'] }}</p>
                            @endif
                        </div>
                    </div>
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
