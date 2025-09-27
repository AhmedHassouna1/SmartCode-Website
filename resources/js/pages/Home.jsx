// resources/js/Home.jsx
import React from "react";
import Carousel from "./components/Carousel";

export default function Home() {
  const services = [
    { title: "تطوير ويب", description: "إنشاء مواقع وتطبيقات احترافية تناسب جميع الأعمال." },
    { title: "تطوير ألعاب", description: "تصميم ألعاب تفاعلية وتجارب لعب ممتعة لجميع المنصات." },
    { title: "تصميم واجهات", description: "تصاميم جذابة وتجربة مستخدم سلسة وسهلة." },
    { title: "خدمات استشارية", description: "حلول برمجية مبتكرة واستشارات تقنية متقدمة." },
  ];

  const projects = [
    { title: "مشروع التجارة الإلكترونية", description: "تطبيق ويب متكامل لإدارة متجر إلكتروني بالكامل." },
    { title: "مشروع لعبة تعليمية", description: "لعبة تفاعلية لتعليم البرمجة للأطفال بطريقة ممتعة." },
    { title: "مشروع منصة تعليمية", description: "منصة تعليمية ذكية لدورات أونلاين وتقييم الطلاب." },
    { title: "مشروع واجهة مبتكرة", description: "تصميم واجهات تفاعلية لتطبيقات الهواتف والمواقع." },
  ];

  return (
    <div className="font-sans text-gray-800">
      {/* Hero Section */}
      <section className="bg-blue-600 text-white py-20 text-center">
        <h1 className="text-4xl lg:text-5xl font-bold mb-4">
          أهلاً بك في SmartCode 👋
        </h1>
        <p className="text-lg lg:text-xl mb-6">
          نحول أفكارك البرمجية إلى واقع احترافي
        </p>
        <button className="bg-white text-blue-600 font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition">
          اطلب خدمتك الآن
        </button>
      </section>

      {/* About Section */}
      <section className="py-16 max-w-6xl mx-auto px-6 text-center">
        <h2 className="text-3xl font-bold mb-4">عن شركتنا</h2>
        <p className="text-gray-600 text-lg leading-relaxed">
          شركة SmartCode هي شركة متخصصة في تطوير البرمجيات، تصميم الألعاب، وتقديم الحلول التقنية المبتكرة. 
          فريقنا المتميز يعمل على تحويل أفكار العملاء إلى مشاريع حقيقية واحترافية، مع التركيز على جودة الأداء وتجربة المستخدم.
        </p>
      </section>

      {/* Services Carousel */}
      <section className="py-16 bg-gray-50">
        <h2 className="text-3xl font-bold mb-8 text-center">خدماتنا</h2>
        <Carousel items={services} />
      </section>

      {/* Projects Carousel */}
      <section className="py-16 max-w-6xl mx-auto px-6">
        <h2 className="text-3xl font-bold mb-8 text-center">مشاريعنا</h2>
        <Carousel items={projects} />
      </section>

      {/* Footer */}
      <footer className="bg-gray-800 text-white py-8 mt-16 text-center">
        <p>© 2025 SmartCode. جميع الحقوق محفوظة.</p>
        <p>info@smartcode.com | +972 59 219 5619</p>
      </footer>
    </div>
  );
}
