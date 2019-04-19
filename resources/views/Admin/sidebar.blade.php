{{--@section('sidebar')--}}
    <nav class="nav flex-column">
        <a class="nav-link active text-light" style="padding: .25rem;" href="{{ route('news.index') }}">Новости</a>
        <a class="nav-link text-muted" style="padding: .25rem;" href="{{ route('news.category') }}">Категории</a>
        <hr>
        <a class="nav-link text-muted" style="padding: .25rem;" href="{{ route('posts.index') }}">Посты</a>
        <a class="nav-link text-muted" style="padding: .25rem;" href="{{ route('posts.category') }}">Категории</a>
        <hr>
        <a class="nav-link disabled" style="padding: .25rem;" href="#">Страницы</a>
    </nav>
{{--@endsection--}}