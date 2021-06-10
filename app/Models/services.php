<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getCategory() {
        return $this->belongsTo(categories::class, 'category_id', 'id')->first();
    }
}
