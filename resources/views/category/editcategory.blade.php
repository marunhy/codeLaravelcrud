
@extends('admin.dashboard')

@section('adminpage')
    <div class="row justify-content-evenly">
        <div class="col-8 col-md-8">
            <h1>Edit Category</h1>
            @include('layouts.partials.messages')

            <form action="{{ route('editcategory', ['categoryId' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="categories_image" class="form-label">Category Image</label>
                    <input type="file" class="form-control" id="categories_image" name="categories_image">
                </div>

                @if ($category->categories_image)
                    <div class="mb-3">
                        <img src="{{ $category->categories_image }}" class="img-thumbnail" alt="Category Image" style="max-width: 200px;">
                    </div>
                @endif

                <button type="submit" class="btn btn-primary" id="submitButton" onclick="this.disabled=true; this.form.submit();">Update Category</button>
            </form>
        </div>
    </div>
@endsection
