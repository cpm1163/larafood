<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details()
    {
        // Relacionamento Uma para Muitos 1->N, retorno passando o model Plan.php
        return $this->hasMany(DetailPlan::class);
    }

    public function search($filter = null)
    {
        //->orWhere('description', 'LIKE', "%{$filter}%")
        $results = $this->where('name', 'LIKE', '%'.$filter.'%')
                        ->orWhere('description', 'LIKE', '%'.$filter.'%')
                        ->paginate();
        return $results;
    }
}
