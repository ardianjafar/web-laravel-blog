<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        # code...
        $categories = Category::simplePaginate(5);
        return view('admin.category.show', compact('categories'));
    }

    public function show()
    {
        # code...
    }

    public function create()
    {
        # code...
        return view('admin.category.show');
    }
    public function store(Request $request)
    {
        // dd('clicked');
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
    public function edit(Category $category)
    {
        # code...
        return view('admin.category.edit', compact('category'));
    }

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
    
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success-delete','Data berhasil di hapus,silahkan ke trash');
    }
    public function trashed()
    {
        
        $category = Category::onlyTrashed()->paginate(10);
        return view('admin.category.trashed',compact('category'));
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
