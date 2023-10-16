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
                            'value' => old('title'),
                        ],
                        [
                            'type' => 'textarea',
                            'placeholder' => 'Описание',
                            'name' => 'description',
                            'value' => old('description'),
                        ],
                        [
                            'type' => 'textarea',
                            'placeholder' => 'Контент',
                            'name' => 'content',
                            'value' => old('content'),
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Цена',
                            'name' => 'price',
                            'value' => old('price'),
                        ],
                        [
                            'type' => 'text',
                            'placeholder' => 'Количество на складе',
                            'name' => 'count',
                            'value' => old('count'),
                        ],
                        [
                            'type' => 'file',
                            'name' => 'preview_image',
                            'value' => old('preview_image'),
                        ],
                        [
                            'type' => 'select_multiple',
                            'placeholder' => 'Выберите тег',
                            'name' => 'tags',
                            'elements' => $tags,
                        ],
                        [
                            'type' => 'select_multiple',
                            'placeholder' => 'Выберите цвет',
                            'name' => 'colors',
                            'elements' => $colors,
                        ],
                        [
                            'type' => 'select',
                            'placeholder' => 'Пол',
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
