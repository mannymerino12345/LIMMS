<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;

    protected $table = 'transaction_history';

    protected $fillable = [
        'description',
        'date',
        'user_id',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
