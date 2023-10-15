@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- @php
                    dd(old());
                @endphp --}}
                @include('admin.includes.form', [
                    'action' => route('admin.user.store'),
                    'method' => 'post',
                    'items' => [
                        [
                            'type' => 'text',
                            'placeholder' => 'Имя',
                            'name' => 'name',
                            'value' => old('name'),
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Фамилия',
                            'name' => 'surname',
                            'value' => old('surname'),
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Отчество',
                            'name' => 'patronymic',
                            'value' => old('patronymic'),
                        ],
                        [
                            'type' => 'email',
                            'placeholder' => 'Почта',
                            'name' => 'email',
                            'value' => old('email'),
                        ],
                        [
                            'type' => 'password',
                            'placeholder' => 'Пароль',
                            'name' => 'password',
                            'value' => old('password'),
                        ],
                        [
                            'type' => 'password',
                            'placeholder' => 'Повторить Пароль',
                            'name' => 'password_confirmation',
                            'value' => old('password_confirmation'),
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Возраст',
                            'name' => 'age',
                            'value' => old('age'),
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Адрес',
                            'name' => 'address',
                            'value' => old('address'),
                        ],
                        [
                            'type' => 'select',
                            'placeholder' => 'Пол',
                            'name' => 'gender',
                            'elements' => [
                                [
                                    'disabled' => true,
                                    'selected' => old('gender') ? '' : 'selected',
                                    'text' => 'Пол',
                                ],
                                [
                                    'selected' => old('gender') === '1' ? 'selected' : '',
                                    'text' => 'Мужской',
                                    'value' => '1',
                                ],
                                [
                                    'selected' => old('gender') === '2' ? 'selected' : '',
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
