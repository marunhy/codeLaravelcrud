<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\PostService;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\EditPostRequest;
use Illuminate\Support\Facades\Auth;

class WriterPostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function profile()
    {
        return view('writer.manage');
    }

    public function indexpost()
    {
        $posts = $this->postService->indexpost();
        return view('home', compact('posts'));
    }

    public function managewrite()
{
    $user_id = Auth::id(); // Get the authenticated user's ID
    $posts = $this->postService->managePostswriter($user_id);
    return view('writer.managepost', compact('posts'));
}


    public function createpostwriter()
    {
        $categories = Category::all(); // Fetch all categories
        return view('writer.create', compact('categories'));
    }

    public function storepostwrite(StorePostRequest $request)
    {
        $validatedData = $request->validated();
        $user_id = Auth::id(); // Get the authenticated user's ID
        $this->postService->storepost($validatedData, $request->file('images'), $user_id);
        return redirect()->route('managewrite')->with('success', __('Bài viết đã được đăng thành công'));
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
            return view('writer.showpost', ['post' => $post]);
        } catch (\Exception $e) {
            return redirect()->route('managewrite')->with('error', $e->getMessage());
        }
    }


    public function postDetail(string $postId)
    {
        try {
            $post = $this->postService->postDetail($postId);
            return view('writer.post-detail', ['post' => $post]);
        } catch (\Exception $e) {
            return redirect()->route('indexpost')->with('error', $e->getMessage());
        }
    }

    public function editpostForm($postId)
    {
        $post = $this->postService->showPost($postId);
        $categories = Category::all(); // Fetch all categories
        return view('writer.edit', compact('post', 'categories'));
    }

    public function editpost(EditPostRequest $request, $postId)
    {
        $validatedData = $request->validated();
        $this->postService->editpost($postId, $validatedData, $request->file('images'));
        return redirect()->route('managewrite')->with('success', __('Bài viết đã được cập nhật thành công'));
    }

    public function deletepost($postId)
    {
        try {
            $this->postService->deletepost($postId);
            return redirect()->route('managewrite')->with('success', __('Bài viết đã được xóa thành công'));
        } catch (\Exception $e) {
            return redirect()->route('managewrite')->with('error', $e->getMessage());
        }
    }
}
