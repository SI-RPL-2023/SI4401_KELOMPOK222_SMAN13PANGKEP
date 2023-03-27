@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-5">
                <img src="{{ $item->gambar() }}" class="img-fluid"
               >
            </div>
            <div class="col-1"></div>
            <div class="col-6">
                <div class="card" style="width:100%;background-color:#85A9FF">
                    <center>
                        <font face="San-serif" size="3px" color="black" style="text-decoration:none;color:white"><b>About</b></font>
                    </center>
                </div><br>
                <div class="mb-3">
                    <label for="name" class="form-label">Extracurricular Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->nama }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $item->jenis }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="coach" class="form-label">Coach Name</label>
                    <input type="text" class="form-control" id="coach" name="coach" value="{{ $item->pelatih }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="achievement" class="form-label">Achievement</label>
                    <textarea type="text" class="form-control" id="achievement" name="achievement" rows="4" disabled>{{ $item->pencapaian }}</textarea><br>
                </div>
            </div>
        </div>
    </div>
@endsection
