@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.table', [
                    'names' => ['ID', 'Имя', 'Фамилия', 'Отчество', 'Возраст', 'Почта', 'Адрес', 'Пол'],
                    'items' => [$user],
                    'items_key' => ['id', 'name', 'surname', 'patronymic', 'age', 'email', 'address', 'genderTitle',],
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
