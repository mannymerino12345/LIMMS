<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'items';

    // Define the primary key if it's not the default `id`
    protected $primaryKey = 'item_id';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'item_image',
        'laboratory_id',
        'item_name',
        'item_description',
        'quantity',
        'category_id',
        'days',
    ];

    // Define the relationships
    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class, 'laboratory_id', 'lab_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
