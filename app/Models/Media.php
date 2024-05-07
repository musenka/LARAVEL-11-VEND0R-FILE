<?php

namespace App\Models;


use App\Models\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function views()
    {
        return $this->hasMany(View::class);
    }
}
