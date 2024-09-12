<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{

    public function store(Request $request, $book_id){
        $user_id = Auth::id();
        $request->validate([
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after:tanggal_peminjaman',
        ]);
        Borrow::create([
            'tanggal_peminjaman' => $request->input('tanggal_peminjaman'),
            'tanggal_pengembalian' => $request->input('tanggal_pengembalian'),
            'user_id' => $user_id,
            'book_id' => $book_id,
        ]);

        return redirect('/book/' . $book_id);
    }



}
