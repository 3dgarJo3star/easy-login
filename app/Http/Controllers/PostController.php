<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StorePostRequest, UpdatePostRequest};
use App\Models\{Category, Post};
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['categories','user'])
            ->latest()
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request) 
    {
        $post = Post::create([
            'title'   => $request->title,
            'text'    => $request->text,
            'user_id' => Auth::id()
        ]);

        $post->categories()->sync($request->categories ?? []);

        $categoryIds = $request->categories ?? [];

        if ($request->filled('new_category')) {

            $newCategory = Category::firstOrCreate([
                'name' => $request->new_category
            ]);

            $categoryIds[] = $newCategory->id;
        }

        if (!empty($categoryIds)) {
            $post->categories()->sync($categoryIds);
        }
        
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }
    
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'text' => $request->text,
        ]);

        if ($request->filled('new_category')) {

            $category = Category::firstOrCreate([
                'name' => $request->new_category
            ]);

            $categories = $request->categories ?? [];

            $categories[] = $category->id;

        } else {

            $categories = $request->categories ?? [];
        }

        $post->categories()->sync($categories);

        return redirect()
            ->route('posts.show', $post)
            ->with('success', 'Post updated successfully');
    }

    public function confirmDelete(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        return view('posts.delete', compact('post'));
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}