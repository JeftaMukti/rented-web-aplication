
@extends('layout.index')

@section('content')
<form action="{{ url('user-update', $data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label"><strong>Nama Pengontrak</strong></label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Pengontrak Disini" value="{{ $data->nama }}">
    </div>
    <div class="mb-3">
      <label for="no_tlp" class="form-label"><strong>Nomor Telephone</strong></label>
      <input type="number" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukan Nomor Telephone Disini" value="{{ $data->no_tlp }}" >
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection
