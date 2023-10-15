@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.table', [
                    'names' => ['ID', 'Наименования'],
                    'items' => [$product],
                    'items_key' => ['id', 'title'],
                    'buttons' => [
                        [
                            'route' => route('admin.product.edit', $product->id),
                            'title' => 'Редактировать',
                            'class' => 'btn btn-primary',
                        ],
                        [
                            'route' => route('admin.product.delete', $product->id),
                            'title' => 'Удалить',
                            'class' => 'btn btn-danger',
                            'form' => [
                                'route' => route('admin.product.delete', $product->id),
                                'method' => 'delete',
                            ],
                        ],
                    ],
                ])
            </div>
        </div>
    </section>
@endsection
