@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.table', [
                    'names' => [
                        'ID',
                        'Имя',
                        'Фамилия',
                        'Отчество',
                        'Возраст',
                        'Почта',
                        'Адрес',
                        'Пол',
                        'Посмотреть',
                    ],
                    'items' => $users,
                    'items_key' => [
                        'id',
                        'name',
                        'surname',
                        'patronymic',
                        'age',
                        'email',
                        'address',
                        'genderTitle',
                        'edit' => 'Перейти',
                    ],
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
