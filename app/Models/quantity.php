<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quantity extends Model
{
    use HasFactory;

    protected $table = "quantitytable";

    protected $fillable = [
        'quantity', 
        'item_id'
    ];
}
