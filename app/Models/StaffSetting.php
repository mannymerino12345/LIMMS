<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffSetting extends Model
{
    use HasFactory;

    protected $table = 'staff_setting';

    protected $primaryKey = 'setting_id';

    protected $fillable = [
        'user_id',
        's_accounts',
        's_item',
        's_transaction',
    ];

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
