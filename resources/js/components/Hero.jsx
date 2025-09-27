import React from "react";

export default function Hero() {
  return (
    <section className="bg-gradient-to-r from-blue-100 to-blue-200 h-screen flex flex-col justify-center items-center text-center px-4">
      <h1 className="text-4xl md:text-6xl font-bold text-blue-700 mb-6">
        أهلاً بك في شركة SmartCode
      </h1>
      <p className="text-lg md:text-2xl text-gray-700 mb-6">
        نحن نحوّل أفكارك البرمجية إلى واقع احترافي 🚀
      </p>
      <button className="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
        اكتشف خدماتنا
      </button>
    </section>
  );
}
