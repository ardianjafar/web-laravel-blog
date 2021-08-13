<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Post, Category};
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index3()
    {
        $categories = Category::simplePaginate(5);
        return view('admin.category.index3', compact('categories'));
    }
    public function index()
    {
        $categories = Category::simplePaginate(5);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # code...
        $this->validate($request,[
            'name'      => 'required|min:3|max:25',
        ]);

        $category = Category::create([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
        ]);

        return back()->with('success','Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name'      => 'required|min:3|max:25'
        ]);

        $category->update([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
        ]);

        return redirect()->route('category.index')
                         ->with('success','Data berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success-delete','Data berhasil di hapus,silahkan ke trash');
    }
    public function trashed()
    {
        
        $category = Category::onlyTrashed()->paginate(10);
        return view('admin.category.category-trashed',compact('category'));
    }
    public function restore($id)
    {
        $category = Category::withTrashed()->where('id',$id)->first();
        $category->restore();

        return redirect()->back()->with('success','Data berhasil di restore');
    }

    public function delete($id)
    {
        $category = Category::withTrashed()->where('id',$id)->first();
        $category->forceDelete();
        return redirect()->back()->with('success','Data berhasil di Hapus');
    }
}
