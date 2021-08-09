<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistoryRepo extends Model
{
    use HasFactory;

    public function mr_image()
    {
        return $this->hasMany(MedicalHistoryReportImage::class);
    }
}
