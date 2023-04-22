@extends('base')

@section('title', $post->slug)

@section('content')
   <h1>{{ $post->slug }}</h1>
   <a href="{{route('blog.index')}}">Back to blog</a>
@endsection