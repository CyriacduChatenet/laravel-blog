@extends('base')

@section('title', 'Blog')

@section('content')
    <h1>Blog</h1>
    {{ $posts->links() }}
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{route('blog.show', ['slug' => $post->slug, 'id' => $post->id])}}">{{ $post->title }}</a>
            </li>
        @endforeach
@endsection