@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Notifikasi</h2>
            </div>
        </div>

        @foreach ($items as $item)
        <div class="row mb-2">
            <div class="col-md-12">
               <a href="javascript:void(0)"  class="text-decoration-none btnNotif text-dark" data-id="{{ $item->id }}">
                <div class="card" @if($item->status == 0) style="background-color: #eaeaea" @endif>
                    <div class="card-body">
                        <span class="fw-light">{{ $item->created_at->diffForHumans() }}</span>
                        <p class="fs-6">{{ $item->judul }}</p>
                    </div>
                </div>
               </a>
            </div>
        </div>
        <form action="{{ route('notifikasi.update') }}" method="post" id="formNotif">
            <input type="hidden" id="id_notif" name="id">
            @csrf
        </form>
        @endforeach
    </div>

@endsection
@push('scripts')
<script>
    $('body').on('click','.btnNotif', function(){
        let id = $(this).data('id');
        $('#id_notif').val(id);
        $('#formNotif').submit();
    })
</script>
@endpush
