@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Danh muc </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{ route('user.create') }}">ADD</a>
                        <form action="{{ route('resetPassword') }}" method="get">
                            @csrf
                            <table border="1" cellspacing="0" cellpadding="10">
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Account</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Active</th>
                                    <th>Create_time</th>
                                    <th>List Store</th>
                                </tr>
                                @foreach($danhsach as $key => $data)
                                <tr>
                                    <td><input type="checkbox" name="check[]" value="{{ $data->id }}"></td>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->account }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->role }}</td>
                                    <td>{{ $data->active }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </table>
                            <br/>
                            <button type="submit"> Reset Password</button>
                        </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
