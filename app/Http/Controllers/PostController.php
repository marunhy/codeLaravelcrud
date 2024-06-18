<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UploadFileRequest;
use App\Models\Post;
use App\Models\Attachment;
use App\Services\PostService;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function createpost()
    {
        return view('posts.create');
    }

    public function indexpost()
    {
        $posts = $this->postService->indexpost();
        return view('posts.home', compact('posts'));
    }

    public function storepost(StorePostRequest $request)
    {
        $validatedData = $request->validated();

        $this->postService->storepost($validatedData, $request->file('images'));

        return redirect()->route('indexpost')->with('success', __('Bài viết đã được đăng thành công'));
    }

    public function postDetail()
    {
        return view('posts.post-detail');
    }

    public function upload(UploadFileRequest $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $result = $this->postService->upload($file);
            return response()->json($result);
        }
    }

    public function showPost(string $postId)
{
    try {
        $post = $this->postService->showPost($postId);
        return view('posts.post-detail', ['post' => $post]);
    } catch (\Exception $e) {
        // Handle the exception as needed, for example, redirect to a not found page or show an error message
        return redirect()->route('indexpost')->with('error', $e->getMessage());
    }
}
}
