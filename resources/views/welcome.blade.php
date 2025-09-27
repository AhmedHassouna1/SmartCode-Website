<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartCode</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-color: #f8f9fa;
        }
        nav {
            background-color: #ffffff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            padding: 10px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        nav .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }
        nav .links a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        nav .links a:hover {
            color: #007bff;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        header {
            text-align: center;
            padding: 100px 20px 50px 20px;
            background: linear-gradient(120deg,#007bff,#00c6ff);
            color: #fff;
        }
        header h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        header p {
            font-size: 1.2rem;
        }
        section {
            max-width: 1100px;
            margin: 50px auto;
            padding: 0 20px;
        }
        section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #007bff;
            text-align: center;
        }
        section p {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 20px auto;
        }
        .services, .projects, .team {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }
        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            flex: 1 1 250px;
            max-width: 300px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card h3 {
            color: #007bff;
            margin-bottom: 15px;
        }
        .card p {
            color: #555;
            font-size: 1rem;
        }
        .card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .team .card {
            background: linear-gradient(135deg, #f0f4ff, #ffffff);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .team .card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        .team h3 {
            color: #007bff;
            margin-bottom: 10px;
        }
        .team p {
            color: #555;
            font-size: 1rem;
        }
        .contact form {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .contact input, .contact textarea {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 1rem;
            width: 100%;
        }
        .contact button {
            align-self: center;
            width: 150px;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="logo">SmartCode</div>
        <div class="links">
            <a href="#about">عنا</a>
            <a href="#services">خدمات</a>
            <a href="#projects">مشاريع</a>
            <a href="#team">فريقنا</a>
            <a href="#contact">تواصل</a>
        </div>
        <button class="btn">طلب الخدمة</button>
    </nav>

    <!-- Header -->
    <header>
        <h1>مرحبا بكم في SmartCode 🚀</h1>
        <p>نحو تحويل أفكارك البرمجية إلى حلول رقمية مبتكرة واحترافية</p>
    </header>

    <!-- About Section -->
    <section id="about">
        <h2>عن الشركة</h2>
        <p>SmartCode هي شركة برمجيات متخصصة في تحويل الأفكار إلى حلول رقمية مبتكرة، نقدم خدمات تطوير الويب، الألعاب، والتطبيقات الذكية للشركات والأفراد.</p>
    </section>

    <!-- Services Section -->
    <section id="services">
        <h2>خدماتنا</h2>
        <div class="services">
            <div class="card">
                <h3>تطوير الويب</h3>
                <p>تصميم وتطوير مواقع احترافية باستخدام أحدث التقنيات.</p>
            </div>
            <div class="card">
                <h3>تطوير الألعاب</h3>
                <p>تطوير ألعاب تفاعلية وممتعة تعمل على منصات متعددة.</p>
            </div>
            <div class="card">
                <h3>الحلول البرمجية</h3>
                <p>برمجيات مخصصة لتلبية احتياجات الشركات والأفراد.</p>
            </div>
            <div class="card">
                <h3>الحلول البرمجية</h3>
                <p>برمجيات مخصصة لتلبية احتياجات الشركات والأفراد.</p>
            </div>
            <div class="card">
                <h3>الحلول البرمجية</h3>
                <p>برمجيات مخصصة لتلبية احتياجات الشركات والأفراد.</p>
            </div>
            <div class="card">
                <h3>الحلول البرمجية</h3>
                <p>برمجيات مخصصة لتلبية احتياجات الشركات والأفراد.</p>
            </div>
            <div class="card">
                <h3>الحلول البرمجية</h3>
                <p>برمجيات مخصصة لتلبية احتياجات الشركات والأفراد.</p>
            </div>
            <div class="card">
                <h3>الحلول البرمجية</h3>
                <p>برمجيات مخصصة لتلبية احتياجات الشركات والأفراد.</p>
            </div>
            <div class="card">
                <h3>الحلول البرمجية</h3>
                <p>برمجيات مخصصة لتلبية احتياجات الشركات والأفراد.</p>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects">
        <h2>مشاريعنا</h2>
        <div class="projects">
            <div class="card">
                <h3>منصة تعليمية</h3>
                <p>منصة لإدارة التعليم عن بعد بشكل فعال وآمن.</p>
            </div>
            <div class="card">
                <h3>تطبيق ذكي</h3>
                <p>تطبيق لإدارة الوقت والمهام الشخصية للمستخدمين.</p>
            </div>
            <div class="card">
                <h3>لعبة تفاعلية</h3>
                <p>لعبة ممتعة للأطفال والشباب تعمل على الهواتف والحواسيب.</p>
            </div>
            <div class="card">
                <h3>لعبة تفاعلية</h3>
                <p>لعبة ممتعة للأطفال والشباب تعمل على الهواتف والحواسيب.</p>
            </div>
            <div class="card">
                <h3>لعبة تفاعلية</h3>
                <p>لعبة ممتعة للأطفال والشباب تعمل على الهواتف والحواسيب.</p>
            </div>
            <div class="card">
                <h3>لعبة تفاعلية</h3>
                <p>لعبة ممتعة للأطفال والشباب تعمل على الهواتف والحواسيب.</p>
            </div>
            <div class="card">
                <h3>لعبة تفاعلية</h3>
                <p>لعبة ممتعة للأطفال والشباب تعمل على الهواتف والحواسيب.</p>
            </div>
            <div class="card">
                <h3>لعبة تفاعلية</h3>
                <p>لعبة ممتعة للأطفال والشباب تعمل على الهواتف والحواسيب.</p>
            </div>
            <div class="card">
                <h3>لعبة تفاعلية</h3>
                <p>لعبة ممتعة للأطفال والشباب تعمل على الهواتف والحواسيب.</p>
            </div>
            <div class="card">
                <h3>لعبة تفاعلية</h3>
                <p>لعبة ممتعة للأطفال والشباب تعمل على الهواتف والحواسيب.</p>
            </div>
        </div>
    </section>

    <!-- Team Section -->
   <!-- Team Section -->
<section id="team">
    <h2>فريقنا</h2>
    <p style="text-align:center; max-width:800px; margin:0 auto 30px auto; color:#555; font-size:1.1rem; line-height:1.6;">
        فريقنا عبارة عن مجموعة من المطورين والمصممين المبدعين والمتخصصين في مجالات تطوير الويب، الألعاب، والحلول البرمجية. لدينا خبرة واسعة في العمل على مشاريع حقيقية واحترافية، ملتزمون بتحويل الأفكار إلى حلول رقمية مبتكرة وعالية الجودة تلبي احتياجات الشركات والأفراد.
    </p>
</section>


    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h2>تواصل معنا</h2>
        <form>
            <input type="text" placeholder="الاسم الكامل" required>
            <input type="email" placeholder="البريد الإلكتروني" required>
            <textarea rows="4" placeholder="رسالتك" required></textarea>
            <button class="btn" type="submit">إرسال</button>
        </form>
    </section>

    <!-- Footer -->
    <footer>
        &copy; 2025 SmartCode. جميع الحقوق محفوظة.
    </footer>
</body>
</html>
