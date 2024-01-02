@extends('dashboard.layout.template')
@section('content')
<h1>halaman Saran</h1>
<style>
  * {
    box-sizing: border-box;
  }
  
  input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }
  
  label {
    padding: 12px 12px 12px 0;
    display: inline-block;
  }
  
  input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
  }
  
  input[type=submit]:hover {
    background-color: #45a049;
  }
  
  .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }
  
  .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
  }
  
  .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
  }
  
  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  
  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
      width: 100%;
      margin-top: 0;
    }
  }
  </style>
  </head>
  <body>
  
  <p><h3>Masukan Saran Di Bawah Ini...</h3></p>


    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>    
    @endif



  <div class="container">
    <div class="row">
      <div class="col">
    <form action="{{ route('tambah-saran') }}" method="post" class="max-w-4xl justify-center mx-auto" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-25">
          <label for="sender" class="block mb-2 text-lg font-medium text-gray-900">Nama</label>
        </div>
        <div class="col-75">
          <input type="text" class="form-control @error('sender') is-invalid @enderror" id="sender" name="sender"  autofocus value="{{ old('sender') }}" placeholder="Masukan Nama Anda...">
          @error('sender')
          <div class="invalid-feedback">    
            {{ $message }}            
          </div>
          @enderror
        </div>
      </div>
    
      <div class="row">
        <div class="col-25">
          <label for="saran">Isi Saran</label>
        </div>
        <div class="col-75">
          <textarea id="saran" name="saran" class="textarea @error('saran') is-invalid  @enderror "  
          placeholder="Masukan Saran..." style="height:200px"></textarea>
          @error('saran')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror

          </div>
        </div>
      </div>
      <div class="row">
        {{-- <a href="/dasshboard/riwayat" class="btn btn-primary mb-3">Submit</a> --}}
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>
@endsection