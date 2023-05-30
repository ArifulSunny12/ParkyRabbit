<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table= "_product";
    private $primarykey= "id";

    protected $fillable = [
        'type',
        'item',
        'username',
    ];

}
