<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'title',
        'start_date',
        'end_date',
        'description',
        'slug',
        'img_path',
        'img_original_name'
    ];

    protected $casts = [
        'start_date' => 'datetime:d/m/Y',
        'end_date' => 'datetime:d/m/Y',
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
