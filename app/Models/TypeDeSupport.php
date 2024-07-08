<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDeSupport extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_type_support';

    protected $fillable = [
        'Type_support',
    ];

    public function supports()
    {
        return $this->hasMany(Support::class, 'ID_type_support');
    }
}
