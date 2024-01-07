<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class book extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sumVotes()
    {
        return Rating::where('book_id', $this->id)->sum('rating');
    }
    public function avgVotes()
    {
        return Rating::where('book_id', $this->id)->avg('rating');
    }
}
