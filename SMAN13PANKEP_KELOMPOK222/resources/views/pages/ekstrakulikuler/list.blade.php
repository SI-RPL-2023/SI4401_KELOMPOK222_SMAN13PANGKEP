@extends('layouts.app')
@section('content')
    <div class="container">
        <section id="konten">
            <div class="d-flex justify-content-between">
                <font face="San-serif" size="5"><b>Ekstrakulikuler</b></font>
                <form action="{{ route('list-ekstrakulikuler.index') }}" method="get">
                    <div class="form-group row">
                       <div class="col-md-9">
                        <input type="text" placeholder="Cari Ekstrakulikuler..." class="form-control" name="q" value="{{ $q ?? '' }}">
                       </div>
                       <div class="col-md-3">
                        <button class="btn btn-secondary px-4">Cari</button>
                       </div>
                    </div>
                </form>
            </div>
            <hr class="border border-primary border-1 opacity-100" style="width:185px">
            <div class="row row-cols-1 row-cols-md-3 g-4" id="card">
                @foreach ($items as $item)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ $item->gambar() }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text"></p>
                                <a href="{{ route('list-ekstrakulikuler.show',$item->id) }}" class="btn btn-primary rounded-pill">Lanjut Baca</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
