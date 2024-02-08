<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('index', compact('posts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'tags' => $request->tags
        ]);

        return redirect('/home')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id)
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('index', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required'
        ]);

        //get post by ID
        $post = Post::findOrFail($id);

        $post->update([
            'title'     => $request->title,
            'description'   => $request->description,
            'tags' => $request->tags
        ]);

        //redirect to index
        return redirect('/home')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //delete post
        $post->delete();

        //redirect to index
        return redirect('/home')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
