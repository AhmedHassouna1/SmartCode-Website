<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'يجب تسجيل الدخول لإرسال رأيك.'], 403);
        }

        // منع تكرار إرسال الرأي
        if (Testimonial::where('name', $user->first_name)->exists()) {
            return response()->json(['error' => 'لقد قمت بإرسال رأيك مسبقًا.'], 409);
        }

        $request->validate([
            'role' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $testimonial = Testimonial::create([
            'name' => $user->first_name,
            'role' => $request->role,
            'message' => $request->message,
            'rating' => $request->rating,
        ]);

        return response()->json($testimonial);
    }
}
