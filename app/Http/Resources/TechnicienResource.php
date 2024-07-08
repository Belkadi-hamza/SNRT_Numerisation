<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TechnicienResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID_technicien' => $this->ID_technicien,
            'cin' => $this->cin,
            'Nom' => $this->Nom,
            'Prenom' => $this->Prenom,
            'created_at' => date_format($this->created_at,'Y M d H:m:s'),
        ];
    }
}
