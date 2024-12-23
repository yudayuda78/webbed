<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PendaftaranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'slug' => $this->slug,
            'kegiatan' => $this->kegiatan,
            'fasilitas' => $this->fasilitas,
            'jenis' => $this->jenis,
            'tim' => $this->tim,
            'pmm' => $this->pmm,
            'telegram' => $this->telegram,
            'linktree' => $this->linktree,
            'dibuka' => $this->dibuka,
            'image' => $this->image,
        ];


        // return parent::toArray($request);
    }
}
