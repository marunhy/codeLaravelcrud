<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite(['resources/css/toppage.css']) --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <link rel="stylesheet" href="{{ asset('css/createpost.css') }}">
</head>
@extends('layouts.layout-page')
@section('pagepost')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Create new Blog</h2>
                <form action="{{ route('storepost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>

                    <div class="form-group custom-content">
                        <label for="editor">Content:</label>
                        <textarea class="form-control" name="content" id="editor"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="images">Picture:</label>
                        <input type="file" id="images" name="images[]" class="form-control" multiple>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{route('ckeditor.upload', ['_token'=>csrf_token()])}}",
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
