<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>Login - SmartCode</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            min-height: 100vh;
            direction: rtl;
        }

        /* القسم الأيمن (خلفية / جرافيك) */
        .right-section {
            flex: 1;
            background: url('{{ asset("images/tech-bg.jpg") }}') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            padding: 40px;
            text-align: center;
            position: relative;
        }
        /* طبقة شفافة لتغميق الخلفية قليلاً */
        .right-section::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.4);
            z-index: 0;
        }
        .right-section > div {
            position: relative;
            z-index: 1;
        }
        .right-section h1 {
            font-size: 40px;
            margin-bottom: 20px;
            animation: fadeIn 1.2s ease;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.7);
        }
        .right-section p {
            font-size: 18px;
            line-height: 1.8;
            max-width: 400px;
            margin: auto;
            opacity: 0.95;
            text-shadow: 1px 1px 8px rgba(0,0,0,0.6);
        }

        /* القسم الأيسر (اللوجن) */
        .left-section {
    flex: 1.5;
    background: linear-gradient(135deg, #e3f2fd, #bbdefb, #90caf9); /* تدرج أزرق فاتح */
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 60px 40px;
}


        .container {
            background: #fff;
            padding: 50px 40px;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 500px;
            animation: slideIn 0.8s ease forwards;
            text-align: center;
        }

        /* الشعار */
        .logo-container { margin-bottom: 25px; }
        .logo {
            width: 120px;
            height: 120px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }
        .logo:hover { transform: scale(1.05); }

        h2 {
            margin-bottom: 25px;
            font-size: 26px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            margin: 14px 0;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 16px;
            transition: 0.3s;
        }
        input:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0,123,255,0.3);
            outline: none;
        }

        button {
            width: 100%;
            padding: 14px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
            transition: 0.3s;
        }
        button:hover { background: #0056b3; transform: scale(1.05); }

        p {
            margin-top: 20px;
            font-size: 15px;
            color: #555;
        }
        p a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }
        p a:hover { text-decoration: underline; color: #0056b3; }

        .error {
            color: red;
            background: #ffe6e6;
            border: 1px solid red;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 15px;
            text-align: center;
            animation: shake 0.5s;
        }

        /* حركات */
        @keyframes slideIn { from { opacity: 0; transform: translateY(-30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-10px); }
            40%, 80% { transform: translateX(10px); }
        }

        /* تجاوب */
        @media (max-width: 768px) {
            body { flex-direction: column; }
            .left-section, .right-section { flex: unset; width: 100%; min-height: 50vh; }
            .container { max-width: 90%; }
            .logo { width: 90px; height: 90px; }
        }
    </style>
</head>
<body>
    <!-- القسم الأيسر: تسجيل الدخول -->
    <div class="left-section">
        <div class="container">
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="SmartCode Logo" class="logo">
            </div>
            <h2>تسجيل الدخول</h2>

            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="البريد الإلكتروني" required>
                <input type="password" name="password" placeholder="كلمة المرور" required>
                <button type="submit">دخول</button>
            </form>

            <p>ليس لديك حساب؟ <a href="{{ route('register') }}">سجل الآن</a></p>
        </div>
    </div>

    <!-- القسم الأيمن: خلفية + نص -->
    <div class="right-section">
        <div>
           
        </div>
    </div>
</body>
</html>
