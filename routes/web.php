<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\userController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeliveryFileController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\RoleMiddleware;




Route::get('/team', [FreelancerController::class, 'goFreelancerLogin'])->name('team');
Route::get('/admin', [AdminController::class, 'goAdminLogin'])->name('admin');
Route::get('/{locale?}', [CustomerController::class, 'homePage'])->name('homepage');
Route::post('/import-data', [OrderController::class, 'importData'])->name('import-data');
Route::post('/upload', [OrderController::class, 'fileUpload'])->name('upload');
Route::get('/multi-download/{id}', [OrderController::class, 'multiple'])->name('multi-download');

// admin Route
Route::middleware([LoginMiddleware::class . ':admin'])->prefix('{locale}/admin')->group(function () {
    Route::get('/login', [AdminController::class, 'adminloginpage'])->name('admin-login');
    Route::post('/signin', [AdminController::class, 'adminLogin'])->name('admin-signin');
});
Route::middleware([RoleMiddleware::class . ':admin'])->prefix('{locale}/admin')->group(function () {
    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin-logout');
    Route::get('/admin-view-orders', [AdminController::class, 'AdminviewOrders']);
    Route::get('/order-details/{id}', [AdminController::class, 'orderDetails']);
    Route::get('/change-password', [AdminController::class, 'changePassword']);
    Route::post('/update-password', [AdminController::class, 'updatePassword']);
    Route::get('/profile', [AdminController::class, 'adminProfile']);
    Route::get('/get-differences/{id}', [AdminController::class, 'getDifferences']);
    Route::post('/accept-change/{id}', [AdminController::class, 'acceptChangeRequest']);
    Route::post('/decline-change/{id}', [AdminController::class, 'declineChangeRequest']);
    Route::get('/customer-list', [AdminController::class, 'CustomerList'])->name('admin-customer-list');
    Route::get('/get-customer-profile', [AdminController::class, 'GetCustomerProfile'])->name('admin-get-customer-profile');
    Route::post('/change-profile', [AdminController::class, 'ChangeProfile'])->name('admin-change-profile');
    Route::post('/add-customer', [AdminController::class, 'AddCustomer'])->name('admin-add-customer');
});

//customer route
Route::middleware([LoginMiddleware::class . ':customer'])->prefix('{locale}/customer')->group(function () {
    Route::get('/login', [CustomerController::class, 'login'])->name('customer-login');
    Route::post('/customer-login', [CustomerController::class, 'customerLogin']);
    Route::get('/registration', [CustomerController::class, 'registration']);
    Route::post('/customer-registration', [CustomerController::class, 'customerRegistration']);
    Route::get('/setpassword/{id}', [CustomerController::class, 'setEmployerPassword']);
    Route::post('/employer-password-update', [CustomerController::class, 'EmployerPasswordUpdate']);
});

