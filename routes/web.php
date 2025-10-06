<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/get-states/{country_id?}', [AdminController::class, 'getStates'])->name('getStates');
Route::get('/get-cities/{state_id?}', [AdminController::class, 'getCities'])->name('getCities');

//Admin Routes
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin/add-user', [AdminController::class, 'add_user_show'])->name('admin.add_user_show');
    Route::post('/admin/add-user', [AdminController::class, 'new_user_insert'])->name('admin.new_user_insert');
    //regional managers
    Route::get('/admin/users/all-regional-managers', [AdminController::class, 'get_all_regional_managers'])->name('admin.get_all_regional_managers');
    Route::get('/admin/users/all-regional-managers/update/{user_id?}', [AdminController::class, 'update_regional_manager_show'])->name('admin.update_regional_manager_show');
    Route::post('/admin/users/all-regional-managers/update/{user_id?}', [AdminController::class, 'update_user_details'])->name('admin.update_user_details');
    Route::get('/admin/users/all-regional-managers/delete/{user_id?}', [AdminController::class, 'delete_regional_manager'])->name('admin.delete_regional_manager');
    //staff members

    Route::get('/admin/users/all-staff-members', [AdminController::class, 'get_all_staff_members'])->name('admin.get_all_staff_members');
    Route::get('/admin/users/all-staff-members/update/{user_id?}', [AdminController::class, 'update_staff_member_show'])->name('admin.update_staff_member_show');
    Route::post('/admin/users/all-staff-members/update/{user_id?}', [AdminController::class, 'update_staff_member_details'])->name('admin.update_staff_member_details');
    Route::get('/admin/users/all-staff-members/delete/{user_id?}', [AdminController::class, 'delete_staff_member'])->name('admin.delete_staff_member');

    // Warehouse

    Route::get('/admin/warehouse/add-warehouse', [AdminController::class, 'add_warehouse_show'])->name('admin.add_warehouse_show');
    Route::post('/admin/warehouse/add-warehouse', [AdminController::class, 'new_warehouse_insert'])->name('admin.new_warehouse_insert');

    //products

    Route::get('/admin/products/all-categories', [AdminController::class, 'all_catgeory_show'])->name('admin.all_catgeory_show');
    Route::post('/admin/products/all-categories', [AdminController::class, 'new_product_category_insert'])->name('admin.new_product_category_insert');

    Route::get('/admin/products/all-products', [AdminController::class, 'all_products_show'])->name('admin.all_products_show');
    Route::get('/admin/products/add-products', [AdminController::class, 'add_product_show'])->name('admin.add_product_show');
    Route::post('/admin/products/add-products', [AdminController::class, 'new_product_insert'])->name('admin.new_product_insert');
    Route::get('/admin/products/update-products-details/basic/{id?}', [AdminController::class, 'update_product_details_show'])->name('admin.update_product_details_show');

    Route::get('/admin/products/update-products-details/gallery/{id?}', [AdminController::class, 'update_product_details_gallery_show'])->name('admin.update_product_details_gallery_show');
    Route::post('/admin/products/update-products-details/gallery/{id?}', [AdminController::class, 'update_product_gallery_images_videos'])->name('admin.update_product_gallery_images_videos');
    
    Route::get('/admin/products/update-products-details/price/{id?}', [AdminController::class, 'update_product_details_price_show'])->name('admin.update_product_details_price_show');
    Route::get('/admin/products/update-products-details/inventory/{id?}', [AdminController::class, 'update_product_details_inventory_show'])->name('admin.update_product_details_inventory_show');
    Route::get('/admin/products/update-products-details/faqs/{id?}', [AdminController::class, 'update_product_details_faqs_show'])->name('admin.update_product_details_faqs_show');


    




});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/dashboard', [DashboardController::class, 'staff'])->name('staff.dashboard');
});

Route::middleware(['auth', 'role:warehouse'])->group(function () {
    Route::get('/warehouse/dashboard', [DashboardController::class, 'warehouse'])->name('warehouse.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
});




require __DIR__.'/auth.php';
