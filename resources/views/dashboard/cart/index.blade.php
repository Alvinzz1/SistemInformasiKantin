@extends('dashboard.layout.template')
@section('content')
    <h1>Halaman Keranjang</h1>
    
    
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="p-2">
                    <h4>Shopping cart</h4>
                </div>
                
                    <div class="d-flex justify-content-end mb-3">
                        <a href="/dashboard/product" class="btn btn-success bi bi-box-arrow-left mr-3 btn-lg active">Belanja Lagi</a>
                    </div>

                @if (session()->has('success'))

                <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                  
                </div>
                  
                @endif

                @php
                    $total = 0;
                @endphp
                
                @foreach ($carts as $cart)
                    <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                        <div class="mr-1">
                            <img class="rounded" src="{{ asset('storage/'.$cart->product->image) }}" width="70">
                        </div>
                        <div class="d-flex flex-column align-items-center product-details">
                            <span class="font-weight-bold">{{ $cart->product->name }}</span>
                            <div class="d-flex flex-row product-desc">
                            </div>
                        </div>
                        <form action="/cart/min/{{ $cart->id }}" method="post" class="inline ml-2">
                            @csrf
                            @method('put')
                            <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                            <input type="hidden" name="qty" value="{{ $cart->qty - 1 }}">
                            <button type="submit" class="btn btn-danger">-</button>
                        </form>
                        <h5>{{ $cart->qty }}</h5>
                        <form method="post" action="/cart/plus/{{ $cart->id }}" class="inline ml-2">
                            @csrf
                            @method('put')
                            <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                            <input type="hidden" name="qty" value="{{ $cart->qty + 1 }}">
                            <button type="submit" class="btn btn-success">+</button>
                        </form>
                        
                        <div>
                            <h5 class="text-grey">Rp.{{ number_format($cart->product->harga * $cart->qty, 0, ',', '.') }}</h5>
                        </div>
                        
                        <form action="{{ route('delete-product',$cart->id) }}" method="post" class="d-inline" enctype="multipart/form-data">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" data-id="" 
                            onclick="return confirm ('are you sure?')"><i class="bi bi-trash-fill"></i></button>    
                        </form> 
                    </div>

                    @php
                        $total += ($cart->product->harga * $cart->qty);
                    @endphp

                @endforeach

                
                    <div class="total d-flex justify-content-between">
                        <h4 class="total-price">Total Harga Rp.{{number_format ($total) }}</h4>
                    </div>  
                

                {{-- <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded">
                    <input type="text" class="form-control border-0 gift-card" placeholder="discount code/gift card">
                    <button class="btn btn-outline-warning btn-sm ml-2" type="button">Apply</button>
                </div> --}}
                
                {{-- <form action="{{ route('checkout-product',$carts->id) }}" method="post" class="d-inline" enctype="multipart/form-data"> --}}
                <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded">
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <input type="hidden" name="total" value="{{ $total }}">
                          <button class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="submit">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <div>
          
    </div>
@endsection
