<?php

namespace App\Repositories;

use App\Models\Lista;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{

     public function listar($status = null)
    {
        $query = Lista::query();

        if ($status) {
            $query->where('status', $status);
        }

        return $query->latest()->get();
    }


}