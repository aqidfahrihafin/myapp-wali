@extends('layouts.app')

@section('backButton')
  <a href="{{ url('/') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection

@section('content')
<div class="page-content-wrapper">
  <div class="pt-3"></div>

  <div class="container">
    <div class="mb-3 mt-0 d-flex justify-content-between align-items-center">
      <h6 class="mb-0 text-dark">Tagihan Santri</h6>
      <a href="{{ route('tagihan.index') }}" class="text-primary fw-bold text-decoration-none"><small>Lihat Semua</small></a>
    </div>

    <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
      <div class="card-body p-0">
        <ul class="list-group list-group-flush">
          @forelse($tagihanList as $t)
            @php
              $created = $t['created_at'] ? \Carbon\Carbon::parse($t['created_at'])->translatedFormat('d M Y') : '-';
              $nominal = (int) ($t['nominal'] ?? 0);
            @endphp
            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
              <a href="{{ route('tagihan.detail', $t['id']) }}" class="d-flex align-items-center text-decoration-none w-100">
                <i class="bi bi-cash-stack text-primary fs-5 me-3"></i>
                <div class="flex-grow-1">
                  <strong class="text-primary">{{ $t['nama_jenis'] }}</strong>
                  <small class="text-muted d-block">{{ $created }}</small>
                </div>
                @if($nominal > 0)
                  <span class="badge bg-danger text-white p-2 rounded-pill">Rp. {{ number_format($nominal, 0, ',', '.') }}</span>
                @endif
              </a>
            </li>
          @empty
            <li class="list-group-item text-center text-muted">Tidak ada data tagihan</li>
          @endforelse
        </ul>
      </div>
    </div>
  </div>

  <div class="pb-3"></div>
</div>
@endsection
