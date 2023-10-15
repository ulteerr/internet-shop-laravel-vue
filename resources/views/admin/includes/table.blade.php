<div class="col-12">
    <div class="card">
        @isset($buttons)
            <div class="card-header card-header-flex">
                @foreach ($buttons as $button)
                    @if (isset($button['form']))
                        <form action="{{ $button['route'] }}" method="post">
                            @csrf
                            @method($button['form']['method'])
                            <input type="submit" value="{{ $button['title'] }}" class="{{ $button['class'] }}">
                        </form>
                    @else
                        <a href="{{ $button['route'] }}" class="{{ $button['class'] }}">{{ $button['title'] }}</a>
                    @endif
                @endforeach
            </div>
        @endisset
        @if (count($items) > 0)
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            @foreach ($names as $name)
                                <th>{{ $name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                @php
                                    $keyfound = false;
                                @endphp
                                @foreach ($items_key as $key => $element)
                                    <td>
                                        @if (str_contains($item->{$key}, 'http'))
                                            <a href="{{ $item->{$key} }}">{{ $element }}</a>
                                        @elseif (preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $item->{$element}))
                                            <div style="width:16px;height:16px;background:{{ $item->{$element} }}"></div>
                                        @else
                                            {{ $item->{$element} }}
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
