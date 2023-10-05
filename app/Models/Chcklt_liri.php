<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chcklt_liri extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'info_checklist_id',
        'seco_frio_id',
        'pasillo_id',
        'bam1',
        'bamo1',
        'bam2',
        'bamo2',
        'bam3',
        'bamo3',
        'bam4',
        'bamo4',
        'bam5',
        'bamo5',
        'bam6',
        'bamo6',
        'bam7',
        'bamo7',
    ];
    
function Pasillos()
    {
        return $this->belongsTo(Pasillo::class, 'pasillo_id');
    }
}
