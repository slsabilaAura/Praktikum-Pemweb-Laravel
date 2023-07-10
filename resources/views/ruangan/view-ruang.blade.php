@extends('layouts.main')
@section('title', 'Daftar Ruangan')

@section('container')

<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div>
    <div class="container">
        <form action="{{ route('ruangan.index') }}" class="narrow-w form-search d-flex align-items-stretch mb-3" method="GET">
            @csrf
            <input type="text" class="form-control px-4" name="search" placeholder="Search Your Space" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>

<section class="inner-page">
    <h4 class="heading" data-aos="fade-up">
        Easiest way to find your dream space
    </h4>
    <div class="container">
        <div class="row">
            @if (count($ruangan) > 0)
                @foreach ($ruangan as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card w-100 h-100">
                            <img src="{{ asset('assets/images/img_5.jpg') }}" class="card-img-top" alt="Ruangan Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_ruangan }}</h5>
                                <p class="card-text">{{ $item->deskripsi_ruangan }}</p>
                                <p class="card-text">Luas Ruang: {{ $item->luas_ruang }} meter Kuadart</p>
                                <form action="{{ route('peminjaman.create', ['ruangan_id' => $item->id, 'user_id' => Auth::user()->id]) }}" method="GET">
                                    <button class="btn btn-success mx-2" type="submit">Peminjaman</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <p>No results found.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
