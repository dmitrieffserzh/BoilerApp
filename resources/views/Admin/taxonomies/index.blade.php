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

                <h4 class="my-3">Категории постов

                    <a class="btn btn-primary btn-sm float-right" href="{{-- route('admin.categories.edit',$category->id) --}}">
                        <i class="fas fa-pencil-alt"></i>Создать категорию
                    </a>
                </h4>
                <div class="row">
                    <div class="col py-2 px-3 mb-3 bg-light text-muted">
                           Панель управления / Посты / Категории
                    </div>
                </div>
                @if(!empty($taxonomies))
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

                        {{----}}
                        {{--@foreach($taxonomies as $taxonomy)--}}
                            {{--<tr>--}}
                                {{--<th scope="row" style="width: 30px; text-align: center">{{ $taxonomy->id }}</th>--}}
                                {{--<td><a href="" class="">{{ $taxonomy->title }}</a></td>--}}
                                {{--<td class="text-muted">{{ $taxonomy->slug }}</td>--}}
                                {{--<td style="width: 100px; text-align: right">действия</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
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
