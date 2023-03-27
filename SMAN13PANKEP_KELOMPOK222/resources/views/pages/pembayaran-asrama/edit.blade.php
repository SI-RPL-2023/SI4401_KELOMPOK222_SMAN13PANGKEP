@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Edit Pembayaran Asrama</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('pembayaran-asrama.update',$item->id) }}" method="post" class="needs-validation" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-wrap">
                        <div class="mb-3">
                            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                            <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran" name="tahun_ajaran" value="{{ $item->tahun_ajaran }}">
                            @error('tahun_ajaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <input type="number" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ $item->semester }}">
                            @error('semester')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal" value="{{ $item->nominal }}">
                            @error('nominal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                           <select name="status" id="status" class="form-control">
                            <option @selected($item->status == 1) value="1">Aktif</option>
                            <option @selected($item->status == 0) value="0">Tidak Aktif</option>
                           </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn float-right btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
