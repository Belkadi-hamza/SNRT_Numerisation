<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID_support '     => $this->ID_support ,
            'Num_support'     => $this->Num_support,
            'ID_type_support' => $this->ID_type_support,
            'Type_support'    => $this->typeDeSupport->Type_support,
            'Titre'           => $this->Titre,
            'ID_genre'        => $this->ID_genre,
            'Genre'           => $this->genre->Genre,
            'Duree'           => $this->Duree,
            'Date_num'        => $this->Date_num,
            'ID_technicien'   => $this->ID_technicien,
            'Technicien' => $this->technicien->Nom . ' ' . $this->technicien->Prenom,
        ];
    }
}
