<?php

namespace App\Models;

use App\Models\Category;
use App\Models\LoanDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'photo',
        'author',
        'publisher',
        'year',
        'quantity',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    public function loanDetails()
    {
        return $this->hasMany(LoanDetail::class);
    }

    public function scopeCountBorrowedBook()
    {
        return $this->loanDetails()
                ->whereNull('returned_at')
                ->count();
    }

}
