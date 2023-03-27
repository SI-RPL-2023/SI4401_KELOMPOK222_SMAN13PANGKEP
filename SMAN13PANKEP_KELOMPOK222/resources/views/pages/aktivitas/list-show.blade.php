@extends('layouts.app')
@section('content')
    <div class="container">
        <section style="margin-left: 150px;margin-right: 100px">
            <div class="row">
                <div class="col-5">
                    <img src="{{ $item->gambar() }}" class="img-fluid"/>
                </div>
                <div class="col-1"></div>
                <div class="col-6">
                    <div class="card" style="width:100%;background-color:#85A9FF">
                        <center>
                            <font face="San-serif" size="3px" color="black" style="text-decoration:none;color:white"><b>About</b></font>
                        </center>
                    </div><br>
                    <div class="mb-3">
                        <label for="activity" class="form-label">Activity Title</label>
                        <input type="text" class="form-control" id="activity" name="activity" value="{{ $item->judul }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="text" class="form-control" id="date" name="date" value="{{ $item->tanggal->translatedFormat('d-m-Y') }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="achievement" class="form-label">Details</label>
                        <textarea type="text" class="form-control" id="achievement" name="achievement" rows="4" disabled>{{ $item->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="cp" class="form-label">Kemahasiswaan</label>
                        <input type="text" class="form-control" id="cp" name="cp" value="{{ $item->kontak_person }}" disabled>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
