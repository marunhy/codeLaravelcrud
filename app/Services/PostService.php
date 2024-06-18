<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Attachment;
use Illuminate\Http\UploadedFile;

class PostService
{
    public function show(string $postId)
    {
        return Post::find($postId);
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
}
