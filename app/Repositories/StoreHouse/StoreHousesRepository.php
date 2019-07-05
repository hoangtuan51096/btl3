<?php

namespace App\Repositories\StoreHouse;

use App\Repositories\EloquentRepository;

class StoreHousesRepository extends EloquentRepository
{
    public function getModel()
    {
        return \App\Models\Storehouse::class;
    }

    public function getAll()
    {
        $listStore = $this->_model->with('account')->get();
        return $listStore;
    }

    public function find($id)
    {
        $detailStore = $this->_model->with('pivot', 'account')->where('id', $id)->first();
        return $detailStore;
    }

    public function findMyStore($id)
    {
        $listMyStore = $this->_model->where('account_id', $id)->get();
        return $listMyStore;
    }
}
