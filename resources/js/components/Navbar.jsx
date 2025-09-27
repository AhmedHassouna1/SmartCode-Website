import React from "react";

export default function Navbar() {
  return (
    <nav className="bg-white shadow-md p-4 flex justify-between items-center">
      <div className="text-xl font-bold text-blue-600"> LOGO SmartCode </div>

      <div className="hidden md:flex space-x-6">
        <a href="#about" className="text-gray-700 hover:text-blue-600">عنا</a>
        <a href="#services" className="text-gray-700 hover:text-blue-600">خدمات</a>
        <a href="#contact" className="text-gray-700 hover:text-blue-600">تواصل</a>
      </div>

      <button className="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        طلب الخدمة
      </button>
    </nav>
  );
}
