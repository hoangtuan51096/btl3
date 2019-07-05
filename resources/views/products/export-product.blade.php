@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Xuat san pham</div>
                    <div class="card-body"> 
                        <span class="col-md-2">Ten kho hang: {{ $data_detail->store->name }}</span><br/>
                        <form id="create-user" class="form-horizontal" action="{{ route('exportProduct') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4">Ma san pham: {{ $data_detail->product->code_product }}</label>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-4 col-form-label">Ten san pham:{{ $data_detail->product->name }}</label>

                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-4 col-form-label">So luong con lai trong kho: {{ $data_detail->quantity }}</label>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">So luong xuat: </label>
                                <div class="col-sm-10">
                                        <input  type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('desc') }}" autocomplete="quantity" max="{{ $data_detail->quantity }}">
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <input type="hidden" name="store_id" value="{{ $data_detail->store->id }}
                            ">
                            <input type="hidden" name="product_id" value="{{ $data_detail->product->id }}">
                            @error('store_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button type="submit"> Xuat san pham</button>
                        </form>
                        <br/>
                        <a href="{{ route('storehouse.show', $data_detail->store->id) }}" class="btn btn-info">Tro ve danh sach san pham</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
