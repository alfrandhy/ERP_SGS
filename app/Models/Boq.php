<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boq extends Model
{
    /** @use HasFactory<\Database\Factories\BoqFactory> */
    use HasFactory;

    protected $fillable = [
        'boq_code', 'project_code_id', 'part_dwg_no', 'description', 'detail_description', 'dimension', 'material', 'qty', 'unit'
    ];
}
