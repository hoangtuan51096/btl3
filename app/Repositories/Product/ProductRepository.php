<?php

namespace App\Repositories\Product;

use App\Repositories\EloquentRepository;

class ProductRepository extends EloquentRepository
{
    public function getModel()
    {
        return \App\Models\Product::class;
    }
    
    public function checkProduct($product)
    {
        $checkProduct = $this->_model->where('code_product', $product['code_product'])->first();
        if (empty($checkProduct)) {
            return $this->_model->create($product);
        } else {
            return $checkProduct;
        }
    }
}
