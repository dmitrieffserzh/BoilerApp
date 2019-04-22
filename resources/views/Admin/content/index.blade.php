@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 shadow-sm p-3 mb-5 bg-dark rounded-left " style="min-height: 700px">
                @include('Admin.sidebar')
            </div>
            <div class="col shadow-sm p-3 mb-5 bg-white rounded-right">


                <h4 class="my-3">Контент

                    <a class="btn btn-primary btn-sm float-right" href="{{ route( $content_type.'.create') }}">
                        &#10010; Создать пост
                    </a>
                </h4>
                <div class="row">
                    <div class="col py-2 px-3 mb-3 bg-light text-muted">
                        Панель управления / контент
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

                @if(count($posts))
                    <table class="table table-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Заголовок</th>
                            <th scope="col">Категория</th>
                            <th scope="col" style="width: 100px; text-align: right"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @include('admin.content.partials.item_list', ['posts' => $posts, 'content_type' => $content_type])

                        </tbody>
                    </table>
                @else
                    <div class="border border-info rounded text-info p-3" role="alert">
                        <div>Записи для это типа контента еще не созданы...</div>
                    </div>
                @endif
                <hr>
                {{ $posts->links() }}

            </div>
        </div>
    </div>
@endsection
