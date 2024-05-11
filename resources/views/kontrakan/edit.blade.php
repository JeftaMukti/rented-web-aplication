
@extends('layout.index')

@section('content')
<form action="{{ url('update', $data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label"><strong>Nama Kontrakan</strong></label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Kontrakan Disini" value="{{ $data->nama }}">
    </div>
    <div class="mb-3">
      <label for="harga" class="form-label"><strong>Harga Kontrakan</strong></label>
      <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukan Harga Kontrakan Disini" value="{{ $data->harga }}" >
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection
