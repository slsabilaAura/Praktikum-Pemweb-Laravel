@extends('layouts-admin.main')
@section('title', 'Tambah Ruangan')

@section('container')
<div class="card shadow mb-4">
<div class="card-header py-3">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" align="center">
<form class="mx-auto" action="{{ route('admin.updatelist', $ruangan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nama_ruangan">Nama Ruangan</label>
        <input type="text" name="nama_ruangan" id="nama_ruangan" class="form-control" value="{{ $ruangan->nama_ruangan }}">
    </div>

    <div class="form-group">
        <label for="deskripsi_ruangan">Deskripsi Ruangan</label>
        <textarea name="deskripsi_ruangan" id="deskripsi_ruangan" class="form-control">{{ $ruangan->deskripsi_ruangan }}</textarea>
    </div>

    <div class="form-group">
        <label for="luas_ruang">Luas Ruang</label>
        <input type="text" name="luas_ruang" id="luas_ruang" class="form-control" value="{{ $ruangan->luas_ruang }}">
    </div>

    <div class="form-group">
        <label for="ruang_img">Unggah Gambar Ruangan</label>
        <input type="file" name="ruang_img" id="ruang_img" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
</table>
</div>
</div>
</div>
@endsection