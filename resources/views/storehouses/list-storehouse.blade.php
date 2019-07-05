@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Danh muc nha kho</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{ route('storehouse.create') }}">ADD</a>
                        <table border="1" cellspacing="0" cellpadding="10">
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Manager</th>
                                <th>Create_time</th>
                                <th>Action</th>
                            </tr>
                            @foreach($listStore as $key => $listStore)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $listStore->id }}</td>
                                <td>{{ $listStore->name }}</td>
                                <td>{{ $listStore->account->account }}</td>
                                <td>{{ $listStore->created_at }}</td>
                                <td>
                                    <a href="{{ route('storehouse.show', $listStore->id) }}" class="btn btn-info">Chi tiet</a>
                                    <a href="{{ route('storehouse.edit', $listStore->id)}}" class="btn btn-warning"> Sửa</a>
                                    <a href="{{ route('history-stores.show', $listStore->id)}}" class="btn btn-danger"> Lich su xuat nhap</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
