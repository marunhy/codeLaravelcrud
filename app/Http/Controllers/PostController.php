<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Services\PostService;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function indexpost()
    {
        $posts = $this->postService->indexpost();
        return view('posts.home', compact('posts'));
    }

    public function managePosts()
    {
        $posts = $this->postService->managePosts();
        return view('posts.manage', compact('posts'));
    }

    public function createpost()
    {
        $categories = Category::all(); // Fetch all categories
        return view('posts.create', compact('categories'));
    }

    public function storepost(StorePostRequest $request)
    {
        $validatedData = $request->validated();
        $this->postService->storepost($validatedData, $request->file('images'));
        return redirect()->route('managePosts')->with('success', __('Bài viết đã được đăng thành công'));
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
            return view('posts.showpost', ['post' => $post]);
        } catch (\Exception $e) {
            return redirect()->route('managePosts')->with('error', $e->getMessage());
        }
    }


    public function postDetail(string $postId)
    {
        try {
            $post = $this->postService->postDetail($postId);
            return view('posts.post-detail', ['post' => $post]);
        } catch (\Exception $e) {
            return redirect()->route('indexpost')->with('error', $e->getMessage());
        }
    }

    public function editpostForm($postId)
    {
        $post = $this->postService->showPost($postId);
        $categories = Category::all(); // Fetch all categories
        return view('posts.edit', compact('post', 'categories'));
    }

    public function editpost(EditPostRequest $request, $postId)
{
    $validatedData = $request->validated();
    $this->postService->editpost($postId, $validatedData, $request->file('images'));
    return redirect()->route('managePosts')->with('success', __('Bài viết đã được cập nhật thành công'));
}


    public function deletepost($postId)
    {
        try {
            $this->postService->deletepost($postId);
            return redirect()->route('managePosts')->with('success', __('Bài viết đã được xóa thành công'));
        } catch (\Exception $e) {
            return redirect()->route('managePosts')->with('error', $e->getMessage());
        }
    }

}
