@extends('sidebar.index')

@section('content')
<h1>halaman Riwayat Pembelian</h1>
<div class="table-responsive">

    <!--Table-->
    <table class="table">

      <!--Table head-->
      <thead>
        <tr>
          <th>No</th>
          <th class="th-sm">Nama Produk</th>
          <th class="th-sm">Qty</th>
          <th class="th-sm">Harga</th>
          <th class="th-sm">Tanggal Pembelian</th>
          {{-- <th class="th-sm">Action</th> --}}
        </tr>
      </thead>
      <!--Table head-->

      <!--Table body-->
      <tbody>
        @foreach($histories as $h)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            @foreach ($h->history as $hs ) 
              <p>{{ $hs->product->name }}</p>
            @endforeach
          </td>
          <td>
            @foreach ($h->history as $hs ) 
              <p>{{ $hs->qty }}</p>
            @endforeach
          </td>
          <td>{{ $h->total }}</td>
          <td>{{ $h->created_at }}</td>
          {{-- <td>
            <div class="btn btn-danger d-flex align-items-center">
              <i class="fa fa-trash mb-1 text-danger"></i> --}}
            </div>
          </td>
        </tr>
        @endforeach 
      </tbody>
      <!--Table body-->

    </table>
    <!--Table-->

  </div>
@endsection
