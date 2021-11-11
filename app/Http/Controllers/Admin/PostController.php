<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'nullable|exists:categories,id'
        ]);

        $new_post = new Post;
        $new_post->fill($form_data);
        $slug = Str::slug($new_post['title']);
        //check if slug already exists
        $slug_presente = Post::where('slug', $slug)->first();

        $contatore = 1;
        while($slug_presente) {
            $slug = $slug . '-' . $contatore;
            $slug = Post::where('slug', $slug)->first();
            $contatore++;
        }
        $new_post->slug = $slug;
        $new_post->save();

        return redirect(route('admin.posts.index'))->with('status', 'The post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        if(!$post) {
            abort(404);
        }
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
        $categories = Category::all();
        $post = post::where('id',$id)->first();
        return view('admin.posts.edit', compact('post', 'categories'));
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
        $post =  post::where('id',$id)->first();
        $form_data = $request->all();

        $this->validate($request,[
            'title'=>'required',
            'content'=>'required'
        ]);

        if( ($form_data['title']) !=( $post['title'])) {
            $slug = Str::slug($form_data['title']);
            //check if slug already exists
            $slug_presente = Post::where('slug', $slug)->first();

            $contatore = 1;
            while($slug_presente) {
                $slug = $slug . '-' . $contatore;
                $slug = Post::where('slug', $slug)->first();
                $contatore++;
            }

        $form_data['slug'] = $slug;

        };
        $post->update($form_data);

        return redirect()->route('admin.posts.index')->with('status','Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return redirect()->back()->with('status','Post has been deleted');

    }
}
