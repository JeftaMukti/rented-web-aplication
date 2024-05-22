
@extends('layout.index')

@section('content')
<form action="{{ url('house-create') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label"><strong>Nama Kontrakan</strong></label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Kontrakan Disini">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label"><strong>Harga Kontrakan Perbulan</strong></label>
      <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukan Harga Kontrakan Disini" >
    </div>
    <div class="mb-3">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
  <script>
    $(document).ready(function() {
        $('#harga').on('input', function() {
            //mengambil input dan menghapus tanda titik
            var value = $(this).val().replace(/\./g, '');

            //Format ulang Dengan tanda titik
            var formattedValue = Number(value).toLocaleString('de-DE');

            //set nilai format input
            $(this).val(formattedValue);
        });

        $(form).on('submit', function() {
            //sebelums submit hapus tanda titik
            var harga = $('#harga').val().replace(/\./g, '');
            $('#harga').val(harga);
        });
    });
  </script>
@endsection
