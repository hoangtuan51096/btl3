<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorehouseRequest;
use App\Repositories\StoreHouse\StoreHousesRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Pivot\PivotRepository;
use Auth;

class StoreHousesController extends Controller
{
    protected $storeHouse;
    protected $user;
    protected $pivot;

    public function __construct(StoreHousesRepository $storeHouse, UserRepository $user, PivotRepository $pivot)
    {
        $this->storeHouse = $storeHouse;
        $this->user = $user;
        $this->pivot = $pivot;
    }

    public function index()
    {
        $listStore = $this->storeHouse->findMyStore(Auth::id());
        return view('storehouses.index-storehouse', compact('listStore'));
    }

    
    public function create()
    {
        $listUser = $this->user->getAll();
        return view('storehouses.create-storehouse', compact('listUser'));
    }

    public function store(StorehouseRequest $request)
    {
        $addStore = $this->storeHouse->create($request->all());
        session()->flash('status', 'Them moi '.$request->name.' thanh cong');
        return redirect()->route('listStorehouses');
    }

    public function edit($id)
    {
        $storeDetail = $this->storeHouse->find($id);
        $listUser = $this->user->findAccountExceptById($storeDetail->account_id);
        return view('storehouses.edit-storehouse', compact('storeDetail', 'listUser'));
    }


    public function update(Request $request, $id)
    {
        $results = $this->storeHouse->update($id, $request->all());
        session()->flash('status', 'Sua '.$request->name.' thanh cong');
        $listStore = $this->storeHouse->getAll();
        return view('storehouses.list-storehouse', compact('listStore'));
    }
    
    public function show($id)
    {
        $listProducts = $this->pivot->getProductsByStore($id);
        $detailStore = $this->storeHouse->find($id);
        return view('storehouses.show-list-product', compact('listProducts', 'detailStore'));
    }

    public function listStore()
    {
        $listStore = $this->storeHouse->getAll();
        return view('storehouses.list-storehouse', compact('listStore'));
    }
}
