<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    /*
        $table->string('name')->unique();
        $table->string('url')->unique();
        $table->double('price', 10,2);
        $table->string('description')->nullable();

    */
    protected $fillable = ['name', 'url', 'price', 'description'];
}
