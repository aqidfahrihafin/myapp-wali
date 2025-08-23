@extends('layouts.app')

@section('backButton')
  <a href="{{ url('/topup') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection

@section('content')
<div class="page-content-wrapper">
  <div class="container mt-4">
      <h4 class="text-center fw-bold mb-3">Instruksi Pembayaran</h4>

      @php
        $m = strtolower($method ?? '');
      @endphp

      {{-- BANK TRANSFER --}}
      @if(in_array($m, ['bca','bni','bri','permata','mandiri']))
          <div class="card shadow-sm p-3">
              <h6>Virtual Account ({{ strtoupper($m) }})</h6>

              @if($m === 'permata')
                  <p class="fw-bold text-primary fs-5 mb-1">
                      {{ $response->permata_va_number ?? 'VA tidak tersedia' }}
                  </p>

              @elseif($m === 'mandiri')
                  <p class="fw-bold text-primary fs-5 mb-1">
                      Bill Key: {{ $response->bill_key ?? 'N/A' }} <br>
                      Biller Code: {{ $response->biller_code ?? 'N/A' }}
                  </p>
                  @elseif($m === 'bca')
                  <p class="fw-bold text-primary fs-5 mb-1">
                    @php
                        $data = json_decode($response, true);
                    @endphp

                    {{ $data['va_numbers'][0]['va_number'] ?? 'Tidak ada VA' }}

                  </p>
                  @elseif($m === 'bni')
                  <p class="fw-bold text-primary fs-5 mb-1">
                       @php
                        $data = json_decode($response, true);
                    @endphp

                    {{ $data['va_numbers'][0]['va_number'] ?? 'Tidak ada VA' }}
                  </p>
                   @elseif($m === 'bri')
                  <p class="fw-bold text-primary fs-5 mb-1">
                       @php
                        $data = json_decode($response, true);
                    @endphp

                    {{ $data['va_numbers'][0]['va_number'] ?? 'Tidak ada VA' }}
                    {{ $response }}
                  </p>
              @else
                  <p class="fw-bold text-primary fs-5 mb-1">
                      {{ $response->va_numbers[0]->va_number ?? 'VA tidak tersedia' }}
                  </p>
              @endif

              <small class="text-muted">Gunakan nomor di atas untuk melakukan transfer.</small>
          </div>

      {{-- QRIS --}}
      @elseif($m === 'qris')
          <div class="card shadow-sm p-3 text-center">
              <h6>Scan QRIS</h6>
              @php
                  $qrisUrl = collect($response->actions ?? [])->firstWhere('name','qr-code')->url ?? null;
              @endphp
              @if ($qrisUrl)
                  <img src="{{ $qrisUrl }}" alt="QRIS" class="img-fluid rounded-3" style="max-width: 260px;">
              @else
                  <p class="text-danger">QRIS tidak tersedia.</p>
              @endif
          </div>

      {{-- GOPAY --}}
      @elseif($m === 'gopay')
          <div class="card shadow-sm p-3 text-center">
              <h6>Pembayaran GoPay</h6>
              @php
                  $deeplink = collect($response->actions ?? [])->firstWhere('name','deeplink-redirect')->url ?? null;
                  $qr = collect($response->actions ?? [])->firstWhere('name','qr-code')->url ?? null;
              @endphp
              @if($deeplink)
                  <a href="{{ $deeplink }}" class="btn btn-success" target="_blank">Bayar dengan GoPay</a>
              @elseif($qr)
                  <img src="{{ $qr }}" alt="GoPay QR" class="img-fluid rounded-3" style="max-width: 260px;">
              @else
                  <p class="text-danger">Instruksi GoPay tidak tersedia.</p>
              @endif
          </div>

      @else
          <div class="alert alert-danger text-center">
              Metode tidak dikenali.
          </div>
      @endif

      <div class="text-center mt-3">
          <small class="text-muted">Setelah membayar, sistem akan memverifikasi otomatis.</small>
      </div>
  </div>
</div>

{{-- POLLING STATUS --}}
<script>
  setInterval(() => {
    fetch("{{ route('topup.status', $orderId) }}", { cache: 'no-store' })
      .then(res => res.json())
      .then(data => {
        if (data && data.status === 'settlement') {
          window.location.href = "{{ route('wali.home') }}";
        }
      })
      .catch(() => {});
  }, 5000);
</script>
@endsection
