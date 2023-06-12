<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /**
     * Define the relation with projects elements.
     * One user has many projects.
     */
    public function project(){
        return $this->hasMany(Project::class);
    }
}
