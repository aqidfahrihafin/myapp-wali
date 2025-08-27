@extends('layouts.app')

@section('backButton')
<a href="{{'/setting'}}">
    <i class="bi bi-arrow-left-circle text-muted fs-5"></i>
  </a>
@endsection

@section('content')
<div class="container mt-4">
    <h5 class="fw-bold mb-3">Informasi Akun</h5>

    <div class="card shadow-sm border-0 rounded-3 p-3 mb-4">
        <ul class="list-group list-group-flush">
            <li class="list-group-item px-0 d-flex justify-content-between">
                <span>Nama</span>
                <strong>{{ $user->name ?? }}</strong>
            </li>
            <li class="list-group-item px-0 d-flex justify-content-between">
                <span>Email</span>
                <strong>{{ $user->email ?? 'dummy@example.com' }}</strong>
            </li>
            <li class="list-group-item px-0 d-flex justify-content-between">
                <span>No. HP</span>
                <strong>{{ $user->phone ?? '08********89' }}</strong>
            </li>
        </ul>

        <div class="d-grid mt-4">
            <a href="{{ url('/edit-akun') }}" class="btn btn-primary">
                Edit Akun
            </a>
        </div>
    </div>
    <div class="pb-3"></div>
</div>

@endsection
