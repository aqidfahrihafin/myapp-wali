@extends('layouts.app')

@section('backButton')
  <a href="{{ url('alltransaksi') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection

@section('content')
  <!-- Content -->
  <div class="page-content-wrapper">
    <div class="pt-3"></div>

    <div class="container">
      <div class="mb-3 mt-0 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 text-dark">Data Transaksi</h6>
      </div>

      <div class="card shadow-sm border-0 rounded-2 p-3">
        <h6 class="fw-bold text-primary mb-3">
          <i class="bi bi-receipt me-2"></i> {{ $transaksi['judul'] }}
        </h6>
        <ul class="list-group list-group-flush">
          <li class="list-group-item px-0 d-flex justify-content-between">
            <span class="text-muted">Tanggal</span>
            <span>{{ $transaksi['created_at'] ?? $transaksi['tanggal'] }}</span>
          </li>
          <li class="list-group-item px-0 d-flex justify-content-between">
            <span class="text-muted">Jumlah</span>
            <span class="fw-bold text-success">Rp {{ number_format($transaksi['jumlah']) }}</span>
          </li>
          <li class="list-group-item px-0 d-flex justify-content-between">
            <span class="text-muted">Tipe</span>
            <span>{{ $transaksi['tipe'] }}</span>
          </li>
          <li class="list-group-item px-0">
            <span class="text-muted d-block">Keterangan</span>
            <p class="mb-0">{{ $transaksi['keterangan'] }}</p>
          </li>
        </ul>

        <a href="{{ url()->previous() }}" class="btn btn-primary mt-3 w-100">
          <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
        <a href="{{ route('cetak.transaksi', ['id' => $transaksi['id']]) }}" class="btn btn-outline-primary mt-2 w-100">
          <i class="bi bi-printer me-2"></i>Cetak Transaksi (PDF)
        </a>
      </div>
    </div>
    <div class="pb-3"></div>
  </div>
@endsection
