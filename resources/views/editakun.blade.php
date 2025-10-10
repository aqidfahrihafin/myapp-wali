@extends('layouts.app')

@section('backButton')
<a href="{{ url('/pengaturan-akun') }}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
</a>
@endsection

@section('content')
<div class="container mt-4">
    <h5 class="fw-bold mb-3">Edit Akun</h5>

    <form id="editAccountForm" action="{{ route('pengaturanakun.update') }}" method="POST">
        @csrf
        <div class="card shadow-sm border-0 rounded-3 p-3 mb-4">

           <div class="mb-3">
                <label for="email" class="form-label small">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}" disabled>
            </div>

            <hr>

            <div class="mb-3">
                <label for="currentPassword" class="form-label small">Password Lama</label>
                <input type="password" class="form-control" id="currentPassword" name="current_password">
            </div>

            <div class="mb-3">
                <label for="newPassword" class="form-label small">Password Baru</label>
                <input type="password" class="form-control" id="newPassword" name="password" autocomplete="new-password">
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label small">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" autocomplete="new-password">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ url('/pengaturan-akun') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <div style="height: 100px;"></div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('editAccountForm').addEventListener('submit', function(e) {
        let newPassword = document.getElementById('newPassword').value;
        let confirmPassword = document.getElementById('confirmPassword').value;

        if (newPassword && (newPassword !== confirmPassword)) {
            e.preventDefault(); // stop submit
            alert('Password baru dan konfirmasi tidak cocok.');
            return;
        }
    });
</script>
@endpush
