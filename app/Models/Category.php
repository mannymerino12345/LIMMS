<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'item_category';

    // The primary key associated with the table.
    protected $primaryKey = 'category_id';

    // The attributes that are mass assignable.
    protected $fillable = [
        'category_name',
    ];

    // Relationship with items
    public function items()
    {
        return $this->hasMany(Item::class, 'category_id', 'category_id');
    }
}
