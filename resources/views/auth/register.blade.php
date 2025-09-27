<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>Register - SmartCode</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    * { box-sizing: border-box; margin:0; padding:0; }
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(135deg, #1f4068, #11998e);
        position: relative;
        overflow: hidden;
    }

    body::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle at center, rgba(255,255,255,0.15) 0%, transparent 70%);
        animation: moveLight 15s linear infinite;
        z-index: 0;
    }

    @keyframes moveLight {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .container {
        position: relative;
        z-index: 1;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(10px);
        padding: 50px 40px;
        border-radius: 25px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        width: 100%;
        max-width: 520px;
        text-align: center;
        animation: slideIn 0.8s ease forwards;
    }

    .logo {
        width: 140px;
        height: 140px;
        margin: 0 auto 25px;
        border-radius: 20px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.2);
        transition: transform 0.3s ease;
    }
    .logo:hover { transform: scale(1.1); }

    h2 {
        font-size: 32px;
        margin-bottom: 30px;
        color: #333;
    }

    form { display: flex; flex-wrap: wrap; gap: 15px; justify-content: space-between; }

    .row { display: flex; gap: 15px; width: 100%; }
    .row input { flex: 1; padding-left: 40px; position: relative; }

    /* أيقونات داخل الحقول */
    .input-icon {
        position: relative;
        width: 100%;
    }
    .input-icon i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #11998e;
        font-size: 16px;
        pointer-events: none;
    }

    input {
        width: 100%;
        padding: 14px 16px;
        border-radius: 12px;
        border: 1px solid #ccc;
        font-size: 16px;
        transition: 0.3s, box-shadow 0.3s;
    }
    input:focus {
        border-color: #11998e;
        box-shadow: 0 0 15px rgba(17,153,142,0.4);
        outline: none;
        transform: scale(1.02);
    }

    button {
        width: 100%;
        padding: 16px;
        margin-top: 10px;
        background: linear-gradient(135deg, #11998e, #38ef7d);
        color: #fff;
        font-size: 18px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: 0.3s, transform 0.2s;
        box-shadow: 0 5px 25px rgba(0,0,0,0.25);
    }
    button:hover {
        background: linear-gradient(135deg, #38ef7d, #11998e);
        transform: scale(1.05);
    }

    .error {
        color: red;
        background: #ffe6e6;
        border: 1px solid red;
        padding: 12px;
        border-radius: 12px;
        margin-bottom: 15px;
        text-align: center;
        animation: shake 0.5s;
    }

    p {
        margin-top: 20px;
        font-size: 14px;
        color: #555;
    }
    p a {
        color: #11998e;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
    }
    p a:hover { text-decoration: underline; color: #38ef7d; }

    @keyframes slideIn {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        20%, 60% { transform: translateX(-8px); }
        40%, 80% { transform: translateX(8px); }
    }

    @media (max-width: 480px) {
        .container { padding: 35px 25px; }
        h2 { font-size: 26px; }
        input { padding: 12px 14px; font-size: 15px; }
        button { font-size: 16px; padding: 14px; }
        .logo { width: 110px; height: 110px; }
        .row { flex-direction: column; }
    }
</style>
</head>
<body>
<div class="container">
    <img src="{{ asset('images/logo.png') }}" alt="SmartCode Logo" class="logo">
    <h2>تسجيل حساب جديد</h2>

    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="row">
            <div class="input-icon"><i class="fa-solid fa-user"></i>
                <input type="text" name="first_name" placeholder="الاسم الأول" required>
            </div>
            <div class="input-icon"><i class="fa-solid fa-user"></i>
                <input type="text" name="second_name" placeholder="الاسم الثاني" required>
            </div>
            <div class="input-icon"><i class="fa-solid fa-user"></i>
                <input type="text" name="third_name" placeholder="الاسم الثالث" required>
            </div>
        </div>

        <div class="row">
            <div class="input-icon"><i class="fa-solid fa-phone"></i>
                <input type="text" name="phone" placeholder="رقم الجوال" required>
            </div>
            <div class="input-icon"><i class="fa-solid fa-globe"></i>
                <input type="text" name="country" placeholder="الدولة" required>
            </div>
        </div>

        <div class="input-icon"><i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        </div>
        <div class="input-icon"><i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="كلمة المرور" required>
        </div>
        <div class="input-icon"><i class="fa-solid fa-lock"></i>
            <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" required>
        </div>

        <button type="submit">تسجيل</button>
    </form>

    <p>لديك حساب؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
</div>
</body>
</html>
