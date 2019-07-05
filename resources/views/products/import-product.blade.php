@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Them moi san pham</div>
                    <div class="card-body"> 
                        <span class="col-md-2">Ten kho hang: {{ $store_detail->name }}</span><br/>
                        <span class="col-md-2">Chi can nhap ma sp va so luong neu sp da co tren kho hang</span>
                        <form id="create-user" class="form-horizontal" action="{{ route('importProduct') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2">Ma san pham:</label>
                                <div class="col-md-10">
                                    <input  type="text" class="form-control @error('code_product') is-invalid @enderror" name="code_product" value="{{ old('code_product') }}" required autocomplete="name">
                                    @error('code_product')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">Ten san pham:</label>
                                <div class="col-sm-10">
                                        <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-4 col-form-label">So luong(Toi da 500000 san pham 1 lan):</label>
                                <div class="col-sm-6">
                                        <input  type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="name">
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">Mo ta:</label>
                                <div class="col-sm-10">
                                        <input  type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" value="{{ old('desc') }}" autocomplete="desc">
                                        @error('desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <input type="hidden" name="store_id" value="{{ $store_detail->id }}
                            ">
                            @error('store_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button type="submit"> Nhap hang</button>
                        </form>
                        <br/>
                        <a href="{{ route('storehouse.show', $store_detail->id) }}" class="btn btn-info">Tro ve danh sach san pham</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
