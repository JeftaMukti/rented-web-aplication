
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
        <th scope="col">Harga</th>
        <th scope="col">Status</th>
        <th scope="col">Pengontrak</th>
        <th scope="col">Tlp Pengontrak</th>
        <th scope="col">Tanggal Pembayaran</th>
        <th scope="col" widht="280px">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @php
            $no = 1;
        @endphp
        @foreach ($data as $d )
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td>{{ $d->name }}</td>
          <td>{{ $d->price }}</td>
          <td>{{ $d->status }}</td>
          <td>{{ $d->nama_rent }}</td>
          <td>{{ $d->tlp_rent }}</td>
          <td>{{ $d->pembayaran }}</td>
          <td>
            <form action="{{ url('delete/'.$d->id) }}" method="GET">
                <a href="{{ url('house-edit/'.$d->id) }}" class="btn btn-warning">Edit</a>
                @csrf
                @method('get')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
