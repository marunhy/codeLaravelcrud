<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/post/createpost.css'])
    {{-- @vite('resources/js/user.js') --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    {{-- <link rel="stylesheet" href="{{ asset('css/createpost.css') }}"> --}}
</head>
@extends('writer/manage')
@section('accountpage')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Create new Blog</h2>
                <form action="{{ route('storepostwrite') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="editor">Content:</label>
                        <textarea class="form-control" name="content" id="editor">{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="images">Pictures:</label>
                        <input type="file" id="images" name="images[]" class="form-control" multiple>
                        @if ($errors->has('images'))
                            <span class="text-danger">{{ $errors->first('images') }}</span>
                        @endif
                        @if ($errors->has('images.*'))
                            <span class="text-danger">{{ $errors->first('images.*') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('managewrite') }}" class="btn btn-default">Back</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                // Configuration for CKEditor
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
