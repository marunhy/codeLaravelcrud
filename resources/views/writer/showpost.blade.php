<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/post/shows.css'])
    {{-- <link rel="stylesheet" href="{{ asset('css/shows.css') }}"> --}}
</head>
@extends('writer/manage')
@section('accountpage')
    <div class="container-fluid">
        <div class="img-banner">
            @foreach ($post->attachments as $attachment)
            <img src="{{ asset($attachment->image_url) }}" alt="profile Pic" class="custom-img-banner">
            @endforeach
            <p class="title-text-post-banner">{{ $post->title }}</p>
        </div>
        <div class="container">
            <div class="content-blog">
                <div class="text-content-blog">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
        <a href="{{ route('managewrite') }}" class="btn btn-primary">Back</a>
    </div>
@endsection

