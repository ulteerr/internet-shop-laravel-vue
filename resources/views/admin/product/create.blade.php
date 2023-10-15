@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.form', [
                    'action' => route('admin.product.store'),
                    'method' => 'post',
                    'items' => [
                        [
                            'type' => 'text',
                            'placeholder' => 'Наименование',
                            'name' => 'title',
                        ],
                        [
                            'type' => 'textarea',
                            'placeholder' => 'Описание',
                            'name' => 'title',
                        ],
                        [
                            'type' => 'textarea',
                            'placeholder' => 'Контент',
                            'name' => 'content',
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Цена',
                            'name' => 'price',
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Количество на складе',
                            'name' => 'count',
                        ],
                        [
                            'type' => 'file',
                            // 'placeholder' => 'Количество на складе',
                            'name' => 'preview_image',
                        ],
                        [
                            'type' => 'select_multiple',
                            'placeholder' => 'Выберите тег',
                            'name' => 'tags',
                            'elements' => [
                                [
                                    'disabled' => true,
                                    'selected' => old('tags') ? '' : 'selected',
                                    'text' => 'Пол',
                                ],
                                [
                                    'selected' => old('tags') === '1' ? 'selected' : '',
                                    'text' => 'Мужской',
                                    'value' => '1',
                                ],
                                [
                                    'selected' => old('tags') === '2' ? 'selected' : '',
                                    'text' => 'Женский',
                                    'value' => '2',
                                ],
                            ],
                        ],
                        [
                            'type' => 'select_multiple',
                            'placeholder' => 'Выберите цвет',
                            'name' => 'colors',
                            'elements' => [
                                [
                                    'disabled' => true,
                                    'selected' => old('colors') ? '' : 'selected',
                                    'text' => 'Пол',
                                ],
                                [
                                    'selected' => old('colors') === '1' ? 'selected' : '',
                                    'text' => 'Мужской',
                                    'value' => '1',
                                ],
                                [
                                    'selected' => old('colors') === '2' ? 'selected' : '',
                                    'text' => 'Женский',
                                    'value' => '2',
                                ],
                            ],
                        ],
                        [
                            'type' => 'select',
                            'placeholder' => 'Пол',
                            'name' => 'category_id',
                            'elements' => [
                                [
                                    'disabled' => true,
                                    'selected' => old('category_id') ? '' : 'selected',
                                    'text' => 'Пол',
                                ],
                                [
                                    'selected' => old('category_id') === '1' ? 'selected' : '',
                                    'text' => 'Мужской',
                                    'value' => '1',
                                ],
                                [
                                    'selected' => old('category_id') === '2' ? 'selected' : '',
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
