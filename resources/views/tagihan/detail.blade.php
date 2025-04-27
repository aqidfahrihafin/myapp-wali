@extends('layouts.app')

@section('backButton')
<a href="{{ url()->previous() }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
</a>
@endsection

@section('content')
<div class="page-content-wrapper">
    <div class="pt-3"></div>

    <div class="container">
        <div class="mb-3 mt-0 d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-dark">Detail Tagihan</h6>
        </div>

        <div class="card shadow-sm border-0 rounded-2 p-3">
            <h6 class="fw-bold text-primary mb-3">
                <i class="bi {{ $tagihan['icon'] }} me-2"></i> {{ $tagihan['judul'] }}
            </h6>

            <ul class="list-group list-group-flush">
                <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="text-muted">Nama Santri</span>
                    <span>{{ $tagihan['nama_santri'] }}</span>
                </li>
                <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="text-muted">Rayon</span>
                    <span>{{ $tagihan['rayon'] }}</span>
                </li>
                <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="text-muted">Kamar</span>
                    <span>{{ $tagihan['kamar'] }}</span>
                </li>
                <li class="list-group-item px-0 d-flex justify-content-between">
                    <span class="text-muted">Jumlah Tagihan</span>
                    <span class="fw-bold text-success">Rp {{ number_format($tagihan['jumlah']) }}</span>
                </li>
            </ul>

            <div class="d-flex mt-4 gap-2">
                <a href="#" class="btn btn-success w-50">
                    <i class="bi bi-cash-coin me-2"></i>Bayar
                </a>
                <a href="{{ url()->previous() }}" class="btn btn-danger w-50">
                    <i class="bi bi-x-circle me-2"></i>Cancel
                </a>
            </div>
        </div>
    </div>

    <div class="pb-3"></div>
</div>
@endsection
