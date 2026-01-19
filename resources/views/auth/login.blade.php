<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        body{font-family:Arial,Helvetica,sans-serif;background:#f4f6f8;padding:40px}
        .card{max-width:420px;margin:24px auto;padding:20px;background:#fff;border-radius:8px;box-shadow:0 2px 6px rgba(0,0,0,0.06)}
        input[type=text],input[type=password]{width:100%;padding:10px;margin:6px 0 12px;border:1px solid #ccc;border-radius:4px}
        button{background:#003366;color:#fff;padding:10px 14px;border:none;border-radius:6px}
        .error{color:#d00;margin-bottom:12px}

        @media (max-width: 1200px) {
            .auth-container { padding: 30px 15px; }
            .form-title, .form-group label { font-size: 1.1rem; }
        }

        @media (max-width: 992px) {
            .auth-container { max-width: 90%; padding: 20px; }
        }

        @media (max-width: 768px) {
            .auth-container { max-width: 100%; padding: 15px; }
            .form-title { font-size: 1.5rem; }
            input, button { font-size: 1rem; padding: 10px; }
        }

        @media (max-width: 576px) {
            .auth-container { padding: 10px; }
            .form-title { font-size: 1.3rem; }
            input, button { font-size: 0.9rem; padding: 8px; }
        }

        @media (max-width: 480px) {
            .auth-container { padding: 8px; }
            .form-title { font-size: 1.1rem; }
            input, button { font-size: 0.8rem; padding: 6px; }
        }
    </style>
</head>
<body>
<div class="card">
    <h2>Login</h2>

    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <label for="email">Email</label>
        <input id="email" name="email" type="text" value="{{ old('email') }}" required autofocus>

        <label for="password">Password</label>
        <input id="password" name="password" type="password" required>

        <label style="display:flex;align-items:center;margin:8px 0;"><input type="checkbox" name="remember" style="margin-right:8px;"> Remember me</label>

        <button type="submit">Sign in</button>
    </form>
</div>
</body>
</html>