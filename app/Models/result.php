<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;
    protected $fillable=[
        'results',
        'letter_id',
        'notes',
        'present_recipients'
    ];

    protected $casts=[
        'present_recipients' => 'array',
    ];

    public function letter()
    {
        return $this->belongsTo(letter::class);
    }
}