Route::middleware([RoleMiddleware::class . ':customer'])->prefix('{locale}/customer')->group(function () {
    Route::get('/logout', [CustomerController::class, 'customerLogout']);
    Route::get('/view-orders', [OrderController::class, 'viewOrder'])->name('customer-vieworders');
    Route::get('/order_detail', [OrderController::class, 'OrderDetail'])->name('customer-order_detail');
    Route::get('/order_change', [OrderController::class, 'OrderChange'])->name('customer-order_change');
    Route::post('/toggle-status', [OrderController::class, 'toggle_status'])->name('customer-toggle-status');
    Route::get('/order-details/{id}', [OrderController::class, 'orderDetails']);
    Route::get('/get-order-detail', [OrderController::class, 'getOrderDetail'])->name('customer-get-order-detail');
    Route::post('/order-file-index-change', [OrderController::class, 'changeOrderIndex'])->name('customer-order-file-index-change');
    Route::post('/orderfile-information', [OrderController::class, 'getOrderFileInformation'])->name('customer-orderfile-information');
    Route::get('/dashboard-table1', [OrderController::class, 'DashboardTable1'])->name('customer-dashboard-table1');
    Route::get('/dashboard-table2', [OrderController::class, 'DashboardTable2'])->name('customer-dashboard-table2');

    Route::get('/profile', [CustomerController::class, 'CustomerProfile']);
    Route::post('/profile-update', [CustomerController::class, 'profileUpdate']);


    Route::get('/embroidery-information', [OrderController::class, 'EmbroideryInformation'])->name('embroidery-information')->withoutMiddleware([RoleMiddleware::class . ':customer']);
    Route::get('/embroidery-price', [OrderController::class, 'EmbroideryPrice'])->name('embroidery-price')->withoutMiddleware([RoleMiddleware::class . ':customer']);
    Route::get('/vector-information', [OrderController::class, 'VectorInformation'])->name('vector-information')->withoutMiddleware([RoleMiddleware::class . ':customer']);
    Route::get('/vector-price', [OrderController::class, 'VectorPrice'])->name('vector-price')->withoutMiddleware([RoleMiddleware::class . ':customer']);

    Route::post('embroidery-order/save', [OrderController::class, 'embroideryOrderSave'])->name('embroidery-order/save');
    Route::post('embroidery-order/submit', [OrderController::class, 'embroideryOrderSumit'])->name('embroidery-order/submit');

    Route::get("embroidery-order/delete/{id}", [OrderController::class, 'embroidery_orderDelete'])->name('embroidery-order/delete/{id}');
    Route::get("embroidery-order/edit/{id}", [OrderController::class, 'display_embDetails'])->name('embroidery-order/edit/{id}');
    Route::post("updated-embroidery-order", [OrderController::class, 'updated_embroidery']);

    Route::get('/change-password', [CustomerController::class, 'changePassword']);
    Route::POST('/update-password', [CustomerController::class, 'updatePassword'])->name('update-password');

    Route::post('/vector-order/submit', [OrderController::class, 'vectorOrderSumit'])->name('vector-order-submit');

    Route::get("vector-order/delete/{id}", [OrderController::class, 'vector_orderDelete'])->name('vector-order/delete/{id}');
    Route::get("vector-order/edit/{id}", [OrderController::class, 'display_vectorDetails'])->name('vector-order/edit/{id}');
    Route::post("updated-vector-order", [OrderController::class, 'updated_vector'])->name('updated-vector-order');

    Route::post('/vec-delete-file', [OrderController::class, 'vectordeleteFile'])->name('vec-delete-file');
    Route::post('/emb-delete-file', [OrderController::class, 'embdeleteFile'])->name('emb-delete-file');

    Route::get('/files/{id}', [CustomerController::class, 'files']);
    Route::get('invite-employee', [CustomerController::class, 'InviteEmployeeView'])->name('invite-employee');
    Route::post('/send-invite', [CustomerController::class, 'sendInvite'])->name('send-invite');
    Route::get('/listEmployees', [CustomerController::class, 'listEmployees']);
    Route::Post('/add-employee', [CustomerController::class, 'addEmployee'])->name('employer-addemployee');
    Route::get('/get-employee/{id}', [CustomerController::class, 'getEmployee'])->name('employer-getemployee');
    Route::get('/edit-employee/{id}', [CustomerController::class, 'editEmployee']);
    Route::Post('/update-employee', [CustomerController::class, 'updateEmployee']);
    Route::delete('/deleteemployee/{id}', [CustomerController::class, 'deleteEmployee']);
    Route::get('/employee-profile', [CustomerController::class, 'EmployeeProfile']);
    Route::get('/employee-staffs-table', [CustomerController::class, 'EmployeeTable'])->name('employee-staffs-table');
});


// freelancer route
Route::middleware([LoginMiddleware::class . ':freelancer'])->prefix('{locale}/freelancer')->group(function () {
    Route::get('/login', [FreelancerController::class, 'freelancerloginpage'])->name('freelancer-login');
    Route::post('/signin', [FreelancerController::class, 'freelancerLogin'])->name('freelancer-signin');
});

