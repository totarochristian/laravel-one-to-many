<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'body', 'user_id'];

    /**
     * Define the relation with users elements.
     * One project belongs to an user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
