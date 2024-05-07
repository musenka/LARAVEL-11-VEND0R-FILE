<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class View extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define the inverse relationship with media
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
