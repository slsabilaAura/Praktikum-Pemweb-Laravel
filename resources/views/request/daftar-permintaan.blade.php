@extends('layouts.main')
@section('title','Space')

  @section('container')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <section class="inner-page">
    <div class="container">
        <h3 class="text">Daftar Permintaan</h3>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th>Nama Ruangan</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permintaan as $p)
                    <tr>
                        <td>{{ $p->nama_ruangan }}</td>
                        <td>{{ $p->tanggal_pinjam }}</td>
                        <td>{{ $p->tanggal_kembali }}</td>
                        <td>{{ $p->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
  @endsection