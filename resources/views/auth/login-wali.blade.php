<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Wali</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <style>
        :root {
            --blue-gradient: linear-gradient(135deg, #1e3a8a, #3b82f6);
            --white: #fff;
            --text-color: #333;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--blue-gradient);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--white);
            padding: 20px;
        }

        .login-container {
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 950px;
            display: flex;
            background-color: var(--white);
            color: var(--text-color);
        }

        /* --- Welcome Section --- */
        .welcome-section {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            color: var(--white);
            background: var(--blue-gradient);
            position: relative;
        }

        .welcome-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: -250px;
            width: 450px;
            height: 100%;
            background-color: var(--white);
            border-radius: 50%;
            transform: translateX(50%) scale(1.5);
            z-index: 1;
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .welcome-content h2 {
            font-weight: 600;
        }

        .welcome-content p {
            font-size: 0.9em;
            opacity: 0.9;
            margin-top: 15px;
        }

        /* --- Login Section --- */
        .login-section {
            padding: 40px;
            background: var(--white);
            position: relative;
            flex: 1;
        }

        .login-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: -250px;
            width: 450px;
            height: 100%;
            background-color: var(--blue-gradient);
            border-radius: 50%;
            transform: translateX(-50%) scale(1.5);
            z-index: 1;
        }

        .login-form-content {
            position: relative;
            z-index: 2;
        }

        .login-form-content h4 {
            font-weight: 700;
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-control {
            border-radius: 10px;
            padding: 14px;
            border: 1px solid #ddd;
            background-color: #f7f7f7;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
        }

        .btn-login {
            background-color: #3b82f6;
            border-color: #3b82f6;
            border-radius: 20px;
            padding: 12px 30px;
            font-weight: 600;
            color: white;
            transition: 0.3s;
        }

        .btn-login:hover {
            background-color: #1e3a8a;
        }

        .input-group .btn {
            border-radius: 0 10px 10px 0;
            border-left: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 450px;
            }

            .welcome-section::before,
            .login-section::before {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="login-container row g-0">
    <!-- Welcome Section -->
    <div class="col-md-6 d-flex flex-column justify-content-center align-items-center welcome-section">
        <div class="pt-3"></div>
        <div class="welcome-content">
            <h2 class="mb-2">Selamat Datang</h2>
            <h2>Login Wali</h2>
            <p>Silakan login menggunakan email dan No KK Anda untuk mengakses akun wali santri.</p>
        </div>
    </div>

    <!-- Login Section -->
    <div class="col-md-6 login-section">
        <div class="login-form-content">
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

                <button type="submit" class="btn btn-login w-100">Login</button>
            </form>
        </div>
    </div>
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
