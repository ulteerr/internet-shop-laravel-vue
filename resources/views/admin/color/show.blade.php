@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.table', [
                    'names' => ['ID', 'Цвет'],
                    'items' => [$color],
                    'items_key' => ['id', 'title'],
                    'buttons' => [
                        [
                            'route' => route('admin.color.edit', $color->id),
                            'title' => 'Редактировать',
                            'class' => 'btn btn-primary',
                        ],
                        [
                            'route' => route('admin.color.delete', $color->id),
                            'title' => 'Удалить',
                            'class' => 'btn btn-danger',
                            'form' => [
                                'method' => 'delete',
                            ],
                        ],
                    ],
                ])
            </div>
        </div>
    </section>
@endsection
