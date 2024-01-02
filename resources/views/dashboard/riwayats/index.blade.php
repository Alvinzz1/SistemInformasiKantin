@extends('sidebar.index')

@section('content')
<h1>halaman Riwayat Pembelian</h1>

<form action="{{ route('cetak-Riwayat') }}" method="post">
  @csrf
  <label for="start_date">Tanggal Awal:</label>
  <input type="date" id="start_date" name="start_date">
  
  <label for="end_date">Tanggal Akhir:</label>
  <input type="date" id="end_date" name="end_date">
  
  <button type="submit">Print Data</button>
</form>

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
          <th class="th-sm">Status</th>
          <th class="th-sm">Action</th>
          {{-- <th class="th-sm">Struk</th> --}}
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
          @if($h->status == null)
      <td><span class="badge bg-warning">Belum Dibayar</span></td>
      @elseif($h->status != 1)
      <td><span class="badge bg-success">Sudah Dibayar</span></td>
      @elseif($h->status != 2)
      <td><span class="badge bg-danger">Dibatalkan</span></td>
    @endif

    @if($h->status == null)

    <td>
      <a href="{{ url('/dashboard/admin/riwayats/'.$h->id) }}" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-check"></i>Konfirmasi</a>
      {{-- <a href="{{ url('/dashboard/admin/riwayats/'.$h->id) }}" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-times"></i>Cancel</a> --}}
    </td>
    @elseif($h->status == 1)
    <td>
      <a href="{{ url('/dashboard/admin/riwayats/'.$h->id) }}" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-times"></i>Cancel</a>
    </td>

    @else
    <td>
      <a href="/cetak-struk/{{ $h->id }}" class="btn btn-xs btn-info btn-flat"><i class="fa fa-times"></i>Cetak</a>
    </td>
    @endif


    <td></td>


          <td>
            {{-- <form action="{{ route('delete-riwayat',$transactions->id) }}" method="post" class="d-inline" enctype="multipart/form-data">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger" data-id="" 
              onclick="return confirm ('are you sure?')"><i class="bi bi-trash-fill"></i></button>    
            </form> --}}
          </td>
        </tr>
        @endforeach 
      </tbody>
      <!--Table body-->

    </table>
    <!--Table-->

  </div>
@endsection
