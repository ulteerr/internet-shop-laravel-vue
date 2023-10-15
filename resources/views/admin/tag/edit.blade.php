@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.form', [
                    'action' => route('admin.tag.update', $tag->id),
                    'method' => 'patch',
                    'items' => [
                        [
                            'type' => 'text',
                            'placeholder' => 'Наименование',
                            'name' => 'title',
                            'value' => $tag->title,
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
