@extends('layouts.app')
@section('content')
    <div class="container">
        <section id="konten">
            <div class="row row-cols-1 row-cols-md-3 g-4" id="card">
                @foreach ($items as $item)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ $item->gambar() }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <p class="card-text"></p>
                                <a href="{{ route('list-aktivitas.show',$item->id) }}" class="btn btn-primary rounded-pill">Lanjut Baca</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
