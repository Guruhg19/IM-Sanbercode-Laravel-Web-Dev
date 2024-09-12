<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);  
    }


    public function index()
    {
        $book = Book::all();

        return view('book.view', compact('book'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('book.tambah',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'images' => 'required|mimes:jpeg,jpg,png|max:2048',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required',
        ],[
            'title.required' => 'Judul Buku Wajib diisi',
            'title.max' => 'Maksimal untuk judul buku adalah 255',
            'summary.required' => 'Ringkasan wajib diisi',
            'images.required' => 'Gambar wajib diunggah',
            'images.mimes' => 'Format gambar harus berupa jpeg, jpg, atau png',
            'images.max' => 'Ukuran maksimal gambar adalah 2MB',
            'stock.required' => 'Stok buku wajib diisi',
            'stock.integer' => 'Stok buku harus berupa angka',
            'stock.min' => 'Stok buku tidak boleh kurang dari 0',
            'category_id.required' => 'Kategori wajib dipilih',
        ]);
        
        $imagesName = time().'.'.$request->images->extension();
        $request->images->move(public_path('uploads'), $imagesName);

        $book = new Book;
        $book->title = $request->input('title');
        $book->summary = $request->input('summary');
        $book->stock = $request->input('stock');
        $book->category_id = $request->input('category_id');
        $book->images = $imagesName;

        $book->save();
        return redirect('/book')->with('success',"Data Buku berhasil di tambahkan");

    }

    public function show(string $id)
    {
        $book = Book::find($id);

        return view('book.detail', compact('book'));
    }

    public function edit(string $id)
    {
        $categories = Category::all();
        $book = Book::find($id);

        return view('book.edit', compact('book', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'images' => 'mimes:jpeg,jpg,png|max:2048',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required',
        ],[
            'title.required' => 'Judul Buku Wajib diisi',
            'title.max' => 'Maksimal untuk judul buku adalah 255',
            'summary.required' => 'Ringkasan wajib diisi',
            'images.mimes' => 'Format gambar harus berupa jpeg, jpg, atau png',
            'images.max' => 'Ukuran maksimal gambar adalah 2MB',
            'stock.required' => 'Stok buku wajib diisi',
            'stock.integer' => 'Stok buku harus berupa angka',
            'stock.min' => 'Stok buku tidak boleh kurang dari 0',
            'category_id.required' => 'Kategori wajib dipilih',
        ]);

        $book = Book::find($id);
        if($request->has('images')){
            if($book->images){
            File::delete('uploads/'. $book->images);
            }
        $fileImage = time() . '.' . $request->images->extension();
        $request->images->move(public_path('uploads'), $fileImage);
        $book->images = $fileImage;
        }

        $book->title = $request->input('title');
        $book->summary = $request->input('summary');
        $book->stock = $request->input('stock');
        $book->category_id = $request->input('category_id');
        $book->save();
        return redirect('/book')->with('success',"Data Buku berhasil di Edit");
    }

    public function destroy(string $id)
    {
        $book = Book::find($id);
        if($book->images){
            File::delete('uploads/'. $book->images);
            }
        $book->delete();

        return redirect('/book')->with('success', "Data Buku berhasil di Hapus");
    }
}
