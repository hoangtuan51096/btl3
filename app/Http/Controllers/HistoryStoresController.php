<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HistoryStore\HistoryStoreRepository;
use App\Repositories\StoreHouse\StoreHousesRepository;

class HistoryStoresController extends Controller
{
    protected $historyStore;
    protected $storeHouse;

    public function __construct(HistoryStoreRepository $historyStore, StoreHousesRepository $storeHouse)
    {
        $this->historyStore = $historyStore;
        $this->storeHouse = $storeHouse;

    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $storeDetail = $this->storeHouse->find($id);
        $historyStoreById = $this->historyStore->getHistoryByStoreId($id);
        return view('storehouses.history-store', compact('historyStoreById', 'storeDetail'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
