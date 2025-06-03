<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{

     public function listar($status = null)
    {
        $query = Tarefa::query();

        if ($status) {
            $query->where('status', $status);
        }

        return $query->latest()->get();
    }


}