@extends('admin.layout')
@section('content')
<a href="{{ route('product.getCreate') }}" class="btn btn-primary">Them moi</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">cate_id</th>
        <th scope="col">price</th>
        <th scope="col">status</th>
        <th scope="col">quantity</th>
        {{-- <th scope="col">detail</th> --}}
        <th scope="col">image</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->cate_id}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->status}}</td>
        <td>{{$product->quantity}}</td>
        {{-- <td>{{$product->detail}}</td> --}}
        <td>
            <img src="/upload/product/{{$product->image}}" width="100px">
        </td>
        <td>
            <a class="btn btn-primary" href="{{ route('product.getEdit', ['id'=>$product->id]) }}" role="button">Edit</a>
        </td>
        <td>
            <form action="{{ route('product.postDelete', ['id'=>$product->id]) }}" method="post">
                @csrf
                <button class="btn btn-danger" type="submit">Xoa</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>
  </div>
{{ $products->links() }}
@endsection
