<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BrandingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\MissionAndVisionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/who-we-are', [HomeController::class, 'whoWeAre'])->name('who-we-are');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/services/{slug}', [HomeController::class, 'serviceDetails'])->name('service-details');
Route::get('/mission-and-vision', [HomeController::class, 'missionAndVision'])->name('mission-and-vision');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes - Protected by admin middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/hero-section', [HeroSectionController::class, 'edit'])->name('hero-section.edit');
    Route::put('/hero-section', [HeroSectionController::class, 'update'])->name('hero-section.update');
    Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us.index');
    Route::put('/about-us', [AboutUsController::class, 'update'])->name('about-us.update');
    Route::get('/mission-vision', [MissionAndVisionController::class, 'index'])->name('mission-vision.index');
    Route::put('/mission-vision', [MissionAndVisionController::class, 'update'])->name('mission-vision.update');
    Route::resource('/services', ServiceController::class);
    Route::resource('/settings', SettingsController::class);
    Route::post('/settings/update-multiple', [SettingsController::class, 'updateMultiple'])->name('settings.update-multiple');

    // Branding Routes
    Route::get('/branding', [BrandingController::class, 'index'])->name('branding.index');
    Route::post('/branding/upload-logo', [BrandingController::class, 'uploadLogo'])->name('branding.upload-logo');
    Route::post('/branding/upload-favicon', [BrandingController::class, 'uploadFavicon'])->name('branding.upload-favicon');
    Route::delete('/branding/delete-logo', [BrandingController::class, 'deleteLogo'])->name('branding.delete-logo');
    Route::delete('/branding/delete-favicon', [BrandingController::class, 'deleteFavicon'])->name('branding.delete-favicon');
    Route::post('/branding/update-identity', [BrandingController::class, 'updateIdentity'])->name('branding.update-identity');

    // Symlink creation route
    Route::post('/storage-link', function () {
        try {
            $target = storage_path('app/public');
            $link = public_path('storage');

            // Check if link already exists
            if (file_exists($link) && is_link($link)) {
                return response()->json(['message' => 'Symlink already exists'], 200);
            }

            // Create symlink
            symlink($target, $link);

            return response()->json(['message' => 'Storage symlink created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    })->name('storage-link');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'bn'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

require __DIR__.'/auth.php';
