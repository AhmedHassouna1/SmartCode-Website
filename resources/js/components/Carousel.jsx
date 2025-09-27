// resources/js/components/Carousel.jsx
import React, { useState, useEffect } from "react";

export default function Carousel({ items }) {
  const [current, setCurrent] = useState(0);

  // الحركة التلقائية
  useEffect(() => {
    const interval = setInterval(() => {
      setCurrent((prev) => (prev + 1) % items.length);
    }, 2000); // كل 2 ثانية تتحرك
    return () => clearInterval(interval);
  }, [items.length]);

  const prevSlide = () => setCurrent((prev) => (prev - 1 + items.length) % items.length);
  const nextSlide = () => setCurrent((prev) => (prev + 1) % items.length);

  return (
    <div className="relative w-full max-w-5xl mx-auto overflow-hidden">
      <div
        className="flex transition-transform duration-500"
        style={{ transform: `translateX(-${current * 100}%)` }}
      >
        {items.map((item, index) => (
          <div key={index} className="flex-shrink-0 w-full px-4">
            <div className="bg-white shadow-lg rounded-lg p-6 text-center">
              <h3 className="text-xl font-bold mb-2">{item.title}</h3>
              <p className="text-gray-600">{item.description}</p>
            </div>
          </div>
        ))}
      </div>

      {/* الأسهم */}
      <button
        onClick={prevSlide}
        className="absolute left-0 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 z-10"
      >
        ◀
      </button>
      <button
        onClick={nextSlide}
        className="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 z-10"
      >
        ▶
      </button>
    </div>
  );
}
