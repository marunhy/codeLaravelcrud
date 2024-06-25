<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <link rel="stylesheet" href="{{ asset('css/post/editposts.css') }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
</head>
@extends('admin.dashboard')

@section('adminpage')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Edit Post</h2>
                <form action="{{ route('editpost', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}">
                    </div>

                    <div class="form-group">
                        <label for="editor">Content:</label>
                        <textarea class="form-control" name="content" id="editcontent">{{ $post->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == $post->category_id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="images">New Pictures:</label>
                        <input type="file" id="images" name="images[]" class="form-control" multiple>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            @foreach($post->attachments as $attachment)
                                <div class="col-md-3">
                                    <img src="{{ asset($attachment->image_url) }}" class="image-thumbnail" alt="Image">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('managePosts') }}" class="btn btn-default">Back</a>

                </form>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editcontent'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
