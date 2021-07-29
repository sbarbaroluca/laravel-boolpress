<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    private $validation = [
        "title" => "required|max:255",
        "body" => "required|max:65535",
        "category_id" => "nullable|exists:categories,id",
        "tags" => "exists:tags,id"
    ];
    private $validationMsg = [
        "required" => ":attribute is required!",
        "max" => ":sttribute cannot be much longer!"
    ];

    private function createSlug($data)
     {
        $slug = Str::slug($data["title"], "-");
        $postExists = Post::where('slug', $slug)->first();

        $startedSlug = $slug;
        $counter = 1;

        while($postExists) {
            $slug = $startedSlug . '-' . $counter;

            $postExists = Post::where('slug', $slug)->first();
            $counter++;
        }

        return $slug;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(4);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $data = $request->all();

        $request->validate($this->validation, $this->validationMsg);

        $post = new Post();

        $slug = $this->createSlug($data);
        $data['slug'] = $slug;

        $post->fill($data);

        $post->save();

        if(array_key_exists('tags', $data)) {
            $post->tags()->attach($data['tags']);
        }

        return redirect()
        ->route('admin.posts.show', $post->id)
        ->with('message', 'New post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $request->validate($this->validation, $this->validationMsg);

        if($post->title != $data['title']) {
            $slug = $this->createSlug($data);
            $data['slug'] = $slug;
        }

        $post->update($data);

        if(array_key_exists('tags', $data)) {
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->detach();
        }

        return redirect()
        ->route('admin.posts.show', $post->id)
        ->with('message', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
        ->route('admin.posts.index')
        ->with('message', 'Post deleted!');
    }
}
