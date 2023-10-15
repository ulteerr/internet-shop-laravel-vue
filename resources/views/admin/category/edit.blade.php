@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.form', [
                    'action' => route('admin.category.update', $category->id),
                    'method' => 'patch',
                    'items' => [
                        [
                            'type' => 'text',
                            'placeholder' => 'Наименование',
                            'name' => 'title',
                            'value' => $category->title,
                        ],
                        [
                            'type' => 'submit',
                            'value' => 'Редактировать',
                        ],
                    ],
                ])
            </div>
        </div>
    </section>
@endsection
