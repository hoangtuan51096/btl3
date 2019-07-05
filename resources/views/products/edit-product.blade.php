<tr>
    <td>{{ $rowid }}</td>
    <form>
        <td><input type="text" name="code_product" value="{{ $results->product->code_product }}"></td>
        <td><input type="text" name="name" value="{{ $results->product->name }}"></td>
        <td>{{ $results->quantity }}</td>
        <td><input type="text" name="desc" value="{{ $results->product->desc }}"></td>
        <td><input type="text" name="image" value="{{ $results->product->image }}"></td>
        </form>
        <td>
            <input type="button" class="Update" name="Update" id="{{ $results->product_id }}" class="btn btn-info" value="Update product">
            <input type="button" class="Cancel" name="Cancel" id="" class="btn btn-info" value="Cancel" >
        </td>
</tr>