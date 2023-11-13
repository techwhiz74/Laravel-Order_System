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
Route::post('/upload-change', [OrderController::class, 'fileUploadChange'])->name('upload-change');
Route::post('/freelancer-job-upload', [FreelancerController::class, 'JobFileUpload'])->name('freelancer-job-upload');
Route::post('/embroidery-upload', [FreelancerController::class, 'EmbroideryFileUpload'])->name('embroidery-upload');
Route::post('/vector-upload', [FreelancerController::class, 'VectorFileUpload'])->name('vector-upload');
Route::post('/admin-upload', [AdminController::class, 'adminFileUpload'])->name('admin-upload');
Route::post('/admin-job-upload', [AdminController::class, 'JobFileUpload'])->name('admin-job-upload');
Route::post('/admin-change-upload', [AdminController::class, 'ChangeFileUpload'])->name('admin-change-upload');
Route::get('/multi-download/{id}', [OrderController::class, 'multiple'])->name('multi-download');

// admin Route
Route::middleware([LoginMiddleware::class . ':admin'])->prefix('{locale}/admin')->group(function () {
    Route::get('/login', [AdminController::class, 'adminloginpage'])->name('admin-login');
    Route::get('/signin', [AdminController::class, 'adminLogin'])->name('admin-signin');
});
Route::middleware([RoleMiddleware::class . ':admin'])->prefix('{locale}/admin')->group(function () {
    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin-logout');
    Route::get('/admin-view-orders', [AdminController::class, 'AdminviewOrders']);
    Route::get('/order-details/{id}', [AdminController::class, 'orderDetails']);
    Route::get('/change-password', [AdminController::class, 'changePassword']);
    Route::post('/update-password', [AdminController::class, 'updatePassword']);
    Route::get('/profile', [AdminController::class, 'adminProfile']);
    Route::get('/get-differences/{id}', [AdminController::class, 'getDifferences']);
    Route::post('/accept-change', [AdminController::class, 'acceptChangeRequest']);
    Route::post('/decline-change/{id}', [AdminController::class, 'declineChangeRequest']);
    Route::get('/customer-list', [AdminController::class, 'CustomerList'])->name('admin-customer-list');
    Route::get('/customer-search', [AdminController::class, 'CustomerList'])->name('admin-customer-search');
    Route::get('/get-customer-profile', [AdminController::class, 'GetCustomerProfile'])->name('admin-get-customer-profile');
    Route::post('/change-profile', [AdminController::class, 'ChangeProfile'])->name('admin-change-profile');
    Route::post('/add-customer', [AdminController::class, 'AddCustomer'])->name('admin-add-customer');
    Route::get('/customer-search-table', [AdminController::class, 'CustomerSearchTable'])->name('admin-customer-search-table');
    Route::get('/customer-searched-result', [AdminController::class, 'CustomerSearchResult'])->name('admin-customer-searched-result');
    Route::post('/confirm-profile', [AdminController::class, 'ConfirmProfile'])->name('admin-confirm-profile');
    Route::post('/decline-profile', [AdminController::class, 'DeclineProfile'])->name('admin-decline-profile');
    Route::get('/parameter-em-table', [AdminController::class, 'EmParameterTable'])->name('admin-parameter-em-table');
    Route::get('/parameter-ve-table', [AdminController::class, 'VeParameterTable'])->name('admin-parameter-ve-table');
    Route::get('/parameter-em', [AdminController::class, 'EmParameter'])->name('admin-parameter-em');
    Route::get('/parameter-ve', [AdminController::class, 'VeParameter'])->name('admin-parameter-ve');
    Route::get('/green-table', [AdminController::class, 'AdminGreenTable'])->name('admin-green-table');
    Route::get('/yellow-table', [AdminController::class, 'AdminYellowTable'])->name('admin-yellow-table');
    Route::get('/red-table', [AdminController::class, 'AdminRedTable'])->name('admin-red-table');
    Route::get('/blue-table', [AdminController::class, 'AdminBlueTable'])->name('admin-blue-table');
    Route::get('/all-table', [AdminController::class, 'AdminAllTable'])->name('admin-all-table');
    Route::get('/get-order-detail', [FreelancerController::class, 'FreelancergetOrderDetail'])->name('admin-get-order-detail');
    Route::get('/order-detail', [FreelancerController::class, 'FreelancerOrderDetail'])->name('admin-order-detail');
    Route::get('/parameter', [FreelancerController::class, 'Parameter'])->name('admin-parameter');
    Route::get('/startjob', [FreelancerController::class, 'StartJob'])->name('admin-startjob');
    Route::get('/endjob', [FreelancerController::class, 'EndJob'])->name('admin-endjob');
    Route::get('/get-request-detail', [FreelancerController::class, 'getRequestDetail'])->name('admin-get-request-detail');
    Route::get('/change-parameter', [FreelancerController::class, 'Parameter'])->name('admin-change-parameter');
    Route::get('/change-order_detail', [FreelancerController::class, 'OrderDetail'])->name('admin-change-order_detail');
    Route::get('/endchange', [AdminController::class, 'EndChange'])->name('admin-endchange');
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
    Route::get('/req-order_detail', [OrderController::class, 'OrderDetail'])->name('req-customer-order_detail');
    Route::get('/order_change', [OrderController::class, 'OrderChange'])->name('customer-order_change');
    Route::post('/order-change-text', [OrderController::class, 'OrderChangeText'])->name('customer-order-change-text');
    Route::get('/order_request/{id}', [OrderController::class, 'OrderRequest'])->name('customer-order_request');
    Route::post('/order_delete', [OrderController::class, 'DeleteOrder'])->name('customer-order_delete');
    Route::post('/toggle-status', [OrderController::class, 'toggle_status'])->name('customer-toggle-status');
    // Route::get('/order-details/{id}', [OrderController::class, 'orderDetails']);
    Route::get('/get-order-detail', [OrderController::class, 'getOrderDetail'])->name('customer-get-order-detail');
    Route::get('/req-get-order-detail', [OrderController::class, 'getOrderDetail'])->name('req-customer-get-order-detail');
    Route::post('/order-file-index-change', [OrderController::class, 'changeOrderIndex'])->name('customer-order-file-index-change');
    Route::post('/orderfile-information', [OrderController::class, 'getOrderFileInformation'])->name('customer-orderfile-information');
    Route::get('/dashboard-green-table', [OrderController::class, 'DashboardGreenTable'])->name('customer-dashboard-green-table');
    Route::get('/dashboard-red-table', [OrderController::class, 'DashboardRedTable'])->name('customer-dashboard-red-table');
    Route::get('/dashboard-yellow-table', [OrderController::class, 'DashboardYellowTable'])->name('customer-dashboard-yellow-table');
    Route::get('/dashboard-blue-table', [OrderController::class, 'DashboardBlueTable'])->name('customer-dashboard-blue-table');

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
    Route::get('/free-order-detail', [FreelancerController::class, 'FreelancerOrderDetail'])->name('freelancer-order-detail');
    Route::get('/free-get-order-detail', [FreelancerController::class, 'FreelancergetOrderDetail'])->name('freelancer-get-order-detail');


    Route::get('/profile', [FreelancerController::class, 'freelancerProfile']);
    Route::POST('/profile-update', [FreelancerController::class, 'Profileupdate']);
    Route::get('/change-password', [FreelancerController::class, 'changePassword']);
    Route::POST('/change-password-update', [FreelancerController::class, 'updatePassword']);
    Route::get('/deletefiles/{id}', [FreelancerController::class, 'DeleteFile']);
    Route::get('/filter-data', [FreelancerController::class, 'filtersData']);
    Route::get('/parameter', [FreelancerController::class, 'Parameter'])->name('freelancer-parameter');
    Route::get('/embroidery-parameter', [FreelancerController::class, 'Parameter'])->name('freelancer-embroidery-parameter');
    Route::get('/vector-parameter', [FreelancerController::class, 'Parameter'])->name('freelancer-vector-parameter');

    Route::get('/embroidery-freelancer-green', [FreelancerController::class, 'EmbroideryFreelancerGreenTable'])->name('embroidery-freelancer-green');
    Route::get('/embroidery-freelancer-yellow', [FreelancerController::class, 'EmbroideryFreelancerYellowTable'])->name('embroidery-freelancer-yellow');
    Route::get('/embroidery-freelancer-red', [FreelancerController::class, 'EmbroideryFreelancerRedTable'])->name('embroidery-freelancer-red');
    Route::get('/embroidery-freelancer-blue', [FreelancerController::class, 'EmbroideryFreelancerBlueTable'])->name('embroidery-freelancer-blue');
    Route::get('/embroidery-freelancer-all', [FreelancerController::class, 'EmbroideryFreelancerAllTable'])->name('embroidery-freelancer-all');
    Route::get('/embroidery-freelancer-green-dashboard', [FreelancerController::class, 'EmbroideryFreelancerGreenDashboardTable'])->name('embroidery-freelancer-green-dashboard');
    Route::get('/embroidery-freelancer-yellow-dashboard', [FreelancerController::class, 'EmbroideryFreelancerYellowDashboardTable'])->name('embroidery-freelancer-yellow-dashboard');
    Route::get('/embroidery-freelancer-red-dashboard', [FreelancerController::class, 'EmbroideryFreelancerRedDashboardTable'])->name('embroidery-freelancer-red-dashboard');
    Route::get('/embroidery-freelancer-blue-dashboard', [FreelancerController::class, 'EmbroideryFreelancerBlueDashboardTable'])->name('embroidery-freelancer-blue-dashboard');
    Route::get('/embroidery-freelancer-get-request-detail', [FreelancerController::class, 'getRequestDetail'])->name('embroidery-freelancer-get-request-detail');
    Route::get('/embroidery-freelancer-order_detail', [FreelancerController::class, 'OrderDetail'])->name('embroidery-freelancer-order_detail');
    Route::get('/embroidery-freelancer-startjob', [FreelancerController::class, 'StartJob'])->name('embroidery-freelancer-startjob');
    Route::get('/embroidery-freelancer-endjob', [FreelancerController::class, 'EndJob'])->name('embroidery-freelancer-endjob');
    Route::get('/embroidery-freelancer-endchange', [FreelancerController::class, 'EmbroideryEndChange'])->name('embroidery-freelancer-endchange');

    Route::get('/vector-freelancer-green', [FreelancerController::class, 'VectorFreelancerGreenTable'])->name('vector-freelancer-green');
    Route::get('/vector-freelancer-yellow', [FreelancerController::class, 'VectorFreelancerYellowTable'])->name('vector-freelancer-yellow');
    Route::get('/vector-freelancer-red', [FreelancerController::class, 'VectorFreelancerRedTable'])->name('vector-freelancer-red');
    Route::get('/vector-freelancer-blue', [FreelancerController::class, 'VectorFreelancerBlueTable'])->name('vector-freelancer-blue');
    Route::get('/vector-freelancer-all', [FreelancerController::class, 'VectorFreelancerAllTable'])->name('vector-freelancer-all');
    Route::get('/vector-freelancer-green-dashboard', [FreelancerController::class, 'VectorFreelancerGreenDashboardTable'])->name('vector-freelancer-green-dashboard');
    Route::get('/vector-freelancer-yellow-dashboard', [FreelancerController::class, 'VectorFreelancerYellowDashboardTable'])->name('vector-freelancer-yellow-dashboard');
    Route::get('/vector-freelancer-red-dashboard', [FreelancerController::class, 'VectorFreelancerRedDashboardTable'])->name('vector-freelancer-red-dashboard');
    Route::get('/vector-freelancer-blue-dashboard', [FreelancerController::class, 'VectorFreelancerBlueDashboardTable'])->name('vector-freelancer-blue-dashboard');
    Route::get('/vector-freelancer-get-request-detail', [FreelancerController::class, 'getRequestDetail'])->name('vector-freelancer-get-request-detail');
    Route::get('/vector-freelancer-order_detail', [FreelancerController::class, 'OrderDetail'])->name('vector-freelancer-order_detail');
    Route::get('/vector-freelancer-endchange', [FreelancerController::class, 'VectorEndChange'])->name('vector-freelancer-endchange');
});