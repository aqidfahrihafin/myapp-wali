<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Wali</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            background: skyblue;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Poppins", sans-serif;
        }
        .login-card {
            max-width: 380px;
            width: 100%;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            backdrop-filter: blur(6px);
        }
        .login-card h4 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #007bff;
        }
        .form-control {
            border-radius: 50px;
            padding: 0.6rem 1rem;
        }
        .btn-login {
            background: #007bff;
            border: none;
            font-weight: 600;
            padding: 0.7rem;
            transition: 0.3s;
            color: #fff;
        }
        .btn-login:hover {
            background: #0056b3;
        }
        .input-group .btn {
            border-radius: 50px;
            border-left: none;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h4 class="text-center">Login Wali</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('wali.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Password (No KK)</label>
                <div class="input-group">
                    <input type="password" name="password" id="passwordInput"
                           class="form-control" placeholder="Masukkan No KK" required>
                    <button type="button" class="btn bg-white text-secondary" id="togglePassword">
                        <i class="bi bi-eye"></i>
                    </button>

                </div>
            </div>

            <button type="submit" class="btn btn-login w-100 rounded-pill">Login</button>
        </form>
    </div>

    <script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('passwordInput');
        const icon = this.querySelector('i');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    });
    </script>
</body>
</html>
