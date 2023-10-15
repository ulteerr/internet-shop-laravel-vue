@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.table', [
                    'names' => ['ID', 'Наименования', 'Редактировать'],
                    'items' => $users,
                    'items_key' => ['id', 'title', 'edit' => 'Перейти'],
                    'buttons' => [
                        [
                            'route' => route('admin.user.create'),
                            'title' => 'Добавить',
                            'class' => 'btn btn-primary',
                        ],
                    ],
                ])
            </div>
        </div>
    </section>
@endsection
