<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = DB::table('categories')->get();
        
        return view('category/view',compact('categories'));
    }

    public function create()
    {
        return view('category.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|min:3',
        ],[
            'name.required' => 'Isian Category Wajib di isi',
            'name.min' => 'Minimal isian untuk Category adalah 3 karakter',
            'name.max' => 'Maksimum untuk Category adalah 100 Karakter'
        ]);

        DB::table('categories')->insert([
            'name' => $request->input("name")
        ]);

        return redirect()->route('category.create')->with('success',"Data berhasil di simpan");
    }

    public function show(string $id)
    {
        $category = DB::table('categories')->find($id);

        return view('category.detail', compact('category'));
    }

    public function edit(string $id)
    {
        $category = DB::table('categories')->find($id);

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:100|min:3',
        ],[
            'name.required' => 'Isian Task Wajib di isi',
            'name.min' => 'Minimal isian untuk Category adalah 3 karakter',
            'name.max' => 'Maksimum untuk Category adalah 100 Karakter'
        ]);
    
        $categories = DB::table('categories')->orderBy('id', 'asc')->get();
    
        $number = $categories->search(function ($category) use ($id) {
            return $category->id == $id;
        }) + 1;
    
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name')
            ]);
    
        return redirect()->route('category')->with('success', "Data nomor $number berhasil di edit");
    }
    

    public function destroy(string $id)
    {
        $categories = DB::table('categories')->orderBy('id', 'asc')->get();
    
        $number = $categories->search(function ($category) use ($id) {
            return $category->id == $id;
        }) + 1;

        DB::table('categories')->where('id', $id)->delete();
    
        return redirect()->route('category')->with('success', "Data nomor $number berhasil di Hapus");
    }
    
}
