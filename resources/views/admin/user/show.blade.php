@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.table', [
                    'names' => ['ID', 'Наименования'],
                    'items' => [$user],
                    'items_key' => ['id', 'title'],
                    'buttons' => [
                        [
                            'route' => route('admin.user.edit', $user->id),
                            'title' => 'Редактировать',
                            'class' => 'btn btn-primary',
                        ],
                        [
                            'route' => route('admin.user.delete', $user->id),
                            'title' => 'Удалить',
                            'class' => 'btn btn-danger',
                            'form' => [
                                'route' => route('admin.user.delete', $user->id),
                                'method' => 'delete',
                            ],
                        ],
                    ],
                ])
            </div>
        </div>
    </section>
@endsection
