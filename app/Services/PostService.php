<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Attachment;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PostService
{
    public function indexpost()
    {
        $posts = Post::latest()->get();
        return  $posts;
    }

    public function storepost(array $data, $images)
    {
        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->category_id = $data['category_id'];
        $post->save();
        Category::where('id', $data['category_id'])->increment('post_count');

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

    public function showPost($postId)
    {
        try {
            $post = Post::with('attachments')->findOrFail($postId); // Eager load attachments
            return $post;
        } catch (ModelNotFoundException $e) {
            throw new \Exception("Post not found with ID: $postId");
        }
    }

    public function postDetail($postId)
    {
        try {
            $post = Post::with('attachments')->findOrFail($postId); // Eager load attachments
            return $post;
        } catch (ModelNotFoundException $e) {
            throw new \Exception("Post not found with ID: $postId");
        }
    }

    public function managePosts()
    {
        return Post::with('attachments')->latest()->whereNull('deleted_at')->get();
    }

    // PostService.php

    public function editpost($postId, array $data, $images)
    {
        $post = Post::findOrFail($postId);
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->category_id = $data['category_id'];
        $post->save();

        // Only delete old attachments if new images are uploaded
        if ($images) {
            // Delete old images
            foreach ($post->attachments as $attachment) {
                if (file_exists(public_path($attachment->image_url))) {
                    unlink(public_path($attachment->image_url)); // Remove the image from the filesystem
                }
                $attachment->delete(); // Remove the record from the database
            }

            // Save new images
            foreach ($images as $image) {
                $imagePath = $this->uploadImage($image);
                $attachment = new Attachment();
                $attachment->post_id = $post->id;
                $attachment->image_url = $imagePath;
                $attachment->save();
            }
        }
        // If no new images are uploaded, do nothing with attachments (keep existing ones)
    }

    public function deletepost($postId)
    {
        $post = Post::findOrFail($postId);
        $categoryId = $post->category_id;

        // Delete post
        $post->delete();

        // Update post count for the category
        Category::where('id', $categoryId)->decrement('post_count');
    }
}
