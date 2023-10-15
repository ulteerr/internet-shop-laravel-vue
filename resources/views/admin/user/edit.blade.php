@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.form', [
                    'action' => route('admin.user.update', $user->id),
                    'method' => 'patch',
                    'items' => [
                        [
                            'type' => 'text',
                            'placeholder' => 'Имя',
                            'name' => 'name',
                            'value' => $user->name ?? old('name'),
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Фамилия',
                            'name' => 'surname',
                            'value' => $user->surname ?? old('surname'),
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Отчество',
                            'name' => 'patronymic',
                            'value' => $user->patronymic ?? old('patronymic'),
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Возраст',
                            'name' => 'age',
                            'value' => $user->age ?? old('age'),
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Адрес',
                            'name' => 'address',
                            'value' => $user->address ?? old('address'),
                        ],
                        [
                            'type' => 'select',
                            'placeholder' => 'Пол',
                            'name' => 'gender',
                            'elements' => [
                                [
                                    'disabled' => true,
                                    'selected' => ($user->gender ? true : old('gender')) ? '' : 'selected',
                                    'text' => 'Пол',
                                ],
                                [
                                    'selected' => (old('gender') === '1'
                                            ? 'selected'
                                            : $user->gender  === '1')
                                        ? 'selected'
                                        : '',
                                    'text' => 'Мужской',
                                    'value' => '1',
                                ],
                                [
                                    'selected' => (old('gender') === '2'
                                            ? 'selected'
                                            : $user->gender  === '2')
                                        ? 'selected'
                                        : '',
                                    'text' => 'Женский',
                                    'value' => '2',
                                ],
                            ],
                        ],
                        [
                            'type' => 'submit',
                            'value' => 'Добавить',
                        ],
                    ],
                ])
            </div>
        </div>
    </section>
@endsection
