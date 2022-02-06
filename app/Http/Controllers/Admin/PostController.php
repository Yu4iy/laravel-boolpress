<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$posts = Post::all();
      return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
			'title'=>'required|max:255',
			'img'=>'required|max:255',
			'content'=>'required',
			
		]);
      $data = $request->all();
		$post = new Post();
		$slug = Str::slug($data['title'],'-');
		$count = 1;
		while(Post::where('slug', $slug)->first()) {
			$slug .= '-' . $count;
			$count++;
		}

		$data['slug'] = $slug;
		
		$post->fill($data);
		$post->save();

		return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
		$post = Post::where('slug', $slug)->first();
      return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$post = Post::find($id);

		if( ! $post){
			abort(404);
		}
		return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
			'title'=>'required|max:255',
			'img'=>'required|max:255',
			'content'=>'required',
			
		]);
			$data = $request->all();

			$post = Post::find($id);
			
			if($data['title'] != $post->title){
				$slug = Str::slug($data['title'],'-');
				$count = 1;
				while(Post::where('slug', $slug)->first()) {
					$slug .= '-' . $count;
					$count++;
				}

				$data['slug'] = $slug;
			}
			else {
				$data['slug'] =  $post->slug;
			}

			$post->update($data);
			

			return redirect()->route('admin.posts.show', $post->slug);
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
		return redirect()->route('admin.posts.index')->with('status', 'Post removed!');
    }
}
