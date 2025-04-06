<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodStorageFormFiles extends Model
{
    use HasFactory;

    protected $fillable = ['form_detail_id', 'file_path', 'file_type'];

    public function information()
    {
        return $this->belongsTo(FoodStorageInformations::class, 'informations_id');
    }
}
