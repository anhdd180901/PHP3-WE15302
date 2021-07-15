@extends('admin.layout')
@section('content')
<form action="{{ route('product.postEdit', ['id'=>$prod->id]) }}" method="post" enctype="multipart/form-data">
    {{-- file bat buoc phai co  enctype="multipart/form-data" --}}
    @csrf
    {{-- form la phai co @csrf --}}
    <div class="form-group">
      <label for="">name</label>
      <input type="text"class="form-control" name="name" value="{{$prod->name}}">
    </div>
    <div class="form-group">
      <label for="">price</label>
      <input type="text"class="form-control" name="price" value="{{$prod->price}}">
    </div>
    <div class="form-group">
      <label for="">status</label>
      <input type="text"class="form-control" name="status" value="{{$prod->status}}">
    </div>
    <div class="form-group">
      <label for="">quantity</label>
      <input type="text"class="form-control" name="quantity" value="{{$prod->quantity}}">
    </div>
    <div class="form-group">
      <label for="">detail</label>
      <input type="text"class="form-control" name="detail" value="{{$prod->detail}}">
    </div>
    <div class="form-group">
      <label for="">image</label>
      <input type="file"class="form-control" name="image">
      <img src="/upload/product/{{$prod->image}}" width="100px" alt="">
    </div>
    <div class="form-group">
        <label for="">Danh muc</label>
        <select class="form-control" name="cate_id">
          @foreach ($listCate as $item)
          <option {{$item->id === $prod->cate_id ? "selected" : ""}} value={{$prod->cate_id}} >{{$item->name}}</option>
          @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Sua</button>
</form>
@endsection
