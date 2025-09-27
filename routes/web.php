<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;


// الصفحة الرئيسية
Route::get('/', [HomeController::class, 'home'])->name('home');

// تسجيل الدخول / التسجيل
Route::get('/login', [HomeController::class, 'showLoginForm'])->name('login');
Route::post('/login', [HomeController::class, 'login']);
Route::get('/register', [HomeController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [HomeController::class, 'register']);
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

// 🛑 لوحة تحكم الأدمن
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // خدمات
    Route::get('/dashboard/services', [AdminController::class, 'services'])->name('dashboard.services');
    Route::post('/dashboard/services', [AdminController::class, 'addService'])->name('dashboard.services.add');
    Route::delete('/dashboard/services/delete/{id}', [AdminController::class, 'deleteService'])->name('dashboard.services.delete');

    // مشاريع
    Route::get('/dashboard/projects', [AdminController::class, 'projects'])->name('dashboard.projects');
    Route::post('/dashboard/projects', [AdminController::class, 'addProject'])->name('dashboard.projects.add');
    Route::delete('/dashboard/projects/delete/{id}', [AdminController::class, 'deleteProject'])->name('dashboard.projects.delete');
});
// شهادات العملاء
    Route::post('/testimonials', [TestimonialController::class, 'store'])
    ->name('testimonials.store')
    ->middleware('auth');
    
    
    Route::middleware(['auth'])->group(function () {
        Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
    });

 Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

 Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

Route::post('/contact/send', function (\Illuminate\Http\Request $request) {
     return back()->with('success', 'تم إرسال الرسالة بنجاح!');
})->name('contact.send');



