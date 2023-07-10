@extends('layouts-admin.main')
@section('title','Dashboard Admin SeminarKu')

    
    @section('container')

    @if (Session::has('success'))
    @endif

<!-- Page Heading -->

<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<br>
<br>
<div>
    <div>
    <div>     

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <br>
<br>
            <h3>Daftar Pengajuan Ruangan</h3>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pengguna</th>
                        <th>Nama Ruangan</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->ruangan->nama_ruangan }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_kembali }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <!-- Tombol untuk mengubah status -->
                                @if($item->status == 'pending')
                                <form action="{{ route('pengajuan.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="btn-group">
                                        <button type="submit" name="status" value="approved" class="btn btn-success">Accept</button>
                                        <button type="submit" name="status" value="rejected" class="btn btn-danger">Reject</button>
                                    </div>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>     
      



@endsection