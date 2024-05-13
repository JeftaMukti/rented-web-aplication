
@extends('layout.index')

@section('content')
<form action="{{ url('house-create') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label"><strong>Nama Kontrakan</strong></label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Kontrakan Disini">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label"><strong>Harga Kontrakan Perbulan</strong></label>
      <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukan Harga Kontrakan Disini" >
    </div>
    <div class="mb-3">
        
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection
