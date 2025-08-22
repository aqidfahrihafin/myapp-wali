@extends('layouts.app')
@section('backButton')
  <a href="{{ url('/') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection
@section('content')
<div class="container pt-5">

  <!-- Form Card -->
  <div class="card shadow-sm border-0 rounded-4 p-4">
    <!-- Judul -->
    <div class="text-center mb-4">
      <h4 class="fw-bold text-primary">Top Up Saldo</h4>
      <p class="text-muted">Pilih nominal atau masukkan jumlah manual</p>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('topup.process') }}">
      @csrf

      <!-- Input Manual -->
      <div class="mb-4">
        <label for="amount" class="form-label fw-semibold">Jumlah Top Up</label>
        <input type="number" class="form-control form-control-lg" id="amount" name="amount" min="10000" placeholder="Masukkan nominal..." required>
      </div>

      <!-- Pilihan Cepat -->
      <div class="mb-4">
        <label class="form-label fw-semibold">Pilihan Cepat</label>
        <div class="d-flex flex-wrap gap-2">
          @foreach ([50000, 100000, 200000, 500000] as $nominal)
            <button type="button" class="btn btn-outline-primary quick-amount" data-amount="{{ $nominal }}">
              Rp{{ number_format($nominal, 0, ',', '.') }}
            </button>
          @endforeach
        </div>
      </div>

      <!-- Tombol Submit -->
      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg w-100">Top Up Sekarang</button>
      </div>
    </form>
  </div>
</div>

<!-- Script isi otomatis -->
<script>
  const quickButtons = document.querySelectorAll('.quick-amount');
  const amountInput = document.getElementById('amount');

  quickButtons.forEach(button => {
    button.addEventListener('click', () => {
      const nominal = button.getAttribute('data-amount');
      amountInput.value = nominal;
    });
  });
</script>
@endsection
