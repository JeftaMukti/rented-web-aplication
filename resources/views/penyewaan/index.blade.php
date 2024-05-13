
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
        <th scope="col">Kontrakan</th>
        <th scope="col">Pengontrak</th>
        <th scope="col">Tanggal Masuk</th>
        <th scope="col">Tanggal Keluar</th>
        <th scope="col">Status Pembayaran</th>
        <th scope="col" widht="280px">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($data as $d => $data )
        <tr>
          <th scope="row">{{ $d + 1 }}</th>
          <td>{{ $data->kontrakan->nama }}</td>
          <td>{{ $data->pengontrak->nama }}</td>
          <td>{{ $data->tanggal_mulai }}</td>
          <td>{{ $data->tanggal_berakhir }}</td>
          <td>{{ $data->status_pembayaran }}</td>
          <td>
            <form action="{{ url('penyewaan-cancel/'.$data->id) }}" method="POST">
                @csrf
                @method('POST') <!-- Ubah method menjadi POST -->
                <input type="hidden" name="_method" value="DELETE"> <!-- Tambahkan input hidden untuk method PUT -->
                <button type="submit" class="btn btn-danger">Cancel</button> <!-- Ubah type menjadi submit -->
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
