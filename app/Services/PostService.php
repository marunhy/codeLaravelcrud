<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Attachment;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PostService
{
    public function indexpost()
    {
        $posts = Post::latest()->get(); // Lấy danh sách bài viết mới nhất
        return  $posts;
    }

    public function storepost(array $data, $images)
    {
        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->save();

        if ($images) {
            foreach ($images as $image) {
                $imagePath = $this->uploadImage($image);
                $attachment = new Attachment();
                $attachment->post_id = $post->id;
                $attachment->image_url = $imagePath;
                $attachment->save();
            }
        }

        return $post;
    }

    protected function uploadImage($image)
    {
        $fileName = $image->getClientOriginalName();
        $filePath = $image->storeAs('images', $fileName, 'public');
        return '/storage/' . $filePath;
    }

    public function upload($file)
    {
        $originName = $file->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = $fileName . '.' . $extension;
        $file->move(public_path('media'), $fileName);
        $url = asset('/media/' . $fileName);
        return [
            'fileName' => $fileName,
            'uploaded' => 1,
            'url' => $url,
        ];
    }

    public function showPost($id)
    {
        try {
            $post = Post::with('attachments')->findOrFail($id); // Eager load attachments
            return $post;
        } catch (ModelNotFoundException $e) {
            throw new \Exception("Post not found with ID: $id");
        }
    }
}
