@extends('dashboard.layout.template')

@section('content')

<style>
  .card {
    width: 18rem;
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  
  .card-img-top {
    height: 12rem;
    width: 100%;
    object-fit: contain;
  }

  .card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
</style>

<h1>halaman product</h1>
<div class="container">
  <h1>Product</h1>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($product as $product)
    <div class="col">
      <div class="card h-100">        
        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
        <div class="card-body">
          <h5 class="card-title">{{ $product->name }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $product->harga }}</h6>
          <form action="{{ route('tambah-cart', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $product->id }}" name="product_id">
            <button type="submit" class="btn btn-success">Add To Cart</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
