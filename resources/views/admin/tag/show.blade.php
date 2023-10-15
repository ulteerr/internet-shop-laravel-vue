@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.table', [
                    'names' => ['ID', 'Наименования'],
                    'items' => [$tag],
                    'items_key' => ['id', 'title'],
                    'buttons' => [
                        [
                            'route' => route('admin.tag.edit', $tag->id),
                            'title' => 'Редактировать',
                            'class' => 'btn btn-primary',
                        ],
                        [
                            'route' => route('admin.tag.delete', $tag->id),
                            'title' => 'Удалить',
                            'class' => 'btn btn-danger',
                            'form' => [
                                'route' => route('admin.tag.delete', $tag->id),
                                'method' => 'delete',
                            ],
                        ],
                    ],
                ])
            </div>
        </div>
    </section>
@endsection
