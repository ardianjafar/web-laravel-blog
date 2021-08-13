<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Post, Category};
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(20);
        return view('admin.post.index',[
        'posts' => $posts,  
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create',[
            'title' => 'Create Post',
            'category'    => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'         => 'required',
            'category_id'   => 'required', 
            'image'         => 'required|image|mimes:png,jpg,jpeg',
            'description'   => 'required',
        ]);

        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('thumbnail', $file_name);
        $user_id            = auth()->user()->id;
        $post = Post::create([
            'title'         => $request->title,
            'user_id'       => $user_id,
            'slug'          => Str::slug($request->title),
            'category_id'   => $request->category_id,
            'image'         => $image,
            'description'   => $request->description
        ]);
        
        return redirect()->route('post.index')->with('success','Postingan berhasil di buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $post     = Post::findOrFail($id);
        return view('admin.post.edit',compact('post','category'));
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
        $this->validate($request,[
            'title'         => 'required',
            'category_id'   => 'required', 
            'description'   => 'required',
        ]);

        $post = Post::findOrFail($id);

        if($request->hasFile('image')){
            // $image =  $request->image;
            // $new_gambar = time() . $image->getClientOriginalName();
            // $image->storeAs('thumbnail/' . $new_gambar);

            $file_name = $request->image->getClientOriginalName();
            $image = $request->image->storeAs('thumbnail/', $file_name);

            $post_data = [
                'title'         => $request->title,
                'slug'          => Str::slug($request->title),
                'category_id'   => $request->category_id,
                'image'         => $image,
                'description'   => $request->description
            ];
        }else{
            $post_data = [
                'title'         => $request->title,
                'slug'          => Str::slug($request->title),
                'category_id'   => $request->category_id,
                'description'   => $request->description
            ];
        }

        $post->update($post_data);

        return redirect()->route('post.index')->with('success','Post berhasil di update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('success','Data berhasil di hapus, silahkan ke trash');
    }

    public function trashed()
    {
        $post = Post::onlyTrashed()->paginate(10);
        return view('admin.post.trashed',compact('post'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();

        return redirect()->back()->with('success','Data berhasil di restore');
    }

    public function delete($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back()->with('success','Data berhasil di Hapus');
    }
}
