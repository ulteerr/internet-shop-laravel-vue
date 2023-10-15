@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.table', [
                    'names' => ['ID', 'Наименования'],
                    'items' => [$category],
                    'items_key' => ['id', 'title'],
                    'buttons' => [
                        [
                            'route' => route('admin.category.edit', $category->id),
                            'title' => 'Редактировать',
                            'class' => 'btn btn-primary',
                        ],
                        [
                            'route' => route('admin.category.delete', $category->id),
                            'title' => 'Удалить',
                            'class' => 'btn btn-danger',
                            'form' => [
                                'route' => route('admin.category.delete', $category->id),
                                'method' => 'delete',
                            ],
                        ],
                    ],
                ])
            </div>
        </div>
    </section>
@endsection
