<?php

namespace App\Repositories\Pivot;

use App\Repositories\EloquentRepository;

class PivotRepository extends EloquentRepository
{
    public function getModel()
    {
        return \App\Models\Pivot::class;
    }

    public function getProductsByStore($store_id)
    {
        $listProducts = $this->_model->where('store_id', $store_id)
                                     ->with('product')->paginate(5);
        return $listProducts;
    }

    public function findProductInStore($store_id, $product_id)
    {
        $detailProduct = $this->_model->where('store_id', $store_id)
                                      ->where('product_id', $product_id)
                                     ->with('product', 'store')->first();
        return $detailProduct;
    }

    public function editProduct($data, $product_id, $type)
    {
        $dataEdit = array('store_id' => $data['store_id'],
            'product_id' => $product_id,
            'quantity' => $data['quantity']
        );
        $checkProduct = $this->_model->where('store_id', $data['store_id'])
                                     ->where('product_id', $product_id)
                                     ->first();
        if ($type == 1) {
            if (empty($checkProduct)) {
                return $this->_model->create($dataEdit);
            } else {
                $checkProduct->quantity += $dataEdit['quantity'];
                return $checkProduct->save();
            }
        } else {
            if ($data['quantity'] <= $checkProduct['quantity']) {
                $checkProduct->quantity -= $dataEdit['quantity'];
                return $checkProduct->save();
            } else {
                return false;
            }
        }
    }

    public function find($id)
    {
        $dataPivot = $this->_model->where('id', $id)
                                  ->with('product', 'store')
                                  ->first();
        return $dataPivot;
    }
}
