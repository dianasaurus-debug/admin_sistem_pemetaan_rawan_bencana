<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'jenis_bencana' => $this->jenis_bencana,
            'jenis_sop' => $this->jenis_sop,
            'tindakan' => $this->detail_sop->tindakan,
        ];
    }
}
