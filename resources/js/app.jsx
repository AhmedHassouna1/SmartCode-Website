import React from "react";
import ReactDOM from "react-dom/client";
import Navbar from "./components/Navbar";
import "../css/app.css";

function App() {
  return (
    <div>
      <Navbar />
      <main className="p-6 text-center">
        <h1 className="text-3xl font-bold mt-10">أهلاً بك في شركة SmartCode 👋</h1>
        <p className="text-gray-600 mt-4">حيث نطوّر أفكارك البرمجية إلى واقع احترافي</p>

        <section id="about" className="mt-16">
          <h2 className="text-2xl font-semibold">عنا</h2>
          <p className="text-gray-600 mt-2">معلومات عن الشركة وفريقنا.</p>
        </section>

        <section id="services" className="mt-16">
          <h2 className="text-2xl font-semibold">خدماتنا</h2>
          <p className="text-gray-600 mt-2">نقدم حلول برمجية مبتكرة لكل المشاريع.</p>
        </section>

        <section id="contact" className="mt-16 mb-16">
          <h2 className="text-2xl font-semibold">تواصل معنا</h2>
          <p className="text-gray-600 mt-2">info@smartcode.com</p>
        </section>
      </main>
    </div>
  );
}

// ✅ تأكد أن هذا العنصر موجود داخل resources/views/app.blade.php أو أي ملف HTML رئيسي
ReactDOM.createRoot(document.getElementById("app")).render(<App />);
