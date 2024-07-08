<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technicien extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_technicien';

    protected $fillable = [
        'cin',
        'Nom',
        'Prenom',
    ];

    public function supports()
    {
        return $this->hasMany(Support::class, 'ID_technicien');
    }
}
