<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;

    // Fields we can write to.
    protected $fillable = ['name'];

    // The table this model is for.
    protected $table = 'branches';

    // Set the relationships
    public function branches() {
        return $this->hasMany(Versions::class);
    }
}
