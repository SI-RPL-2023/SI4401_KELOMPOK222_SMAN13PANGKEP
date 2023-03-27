@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Riwayat Pembayaran Asrama</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover" id="dTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tahun_ajaran }}</td>
                                <td>{{ $item->semester }}</td>
                                <td>{{ $item->nominal }}</td>
                                <td>
                                    @if ($item->checkPembayaran($item->id,auth()->user()->siswa->id) == 'paid')
                                        <span class="badge bg-success">PAID</span>
                                    @elseif($item->checkPembayaran($item->id,auth()->user()->siswa->id) == 'process')
                                    <span class="badge bg-warning">PROCESS</span>
                                    @else
                                    <span class="badge bg-danger">UNPAID</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->checkPembayaran($item->id,auth()->user()->siswa->id) === 'paid')
                                    <a href="javascript:void(0)" class="btn btn-success"><i
                                        class="fas fa-money"></i> Sudah Bayar</a>
                                    @elseif($item->checkPembayaran($item->id,auth()->user()->siswa->id) === 'process')
                                        <a href="javascript:void(0)" class="btn btn-success"><i
                                            class="fas fa-info"></i> Menunggu Konfirmasi</a>
                                    @else
                                    <a href="javascript:void(0)" data-tahunajaran="{{ $item->tahun_ajaran }}" data-semester="{{ $item->semester }}" data-id="{{ $item->id }}" data-nominal="{{ $item->nominal }}" class="btn btn-warning btnBayar" ><i
                                        class="fas fa-money"></i> Bayar</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="modalBayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pembayaran</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('list-pembayaran-siswa.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <input type="hidden" id="pembayaran_asrama_id" name="pembayaran_asrama_id">
                <div class="mb-3">
                    <label for="i_tahun_ajaran" class="form-label">Tahun Ajaran</label>
                    <input type="text" class="form-control" id="i_tahun_ajaran" name="i_tahun_ajaran" disabled>
                </div>
                <div class="mb-3">
                    <label for="i_semester" class="form-label">Semester</label>
                    <input type="number" class="form-control" id="i_semester" name="i_semester" disabled>
                </div>
                <div class="mb-3">
                    <label for="i_nominal" class="form-label">Nominal</label>
                    <input type="text" class="form-control" id="i_nominal" name="nominal" readonly>
                </div>
                <div class="mb-3">
                    <label for="metode_pembayaran_id" class="form-label">Metode Pembayaran</label>
                   <select name="metode_pembayaran_id" id="metode_pembayaran_id" class="form-control">
                    @foreach ($metode_pembayaran as $metode)
                        <option value="{{ $metode->id }}">{{ $metode->nama }}</option>
                    @endforeach
                   </select>
                </div>
                <div class="mb-3">
                    <label for="bukti" class="form-label">Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="bukti" name="bukti">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
            </div>
        </form>

      </div>
    </div>
  </div>
@endsection
@push('scripts')
    <script>
        $('body').on('click','.btnBayar', function(){
            let tahunajaran = $(this).data('tahunajaran');
            let semester = $(this).data('semester');
            let nominal = $(this).data('nominal');
            let id = $(this).data('id');
            $('#modalBayar #i_tahun_ajaran').val(tahunajaran);
            $('#modalBayar #i_semester').val(semester);
            $('#modalBayar #i_nominal').val(nominal);
            $('#modalBayar #pembayaran_asrama_id').val(id);
            const modalBayar = new bootstrap.Modal('#modalBayar');
            modalBayar.show();
        })
    </script>
@endpush
