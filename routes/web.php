<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AppSettings;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\MealsController;
use App\Http\Controllers\Admin\MenuTypesController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\OffersController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\PagesController;

use App\Http\Controllers\Admin\TestimonialssController;
use App\Models\Pages;


    Route::get('/', [\App\Http\Controllers\Page::class, 'index'])->name('home');

    $pageSlugs = Pages::getAllSlugs(); // Fetch all slugs from PagesModel
    foreach ($pageSlugs as $page) { 
        if(!empty($page->category_name) && $page->page_category != 1){
            $url = strtolower($page->category_name)."/".$page->page_slug; 
        } else {
            $url = $page->page_slug; 
        }
        //echo "<br>".$url;
        Route::get($url, [\App\Http\Controllers\Page::class, 'show'])->name($page->page_slug);
    }


Route::prefix('admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\AuthController::class, 'index'])->name('admin.login');
    Route::post('/post-login', [\App\Http\Controllers\Auth\AuthController::class, 'postLogin'])->name('login.post');
    Route::get('/registration', [\App\Http\Controllers\Auth\AuthController::class, 'registration'])->name('register');
    Route::post('/post-registration', [\App\Http\Controllers\Auth\AuthController::class, 'postRegistration'])->name('register.post'); 
    Route::get('/dashboard', [\App\Http\Controllers\Auth\AuthController::class, 'dashboard'])->name('dashboard'); 
    Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout'); 
    Route::post('/hash-password', [\App\Http\Controllers\Auth\AuthController::class, 'hashPassword']);
    Route::get('/settings', [\App\Http\Controllers\Admin\AppSettings::class, 'index'])->name('admin.settings'); 
        //settings
    Route::post('/role-store', [\App\Http\Controllers\Admin\RolesController::class, 'store'])->name('admin.role.store');
    Route::get('/role-edit', [\App\Http\Controllers\Admin\RolesController::class, 'edit'])->name('admin.role.edit');
    Route::post('/role-update', [\App\Http\Controllers\Admin\RolesController::class, 'update'])->name('admin.role.update');
    Route::post('/role-delete', [\App\Http\Controllers\Admin\RolesController::class, 'delete'])->name('admin.role.delete');

    Route::post('/meals-store', [\App\Http\Controllers\Admin\MealsController::class, 'store'])->name('admin.meals.store');
    Route::get('/meals-edit', [\App\Http\Controllers\Admin\MealsController::class, 'edit'])->name('admin.meals.edit');
    Route::post('/meals-update', [\App\Http\Controllers\Admin\MealsController::class, 'update'])->name('admin.meals.update');
    Route::post('/meals-delete', [\App\Http\Controllers\Admin\MealsController::class, 'delete'])->name('admin.meals.delete');


    Route::post('/menu-type-store', [\App\Http\Controllers\Admin\MenuTypesController::class, 'store'])->name('admin.menutype.store');
    Route::get('/menu-type-edit', [\App\Http\Controllers\Admin\MenuTypesController::class, 'edit'])->name('admin.menutype.edit');
    Route::post('/menu-type-update', [\App\Http\Controllers\Admin\MenuTypesController::class, 'update'])->name('admin.menutype.update');
    Route::post('/menu-type-delete', [\App\Http\Controllers\Admin\MenuTypesController::class, 'delete'])->name('admin.menutype.delete');

    Route::post('/slider-type-store', [\App\Http\Controllers\Admin\SliderTypesController::class, 'store'])->name('admin.slidertype.store');
    Route::get('/slider-type-edit', [\App\Http\Controllers\Admin\SliderTypesController::class, 'edit'])->name('admin.slidertype.edit');
    Route::post('/slider-type-update', [\App\Http\Controllers\Admin\SliderTypesController::class, 'update'])->name('admin.slidertype.update');
    Route::post('/slider-type-delete', [\App\Http\Controllers\Admin\SliderTypesController::class, 'delete'])->name('admin.slidertype.delete');


    Route::post('/tour-type-store', [\App\Http\Controllers\Admin\TourTypesController::class, 'store'])->name('admin.tourtype.store');
    Route::get('/tour-type-edit', [\App\Http\Controllers\Admin\TourTypesController::class, 'edit'])->name('admin.tourtype.edit');
    Route::post('/tour-type-update', [\App\Http\Controllers\Admin\TourTypesController::class, 'update'])->name('admin.tourType.update');
    Route::post('/tour-type-delete', [\App\Http\Controllers\Admin\TourTypesController::class, 'delete'])->name('admin.tourtype.delete');



    Route::post('/tabs-store', [\App\Http\Controllers\Admin\TagsController::class, 'store'])->name('admin.tags.store');
    Route::get('/tabs-edit', [\App\Http\Controllers\Admin\TagsController::class, 'edit'])->name('admin.tags.edit');
    Route::post('/tabs-update', [\App\Http\Controllers\Admin\TagsController::class, 'update'])->name('admin.tags.update');
    Route::post('/tabs-delete', [\App\Http\Controllers\Admin\TagsController::class, 'delete'])->name('admin.tags.delete');


    Route::post('/activity-store', [\App\Http\Controllers\Admin\ActivityController::class, 'store'])->name('admin.activity.store');
    Route::get('/activity-edit', [\App\Http\Controllers\Admin\ActivityController::class, 'edit'])->name('admin.activity.edit');
    Route::post('/activity-update', [\App\Http\Controllers\Admin\ActivityController::class, 'update'])->name('admin.activity.update');
    Route::post('/activity-delete', [\App\Http\Controllers\Admin\ActivityController::class, 'delete'])->name('admin.activity.delete');




    Route::post('/offer-store', [\App\Http\Controllers\Admin\OffersController::class, 'store'])->name('admin.offer.store');
    Route::get('/offer-edit', [\App\Http\Controllers\Admin\OffersController::class, 'edit'])->name('admin.offer.edit');
    Route::post('/offer-update', [\App\Http\Controllers\Admin\OffersController::class, 'update'])->name('admin.offer.update');
    Route::post('/offer-delete', [\App\Http\Controllers\Admin\OffersController::class, 'delete'])->name('admin.offer.delete');


    Route::post('/update-logo', [\App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateLogo'])->name('admin.logo.update');
   


    Route::post('/update-general-setting', [\App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateOtherDetails'])->name('admin.generalsetting.update');

    //Menus
    Route::get('/menus/{encry_menu_type_id}', [\App\Http\Controllers\Admin\MenusController::class, 'menus_list'])->name('menus.list');
    Route::post('/menus-store', [\App\Http\Controllers\Admin\MenusController::class, 'store'])->name('menus.store');
    Route::get('/menu-edit/{encrypt_menu_id}/{menu_type_id}', [\App\Http\Controllers\Admin\MenusController::class, 'edit'])->name('menu.edit');
    Route::post('/menu-update', [\App\Http\Controllers\Admin\MenusController::class, 'update'])->name('menu.update');
    Route::post('/menu-delete', [\App\Http\Controllers\Admin\MenusController::class, 'delete'])->name('menu.delete');

    
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

    //pages
    Route::get('/page-list', [\App\Http\Controllers\Admin\PagesController::class, 'list'])->name('page.list');
    Route::get('/page-add', [\App\Http\Controllers\Admin\PagesController::class, 'add'])->name('page.add');
    Route::post('/page-store', [\App\Http\Controllers\Admin\PagesController::class, 'store'])->name('page.store');
    Route::get('/page-edit/{page_id}', [\App\Http\Controllers\Admin\PagesController::class, 'edit'])->name('page.edit');
    Route::post('/page-update', [\App\Http\Controllers\Admin\PagesController::class, 'update'])->name('page.update');
    Route::post('/page-delete', [\App\Http\Controllers\Admin\PagesController::class, 'delete'])->name('page.delete');

    //tours
    Route::get('/tour-list', [\App\Http\Controllers\Admin\TourController::class, 'list'])->name('tour.list');
    Route::get('/tour-add', [\App\Http\Controllers\Admin\TourController::class, 'add'])->name('tour.add');
    Route::post('/tour-store', [\App\Http\Controllers\Admin\TourController::class, 'store'])->name('tour.store');
    Route::post('/requiredfields-store', [\App\Http\Controllers\Admin\TourController::class, 'requiredfields_store'])->name('requiredfields.store');
    Route::post('/requiredfields-update', [\App\Http\Controllers\Admin\TourController::class, 'requiredfields_update'])->name('requiredfields.update');
    Route::post('/optionalfields-update', [\App\Http\Controllers\Admin\TourController::class, 'optionalfields_update'])->name('optionalfields.update');
    Route::post('/metafields-update', [\App\Http\Controllers\Admin\TourController::class, 'metafields_update'])->name('metafields.update');
    Route::post('/categoryfields-update', [\App\Http\Controllers\Admin\TourController::class, 'categoryfields_update'])->name('categoryfields.update');
    Route::post('/itineraryfields-update', [\App\Http\Controllers\Admin\TourController::class, 'itineraryfields_update'])->name('itineraryfields.update');
    Route::post('/hotelfields-update', [\App\Http\Controllers\Admin\TourController::class, 'hotelfields_update'])->name('hotelfields.update');
    Route::post('/imagefields-update', [\App\Http\Controllers\Admin\TourController::class, 'imagefields_update'])->name('imagefields.update');
    Route::post('/imagefields-delete', [\App\Http\Controllers\Admin\TourController::class, 'imagefields_delete'])->name('imagefields.delete');    

    Route::get('/tour-edit/{tour_id}', [\App\Http\Controllers\Admin\TourController::class, 'edit'])->name('tour.edit');

    Route::post('/tour-update', [\App\Http\Controllers\Admin\TourController::class, 'update'])->name('tour.update');
    Route::post('/tour-delete', [\App\Http\Controllers\Admin\TourController::class, 'delete'])->name('tour.delete');

    //Tour Category
    Route::get('/tourcategory-list', [\App\Http\Controllers\Admin\TourCategoryController::class, 'list'])->name('tourcategory.list');
    Route::get('/tourcategory-add', [\App\Http\Controllers\Admin\TourCategoryController::class, 'add'])->name('tourcategory.add');
    Route::post('/tourcategory-store', [\App\Http\Controllers\Admin\TourCategoryController::class, 'store'])->name('tourcategory.store');
    Route::get('/tourcategory-edit/{tourcategory_id}', [\App\Http\Controllers\Admin\TourCategoryController::class, 'edit'])->name('tourcategory.edit');
    Route::post('/tourcategory-update', [\App\Http\Controllers\Admin\TourCategoryController::class, 'update'])->name('tourcategory.update');
    Route::post('/tourcategory-delete', [\App\Http\Controllers\Admin\TourCategoryController::class, 'delete'])->name('tourcategory.delete');
//users
    Route::get('/users-add', [\App\Http\Controllers\Admin\UsersController::class, 'add_view'])->name('user.add');
    Route::get('/users-edit/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'edit_view'])->name('user.edit');
    Route::get('/users-list', [\App\Http\Controllers\Admin\UsersController::class, 'list_view'])->name('user.list');
    Route::post('/users-store', [\App\Http\Controllers\Admin\UsersController::class, 'store'])->name('user.store');
    Route::post('/users-delete', [\App\Http\Controllers\Admin\UsersController::class, 'delete'])->name('user.delete');
    Route::post('users-update', [\App\Http\Controllers\Admin\UsersController::class, 'update'])->name('user.update');
});


Route::fallback(function () {
    return response()->view('404', [], 404);
});


