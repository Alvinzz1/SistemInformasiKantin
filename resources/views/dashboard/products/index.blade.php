@extends('sidebar.index')
@section('content')
<h1>halaman product</h1>


<div class="row justify-content-end">
  <div class="col-md-6">
    <form action="/dashboard/admin/products">
      <div class="input-group mb-3">
        <input type="text" class="form-control" style=" border: 2px solid #2bee15;" placeholder="cari nama product?" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>


    @if (session()->has('success'))

    <div class="alert alert-success" role="alert">
      {{ session('success') }}
      
    </div>
      
    @endif


<div class="table-responsive">
  <a href="/dashboard/admin/products/create" class="btn btn-success mb-3">Tambah Data</a>

    <!--Table-->
    <table class="table">
  
      <!--Table head-->
      <thead>
        <tr>
          <th>No</th>
          <th class="th-sm">Nama Produk</th>  
          <th class="th-sm">Harga</th>
          <th class="th-sm">Deskripsi</th>
          <th class="th-sm">Foto</th>
          <th class="th-sm">Action</th>
        </tr>
      </thead>
      @foreach ($products as $product)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->harga }}</td>
        <td>{{ $product->desc }}</td>
        {{-- <td>  
            @if ($product->image)
          
          <img src="{{ asset('storage/app/' . $product->image) }}" alt="{{ $product->category->name }}" class="img-fluid mt-3">

      @else
        
      @endif</td> --}}
        <td>
          <img src="{{ asset('storage/' . $product->image) }}" alt="" width="100px">
        </td>
        <td>

          <a href="/dashboard/admin/products/edit/{{ $product->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

          <form action="{{ route('delete-barang',$product->id) }}" method="post" class="d-inline" enctype="multipart/form-data">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger" data-id="" 
              onclick="return confirm ('are you sure?')"><i class="bi bi-trash-fill"></i></button>    
          </form> 
        </td>
      </tr>


          


      
            {{-- <a href="/dashboard/admin/products{{ $product->id }}" data-id="{{ $product->id }}" class="btn btn-success"></i>  --}}
                {{-- <form action="/dashboard/admin/products{{ $product->id }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" data-id="{{ $product->id }}"
                        onclick="return confirm('Are You Sure?')"><i class="bi bi-x"></i></button> --}}
          
      @endforeach
      <!--Table head-->
  
      <!--Table body-->
      <tbody>
        {{-- <tr>
          <th scope="row">1</th>
          <td><img src="/template/assets/img/citato.png" width="100" height="100"></td>
          <td>Chitato</td>  
          <td>ini adalah makanan ringan</td>  
          <td>Rp.5000</td>
          <td>
            <div class="btn btn-succes"><i class="fa fa-trash mb-1 text-danger"></i></div>
          </div>
          </td>
        </tr> --}}
               
      </tbody>
      <!--Table body-->
  
    </table>
    <!--Table-->
  
  </div>  
  @include('sweetalert::alert')


  {{ $products->links() }}
@endsection