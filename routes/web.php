<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AppSettings;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\MealsController;
use App\Http\Controllers\Admin\MenuTypesController;
use App\Http\Controllers\Admin\CurrenciesController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\OffersController;
use App\Http\Controllers\Admin\GeneralSettingsController;

Route::prefix('admin')->group(function () {
    Route::get('login', [\App\Http\Controllers\Auth\AuthController::class, 'index'])->name('admin.login');
    Route::post('post-login', [\App\Http\Controllers\Auth\AuthController::class, 'postLogin'])->name('login.post');
    Route::get('registration', [\App\Http\Controllers\Auth\AuthController::class, 'registration'])->name('register');
    Route::post('post-registration', [\App\Http\Controllers\Auth\AuthController::class, 'postRegistration'])->name('register.post'); 
    Route::get('dashboard', [\App\Http\Controllers\Auth\AuthController::class, 'dashboard'])->name('dashboard'); 
    Route::get('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout'); 
    Route::post('hash-password', [\App\Http\Controllers\Auth\AuthController::class, 'hashPassword']);
    Route::get('settings', [\App\Http\Controllers\Admin\AppSettings::class, 'index'])->name('admin.settings'); 
        //settings
    Route::post('role-store', [\App\Http\Controllers\Admin\RolesController::class, 'store'])->name('admin.role.store');
    Route::post('meals-store', [\App\Http\Controllers\Admin\MealsController::class, 'store'])->name('admin.meals.store');
    Route::post('menu-type-store', [\App\Http\Controllers\Admin\MenuTypesController::class, 'store'])->name('admin.menutype.store');

    Route::post('slider-type-store', [\App\Http\Controllers\Admin\SliderTypesController::class, 'store'])->name('admin.slidertype.store');
    Route::post('tour-type-store', [\App\Http\Controllers\Admin\TourTypesController::class, 'store'])->name('admin.tourtype.store');
    Route::post('tabs-store', [\App\Http\Controllers\Admin\TagsController::class, 'store'])->name('admin.tags.store');

    Route::post('currencies-store', [\App\Http\Controllers\Admin\CurrenciesController::class, 'store'])->name('admin.currencies.store');
    Route::post('activity-store', [\App\Http\Controllers\Admin\ActivityController::class, 'store'])->name('admin.activity.store');
    Route::post('offer-store', [\App\Http\Controllers\Admin\OffersController::class, 'store'])->name('admin.offer.store');

    Route::post('update-logo', [\App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateLogo'])->name('admin.logo.update');
    Route::post('update-general-setting', [\App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateOtherDetails'])->name('admin.generalsetting.update');

    //Menus
    Route::get('/menus/{encry_menu_type_id}', [\App\Http\Controllers\Admin\MenusController::class, 'menus_list'])->name('menus.list');
    Route::post('/menus-store', [\App\Http\Controllers\Admin\MenusController::class, 'store'])->name('menus.store');
    
    //Sliders
    Route::get('/sliders/{encry_slider_type_id}', [\App\Http\Controllers\Admin\SlidersController::class, 'list'])->name('sliders.list');
    Route::post('/sliders-store', [\App\Http\Controllers\Admin\SlidersController::class, 'store'])->name('sliders.store');
    Route::post('/slider-delete', [\App\Http\Controllers\Admin\SlidersController::class, 'delete'])->name('slider.delete');
    Route::post('/slider-edit', [\App\Http\Controllers\Admin\SlidersController::class, 'edit'])->name('slider.edit');


    //hotels
    Route::get('/hotel-list', [\App\Http\Controllers\Admin\HotelsController::class, 'list'])->name('hotel.list');
    Route::post('/hotel-store', [\App\Http\Controllers\Admin\HotelsController::class, 'store'])->name('hotels.store');
    Route::post('/hotel-delete', [\App\Http\Controllers\Admin\HotelsController::class, 'delete'])->name('hotel.delete');
    Route::post('/hotel-edit', [\App\Http\Controllers\Admin\HotelsController::class, 'edit'])->name('hotel.edit');

    //testimonials
    Route::get('/testimonial-list', [\App\Http\Controllers\Admin\TestimonialsController::class, 'list'])->name('testimonial.list');
    Route::post('/testimonial-store', [\App\Http\Controllers\Admin\TestimonialsController::class, 'store'])->name('testimonial.store');
    Route::post('/testimonial-delete', [\App\Http\Controllers\Admin\TestimonialsController::class, 'delete'])->name('testimonial.delete');
    Route::post('/testimonial-edit', [\App\Http\Controllers\Admin\TestimonialsController::class, 'edit'])->name('testimonial.edit');



});



    Route::get('users-list', [Admin\UsersController::class, 'list'])->name('users.list'); 
    Route::get('leads', [Admin\LeadsController::class, 'leads'])->name('leads'); 
    Route::get('sale-status', [Admin\Sales::class, 'sale-status'])->name('sale-status'); 
    Route::get('follow-up', [Admin\Sales::class, 'follow-up'])->name('follow-up'); 
    Route::get('upgrade', [Admin\Sales::class, 'upgrade'])->name('upgrade'); 
    Route::get('docusign', [Admin\Sales::class, 'docusign'])->name('docusign'); 
    Route::get('invoice', [Admin\Sales::class, 'invoice'])->name('invoice'); 
    Route::get('feedbacks', [Admin\Sales::class, 'feedbacks'])->name('feedbacks'); 
    Route::get('reports', [Admin\Sales::class, 'reports'])->name('reports'); 
    Route::get('subscription', [Admin\Sales::class, 'subscription'])->name('subscription'); 













// Route::middleware([Admin\'auth'])->group(function () {
    
// });



