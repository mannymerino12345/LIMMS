<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional, as it's inferred by convention)
    protected $table = 'transactions';

    // Define the primary key if it's not the default `id`
    protected $primaryKey = 'transaction_id';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'item_id',
        'user_id',
        'quantity',
        'borrow_date',
        'borrow_time',
        'return_date',
        'return_time',
        'due_date',
        'status',
    ];
    // Define the relationships

    /**
     * Get the item associated with the transaction.
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }

    /**
     * Get the user associated with the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'item_id', 'item_id');
    }
}
