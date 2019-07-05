@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Lich su xuat nhap kho : {{ $storeDetail->name }}</div>
                    <div class="card-body">
                        <table border="1" cellspacing="0" cellpadding="10">
                            <tr>
                                <th>STT</th>
                                <th>Ma Sp</th>
                                <th>Ten</th>
                                <th>So luong</th>
                                <th>Xuat/Nhap</th>
                                <th>Create_time</th>
                            </tr>
                            @foreach($historyStoreById as $key => $history)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $history->product->code_product }}</td>
                                <td>{{ $history->product->name }}</td>
                                @if($history->type ==1)
                                    <td>{{ $history->quantity }}</td>
                                    <td>Nhap</td>
                                @else
                                    <td>-{{ $history->quantity }}</td>
                                    <td>Xuat</td>
                                @endif                               
                                <td>{{ $history->created_at }}</td>
                            </tr>
                            @endforeach
                        </table>
                        <br/>
                            {{ $historyStoreById->links() }}
                        <br/>
                        <a href="{{ route('storehouse.index') }}" class="btn btn-info"> Tro ve tranh danh sach kho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
