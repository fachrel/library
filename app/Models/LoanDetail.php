<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanDetail extends Model
{
    use HasFactory;
    protected $fillable= [
        'invoice',
        'book_id',
        'loan_id',
        'borrowed_at',
        'returned_at',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }


}
