@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.form', [
                    'action' => route('admin.product.store'),
                    'method' => 'post',
                    'files_multiple' => true,
                    'items' => [
                        [
                            'type' => 'text',
                            'placeholder' => 'Наименование',
                            'label' => 'Наименование',
                            'name' => 'title',
                        ],
                        [
                            'type' => 'textarea',
                            'placeholder' => 'Описание',
                            'label' => 'Описание',
                            'name' => 'description',
                        ],
                        [
                            'type' => 'textarea',
                            'placeholder' => 'Контент',
                            'label' => 'Контент',
                            'name' => 'content',
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Цена',
                            'label' => 'Цена',
                            'name' => 'price',
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Cтарая цена',
                            'label' => 'Cтарая цена',
                            'name' => 'prev_price',
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Количество на складе',
                            'label' => 'Количество на складе',
                            'name' => 'count',
                        ],
                        [
                            'type' => 'file',
                            'label' => 'Превью изображение',
                            'name' => 'preview_image',
                            'accept' => 'image/*',
                            'title' => 'Выберите файл',
                        ],
                        [
                            'type' => 'files',
                            'name' => 'images',
                            'label' => 'Остальные изображения',
                            'accept' => 'image/*',
                            'title' => 'Перетащите изображение',
                            'text' => 'Поддерживаемые типы файлов: jpg, jpeg, png, gif',
                        ],
                        [
                            'type' => 'select_multiple',
                            'placeholder' => 'Выберите тег',
                            'label' => 'Выберите тег',
                            'name' => 'tags',
                            'elements' => $tags,
                        ],
                        [
                            'type' => 'select_multiple',
                            'placeholder' => 'Выберите цвет',
                            'label' => 'Выберите цвет',
                            'name' => 'colors',
                            'elements' => $colors,
                        ],
                        [
                            'type' => 'select',
                            'placeholder' => 'Категория',
                            'label' => 'Категория',
                            'name' => 'category_id',
                            'elements' => $categories,
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
