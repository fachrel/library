<?php

namespace App\Models;

use App\Models\User;
use App\Models\LoanDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model
{
    use HasFactory;
    protected $fillable= [
        'invoice',
        'user_id',
        'borrowed_at',
        'must_returned_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loandetails()
    {
        return $this->hasMany(LoanDetail::class);
    }

    public function scopeCountBorrowedBook()
    {
        return $this->loanDetails()
                ->count();
    }

    public function scopeCountReturnedBook()
    {
        return $this->loanDetails()
            ->whereNotNull('returned_at')
            ->count();
    }
}
