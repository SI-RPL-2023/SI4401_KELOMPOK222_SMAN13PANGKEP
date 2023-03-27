@extends('layouts.app')
@section('content')
    <div class="container">
        <section style="margin-left: 150px;margin-right: 100px">
            <div class="row row-cols-3">
                <div class="col-2" style="margin-right:50px">
                    <div class="shadow" style="background-color:#FFFFFF">
                        <img src="{{ $item->gambar() }}"
                        style="margin-left:10px;margin-right:10px;margin-top:10px;margin-bottom:10px;" width="146px" height="215px">
                    </div><br>
                    <a class="btn btn-primary" href="{{ route('list-peminjaman-buku.create',$item->id) }}" role="button" style="width:100%">
             <font face="San-serif" size="3px" color="#FFFFFF">Select</font>
                    </a>
                </div>
                <div class="col-3" style="margin-right:50px">
                    <div class="card" style="width:100%">
                        <center>
                            <font face="San-serif" size="3px" color="black" style="text-decoration:none">Information</font>
                        </center>
                    </div><br>
                    <font face="San-serif" size="3px"><b>Code</b></font><br>
                    <font face="San-serif" size="3px">{{ $item->kode }}</font><br>
                    <font face="San-serif" size="3px"><b>Book Title</b></font><br>
                    <font face="San-serif" size="3px">{{ $item->judul }}</font><br>
                    <font face="San-serif" size="3px"><b>Subject</b></font><br>
                    <font face="San-serif" size="3px">{{ $item->subjek }}</font><br>
                    <font face="San-serif" size="3px"><b>Type</b></font><br>
                    <font face="San-serif" size="3px">{{ $item->jenis }}</font><br><br>
                </div>
                <div class="col-5">
                    <div class="card" style="width:100%">
                        <center>
                            <font face="San-serif" size="3px" color="black" style="text-decoration:none">Abstract</font>
                        </center>
                    </div><br>
                    <p style="text-align:justify"><font face="San-serif" size="3px">
                        {!! $item->deskripsi !!}
                    </p>
                </div>
            </div>
        </section>
    </div>
@endsection
