<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Create Account</title>
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
        .register-wrapper {
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
        .login-btn {
            background: linear-gradient(135deg, #00b894 0%, #00a085 100%);
            border: none;
            padding: 15px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 184, 148, 0.4);
        }
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 184, 148, 0.6);
            background: linear-gradient(135deg, #00a085 0%, #00b894 100%);
        }
        .register-section {
            padding: 40px 50px;
            color: white;
            background: rgba(0, 0, 0, 0.2);
            max-height: 100vh;
            overflow-y: auto;
        }
        .register-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 12px 20px;
            color: white;
            font-size: 1rem;
            margin-bottom: 20px;
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
        .form-select {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 12px 20px;
            color: white;
            font-size: 1rem;
            margin-bottom: 20px;
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
        .register-btn-submit {
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
            margin-bottom: 20px;
        }
        .register-btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(116, 185, 255, 0.6);
            background: linear-gradient(135deg, #0984e3 0%, #74b9ff 100%);
        }
        .login-link {
            text-align: center;
            margin-top: 10px;
        }
        .login-link a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.9rem;
        }
        .login-link a:hover {
            color: #74b9ff;
        }
        @media (max-width: 992px) {
            .register-wrapper {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="register-wrapper">
            <div class="welcome-section">
                <div class="welcome-illustration">
                    <div class="illustration-screen">
                        <div class="illustration-dots dot-1"></div>
                        <div class="illustration-dots dot-2"></div>
                        <div class="illustration-dots dot-3"></div>
                    </div>
                    <div class="illustration-person"></div>
                </div>
                <h1 class="welcome-title">Join Us</h1>
                <p class="welcome-text">Create your account to start your journey with us.</p>
                <a href="{{ route('login') }}" class="login-btn">Login</a>
            </div>
            <div class="register-section">
                <h2 class="register-title">Create Account</h2>
                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="mb-3">
                        <label for="role_id" class="form-label">Role</label>
                        <select class="form-select" id="role_id" name="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="token" class="form-label">Registration Token</label>
                        <input type="text" class="form-control" id="token" name="token" required>
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
                    <button type="submit" class="register-btn-submit">Register</button>
                </form>
                <div class="login-link">
                    <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>