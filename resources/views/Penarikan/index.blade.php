@extends('layouts.app')
@section('backButton')
  <a href="{{ url('/') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection
@section('content')
<div class="container mt-4">
  <h5 class="fw-bold">Penarikan Uang</h5>
  
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger">
      {{ $errors->first() }}
    </div>
  @endif

  <div class="card shadow-sm rounded-4 mt-3">
    <div class="card-body">
      <p><strong>Saldo Tersedia:</strong> Rp. {{ number_format($saldo, 0, ',', '.') }}</p>

        <form method="POST" action="{{ route('tarik.store') }}">
    @csrf
    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Penarikan</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Contoh: 50000" required>
    </div>

    <div class="mb-3">
        <label for="metode" class="form-label">Metode Penarikan</label>
        <select class="form-select" id="metode" name="metode" required>
        <option value="">-- Pilih Metode --</option>
        <option value="tunai">Ambil Tunai</option>
        <option value="bank">Transfer ke Bank</option>
        <option value="ewallet">Transfer ke E-Wallet</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="catatan" class="form-label">Catatan (opsional)</label>
        <textarea class="form-control" id="catatan" name="catatan" rows="2" placeholder="Contoh: ambil untuk keperluan buku..."></textarea>
    </div>

    <button type="submit" class="btn btn-primary w-100">
        <i class="bi bi-wallet2 me-1"></i> Tarik Sekarang
    </button>
    </form>
    </div>
  </div>
</div>
@endsection
