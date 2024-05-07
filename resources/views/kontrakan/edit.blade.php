
@extends('layout.index')

@section('content')
<form action="{{ url('update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label"><strong>Nama Kontrakan</strong></label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Kontrakan Disini" value="{{ $data->name }}">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label"><strong>Harga Kontrakan</strong></label>
      <input type="number" class="form-control" id="price" name="price" placeholder="Masukan Harga Kontrakan Disini" value="{{ $data->price }}" >
    </div>
    <div class="mb-3">
        <label for="status" class="form-label"><strong>Disabled select menu</strong></label>
        <select id="status" name="status" class="form-select">
          <option value="isi">Isi</option>
          <option value="kosong">Kosong</option>
          <option value="perbaikan">Perbaikan</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="nama_rent" class="form-label"><strong>Nama Pengontrak</strong></label>
        <input type="text" class="form-control" id="nama_rent" name="nama_rent" placeholder="Masukan Nama Pengontrak Bila Kontrakan Terisi. Makasukan ' - ' Bila Kosong Atau Perbaikan" value="{{ $data->nama_rent }}" >
      </div>
      <div class="mb-3">
        <label for="tlp_rent" class="form-label"><strong>Nomor Tlp Pengontrak</strong></label>
        <input type="number" class="form-control" id="tlp_rent" name="tlp_rent" placeholder="Masukan Nomer Telepon Pengontrak Disini" value="{{ $data->tlp_rent }}">
      </div>
      <div class="mb-3">
        <label for="pembayaran" class="form-label"><strong>Tanggal_pembayaran</strong></label>
        <input type="date" class="form-control" id="pembayaran" name="pembayaran" placeholder="Masukan Tanggal Pembayaran Disini" value="{{ $data->pembayaran }}">
      </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection
