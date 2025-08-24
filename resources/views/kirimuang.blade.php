@extends('layouts.app')

@section('backButton')
  <a href="{{ url('/') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection

@section('content')
<div class="page-content-wrapper">
      <div class="pt-1"></div>
<div class="container mt-4">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h4 class="mb-3">Saldo Anda: Rp {{ number_format($saldo, 0, ',', '.') }}</h4>
   <div class="card shadow-sm rounded-4 mt-3">
  <div class="card-body">
    <form action="{{ route('kirimuang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="santri_id" class="form-label">Pilih Santri</label>
            <select name="santri_id" id="santri_id" class="form-select" required>
                <option value="">-- Pilih Santri --</option>
                @foreach($santriList as $santri)
                    <option value="{{ $santri['id'] }}">{{ $santri['nama'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Kirim (Rp)</label>
            <input type="number" class="form-control" name="jumlah" min="1000" required>
        </div>

        <button type="submit" class="btn btn-success w-100">
            <i class="bi bi-send-fill me-1"></i> Kirim Uang
        </button>
    </form>
  </div>
</div>
</div>
</div>
@endsection
