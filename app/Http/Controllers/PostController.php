<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): View {
        $posts = Post::paginate(20);
        return view('blog.index', [
            'posts' => $posts
        ]);
    }

    public function show(string $slug, string $id): View {
        $post = Post::findOrFail($id);
        return view('blog.show', [
            'post' => $post
        ]);
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
