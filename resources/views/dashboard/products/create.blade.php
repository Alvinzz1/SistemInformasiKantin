@extends('sidebar.index')
@section('content')
<h1>tambah data</h1>
<div class="cointainer">    <div class="row">
    <div class="col">
      <form action="{{ route('tambah-product') }}"  method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-outline form-white mb-4 text-dark">
          <label class="form-label" for="name">Nama Produk</label>
          <input type="text" class="form-control input-sm form-control-lg @error('name')          
            is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
            {{ $message }}
        </div>
            @enderror
          </div>
        <div class="form-outline form-white mb-4 text-dark">
          <label class="form-label" for="harga">Harga Produk</label>
          <input type="text" class="form-control input-sm form-control-lg @error('harga')          
            is-invalid @enderror" name="harga" id="harga" value="{{ old('harga') }}">
            @error('harga')
            <div class="invalid-feedback">
            {{ $message }}
        </div>
            @enderror
          </div>
        <div class="form-outline form-white mb-4 text-dark">
          <label class="form-label" for="desc">Deskripsi Produk</label>
          <input type="desc" class="form-control input-sm form-control-lg @error('desc')          
            is-invalid @enderror" name="desc" id="desc" value="{{ old('desc') }}">
            @error('desc')
            <div class="invalid-feedback">
            {{ $message }}
        </div>
            @enderror
          </div>
          <label class="form-label" for="category">Category</label>
          <select class="form-select" name="category_id">
            @foreach ($category as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
          </select>
            <div class="relative z-0 w-full mb-6 group">  
            <div class="flex box-border">
                <img width="100px" id="img-preview" class="img-preview bg-white mr-5 border-4 ring-2 ring-blue-400 border-[#0F4061] ">             
                <div class="w-full">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload Gambar Product</label>
                <input name="image" type="file" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:border-1 focus:border-sky-600 @error('image')
                is_invalid
                @enderror" id="file_input" type="file" value="{{ old('image') }}" onchange="previewImage()" >
                <p class="mt-1 text-sm text-gray-500" id="file_input_help"></p>
                @error('image')
                <div class="text-red-600 mt-1 text-sm">
                {{ $message }}
            </div>
                @enderror
            </div>


            <button type="submit" class="text-dark bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

      </form>
    </div>
  </div>
</div>



<script>

function previewImage() {
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview')

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent) {
    imgPreview.src = oFREvent.target.result;
  }
}



</script>


@endsection