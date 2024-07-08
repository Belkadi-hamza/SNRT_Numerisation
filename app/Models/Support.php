<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_support';

    protected $fillable = [
        'Num_support',
        'ID_type_support',
        'Titre',
        'ID_genre',
        'Duree',
        'Date_num',
        'ID_technicien',
    ];

    public function technicien()
    {
        return $this->belongsTo(Technicien::class, 'ID_technicien');
    }

    public function typeDeSupport()
    {
        return $this->belongsTo(TypeDeSupport::class, 'ID_type_support');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'ID_genre');
    }

}


