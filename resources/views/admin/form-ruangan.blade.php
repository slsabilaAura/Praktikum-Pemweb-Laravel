@extends('layouts-admin.main')
@section('title', 'Tambah Ruangan')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Tambah Ruangan</h2>

            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nama_ruangan">Nama Ruangan</label>
                    <input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan">
                </div>

                <div class="form-group">
                    <label for="deskripsi_ruangan">Deskripsi Ruangan</label>
                    <textarea class="form-control" name="deskripsi_ruangan" id="deskripsi_ruangan" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="luas_ruang">Luas Ruang</label>
                    <input type="text" class="form-control" name="luas_ruang" id="luas_ruang">
                </div>

                <div class="form-group">
                    <label for="ruang_img">Unggah Ruangan Image</label>
                    <input type="file" class="form-control-file" name="ruang_img" id="ruang_img">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
