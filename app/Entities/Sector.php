<?php

namespace Directory\Entities;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    /**
     * Obtiene la asociación de clientes con el sector
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function clients(){
        return $this->belongsToMany(Client::class);
    }
}
