@extends('sidebar.index')

@section('content')
    <h1>Halaman Saran</h1>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Isi Saran</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($saran as $s)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $s->sender }}</td>
                    <td class="px-6 py-4">
                        {{ str_replace($sensor, $replace, $s->saran) }}
                    </td>
                    <td>{{ $s->created_at }}</td>
                    <td>
                        <form action="{{ route('delete-saran', $s->id) }}" method="post" class="d-inline" enctype="multipart/form-data">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" data-id="" onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
    {{ $saran->links() }}
@endsection
