@extends('layouts.app')
@section('backButton')
  <a href="{{ url('/topup') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection

@section('content')
<div class="container mt-4">
    <h4 class="fw-bold mb-3">Bayar Tagihan</h4>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm p-3">
        <h5>{{ $tagihan['nama_jenis'] }}</h5>
        <p>{{ $tagihan['deskripsi'] }}</p>
        <p><strong>Nominal:</strong> Rp {{ number_format($tagihan['nominal'],0,',','.') }}</p>
        <p><strong>Jatuh Tempo:</strong> {{ $tagihan['created_at'] }}</p>
    </div>

    <div class="mt-4">
        <form action="{{ route('tagihan.prosesBayar', $tagihan['id']) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
            <a href="{{ route('tagihan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
