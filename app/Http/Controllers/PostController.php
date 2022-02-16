<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        abort_if(Gate::denies('posts:access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posts = Post::with('user')->get();

        return view('blog.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        abort_if(Gate::denies('posts:access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('blog.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return RedirectResponse
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $post = Post::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title'), "-"),
            'content' => $request->input('content'),
            'user_id' => $request->user()->id,
            'created_at' => new Date(),
            'updated_at' => new Date()
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show(Post $post, Response $response): Response
    {
        return response([]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return View
     */
    public function edit(Post $post): View
    {
        abort_if(Gate::denies('posts:access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('blog.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update([$request->validated(), 'slug' => Str::slug($request->input('slug'), "-")]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        abort_if(Gate::denies('posts:access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->delete();

        return redirect()->route('posts.index');
    }
}
