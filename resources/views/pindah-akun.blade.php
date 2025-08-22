@extends('layouts.app')

@section('backButton')
  <a href="{{ url('/setting') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection

@section('content')
<div class="container mt-4">
    <h5 class="fw-bold mb-3">Pilih Santri</h5>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="list-group shadow-sm rounded-4">
      @forelse($santriList as $santri)
        <form method="POST" action="{{ route('pindah-akun.switch') }}" 
              class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
          @csrf
          <div>
              <div class="fw-bold">{{ $santri['nama'] }}</div>
              <small class="text-muted">NIS: {{ $santri['nis'] }}</small>
          </div>
          <input type="hidden" name="santri_id" value="{{ $santri['id'] }}">
          <button type="submit" class="btn btn-outline-primary btn-sm">Gunakan</button>
        </form>
      @empty
        <div class="alert alert-warning">Tidak ada santri terkait dengan akun ini.</div>
      @endforelse
    </div>
</div>
@endsection
