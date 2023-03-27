@extends('layouts.app')
@section('content')
    <div class="container">
        <section id="konten">
            <div class="d-flex justify-content-between">
                <font face="San-serif" size="5"><b>Daftar Buku</b></font>
                <form action="{{ route('list-buku.index') }}" method="get">
                    <div class="form-group row">
                       <div class="col-md-9">
                        <input type="text" placeholder="Cari Buku Kesukaan Anda..." class="form-control" name="q"  value="{{ $q ?? '' }}">
                       </div>
                       <div class="col-md-3">
                        <button class="btn btn-secondary px-4">Cari</button>
                       </div>
                    </div>
                </form>
            </div>
            <hr class="border border-primary border-1 opacity-100" style="width:185px">
            <div class="row row-cols-5">
               @foreach ($items as $item)
               <div class="col-2" style="margin-right:15px">
                <div class="shadow" style="background-color:#FFFFFF">
                    <img src="{{ $item->gambar() }}"
                    style="margin-left:10px;margin-right:10px;margin-top:10px;margin-bottom:10px;" width="158px" height="225px">
                </div><br>
                <center><font face="San-serif" size="3px"><b>{{ $item->judul }}</b></font></center><br>
                <a class="btn btn-primary" href="{{ route('list-buku.show',$item->id) }}" role="button" style="width:100%">
                    <font face="San-serif" size="3px" color="#FFFFFF">See Detail</font>
                </a>
            </div>
               @endforeach
            </div><br><br><br>
        </section>
    </div>
@endsection
