@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Edit Pembayaran Siswa</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('pembayaran-siswa.update',$item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="pembayaran_asrama_id" class="form-label">Pembayaran Asrama</label>
                        <select name="pembayaran_asrama_id" id="pembayaran_asrama_id" class="form-control" disabled>
                            <option value="" disabled selected>Pilih Pembayaran</option>
                            @foreach ($pembayaran_asrama as $pemasrama)
                                <option @selected($pemasrama->id == $item->pembayaran_asrama_id) value="{{ $pemasrama->id }}">
                                    {{ $pemasrama->tahun_ajaran . ' | Rp. ' . number_format($pemasrama->nominal) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="siswa_id" class="form-label">Siswa</label>
                        <select name="siswa_id" disabled id="siswa_id" class="form-control">
                            <option value=""  selected>Pilih Siswa</option>
                            @foreach ($siswa as $siswa)
                                <option @selected($siswa->id == $item->siswa_id) value="{{ $siswa->id }}">{{ $siswa->nama . ' | ' . $siswa->nis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="metode_pembayaran_id" class="form-label">Metode Pembayaran</label>
                        <select name="metode_pembayaran_id" id="metode_pembayaran_id" class="form-control">
                            <option value="" disabled selected>Pilih Metode Pembayaran</option>
                            @foreach ($metode_pembayaran as $metode)
                                <option @selected($metode->id == $item->metode_pembayaran_id) value="{{ $metode->id }}">{{ $metode->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" disabled selected>Pilih Status</option>
                          <option @selected($item->status === 'paid') value="paid">PAID</option>
                          <option @selected($item->status === 'unpaid') value="unpaid">UNPAID</option>
                          <option @selected($item->status === 'process') value="process">PROCESS</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bukti" class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="bukti" name="bukti">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
