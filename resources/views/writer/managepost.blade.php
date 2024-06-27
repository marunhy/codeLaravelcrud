<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/manageaccount/manage.css'])
    {{-- <link rel="stylesheet" href="{{ asset('css/homes/homes.css') }}"> --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
</head>

<body>
    @extends('writer/manage')
    @section('accountpage')
        <div class="row justify-content-evenly">
            <div class="col-8 col-md-8">
                <h1>Manage Posts</h1>
                @include('layouts.partials.messages')
                <div class="lead">
                    Manage your posts here.
                    <div class="icon-add-new-user">
                        <a href="{{ route('createpostwriter') }}"><i class="bi bi-plus-lg"></i></i></a>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">#</th>
                            <th scope="col">Title</th>
                            <th scope="col" width="30%">Content</th>
                            <th scope="col" width="10%">Image</th>
                            <th scope="col" width="15%" colspan="3">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Str::limit($post->title, 20) }}</td>
                                <td class="custom-text-content">{!! Str::limit(strip_tags($post->content), 20) !!}</td>
                                <td>
                                    @foreach ($post->attachments as $attachment)
                                        <img src="{{ asset($attachment->image_url) }}" alt="image" width="50"
                                            height="50">
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('showPost', $post->id) }}"><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{ route('editpostForm', $post->id) }}"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('deletepost', $post->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit"
                                            style="background: none; border: none; padding: 0; cursor: pointer; color:red"
                                            onclick="return confirm('Are you sure you want to delete this post?')"><i
                                                class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
