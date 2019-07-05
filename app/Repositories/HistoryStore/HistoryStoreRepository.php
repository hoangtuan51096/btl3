<?php

namespace App\Repositories\HistoryStore;

use App\Repositories\EloquentRepository;

class HistoryStoreRepository extends EloquentRepository
{
    public function getModel()
    {
        return \App\Models\HistoryStore::class;
    }

    public function getHistoryByStoreId($id)
    {
        $historyStore = $this->_model->where('store_id', $id)
                                     ->with('product', 'store')
                                     ->paginate(5);
        return $historyStore;
    }
}
