<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versions extends Model
{
    use HasFactory;

    // Set the table
    protected $table = 'versions';

    // Fields we can write to.
    protected $fillable = ['name', 'download_url'];

    // Set the relationships
    public function branches() {
        return $this->belongsTo(Branches::class);
    }
}
