<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            @isset($title)
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div>
            @endisset
            @isset($breadcrumbs)
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @foreach ($breadcrumbs as $breadcrumb)
                            <li class="breadcrumb-item @if ($loop->last) active @endif">
                                @if (!$loop->last)
                                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>
                                @endif
                                @if ($loop->last)
                                    {{ $breadcrumb['title'] }}
                                @endif
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endisset
        </div>
    </div>
</div>
