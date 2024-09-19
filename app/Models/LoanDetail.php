<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function calculateFine()
    {
        $borrowedAt = Carbon::parse($this->borrowed_at);
        $returnedAt = $this->returned_at ? Carbon::parse($this->returned_at) : Carbon::now();

        $dueDate = $borrowedAt->copy()->addDays(7);

        if ($returnedAt->gt($dueDate)) {
            $daysOverdue = $returnedAt->diffInDays($dueDate, false);
            return abs($daysOverdue) * 3000 + 10000;
        }

        if($returnedAt == $dueDate){
            return 10000;
        }

        return 0;
    }
}
