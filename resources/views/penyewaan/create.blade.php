
@extends('layout.index')

@section('content')
<form action="{{ url('penyewaan-create') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="id_kontrakan" class="form-label"><strong>Nama Kontrakan</strong></label>
      <select class="form-control form-control-sm" id="id_kontrakan" name="id_kontrakan">
        <option>
            @foreach ($kontrakan as $k )
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
        </option>
      </select>
    </div>
    <div class="mb-3">
        <label for="id_pengontrak" class="form-label"><strong>Nama Pengontrak</strong></label>
        <select class="form-control form-control-sm" id="id_pengontrak" name="id_pengontrak">
          <option>
              @foreach ($pengontrak as $p )
                  <option value="{{ $p->id }}">{{ $p->nama }}</option>
              @endforeach
          </option>
        </select>
      </div>
    <div class="mb-3">
      <label for="tanggal_mulai" class="form-label"><strong>Tanggal Mulai Mengontrak</strong></label>
      <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Masukan Tanggal Masuk Pengontrak Disini" >
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection
