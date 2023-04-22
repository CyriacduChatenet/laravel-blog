<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): Paginator {
        return Post::paginate(20);
    }

    public function show(string $slug, string $id) {
        $post = Post::findOrFail($id);
        return [
            'post' => $post
        ];
    }

    public function create(string $title, string $slug) {
        $post = new Post();
        $post->title = $title;
        $post->slug = $slug;
        $post->save();

        return [
            'post' => $post
        ];
    }

    public function update(Request $request, Post $post) {
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->save();
        //
    }

    public function destroy(Post $post) {
        $post->delete();
    }
}
