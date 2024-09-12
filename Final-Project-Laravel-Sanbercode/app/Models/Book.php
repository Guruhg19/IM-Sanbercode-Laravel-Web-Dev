<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['title', 'summary', 'images', 'stock','category_id'];
    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function listBorrows(){

        return $this->hasMany(Borrow::class, 'book_id');
    }

}
