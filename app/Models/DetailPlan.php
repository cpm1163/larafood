<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    use HasFactory;
    protected $table = 'detail_plans';
    protected $fillable = ['name'];

    public function plan()
    {
        // Relacionamento Muitos para Um N->1
        return $this->belongsTo(Plan::class);
    }

}
