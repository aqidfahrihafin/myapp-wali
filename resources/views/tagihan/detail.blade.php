@extends('layouts.app')
@section('backButton')
  <a href="{{ url('/') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection

@section('content')
<div class="container mt-5 pt-5"> {{-- Biar turun dari navbar --}}
    <div class="row justify-content-center">
        <div class="col-md-8">

      
            <!-- Card -->
            <div class="card shadow-lg border-0 rounded-4">

                <!-- Header -->
                <div class="card-header bg-primary text-white text-center fw-bold rounded-top-4">
                    Detail Tagihan
                </div>

                <!-- Body -->
                <div class="card-body p-4">
                    <h4 class="fw-bold">{{ $tagihan['nama_jenis'] }}</h4>
                    <p class="text-muted">{{ $tagihan['deskripsi'] }}</p>

                    <hr>

                    <div class="mb-3">
                        <strong>Nominal:</strong>
                        <span class="text-success fw-bold">
                            Rp {{ number_format($tagihan['nominal'], 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <strong>Jatuh Tempo:</strong>
                        <span class="text-danger fw-semibold">
                            {{ $tagihan['created_at'] }}
                        </span>
                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer bg-light rounded-bottom-4">
                    <div class="d-flex justify-content-end gap-2"> {{-- ini bikin tombol ke kanan --}}
                        <a href="{{ route('tagihan.index') }}" class="btn btn-secondary px-4">
                            Kembali
                        </a>
                        <form action="{{ route('tagihan.prosesBayar', $tagihan['id']) }}" method="POST">
                            @csrf
                            <input type="text" name="jumlah_bayar" value="{{ $tagihan['jumlah_tagihan'] }}">
                            <button type="submit" class="btn btn-primary px-4">
                                Bayar Sekarang
                            </button>
                        </form>
                    </div>
                </div>

            </div>
            <!-- End Card -->

        </div>
    </div>
</div>
@endsection
