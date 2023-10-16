@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.table', [
                    'names' => ['ID', 'Наименования', 'Посмотреть'],
                    'items' => $tags,
                    'items_key' => ['id', 'title', 'edit' => 'Перейти'],
                    'buttons' => [
                        [
                            'route' => route('admin.tag.create'),
                            'title' => 'Добавить',
                            'class' => 'btn btn-primary',
                        ],
                    ],
                ])
            </div>
        </div>
    </section>
@endsection
