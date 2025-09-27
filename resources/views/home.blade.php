{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <title>SmartCode</title>
    
</head>
<body>

<nav>
    <div class="logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="شعار الشركة">
        </a>
    </div>

    <!-- روابط الأقسام -->
    <ul class="nav-links">
        
        <li><a href="#about"><i class="fas fa-info-circle"></i> عنا</a></li>
        <li><a href="#services"><i class="fas fa-cogs"></i> خدمات</a></li>
        <li><a href="#projects"><i class="fas fa-project-diagram"></i> اعمالنا</a></li>
        <li><a href="#team"><i class="fas fa-users"></i> فريقنا</a></li>
        <li><a href="#contact"><i class="fas fa-envelope"></i> تواصل</a></li>
        <li><a href="#investments"><i class="fas fa-hand-holding-usd"></i> مشاريع للاستثمار</a></li>
        <li><a href="#testimonials"><i class="fas fa-comment-dots"></i> آراء العملاء</a></li>
        <li><a href="#faq"><i class="fas fa-question-circle"></i> الأسئلة الشائعة</a></li>



    </ul>

    <!-- زر طلب الخدمة -->
    <div class="dropdown">
        <button class="dropbtn" id="serviceBtn">
            طلب الخدمة <i class="fas fa-chevron-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#">خدمة 1</a>
            <a href="#">خدمة 2</a>
            <a href="#">خدمة 3</a>
        </div>
    </div>

    <!-- زر تسجيل الدخول / الاشتراك -->
    <div class="auth-buttons">
        @guest
            <a href="{{ route('login') }}" class="btn">تسجيل الدخول</a>
            <a href="{{ route('register') }}" class="btn">اشتراك</a>
        @endguest
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn">تسجيل الخروج</button>
            </form>
        @endauth
    </div>
</nav>

<!-- نافذة الشات -->
<div id="chatPopup" style="
    display:none;
    position:fixed;
    top:50%;
    left:50%;
    transform:translate(-50%, -50%) scale(0.5);
    opacity:0;
    transition:all 0.4s ease;
    width:300px;
    max-width:90%;
    background:white;
    border-radius:12px;
    box-shadow:0 4px 20px rgba(0,0,0,0.2);
    z-index:9999;
">
    <div class="chat-header" style="background:#007bff; color:white; padding:10px; border-radius:12px 12px 0 0; display:flex; justify-content:space-between; align-items:center; cursor:move;">
        <span>💬 دعم العملاء</span>
        <span id="closeChat" style="cursor:pointer; font-size:18px;">&times;</span>
    </div>

    <div id="chatMessages" style="max-height:250px; overflow-y:auto; padding:10px;">
        <div class="chat-welcome">مرحباً! اكتب رسالتك وسنرد عليك بأسرع وقت.</div>
    </div>

    <div class="chat-input-container" style="display:flex; gap:5px; padding:10px; border-top:1px solid #ddd;">
        <input id="chatInput" type="text" placeholder="اكتب رسالتك..." style="flex:1; padding:8px; border:1px solid #ccc; border-radius:8px;">
        <button id="sendChat" style="background:#007bff; color:white; border:none; padding:8px 12px; border-radius:8px; cursor:pointer;">إرسال</button>
    </div>
</div>

<!-- زر فتح الشات -->
<button id="serviceBtn" style="
    position:fixed;
    bottom:20px;
    right:20px;
    background:#007bff;
    color:white;
    border:none;
    padding:12px 15px;
    border-radius:50%;
    font-size:20px;
    cursor:pointer;
    z-index:999;
">💬</button>





    <!-- Header -->
    <header class="dynamic-header">
        <div class="overlay">
       
        </div>
        <div class="header-content">
            <h1>  SmartCode 🚀 مرحبا بكم في </h1>
            <p>نحو تحويل أفكارك البرمجية إلى حلول رقمية مبتكرة واحترافية</p>
        </div>
    </header>

 <!-- أيقونات التواصل -->
<div id="social-container">
    <!-- واتساب -->
    <a href="https://wa.me/0592195619" target="_blank" class="social-float whatsapp">
        <i class="fab fa-whatsapp"></i>
        <span class="social-text">تواصل معنا الآن!</span>
    </a>

    <!-- إنستجرام -->
    <a href="https://www.instagram.com/username" target="_blank" class="social-float instagram">
        <i class="fab fa-instagram"></i>
        <span class="social-text">تابعنا على إنستجرام!</span>
    </a>
</div>


<!-- لوحة الإعلانات -->
<div id="announcement-panel" class="expanded" onclick="togglePanel()">
    <div class="panel-header">
        <i class="fas fa-bullhorn"></i> لوحة الإعلانات
    </div>
    <div class="panel-content">
        <ul id="announcement-list">
            <li>🔔 إعلان 1: خصم 20% على جميع الخدمات.</li>
            <li>🚀 إعلان 2: إطلاق خدمة جديدة قريباً.</li>
            <li>📢 إعلان 3: ورشة مجانية عن تطوير الألعاب.</li>
            <li>💡 إعلان 4: ابقوا على تواصل معنا لمزيد من المفاجآت.</li>
        </ul>
    </div>
</div>


    <!-- About Section متقدم -->
<section id="about" style="padding:80px 20px; background:#f8f9fa;">
    <div style="max-width:1200px; margin:0 auto; display:flex; flex-wrap:wrap; align-items:center; gap:40px;">
        <!-- صورة على اليسار -->
        <div style="flex:1 1 400px; min-width:300px; text-align:center;">
            <img src="{{ asset('images/logo.png') }}" alt="عن SmartCode" style="width:100%; border-radius:12px; box-shadow:0 8px 20px rgba(0,0,0,0.1);">
        </div>

        <!-- نص على اليمين -->
        <div style="flex:1 1 500px; min-width:300px;">
            <h2 style="font-size:2.2rem; color:#007bff; margin-bottom:20px;"> SmartCode عن </h2>
            <p style="color:#555; line-height:1.8; margin-bottom:15px;">
            SmartCode
                 هي شركة برمجيات مبتكرة تسعى لتحويل الأفكار الرقمية إلى حلول تقنية احترافية. نمتلك فريقاً متخصصاً في تطوير المواقع، الألعاب، والتطبيقات الذكية، مع التركيز على تقديم تجربة مستخدم سلسة ومميزة.
            </p>
            <p style="color:#555; line-height:1.8; margin-bottom:15px;">
                خبرتنا تمتد لسنوات في تصميم وتطوير مشاريع رقمية متكاملة، بدءاً من التخطيط وتحليل الاحتياجات، وصولاً إلى التنفيذ والدعم المستمر. نؤمن بأهمية الابتكار والجودة في كل مشروع ننجزه، لضمان رضا عملائنا وتحقيق أهدافهم.
            </p>
            <p style="color:#555; line-height:1.8;">
                هدفنا هو تمكين الشركات والأفراد من الوصول إلى حلول رقمية متطورة تساعدهم على التميز في سوق العمل الرقمي وتطوير أعمالهم بطريقة فعالة ومبتكرة.
            </p>
        </div>
    </div>
</section>


 <!-- Services Section متقدم وموسع -->
<section id="services" style="padding:80px 20px; background:#ffffff;">
    <div style="max-width:1200px; margin:0 auto; text-align:center;">
        <h2 style="font-size:2.2rem; color:#007bff; margin-bottom:40px;">خدماتنا المتميزة</h2>
        <p style="color:#555; max-width:800px; margin:0 auto 50px auto; line-height:1.7;">
            نقدم مجموعة متكاملة من الخدمات الرقمية لتلبية احتياجات عملائنا بكفاءة واحترافية. خبرتنا تشمل تطوير حلول مبتكرة تساعدك على النمو والتميز في عالم التكنولوجيا.
        </p>

        <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:30px;">
            <!-- بطاقة الخدمة 1 -->
            <div style="flex:1 1 280px; background:#f0f8ff; border-radius:12px; padding:30px 20px; box-shadow:0 8px 20px rgba(0,0,0,0.1); transition:all 0.3s ease; text-align:center;">
                <div style="font-size:50px; color:#007bff; margin-bottom:20px;">💻</div>
                <h3 style="color:#007bff; margin-bottom:15px;">تطوير الويب الحديث</h3>
                <p style="color:#555; line-height:1.6;">
                    تصميم وتطوير مواقع ويب تفاعلية وسريعة الاستجابة، مع واجهات مستخدم جذابة وتجربة استخدام سلسة على جميع الأجهزة.
                </p>
            </div>

            <!-- بطاقة الخدمة 2 -->
            <div style="flex:1 1 280px; background:#f0f8ff; border-radius:12px; padding:30px 20px; box-shadow:0 8px 20px rgba(0,0,0,0.1); transition:all 0.3s ease; text-align:center;">
                <div style="font-size:50px; color:#007bff; margin-bottom:20px;">🎮</div>
                <h3 style="color:#007bff; margin-bottom:15px;">تطوير الألعاب التفاعلية</h3>
                <p style="color:#555; line-height:1.6;">
                    بناء ألعاب ممتعة على منصات متعددة مع تركيز على تجربة مستخدم تفاعلية ورسوميات جذابة تلبي جميع الأعمار.
                </p>
            </div>

            <!-- بطاقة الخدمة 3 -->
            <div style="flex:1 1 280px; background:#f0f8ff; border-radius:12px; padding:30px 20px; box-shadow:0 8px 20px rgba(0,0,0,0.1); transition:all 0.3s ease; text-align:center;">
                <div style="font-size:50px; color:#007bff; margin-bottom:20px;">📱</div>
                <h3 style="color:#007bff; margin-bottom:15px;">تطبيقات الهواتف الذكية</h3>
                <p style="color:#555; line-height:1.6;">
                    تصميم وتطوير تطبيقات ذكية على Android و iOS، مع التركيز على الأداء، سهولة الاستخدام، وتجربة مستخدم ممتعة.
                </p>
            </div>

            <!-- بطاقة الخدمة 4 -->
            <div style="flex:1 1 280px; background:#f0f8ff; border-radius:12px; padding:30px 20px; box-shadow:0 8px 20px rgba(0,0,0,0.1); transition:all 0.3s ease; text-align:center;">
                <div style="font-size:50px; color:#007bff; margin-bottom:20px;">🛠️</div>
                <h3 style="color:#007bff; margin-bottom:15px;">الحلول البرمجية المخصصة</h3>
                <p style="color:#555; line-height:1.6;">
                    برمجيات متكاملة ومخصصة للشركات والأفراد لتلبية احتياجاتهم بدقة وكفاءة، مع دعم تقني مستمر وتحديثات دائمة.
                </p>
            </div>

            <!-- بطاقة الخدمة 5 -->
            <div style="flex:1 1 280px; background:#f0f8ff; border-radius:12px; padding:30px 20px; box-shadow:0 8px 20px rgba(0,0,0,0.1); transition:all 0.3s ease; text-align:center;">
                <div style="font-size:50px; color:#007bff; margin-bottom:20px;">🎓</div>
                <h3 style="color:#007bff; margin-bottom:15px;">الدورات التدريبية للبرمجة</h3>
                <p style="color:#555; line-height:1.6;">
                    برامج تدريبية متخصصة لتعلم لغات البرمجة الحديثة، من البداية حتى المستوى المتقدم، مع متابعة عملية وتطبيق مشاريع حقيقية.
                </p>
            </div>

            <!-- بطاقة الخدمة 6 -->
            <div style="flex:1 1 280px; background:#f0f8ff; border-radius:12px; padding:30px 20px; box-shadow:0 8px 20px rgba(0,0,0,0.1); transition:all 0.3s ease; text-align:center;">
                <div style="font-size:50px; color:#007bff; margin-bottom:20px;">🤝</div>
                <h3 style="color:#007bff; margin-bottom:15px;">دعم المشاريع الفردية</h3>
                <p style="color:#555; line-height:1.6;">
                    نقدم الدعم والإرشاد للأفراد الذين لديهم مشاريع تقنية، لمساعدتهم على الانجاز بسرعة وفعالية من خلال خبرائنا.
                </p>
            </div>

            <!-- بطاقة الخدمة 7 -->
            <div style="flex:1 1 280px; background:#f0f8ff; border-radius:12px; padding:30px 20px; box-shadow:0 8px 20px rgba(0,0,0,0.1); transition:all 0.3s ease; text-align:center;">
                <div style="font-size:50px; color:#007bff; margin-bottom:20px;">📊</div>
                <h3 style="color:#007bff; margin-bottom:15px;">الرياضيات والخوارزميات الحديثة</h3>
                <p style="color:#555; line-height:1.6;">
                    قسم متخصص لتعلم الرياضيات، الخوارزميات، وأحدث التقنيات البرمجية، مع تطبيقات عملية على البرمجة وتطوير الحلول الذكية.
                </p>
            </div>
        </div>
    </div>
</section>
    <!-- Projects Section متقدم وديناميكي -->
<section id="projects" style="padding:80px 20px; background:#f8f9fa;">
    <div style="max-width:1200px; margin:0 auto; text-align:center;">
        <h2 style="font-size:2.2rem; color:#007bff; margin-bottom:40px;">مشاريعنا</h2>
        <p style="color:#555; max-width:800px; margin:0 auto 50px auto; line-height:1.7;">
            استكشف مشاريعنا الرقمية التي نقدمها بابتكار واحترافية عالية. اضغط على أي مشروع لتعرف المزيد عن مميزاته ومدة إنجازه وطريقة تنفيذه.
        </p>

        <div class="projects" style="display:flex; flex-wrap:wrap; gap:30px; justify-content:center;">
            <!-- مشروع 1 -->
            <div class="project-card">
                <img src="{{ asset('images/3.jpg') }}" alt="منصة تعليمية" class="project-img">
                <h3>منصة تعليمية ذكية</h3>
                <p class="short-desc">منصة متكاملة لإدارة التعليم عن بعد بشكل فعال وآمن.</p>
                <button class="details-btn">عرض التفاصيل</button>
                <div class="project-details">
                    <ul>
                        <li><strong>مميزات المشروع : </strong> . واجهة سهلة الاستخدام، نظام تسجيل الطلاب والمعلمين، تقارير وتحليلات </li>
                        <li><strong>مدة الإنجاز:</strong> 3 أشهر</li>
                        <li><strong>طريقة التنفيذ:</strong> Laravel + React، قاعدة بيانات MySQL، استضافة على AWS</li>
                        <li><strong>الفريق المنفذ:</strong> 3 مبرمجين + مصمم UI/UX</li>
                    </ul>
                </div>
            </div>

            <!-- مشروع 2 -->
            <div class="project-card">
                <img src="{{ asset('images/2.jpeg') }}" alt="تطبيق ذكي" class="project-img">
                <h3>تطبيق ذكي لإدارة المهام</h3>
                <p class="short-desc">تطبيق لمتابعة المهام اليومية وتحسين إدارة الوقت.</p>
                <button class="details-btn">عرض التفاصيل</button>
                <div class="project-details">
                    <ul>
                        <li><strong>مميزات المشروع:</strong>. تنظيم المهام، تنبيهات، واجهة رسومية جذابة، مزامنة بين الأجهزة </li>
                        <li><strong>مدة الإنجاز:</strong> 2 شهر</li>
                        <li><strong>طريقة التنفيذ:</strong> Flutter + Firebase</li>
                        <li><strong>الفريق المنفذ:</strong> مبرمج واحد + مصمم UX</li>
                    </ul>
                </div>
            </div>

            <!-- مشروع 3 -->
            <div class="project-card">
                <img src="{{ asset('images/1.jpeg') }}" alt="لعبة تفاعلية" class="project-img">
                <h3>لعبة تفاعلية للأطفال</h3>
                <p class="short-desc">لعبة تعليمية وترفيهية على الهواتف والحواسيب.</p>
                <button class="details-btn">عرض التفاصيل</button>
                <div class="project-details">
                    <ul>
                        <li><strong>مميزات المشروع:</strong> مراحل تعليمية ممتعة، رسوميات جذابة، أصوات تفاعلية.</li>
                        <li><strong>مدة الإنجاز:</strong> 4 أشهر</li>
                        <li><strong>طريقة التنفيذ:</strong> Unity + C#</li>
                        <li><strong>الفريق المنفذ:</strong> مبرمجين اثنين + مصمم رسومي</li>
                    </ul>
                </div>
            </div>

            <!-- مشروع 4 -->
            <div class="project-card">
                <img src="{{ asset('images/4.jpg') }}" alt="منصة رياضية" class="project-img">
                <h3>منصة تحليل البيانات الرياضية</h3>
                <p class="short-desc">منصة لتحليل الأداء الرياضي وإعطاء توصيات للتطوير.</p>
                <button class="details-btn">عرض التفاصيل</button>
                <div class="project-details">
                    <ul>
                        <li><strong>مميزات المشروع:</strong> تحليل بيانات الأداء، إحصائيات مفصلة، تقارير تفاعلية.</li>
                        <li><strong>مدة الإنجاز:</strong> 3 أشهر</li>
                        <li><strong>طريقة التنفيذ:</strong> Python + Django + Chart.js</li>
                        <li><strong>الفريق المنفذ:</strong> 2 مبرمج + محلل بيانات</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Project Management Section -->
<section id="project-management" style="padding:80px 20px; background:#f0f8ff;">
    <div style="max-width:1200px; margin:0 auto; display:flex; flex-wrap:wrap; align-items:center; gap:40px;">
        
        <!-- صورة على اليسار -->
        <div style="flex:1 1 450px; min-width:300px; text-align:center;">
            <img src="{{ asset('images/projectmang.jpeg') }}" alt="إدارة المشاريع البرمجية" 
                 style="width:100%; border-radius:12px; box-shadow:0 8px 20px rgba(0,0,0,0.15);">
        </div>

        <!-- نص على اليمين -->
        <div style="flex:1 1 500px; min-width:300px;">
            <h2 style="font-size:2.2rem; color:#007bff; margin-bottom:20px;">إدارة المشاريع البرمجية</h2>
            <p style="color:#555; line-height:1.8; margin-bottom:15px;">
                نقدم خدمات متقدمة لإدارة المشاريع البرمجية، بدءاً من تخطيط الأفكار وتحليل الاحتياجات، وصولاً إلى التنفيذ والمتابعة المستمرة. نحن نضمن أن كل مشروع يتم بشكل احترافي، مع التزام بالجودة والوقت المحدد.
            </p>
            <p style="color:#555; line-height:1.8; margin-bottom:15px;">
                فريقنا يستخدم أفضل الأدوات والتقنيات لإدارة المهام، توزيع العمل، وتتبع تقدم المشروع. كل هذه العمليات تساعد العملاء على الحصول على حلول برمجية فعّالة ومبتكرة.
            </p>
            <p style="color:#555; line-height:1.8;">
                سواء كان مشروعك تطبيق ويب، لعبة، أو حل برمجي مخصص، نحن نساعدك على تنظيم المشروع من البداية حتى التسليم، مع تقديم استشارات مستمرة لضمان نجاح كل مرحلة.
            </p>
        </div>
    </div>
</section>

<!-- قسم جديد تحت خدماتنا: التحليلات الذكية -->
<section id="smart-solutions" style="padding:80px 20px; background:#ffffff;">
    <div style="max-width:1200px; margin:0 auto; text-align:center;">
        <h2 style="font-size:2.2rem; color:#007bff; margin-bottom:40px;">حلول ذكية وتقنيات حديثة</h2>
        <p style="color:#555; max-width:800px; margin:0 auto 50px auto; line-height:1.7;">
            نقدم حلول متقدمة تعتمد على أحدث تقنيات الذكاء الاصطناعي وتحليل البيانات لمساعدة الشركات والأفراد على تحسين أعمالهم واتخاذ قرارات استراتيجية دقيقة.
        </p>
        <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:30px;">
            <!-- بطاقة الخدمة الذكية 1 -->
            <div style="flex:1 1 280px; background:#f0f8ff; border-radius:12px; padding:30px 20px; box-shadow:0 8px 20px rgba(0,0,0,0.1); text-align:center; transition:all 0.3s;">
                <div style="font-size:50px; color:#007bff; margin-bottom:20px;">🤖</div>
                <h3 style="color:#007bff; margin-bottom:15px;">الذكاء الاصطناعي</h3>
                <p style="color:#555; line-height:1.6;">
                    حلول ذكية تعتمد على AI لتطوير تطبيقات تفاعلية وتحليل سلوك المستخدمين وتحسين تجربة الاستخدام.
                </p>
            </div>

            <!-- بطاقة الخدمة الذكية 2 -->
            <div style="flex:1 1 280px; background:#f0f8ff; border-radius:12px; padding:30px 20px; box-shadow:0 8px 20px rgba(0,0,0,0.1); text-align:center; transition:all 0.3s;">
                <div style="font-size:50px; color:#007bff; margin-bottom:20px;">📊</div>
                <h3 style="color:#007bff; margin-bottom:15px;">تحليلات البيانات</h3>
                <p style="color:#555; line-height:1.6;">
                    أدوات تحليل بيانات قوية تساعد على فهم احتياجات العملاء واتخاذ قرارات مبنية على معطيات دقيقة.
                </p>
            </div>

            <!-- بطاقة الخدمة الذكية 3 -->
            <div style="flex:1 1 280px; background:#f0f8ff; border-radius:12px; padding:30px 20px; box-shadow:0 8px 20px rgba(0,0,0,0.1); text-align:center; transition:all 0.3s;">
                <div style="font-size:50px; color:#007bff; margin-bottom:20px;">⚙️</div>
                <h3 style="color:#007bff; margin-bottom:15px;">أتمتة العمليات</h3>
                <p style="color:#555; line-height:1.6;">
                    نقدم حلول لأتمتة العمليات الروتينية لتوفير الوقت وزيادة الكفاءة وتقليل الأخطاء البشرية.
                </p>
            </div>
        </div>
    </div>
</section>


<section id="investments" class="investments-section">
    <div class="container">
        <h2 class="section-title">مشاريع متاحة للاستثمار أو الشراء</h2>
        <div class="projects-grid">
            <!-- مشروع فردي -->
            <div class="project-card">
                <img src="{{ asset('images/pngtree-teamwork-analyzing-investment-project-reports-during-corporate-meeting-photo-image_50682704.jpg') }}" alt="مشروع 1">
                <div class="project-info">
                    <h3>اسم المشروع 1</h3>
                    <p>وصف قصير للمشروع، مثل الموقع، المساحة، أو المميزات الأساسية.</p>
                    <a href="#" class="btn">المزيد</a>
                </div>
            </div>

            <div class="project-card">
                <img src="{{ asset('images/pngtree-teamwork-analyzing-investment-project-reports-during-corporate-meeting-photo-image_50682704.jpg') }}" alt="مشروع 2">
                <div class="project-info">
                    <h3>اسم المشروع 2</h3>
                    <p>وصف قصير للمشروع.</p>
                    <a href="#" class="btn">المزيد</a>
                </div>
            </div>

            <!-- يمكن إضافة مشاريع أكثر بنفس الشكل -->
        </div>
    </div>
</section>

<section id="testimonials" class="testimonials-section">
    <div class="container">
        <h2 class="section-title">آراء عملائنا</h2>

        <!-- Grid لعرض الآراء -->
        <div class="testimonials-grid" id="testimonialsGrid">
            @foreach(App\Models\Testimonial::latest()->get() as $testimonial)
                <div class="testimonial-card">
                    <p class="testimonial-text">"{{ $testimonial->message }}"</p>
                    <div class="testimonial-client">
                        <div class="client-icon">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div>
                            <h4>{{ $testimonial->name }}</h4>
                            <span>{{ $testimonial->role }}</span>
                            <div class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'filled' : '' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @auth
        <!-- نموذج إضافة رأي جديد -->
        <div class="testimonial-form">
            <h3>شاركنا رأيك عن خدماتنا</h3>
            <form id="addTestimonial">
                @csrf
                <input type="text" name="role" placeholder="وظيفتك أو علاقتك بالشركة" required>
                <textarea name="message" placeholder="اكتب رأيك هنا..." required></textarea>
                <label>قيم خدماتنا:</label>
                <select name="rating" required>
                    <option value="5">★★★★★ ممتاز</option>
                    <option value="4">★★★★ جيد جدًا</option>
                    <option value="3">★★★ جيد</option>
                    <option value="2">★★ متوسط</option>
                    <option value="1">★ ضعيف</option>
                </select>
                <button type="submit" class="btn">إرسال رأيك</button>
            </form>
            <p id="testimonialMessage" style="margin-top:10px;"></p>
        </div>
        @else
            <p style="margin-top:20px; color:#555;">
                يجب تسجيل الدخول لإرسال رأيك 
                <a href="{{ route('login') }}">تسجيل الدخول</a>
            </p>
        @endauth
    </div>
</section>


<section id="contact" style="padding:80px 20px; background: linear-gradient(135deg, #e0f7ff, #ffffff);">
    <div style="max-width:900px; margin:0 auto; text-align:center;">
        <h2 style="font-size:2.2rem; color:#007bff; margin-bottom:30px;">تواصل معنا</h2>
        <p style="color:#555; max-width:700px; margin:0 auto 40px auto; line-height:1.6;">
            لديك سؤال أو تريد استشارة حول خدماتنا؟ اترك لنا رسالة وسنعاود التواصل معك في أسرع وقت ممكن.
        </p>

        @if(auth()->check())
            <form method="POST" action="{{ route('contact.send') }}" style="display:flex; flex-direction:column; gap:20px;">
                @csrf
                <div style="position:relative;">
                    <i class="fas fa-comment-dots" style="position:absolute; left:12px; top:12px; color:#007bff;"></i>
                    <textarea name="message" placeholder="رسالتك" required
                              style="padding:12px 15px 12px 40px; border-radius:8px; border:1px solid #ccc; width:100%; font-size:1rem; min-height:150px; resize:none;"></textarea>
                </div>

                <button type="submit" style="
                    background: linear-gradient(135deg, #007bff, #00d4ff);
                    color:white;
                    font-size:1.1rem;
                    font-weight:600;
                    padding:12px 0;
                    border:none;
                    border-radius:10px;
                    cursor:pointer;
                    transition: all 0.3s;
                " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    إرسال الرسالة
                </button>
            </form>
        @else
          <p style="margin-top:20px; color:#555;">
                 يجب تسجيل الدخول لإرسال رسالة   
                <a href="{{ route('login') }}">تسجيل الدخول</a>
            </p>
            <p style="color:red; font-weight:600;"></p>
        @endif

        @if(session('success'))
            <div style="color:green; font-weight:600; margin-top:10px; text-align:center;">
                {{ session('success') }}
            </div>
        @endif
    </div>
</section>


<section id="team" class="team-section">
    <div class="container">
        <h2>فريقنا</h2>
        <p>
            نحن نتميز بفريق قوي ومتميز، يتكون من مبرمجين ومصممين محترفين، جميعنا متخصصون ومتمرسون على العمل على مشاريع حقيقية، 
            ونسعى دائمًا لتقديم أفضل الحلول الرقمية التي تلبي احتياجات عملائنا بكفاءة واحترافية.
        </p>
    </div>
</section>


<section id="faq" class="faq-section">
    <div class="container">
        <h2 class="section-title">الأسئلة الشائعة</h2>
        <div class="faq-grid">

            <!-- سؤال 1 -->
            <div class="faq-item">
                <button class="faq-question">هل هناك ضمانات على المشاريع التي يتم الاستثمار فيها؟</button>
                <div class="faq-answer">
                    <p>نعم، جميع المشاريع التي نوفرها للاستثمار تأتي مع ضمانات واضحة لحماية استثمارك، وتشمل التزام قانوني وتنفيذي من الشركة.</p>
                </div>
            </div>

            <!-- سؤال 2 -->
            <div class="faq-item">
                <button class="faq-question">كيف يمكنني طلب خدمة جديدة؟</button>
                <div class="faq-answer">
                    <p>يمكنك الضغط على زر "طلب الخدمة" الموجود في أعلى الموقع وملء نموذج الطلب، وسيتواصل معك فريق الدعم فوراً.</p>
                </div>
            </div>

            <!-- سؤال 3 -->
            <div class="faq-item">
                <button class="faq-question">ما هي طرق الدفع المتاحة للاستثمار في المشاريع؟</button>
                <div class="faq-answer">
                    <p>نقبل الدفع عبر التحويل البنكي، البطاقات الائتمانية، والمحافظ الإلكترونية حسب المشروع.</p>
                </div>
            </div>

            <!-- سؤال 4 -->
            <div class="faq-item">
                <button class="faq-question">هل يمكنني زيارة المشاريع قبل الاستثمار؟</button>
                <div class="faq-answer">
                    <p>نعم، يمكن ترتيب زيارة ميدانية للمشروع مع فريقنا بعد التواصل معنا وحجز موعد.</p>
                </div>
            </div>

            <!-- سؤال 5 -->
            <div class="faq-item">
                <button class="faq-question">هل توفرون تقارير دورية عن حالة المشاريع؟</button>
                <div class="faq-answer">
                    <p>نعم، يتم إرسال تقارير مفصلة بشكل دوري لجميع المستثمرين حول حالة المشاريع والأرباح المتوقعة.</p>
                </div>
            </div>

            <!-- سؤال 6 -->
            <div class="faq-item">
                <button class="faq-question">هل يمكن استرداد الاستثمار في أي وقت؟</button>
                <div class="faq-answer">
                    <p>يتوقف ذلك على نوع المشروع والاتفاقية الموقعة، لكن نوفر خيارات استرداد واضحة ضمن الشروط.</p>
                </div>
            </div>

            <!-- سؤال 7 -->
            <div class="faq-item">
                <button class="faq-question">ما هي مدة الاستثمار المثالية للمشاريع؟</button>
                <div class="faq-answer">
                    <p>مدة الاستثمار تختلف حسب كل مشروع، وعادة تكون بين 6 أشهر إلى 3 سنوات حسب طبيعة المشروع.</p>
                </div>
            </div>

            <!-- سؤال 8 -->
            <div class="faq-item">
                <button class="faq-question">هل يمكن الاستثمار بمبالغ صغيرة؟</button>
                <div class="faq-answer">
                    <p>نعم، بعض المشاريع تسمح بالاستثمار بمبالغ صغيرة لتسهيل دخول المستثمرين الجدد.</p>
                </div>
            </div>

            <!-- يمكن إضافة المزيد بنفس الشكل -->
        </div>
    </div>
</section>


<!-- Footer متقدم -->
<footer style="background:#343a40; color:#fff; padding:50px 20px; font-family:Arial, sans-serif;">
    <div style="max-width:1200px; margin:0 auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:40px;">
        <!-- عمود 1: عن الشركة -->
        <div style="flex:1 1 250px; min-width:200px;">
            <h3 style="color:#00c6ff; margin-bottom:15px;">عن SmartCode</h3>
            <p style="color:#ccc; line-height:1.6;">
                SmartCode شركة برمجيات متخصصة في تطوير الويب، الألعاب، والحلول البرمجية المبتكرة. نسعى لتحويل أفكارك الرقمية إلى واقع احترافي.
            </p>
        </div>

        <!-- عمود 2: تواصل معنا -->
        <div style="flex:1 1 200px; min-width:200px;">
            <h3 style="color:#00c6ff; margin-bottom:15px;">تواصل معنا</h3>
            <ul style="list-style:none; padding:0; color:#ccc; line-height:2;">
                <li style="display:flex; align-items:center; gap:10px;">
                    <i class="fab fa-whatsapp" style="color:#25D366; font-size:1.3rem;"></i> <a href="https://wa.me/0592195619" target="_blank" style="color:#ccc; text-decoration:none;">0592195619</a>
                </li>
                <li style="display:flex; align-items:center; gap:10px;">
                    <i class="fab fa-instagram" style="color:#C13584; font-size:1.3rem;"></i> <a href="https://instagram.com/youraccount" target="_blank" style="color:#ccc; text-decoration:none;">@smartcode.ps</a>
                </li>
                <li style="display:flex; align-items:center; gap:10px;">
                    <i class="fas fa-envelope" style="color:#fff; font-size:1.3rem;"></i> <a href="mailto:info@smartcode.com" style="color:#ccc; text-decoration:none;">smartcode.ps@gmail.com
                    </a>
                </li>
            </ul>
        </div>

        <!-- عمود 3: روابط سريعة -->
        <div style="flex:1 1 200px; min-width:200px;">
            <h3 style="color:#00c6ff; margin-bottom:15px;">روابط سريعة</h3>
            <ul style="list-style:none; padding:0; color:#ccc; line-height:2;">
                <li><a href="#about" style="color:#ccc; text-decoration:none;">عن الشركة</a></li>
                <li><a href="#services" style="color:#ccc; text-decoration:none;">خدماتنا</a></li>
                <li><a href="#projects" style="color:#ccc; text-decoration:none;">مشاريعنا</a></li>
                <li><a href="#team" style="color:#ccc; text-decoration:none;">فريقنا</a></li>
                <li><a href="#contact" style="color:#ccc; text-decoration:none;">تواصل معنا</a></li>
            </ul>
        </div>

        <!-- عمود 4: تابعنا -->
        <div style="flex:1 1 200px; min-width:200px;">
            <h3 style="color:#00c6ff; margin-bottom:15px;">تابعنا</h3>
            <div style="display:flex; gap:15px;">
                <a href="https://wa.me/0592195619" target="_blank" style="color:#25D366; font-size:1.5rem;"><i class="fab fa-whatsapp"></i></a>
                <a href="https://instagram.com/youraccount" target="_blank" style="color:#C13584; font-size:1.5rem;"><i class="fab fa-instagram"></i></a>
                <a href="mailto:info@smartcode.com" style="color:#fff; font-size:1.5rem;"><i class="fas fa-envelope"></i></a>
            </div>
        </div>
    </div>

    <!-- خط فاصل -->
    <hr style="margin:30px 0; border-color:#555;">

    <!-- حقوق الملكية -->
    <div style="text-align:center; color:#ccc; font-size:0.9rem;">
        &copy; 2025 SmartCode. جميع الحقوق محفوظة.
    </div>
</footer>

<!-- Hover effect -->
<style>
footer a:hover {
    color:#00c6ff;
    transition: color 0.3s;
}
footer a i:hover {
    transform: scale(1.2);
    transition: transform 0.3s;
}
</style>


<!-- Hover effect -->
<style>
footer a:hover {
    transform: scale(1.1);
}
</style>


<script src="{{ asset('assets/js/filejava.js') }}"></script>
<script>
    
    const images = [
        "{{ asset('images/header1.jpg') }}",
        "{{ asset('images/header2.jpg') }}",
        "{{ asset('images/header3.jpg') }}"
    ];
    let current = 0;
    const header = document.querySelector('.dynamic-header');

    function changeBackground() {
        header.style.backgroundImage = `url(${images[current]})`;
        current = (current + 1) % images.length;
    }

    changeBackground(); // عرض أول صورة فوراً
    setInterval(changeBackground, 1500); // تغيير كل 1.5 ثانية
 document.querySelectorAll('.details-btn').forEach(btn=>{
btn.addEventListener('click', ()=>{
    const details = btn.nextElementSibling;
    if(details.style.display === "block"){
        details.style.display = "none";
        btn.textContent = "عرض التفاصيل";
    } else {
        details.style.display = "block";
        btn.textContent = "إخفاء التفاصيل";
    }
});
});
</script>
<script>
const serviceBtn = document.getElementById('serviceBtn');
const chatPopup = document.getElementById('chatPopup');
const closeChat = document.getElementById('closeChat');
const sendChat = document.getElementById('sendChat');
const chatInput = document.getElementById('chatInput');
const chatMessages = document.getElementById('chatMessages');

// فتح الشات
function openChat(){
    chatPopup.style.display = 'block';
    setTimeout(()=>{
        chatPopup.style.transform = 'translate(-50%, -50%) scale(1)';
        chatPopup.style.opacity = '1';
    }, 10);
    chatInput.focus();
}

// إغلاق الشات
function closeChatPopup(){
    chatPopup.style.transform = 'translate(-50%, -50%) scale(0.8)';
    chatPopup.style.opacity = '0';
    setTimeout(()=>{
        chatPopup.style.display = 'none';
    }, 400);
}

serviceBtn.addEventListener('click', openChat);
closeChat.addEventListener('click', closeChatPopup);

// إرسال الرسالة
function sendMessage(){
    const text = chatInput.value.trim();
    if(text === '') return;

    // رسالة المستخدم
    const userMsg = document.createElement('div');
    userMsg.style.cssText = `
        padding:8px 12px;
        background:#007bff;
        color:white;
        border-radius:15px;
        margin:5px 0;
        text-align:right;
    `;
    userMsg.textContent = text;
    chatMessages.appendChild(userMsg);
    chatMessages.scrollTop = chatMessages.scrollHeight;

    chatInput.value = '';
    chatInput.focus();

    // رد تلقائي بعد 700ms
    setTimeout(()=>{
        const reply = document.createElement('div');
        reply.style.cssText = `
            padding:8px 12px;
            background:#f1f1f1;
            color:#333;
            border-radius:15px;
            margin:5px 0;
            text-align:left;
        `;
        reply.textContent = `شكرًا على رسالتك: "${text}". سنرد عليك بأسرع وقت.`;
        chatMessages.appendChild(reply);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }, 700);
}

// زر إرسال
sendChat.addEventListener('click', sendMessage);

// إرسال عند الضغط Enter
chatInput.addEventListener('keypress', (e)=>{
    if(e.key === 'Enter'){
        e.preventDefault();
        sendMessage();
    }
});

// يفتح تلقائيًا بعد 3 ثواني
setTimeout(openChat, 3000);



</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('addTestimonial');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);
        const messageP = document.getElementById('testimonialMessage');

        fetch("{{ route('testimonials.store') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                messageP.style.color = 'red';
                messageP.textContent = data.error;
                return;
            }

            messageP.style.color = 'green';
            messageP.textContent = 'تم إرسال رأيك بنجاح!';

            const grid = document.getElementById('testimonialsGrid');
            const newCard = document.createElement('div');
            newCard.classList.add('testimonial-card');
            newCard.innerHTML = `
                <p class="testimonial-text">"${data.message}"</p>
                <div class="testimonial-client">
                    <div class="client-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div>
                        <h4>${data.name}</h4>
                        <span>${data.role}</span>
                        <div class="stars">
                            ${[1,2,3,4,5].map(i => `<i class="fas fa-star ${i <= data.rating ? 'filled' : ''}"></i>`).join('')}
                        </div>
                    </div>
                </div>
            `;
            grid.prepend(newCard);
            form.reset();
        })
        .catch(error => {
            console.error(error);
            messageP.style.color = 'red';
            messageP.textContent = 'حدث خطأ أثناء الإرسال!';
        });
    });
});
</script>

</body>

</html>

   احمد عامر محمد حسونة - 120211679

احمد هشام حمدان الفيومي - 120212266

محمود عماد يوسف رستم - 120204429

هاشم سامي هاشم الداية - 120213032

