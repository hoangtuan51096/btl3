@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tao moi kho hang</div>
                    <div class="card-body"> 
                        <form id="create-user" class="form-horizontal" action="{{ route('storehouse.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2">Ten kho hang:</label>
                                <div class="col-md-10">
                                    <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">Quan ly:</label>
                                <div class="col-sm-10">
                                     <select name="account_id">
                                         @foreach($listUser as $user)
                                            <option value="{{ $user->id }}">{{ $user->account }}</option>
                                         @endforeach
                                     </select>
                                </div>
                            </div>
                            <button type="submit"> Them moi</button>
                        </form>
                        <br/>
                        <a href="{{ route('storehouse.index') }}" class="btn btn-info">Tro ve danh sach kho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
