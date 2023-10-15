@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.includes.form', [
                    'action' => route('admin.user.store'),
                    'method' => 'post',
                    'items' => [
                        [
                            'type' => 'text',
                            'placeholder' => 'Наименование',
                            'name' => 'title',
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
