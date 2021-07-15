@extends('admin.layout')
@section('content')
<form action="{{ route('product.postCreate') }}" method="post" enctype="multipart/form-data">
    {{-- file bat buoc phai co  enctype="multipart/form-data" --}}
    @csrf
    {{-- form la phai co @csrf --}}
    <div class="form-group">
      <label for="">name</label>
      <input type="text"class="form-control" name="name">
    </div>
    <div class="form-group">
      <label for="">price</label>
      <input type="text"class="form-control" name="price">
    </div>
    <div class="form-group">
      <label for="">status</label>
      <input type="text"class="form-control" name="status">
    </div>
    <div class="form-group">
      <label for="">quantity</label>
      <input type="text"class="form-control" name="quantity">
    </div>
    <div class="form-group">
      <label for="">detail</label>
      <input type="text"class="form-control" name="detail">
    </div>
    <div class="form-group">
      <label for="">image</label>
      <input type="file"class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for=""></label>
        <select class="form-control" name="cate_id" id="">
          @foreach ($listCate as $item)
          <option value="{{$item->id}}">{{$item->name}}</option>
          @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Them Moi</button>
</form>
@endsection
