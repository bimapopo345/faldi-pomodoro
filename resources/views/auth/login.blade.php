<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .main-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-wrapper {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            max-width: 1200px;
            width: 100%;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .welcome-section {
            background: rgba(255, 255, 255, 0.03);
            padding: 60px 40px;
            text-align: center;
            color: white;
            position: relative;
        }
        .welcome-illustration {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            position: relative;
            max-width: 400px;
            margin: 0 auto 30px;
        }
        .illustration-screen {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            height: 120px;
            position: relative;
            margin-bottom: 20px;
        }
        .illustration-dots {
            position: absolute;
            width: 8px;
            height: 8px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
        }
        .dot-1 { top: 20px; left: 20px; }
        .dot-2 { top: 40px; right: 30px; }
        .dot-3 { bottom: 20px; left: 40px; }
        .illustration-person {
            position: absolute;
            bottom: -10px;
            right: 20px;
            width: 60px;
            height: 80px;
            background: #2c3e50;
            border-radius: 30px 30px 10px 10px;
        }
        .illustration-person::before {
            content: '';
            position: absolute;
            top: -15px;
            left: 15px;
            width: 30px;
            height: 30px;
            background: #f4d1ae;
            border-radius: 50%;
        }
        .illustration-person::after {
            content: '';
            position: absolute;
            top: 20px;
            left: -15px;
            width: 20px;
            height: 10px;
            background: #f4d1ae;
            border-radius: 10px;
        }
        .welcome-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .welcome-text {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .register-btn {
            background: linear-gradient(135deg, #fdcb6e 0%, #e17055 100%);
            border: none;
            padding: 15px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(253, 203, 110, 0.4);
            text-decoration: none;
        }
        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(253, 203, 110, 0.6);
            background: linear-gradient(135deg, #e17055 0%, #fdcb6e 100%);
        }
        .login-section {
            padding: 60px 50px;
            color: white;
            background: rgba(0, 0, 0, 0.2);
        }
        .login-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 40px;
            text-align: center;
        }
        .form-label {
            font-weight: 600;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.9);
        }
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 15px 20px;
            color: white;
            font-size: 1rem;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            width: 100%;
            box-sizing: border-box;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #74b9ff;
            box-shadow: 0 0 0 0.25rem rgba(116, 185, 255, 0.25);
            color: white;
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .password-field {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            font-size: 1.2rem;
        }
        .form-select {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 15px 20px;
            color: white;
            font-size: 1rem;
            margin-bottom: 30px;
            width: 100%;
        }
        .form-select:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #74b9ff;
            box-shadow: 0 0 0 0.25rem rgba(116, 185, 255, 0.25);
            color: white;
        }
        .form-select option {
            background: #2c3e50;
            color: white;
        }
        .signin-btn {
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            border: none;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 10px;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(116, 185, 255, 0.4);
        }
        .signin-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(116, 185, 255, 0.6);
            background: linear-gradient(135deg, #0984e3 0%, #74b9ff 100%);
        }
        @media (max-width: 992px) {
            .login-wrapper {
                grid-template-columns: 1fr;
            }
            .welcome-section {
                padding: 40px 30px;
            }
            .login-section {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="login-wrapper">
            <div class="welcome-section">
                <div class="welcome-illustration">
                    <div class="illustration-screen">
                        <div class="illustration-dots dot-1"></div>
                        <div class="illustration-dots dot-2"></div>
                        <div class="illustration-dots dot-3"></div>
                    </div>
                    <div class="illustration-person"></div>
                </div>
                <h1 class="welcome-title">Welcome to our application</h1>
                <p class="welcome-text">"If you want to learn more about our application, please select the 'Register' button."</p>
                <a href="{{ route('register') }}" class="register-btn">Register</a>
            </div>
            <div class="login-section">
                <h2 class="login-title">Login to your account</h2>
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3 password-field">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword()"><i id="passwordIcon" class="bi bi-eye"></i></button>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->any())
                        <div style="color: red; margin-bottom: 1rem;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="signin-btn">Sign in</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordIcon.classList.remove('bi-eye');
                passwordIcon.classList.add('bi-eye-slash');
            } else {
                passwordField.type = 'password';
                passwordIcon.classList.remove('bi-eye-slash');
                passwordIcon.classList.add('bi-eye');
            }
        }
    </script>
</body>
</html>