@extends('layouts.app')

@section('backButton')
  <a href="{{ url('/topup') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection

@section('content')
<div class="container pt-5">
  <div class="card shadow-sm border-0 rounded-4 p-4">
    <h4 class="fw-bold text-primary text-center mb-4">Pilih Metode Pembayaran</h4>

    <form id="methodForm" method="POST" action="{{ route('topup.submitMethod') }}">
      @csrf
      <input type="hidden" name="order_id" value="{{ $orderId }}">
      <input type="hidden" name="amount" value="{{ $amount }}">
      <input type="hidden" name="method" id="selectedMethod">
      <input type="hidden" name="child_id" value="{{ session('current_child') }}">

      <div class="accordion" id="paymentAccordion">

        <!-- BANK -->
        <div class="accordion-item border-0">
          <h2 class="accordion-header" id="bankHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bankCollapse" aria-expanded="false" aria-controls="bankCollapse">
              Transfer Bank
            </button>
          </h2>
          <div id="bankCollapse" class="accordion-collapse collapse" aria-labelledby="bankHeading" data-bs-parent="#paymentAccordion">
            <div class="accordion-body">
              @foreach (['bca', 'bni', 'bri', 'permata'] as $bank)
                <button type="button" class="btn btn-outline-primary w-100 mb-2" onclick="submitMethod('bank_{{ $bank }}')">
                  {{ strtoupper($bank) }}
                </button>
              @endforeach

              {{-- Mandiri pakai echannel, jadi khusus --}}
              <button type="button" class="btn btn-outline-primary w-100 mb-2" onclick="submitMethod('mandiri')">
                MANDIRI
              </button>
            </div>
          </div>
        </div>

        <!-- E-WALLET -->
        <div class="accordion-item border-0">
          <h2 class="accordion-header" id="ewalletHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ewalletCollapse" aria-expanded="false" aria-controls="ewalletCollapse">
              Dompet Digital
            </button>
          </h2>
          <div id="ewalletCollapse" class="accordion-collapse collapse" aria-labelledby="ewalletHeading" data-bs-parent="#paymentAccordion">
            <div class="accordion-body">
              @foreach (['gopay','ovo','dana'] as $wallet)
                <button type="button" class="btn btn-outline-success w-100 mb-2" onclick="submitMethod('ewallet_{{ $wallet }}')">
                  {{ strtoupper($wallet) }}
                </button>
              @endforeach
            </div>
          </div>
        </div>

        <!-- QRIS -->
        <div class="accordion-item border-0">
          <h2 class="accordion-header" id="qrisHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#qrisCollapse" aria-expanded="false" aria-controls="qrisCollapse">
              QRIS
            </button>
          </h2>
          <div id="qrisCollapse" class="accordion-collapse collapse" aria-labelledby="qrisHeading" data-bs-parent="#paymentAccordion">
            <div class="accordion-body">
              <button type="button" class="btn btn-warning w-100 fw-bold text-dark" onclick="submitMethod('qris')">
                Bayar dengan QRIS
              </button>
            </div>
          </div>
        </div>

      </div>
    </form>
  </div>
</div>

<script>
  function submitMethod(method) {
    document.getElementById('selectedMethod').value = method;
    document.getElementById('methodForm').submit();
  }
</script>
@endsection
