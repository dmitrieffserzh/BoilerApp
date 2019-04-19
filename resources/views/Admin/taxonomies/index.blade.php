@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 shadow-sm p-3 mb-5 bg-dark rounded-left " style="min-height: 700px">
                @include('Admin.sidebar')
            </div>
            <div class="col shadow-sm p-3 mb-5 bg-white rounded-right">


                <h4 class="my-3">Категории постов

                    <a class="btn btn-primary btn-sm float-right" href="{{ route( $content_type.'.category.create') }}">
                        &#10010; Создать категорию
                    </a>
                </h4>
                <div class="row">
                    <div class="col py-2 px-3 mb-3 bg-light text-muted">
                           Панель управления / Посты / Категории
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(count($taxonomies))
                    <table class="table table-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 30px; text-align: center"></th>
                            <th scope="col">Наименование</th>
                            <th scope="col">URL</th>
                            <th scope="col" style="width: 100px; text-align: right"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @include('admin.taxonomies.partials.item_list', ['taxonomies' => $taxonomies, 'content_type' => $content_type])

                        </tbody>
                    </table>
                @else
                    <div class="border border-info rounded text-info p-3" role="alert">
                        <div>Категории для это типа контента еще не созданы...</div>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