Route::middleware([RoleMiddleware::class . ':freelancer'])->prefix('{locale}/freelancer')->group(function () {
    Route::get('/logout', [FreelancerController::class, 'freelancerLogout'])->name('freelancer-logout');
    Route::get('/view-orders', [FreelancerController::class, 'viewOrder'])->name('freelancer-vieworders');
    Route::get('/order-details/{id}', [FreelancerController::class, 'orderDetails']);
    Route::POST('/downloadFile', [FreelancerController::class, 'downloadAddressFIle']);
    Route::get('/upload-file', [FreelancerController::class, 'UploadFile']);
    Route::POST('/download', [FreelancerController::class, 'downloadFile']);
    Route::POST('/files', [FreelancerController::class, 'checkFiles']);
    // delivery Files
    Route::get('/upload-files/{id}', [DeliveryFileController::class, 'DeliveryPage']);
    Route::POST('/upload-delivery-files', [DeliveryFileController::class, 'UploadDeliveryFiles']);


    Route::get('/profile', [FreelancerController::class, 'freelancerProfile']);
    Route::POST('/profile-update', [FreelancerController::class, 'Profileupdate']);
    Route::get('/change-password', [FreelancerController::class, 'changePassword']);
    Route::POST('/change-password-update', [FreelancerController::class, 'updatePassword']);
    Route::get('/deletefiles/{id}/{orderid}/', [FreelancerController::class, 'DeleteFile']);
    Route::get('/filter-data', [FreelancerController::class, 'filtersData']);

    Route::get('/embroidery-freelancer-green', [FreelancerController::class, 'EmbroideryFreelancerGreenTable'])->name('embroidery-freelancer-green');
    Route::get('/embroidery-freelancer-yellow', [FreelancerController::class, 'EmbroideryFreelancerYellowTable'])->name('embroidery-freelancer-yellow');
    Route::get('/embroidery-freelancer-red', [FreelancerController::class, 'EmbroideryFreelancerRedTable'])->name('embroidery-freelancer-red');
    Route::get('/embroidery-freelancer-blue', [FreelancerController::class, 'EmbroideryFreelancerBlueTable'])->name('embroidery-freelancer-blue');
    Route::get('/embroidery-freelancer-all', [FreelancerController::class, 'EmbroideryFreelancerAllTable'])->name('embroidery-freelancer-all');
    Route::get('/embroidery-freelancer-green-dashboard', [FreelancerController::class, 'EmbroideryFreelancerGreenDashboardTable'])->name('embroidery-freelancer-green-dashboard');
    Route::get('/embroidery-freelancer-yellow-dashboard', [FreelancerController::class, 'EmbroideryFreelancerYellowDashboardTable'])->name('embroidery-freelancer-yellow-dashboard');
    Route::get('/embroidery-freelancer-red-dashboard', [FreelancerController::class, 'EmbroideryFreelancerRedDashboardTable'])->name('embroidery-freelancer-red-dashboard');
    Route::get('/embroidery-freelancer-blue-dashboard', [FreelancerController::class, 'EmbroideryFreelancerBlueDashboardTable'])->name('embroidery-freelancer-blue-dashboard');

    Route::get('/vector-freelancer-green', [FreelancerController::class, 'VectorFreelancerGreenTable'])->name('vector-freelancer-green');
    Route::get('/vector-freelancer-yellow', [FreelancerController::class, 'VectorFreelancerYellowTable'])->name('vector-freelancer-yellow');
    Route::get('/vector-freelancer-red', [FreelancerController::class, 'VectorFreelancerRedTable'])->name('vector-freelancer-red');
    Route::get('/vector-freelancer-blue', [FreelancerController::class, 'VectorFreelancerBlueTable'])->name('vector-freelancer-blue');
    Route::get('/vector-freelancer-all', [FreelancerController::class, 'VectorFreelancerAllTable'])->name('vector-freelancer-all');
    Route::get('/vector-freelancer-green-dashboard', [FreelancerController::class, 'VectorFreelancerGreenDashboardTable'])->name('vector-freelancer-green-dashboard');
    Route::get('/vector-freelancer-yellow-dashboard', [FreelancerController::class, 'VectorFreelancerYellowDashboardTable'])->name('vector-freelancer-yellow-dashboard');
    Route::get('/vector-freelancer-red-dashboard', [FreelancerController::class, 'VectorFreelancerRedDashboardTable'])->name('vector-freelancer-red-dashboard');
    Route::get('/vector-freelancer-blue-dashboard', [FreelancerController::class, 'VectorFreelancerBlueDashboardTable'])->name('vector-freelancer-blue-dashboard');

});