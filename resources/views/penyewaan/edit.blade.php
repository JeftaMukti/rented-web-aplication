
@extends('layout.index')

@section('content')
<form action="{{ url('user-create') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label"><strong>Nama Pengontrak</strong></label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Pengontrak Disini">
    </div>
    <div class="mb-3">
      <label for="no_tlp" class="form-label"><strong>Nomor Telephone Pengontrak</strong></label>
      <input type="number" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukan Nomor Pengontrak Disini" >
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection
