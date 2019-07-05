@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $detailStore->name }}</div>
                    <br>
                    Nhan vien quan ly: <span style="color:blue; font-size:30px;">{{ Auth::user()->account }}</span>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <form action="{{ route('viewImportProduct') }}" method="get">
                                <input type="hidden" name="store_id" value="{{ $detailStore->id }}">
                                <button type="submit" class="btn btn-danger">Nhap hang</button>
                            </form>
                        </div>
                        <br/>
                        @if($listProducts->isEmpty())
                            <div class="alert alert-danger" role="alert">
                                <span> Hien tai khong co san pham</span>
                            </div>
                        @else
                            <table border="1" cellspacing="0" cellpadding="10">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Code Product</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Desc</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach($listProducts as $key => $listProduct)
                                <thead>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><div>{{ $listProduct->product->code_product }}</div></td>
                                        <td><div>{{ $listProduct->product->name }}</div></td>
                                        <td>{{ $listProduct->quantity }}</td>
                                        <td><div>{{ $listProduct->product->desc }}</div></td>
                                        <td><div>{{ $listProduct->image }}</div></td>
                                        <td>
                                            <input type="button" data-rowid="{{ $key+1 }}" class="Edit" name="Edit"  data-id="{{ $listProduct->id }}" class="btn btn-info" value="Edit product" >
                                            <input type="button" class="Update" name="Update" id="{{ $listProduct->product_id }}" class="btn btn-info" value="Update product">
                                            <input type="button" class="Cancel" name="Cancel" id="" class="btn btn-info" value="Cancel" >
                                            <form action="{{ route('viewExportProduct') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="store_id" value="{{ $detailStore->id }}">
                                                <input type="hidden" name="product_id" value="{{ $listProduct->product_id }}">
                                                <button type="submit" class="btn">Xuat  hang</button>
                                            </form>
                                        </td>
                                    </tr>
                                </thead>
                                @endforeach
                            </table>
                            <br/>
                            {{ $listProducts->links() }}
                            <br/>
                            <form action="{{ route('export') }}" method='get'>
                                @csrf
                                <input type="hidden" name="store_id" value="{{ $detailStore->id }}">
                                <button type="submit" class="btn btn-danger">Export Data</button>
                            </form>
                            <br/>
                        @endif
                        <a href="{{ route('storehouse.index') }}" class="btn btn-info">Tro ve danh sach kho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type = "text/javascript" language = "javascript">
    function ajaxLoad(method, url, button) {
    var id = button.data('id');
    var rowid = button.data('rowid');
    var tr = button.parents('tr');
    var data = {id : id , rowid: rowid};
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'html',
        success: function(result) {
            tr.empty();
            tr.html(result); 
            },
        });
    }
    $(document).find('.Update').hide();
    $(document).find('.Cancel').hide();
    $(document).on('click', 'input.Edit', function(event){
        event.preventDefault();
        $(this).parentsUntil('thead').css('color', 'blue').attr('contenteditable', 'true');
        $(this).siblings('.Cancel').show();
        $(this).siblings('.Update').show();
        $(this).hide(); 
        //ajaxLoad('POST', 'ajaxEditProduct', $(this));
    });
    $(document).on('click', 'input.Cancel', function(event){
        event.preventDefault();
        $(this).parentsUntil('thead').css('color', 'black').attr('contenteditable', 'false');
        $(this).siblings('.Edit').show();
        $(this).siblings('.Update').hide();
        $(this).hide(); 
    });
    $(document).on('click', 'input.Update', function(event){
        event.preventDefault();
        $.ajax({
        })
    });
</script>
@endsection
