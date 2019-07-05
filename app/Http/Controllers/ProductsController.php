<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StoreHouse\StoreHousesRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Pivot\PivotRepository;
use App\Repositories\HistoryStore\HistoryStoreRepository;
use App\Http\Requests\PushProductRequest;
use App\Http\Requests\ExportProductRequest;

class ProductsController extends Controller
{
    protected $storeHouse;
    protected $product;
    protected $pivot;
    protected $historyStore;

    public function __construct(
        StoreHousesRepository $storeHouse,
        ProductRepository $product,
        PivotRepository $pivot,
        HistoryStoreRepository $historyStore
    ) {
        $this->storeHouse = $storeHouse;
        $this->product = $product;
        $this->pivot = $pivot;
        $this->historyStore = $historyStore;
    }
  
    public function edit($id)
    {
        $product_detail = $this->product->find($id);
        return view('products.edit-product', compact('product_detail'));
    }

    public function update(Request $request, $id)
    {
        $product = $this->product->update($id, $request->all());
        return redirect()->route('products.edit', $id);
    }

    public function viewImportProduct(Request $request)
    {
        $store_id = $request->store_id;
        $store_detail = $this->storeHouse->find($store_id);
        return view('products.import-product', compact('store_detail'));
    }

    public function importProduct(PushProductRequest $request)
    {
        $type = 1;
        $product = $request->all();
        $checkProduct = $this->product->checkProduct($product);
        $importProduct = $this->pivot->editProduct($product, $checkProduct->id, $type);
        $product['product_id'] = $checkProduct->id;
        $product['type'] = 1;
        $historyStore = $this->historyStore->create($product);
        session()->flash('status', 'Them hang hoa thanh cong');
        return redirect()->route('storehouse.show', $product['store_id']);
    }

    public function viewExportProduct(Request $request)
    {
        $data_detail = $this->pivot->findProductInStore($request->store_id, $request->product_id);
        return view('products.export-product', compact('data_detail'));
    }

    public function exportProduct(ExportProductRequest $request)
    {
        $type = 0;
        $product = $request->all();
        $exportProduct = $this->pivot->editProduct($product, $product['product_id'], $type);
        $product['type'] = 0;
        $historyStore = $this->historyStore->create($product);
        session()->flash('status', 'Xuat hang hoa thanh cong');
        return redirect()->route('storehouse.show', $product['store_id']);
    }

    public function editByAjax(Request $request)
    {
        $results = $this->pivot->find($request->id);
        $rowid = $request->rowid;
        return view('products.edit-product', compact('results', 'rowid'));
    }
}
