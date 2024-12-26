<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;

    // Specify the table associated with the model (optional)
    protected $table = 'laboratories';

    // Set the primary key for the model
    protected $primaryKey = 'lab_id';

    // Specify that the primary key is not auto-incrementing if necessary
    public $incrementing = true;

    // Set the key type to integer (optional, default is integer)
    protected $keyType = 'int';

    // Allow mass assignment for these fields
    protected $fillable = [
        'lab_name',
        'lab_image',
    ];

    // Relationship with items
    public function items()
    {
        return $this->hasMany(Item::class, 'laboratory_id', 'lab_id');
    }
}
