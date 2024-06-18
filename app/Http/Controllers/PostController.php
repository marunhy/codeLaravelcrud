<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
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
        $posts = Post::latest()->get(); // Lấy danh sách bài viết mới nhất

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

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '.' .$extension;
            $request->file('upload')->move(public_path('media'), $fileName);
            $url = asset('/media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=>1, 'rul' => $url]);
        }
    }
}
