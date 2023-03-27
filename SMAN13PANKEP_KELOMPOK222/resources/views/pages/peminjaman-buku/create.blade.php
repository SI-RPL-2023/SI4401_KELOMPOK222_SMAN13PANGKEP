@extends('layouts.app')
@section('content')
    <center>
        <font face="San-serif" size="6"><b>Book Request Form</b></font>
    </center>
    <br>
    <form action="{{ route('list-peminjaman-buku.store',$item->id) }}" method="POST"
        style="margin-left: 160px; margin-right: 160px; padding-left:150px; padding-right:150px">
        @csrf
        <div class="mb-3">
            <input type="hidden" id="id_customer" name="id_customer">
        </div>
        <div class="form-wrap">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ auth()->user()->siswa->nama ?? '-' }}" disabled>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <div class="input-wrap">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis"
                            value="{{ auth()->user()->siswa->nis ?? '-' }}" disabled>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-wrap">
                        <label for="class" class="form-label">Class</label>
                        <input type="text" class="form-control" id="class" name="class"
                            value="{{ auth()->user()->siswa->kelas ?? '-' }}" disabled>
                    </div>
                </div>
            </div><br>
            <div class="form-group row">
                <div class="col-6">
                    <div class="input-wrap" style="">
                        <label for="nis" class="form-label">Book Title</label>
                        <input type="text" class="form-control" id="nis" name="nis"
                            value="{{ $item->judul ?? '-' }}" disabled>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-wrap">
                        <label for="class" class="form-label">Code</label>
                        <input type="text" class="form-control" id="class" name="class"
                            value="{{ $item->kode ?? '-' }}" disabled>
                    </div>
                </div>
            </div><br>
            <div class="form-group row">
                <div class="col-6">
                    <div class="input-wrap">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-wrap">
                        <label for="return_date" class="form-label">Return Date</label>
                        <input type="date" class="form-control" id="return_date" name="return_date">
                    </div>
                </div>
            </div>
            <br><br>
            <div class="d-grid gap-2" style="width:15%;margin-left:auto;margin-right:0">
                <button type="submit" class="btn btn-primary" id="apply" name="apply" value="apply">Apply</button>
            </div>
        </div>
    </form>
@endsection
