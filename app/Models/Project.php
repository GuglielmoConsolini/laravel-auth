<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type_id',
        'cover_image'
    ];


    //Tutti i Project avranno un metodo che restituisce la categoria a cui appartengono
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }

}
