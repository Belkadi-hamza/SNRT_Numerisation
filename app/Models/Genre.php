<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_genre';

    protected $fillable = [
        'Genre',
    ];

    public function supports()
    {
        return $this->hasMany(Support::class, 'ID_genre');
    }
}
