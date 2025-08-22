@extends('layouts.app')

@section('backButton')
<a href="{{ url('/pengaturan-akun') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
</a>
@endsection

@section('content')
<div class="container mt-4">
    <h5 class="fw-bold mb-3">Edit Akun</h5>

    <form id="editAccountForm">
        <div class="card shadow-sm border-0 rounded-3 p-3 mb-4">

            <div class="mb-3">
                <label for="name" class="form-label small">Nama</label>
                <input type="text" class="form-control" id="name" placeholder="Masukkan nama baru" value="{{ $user->name ?? '' }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label small">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan email baru" value="{{ $user->email ?? '' }}">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label small">No. HP</label>
                <input type="text" class="form-control" id="phone" placeholder="Masukkan no HP baru" value="{{ $user->phone ?? '' }}">
            </div>

            <hr>

            <div class="mb-3">
                <label for="currentPassword" class="form-label small">Password Lama</label>
                <input type="password" class="form-control" id="currentPassword" placeholder="Masukkan password lama">
            </div>

            <div class="mb-3">
                <label for="newPassword" class="form-label small">Password Baru</label>
                <input type="password" class="form-control" id="newPassword" placeholder="Masukkan password baru">
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label small">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder="Konfirmasi password baru">
            </div>

        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ url('/pengaturan-akun') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<!-- Modal Success -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3">
      <div class="modal-body text-center p-4">
        <i class="bi bi-check-circle-fill text-success fs-1 mb-3"></i>
        <h5 class="mb-2">Berhasil!</h5>
        <p class="small text-muted">Data akun berhasil diubah (dummy).</p>
        <button type="button" class="btn btn-success w-100 mt-3" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('editAccountForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Validasi simple
    let newPassword = document.getElementById('newPassword').value;
    let confirmPassword = document.getElementById('confirmPassword').value;

    if (newPassword && (newPassword !== confirmPassword)) {
        alert('Password baru dan konfirmasi tidak cocok.');
        return;
    }

    // Simulasi update berhasil
    var successModal = new bootstrap.Modal(document.getElementById('successModal'));
    successModal.show();

    // Reset form (optional)
    // this.reset();
});
</script>
@endpush
