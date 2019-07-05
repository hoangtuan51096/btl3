@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tao moi Account</div>
                    <div class="card-body"> 
                        <a href="{{ route('user.index') }}">BACK</a>
                        <form id="create-user" class="form-horizontal" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2">Account:</label>
                                <div class="col-md-10">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="account" value="{{ old('account') }}" required autocomplete="email">
                                    @error('account')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">Email:</label>
                                <div class="col-md-10">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                     Role:<select class="custom-select" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="employee">Employee</option>
                                    </select><br>
                                </div>
                            </div>
                            <input type="hidden" name="password" value="">
                            <input type="submit" name="submit_add" value="Add" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            account: {
                required: true, 
            },
            role: {
                required: true,
            },
        }
    });
});
</script>
@endsection
