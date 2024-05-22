
@extends('layout.index')

@section('content')
<table class="table">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Kontrakan</th>
        <th scope="col">Nama Pengontrak</th>
        <th scope="col">Tanggal Bayar</th>
        <th scope="col">Jumlah Bayaran</th>
        <th scope="col">Status Pembayaran</th>
        <th scope="col" widht="280px">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($data as $d => $data )
        <tr>
          <th scope="row">{{ $d + 1 }}</th>
          <td>{{ $data->penyewaan->kontrakan->nama }}</td>
          <td>{{ $data->penyewaan->pengontrak->nama }}</td>
          <td>{{ $data->tanggal_pembayaran }}</td>
          <td>{{ $data->jumlah_pembayaran }}</td>
          <td>{{ $data->status_pembayaran }}</td>
          <td>
            @if ($data->status_pembayaran == "tuntas")
                <p><strong>Pembayaran Sudah Berhasil</strong></p>
            @else
            <form action="{{ url('pembayaran/'.$data->id) }}" method="GET">
                @csrf
                @method('GET') <!-- Ubah method menjadi POST -->
                <button type="submit" class="btn btn-danger">Bayar</button> <!-- Ubah type menjadi submit -->
            </form>
            @endif
        </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
