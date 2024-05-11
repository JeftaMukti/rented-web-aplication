
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
        <th scope="col">Pengontrak</th>
        <th scope="col">No Telephone</th>
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
          <td>{{ $d->nama }}</td>
          <td>{{ $d->no_tlp }}</td>
          <td>
            <form action="{{ url('user-delete/'.$d->id) }}" method="GET">
                <a href="{{ url('user-edit/'.$d->id) }}" class="btn btn-warning">Edit</a>
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
