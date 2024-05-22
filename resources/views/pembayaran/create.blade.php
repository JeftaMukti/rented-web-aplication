
@extends('layout.index')

@section('content')
<form action="{{ url('pembayarans',$data->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="id_kontrakan" class="form-label"><strong>Nama Kontrakan</strong></label>
        <input type="string" class="form-control" id="id_kontrakan" name="id_kontrakan" value="{{ $data->penyewaan->kontrakan->nama }}" disabled>
    </div>
    <div class="mb-3">
        <label for="id_pengontrak" class="form-label"><strong>Nama Pengontrak</strong></label>
        <input type="string" class="form-control" id="id_pengontrak" name="id_pengontrak" value="{{ $data->penyewaan->pengontrak->nama }}" disabled>
    </div>
    <div class="mb-3">
      <label for="tanggal_mulai" class="form-label"><strong>Tanggal Berakhir pengontrak</strong></label>
      <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $data->penyewaan->tanggal_berakhir }}" disabled>
    </div>
    <div class="mb-3">
        <label for="tanggal_pembayaran" class="form-label"><strong>Tanggal Bayar pengontrak</strong></label>
        <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran">
    </div>
    <div class="mb-3">
        <label for="jumlah_pembayaran" class="form-label"><strong>Jumlah Pembayaran</strong></label>
        <input type="string" class="form-control" id="jumlah_pembayaran" name="jumlah_pembayaran" value="{{ $data->jumlah_pembayaran }}" disabled>
    </div>
    <button type="submit" class="btn btn-primary">Bayar</button>
  </form>
@endsection
