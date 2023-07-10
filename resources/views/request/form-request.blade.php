@extends('layouts.main')
@section('title','Space')

  @section('container')
  <br>
  <br>
  <br>
  <br>
  <br>
 
  <div>
    <div class= "container">
    <h3>Pengajuan Peminjaman </h3>
</div>
  </div>
  <section class="inner-page">
      <div class="container">
    <form action="{{ route('peminjaman.store') }}" method="POST">
  @csrf

  <div class="form-group">
  <input type="hidden" name="ruangan_id" value="{{ $item->id }}">
  <input type="hidden" name="user_id" value="{{ $user_id }}">
    </div>

    <div class="form-group">
        <label for="tanggal_pinjam">Tanggal Pinjam</label>
        <input type="datetime-local" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control">
    </div>

    <div class="form-group">
        <label for="tanggal_kembali">Tanggal Kembali</label>
        <input type="datetime-local" name="tanggal_kembali" id="tanggal_kembali" class="form-control">
    </div>
  <br>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
</section>

    @endsection