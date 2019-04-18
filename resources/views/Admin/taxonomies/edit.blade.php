@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 shadow-sm p-3 mb-5 bg-dark rounded-left " style="min-height: 700px">
            </div>
            <div class="col shadow-sm p-3 mb-5 bg-white rounded-right">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h4 class="my-3">Изменить категорию</h4>
                <div class="row">
                    <div class="col py-2 px-3 mb-3 bg-light text-muted">
                        Панель управления / Посты / Категории / Изменить категорию
                    </div>
                </div>

                <form action="{{ route('posts.category.update', $taxonomy->id) }}" method="post">
                @csrf
                {{ method_field('PATCH') }}

                @include('admin.taxonomies.partials.form')

                <hr>
                <button type="submit" class="btn btn-primary">Сохранить</button>

            </form>
            </div>
        </div>
    </div>
@endsection
