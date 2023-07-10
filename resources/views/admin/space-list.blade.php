@extends('layouts-admin.main')
@section('title','Data Space')

    
    @section('container')

    @if (Session::has('success'))
   @endif

<!-- Page Heading -->


            <!-- button tambah ruangan -->
            
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <br>

<h3 class="h3 mb-2 mr-4  text-gray-800 ">Space List</h3> 
@if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
    <div class="card-header py-3">
    <form action="{{ route('admin.ruang') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari ruangan...">
        <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit">Cari</button>
        </div>
    </div>
</form>
    </div>
    <div class="card-body">
    <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Tambah Ruangan</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" align="center">
            <thead align="center">
                    <tr align="center">
                        <th>Nama Ruangan</th>
                        <th>Deskripsi Ruangan</th>
                        <th>Luas Ruang</th>
                        <th>Ruangan Image</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
               
                <tbody align="center">
                    <tr align="center">
                    @foreach($ruangan as $item)
                        <td>{{ $item->nama_ruangan }}</td>
                        <td>{{ $item->deskripsi_ruangan }}</td>
                        <td>{{ $item->luas_ruang }}</td>
                        @php
                            $fileName = basename($item->ruang_img);
                        @endphp
                        <td><img src="{{ Storage::url('ruangan_images/' . $fileName) }}" alt="Ruangan Image" style="max-width: 200px; max-height: 200px;"></td>
                       
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('admin.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ruangan ini?')">Hapus</button>
                                </form>
</div>
                            </td>
        
                     

                            
                    </tr>
                        
                        @endforeach
                </tbody>
            </table>
      
            
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



@endsection

