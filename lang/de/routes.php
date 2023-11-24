<?php
return [
    // Customer Routes
    // 'redirect' => 'customer-login',
    'customer-login' => '/de/customer/login',
    'customer-signin' => '/de/customer/customer-login',
    'customer-register' => '/de/customer/registration',
    'customer-registration' => '/de/customer/customer-registration',
    'customerlogout' => '/de/customer/logout',

    'customerchange-password' => '/de/customer/change-password',
    'customerupdate-password' => '/de/customer/update-password',
    'customer-profile' => '/de/customer/profile',
    'customer-profileupdate' => '/de/customer/profile-update',
    'customer-profileupdate-mail' => '/de/customer/profile-update-mail',


    'customer-vieworders' => '/de/customer/view-orders',
    'customer-order_delete' => '/de/customer/order_delete',
    'customer-toggle-status' => '/de/customer/toggle-status',
    'customer-order_detail' => '/de/customer/order_detail',
    'customer-req-order_detail' => '/de/customer/req-order_detail',
    'customer-order_change' => '/de/customer/order_change',
    'customer-order-change-text' => '/de/customer/order-change-text',
    'customer-order-request-mail' => '/de/customer/order-request-mail',
    'customer-order_request' => '/de/customer/order_request/',
    'customer-order-file-index-change' => '/de/customer/order-file-index-change',
    'customer-req-get-order-detail' => '/de/customer/req-get-order-detail',
    'customer-orderfile-information' => '/de/customer/orderfile-information',
    'customer-dashboard-green-table' => '/de/customer/dashboard-green-table',
    'customer-dashboard-red-table' => '/de/customer/dashboard-red-table',
    'customer-dashboard-yellow-table' => '/de/customer/dashboard-yellow-table',
    'customer-dashboard-blue-table' => '/de/customer/dashboard-blue-table',


    'customer-embroidery-information' => '/de/customer/embroidery-information/',
    'customer-embroidery-price' => '/de/customer/embroidery-price/',
    'customer-vector-information' => '/de/customer/vector-information/',
    'customer-vector-price' => '/de/customer/vector-price/',


    'customer-embroidery-program-submit' => '/de/customer/embroidery-order/submit',
    'vector-program' => '/de/customer/vector-order/submit',
    'customer-files' => '/de/customer/files/',
    'customer-orderdetails' => '/de/customer/order-details/',

    'update-embOrder-view' => '/de/customer/embroidery-order/edit/',
    'update-vectorOrder-view' => '/de/customer/vector-order/edit/',
    'delete-embOrder' => 'embroidery-order/delete/',
    'delete-vectorOrder' => 'vector-order/delete/',
    'update-embOrder' => '/de/customer/updated-embroidery-order',
    'update-vectorOrder' => '/de/customer/updated-vector-order/',

    'delete-embFiles' => '/de/customer/emb-delete-file',
    'delete-vectorFiles' => '/de/customer/vec-delete-file/',

    'invite-employee' => '/de/customer/invite-employee/',
    'send-invite' => '/de/customer/send-invite',

    'customer-order-form-mail' => '/de/customer/order-form-mail',
    'customer-get-em-parameter' => '/de/customer/get-em-parameter',
    'customer-get-ve-parameter' => '/de/customer/get-ve-parameter',
    'customer-em-parameter-change' => '/de/customer/em-parameter-change',
    'customer-em-parameter-change-mail' => '/de/customer/em-parameter-change-mail',
    'customer-ve-parameter-change' => '/de/customer/ve-parameter-change',
    'customer-ve-parameter-change-mail' => '/de/customer/ve-parameter-change-mail',


    // Employer
    'employer-setPassword' => '/de/customer/setpassword/',
    'employer-Passwordupdate' => '/de/customer/employer-password-update/',
    'employer-listemployees' => '/de/customer/listEmployees/',
    'employer-addemployee' => '/de/customer/add-employee/',
    'employer-getemployee' => '/de/customer/get-employee/',
    'employer-editemployee' => '/de/customer/edit-employee/',
    'employer-updateemployee' => '/de/customer/update-employee/',
    'employer-deleteemployee' => '/de/customer/deleteemployee/',
    'employer-profile' => '/de/customer/employee-profile/',
    'employee-staffs-table' => '/de/customer/employee-staffs-table',





    // FreeLancer Routes
    'redirect' => 'freelancer-login',
    'freelancer-login' => '/de/freelancer/login',
    'freelancer-signin' => 'signin',

    'freelancerlogout' => '/de/freelancer/logout/',

    'freelancer-vieworders' => '/de/freelancer/view-orders',
    'freelancer-orderdetails' => '/de/freelancer/order-details/',
    'downloadFile' => '/de/freelancer/download',
    'files' => 'files',
    'delivery-files' => '/de/freelancer/upload-files/',
    'upload-delivery-files' => '/de/freelancer/upload-delivery-files',

    'freelancer-profile' => '/de/freelancer/profile/',
    'freelancer-profile-update' => '/de/freelancer/profile-update/',
    'freelancer-changepassword' => '/de/freelancer/change-password/',
    'freelancer-change-password' => '/de/freelancer/change-password-update',
    'freelancer-delete-files' => '/de/freelancer/deletefiles/',
    'freelancer-filter-data' => '/de/freelancer/filter-data/',
    'freelnacer-parameter' => '/de/freelancer/parameter',
    'freelnacer-embroidery-parameter' => '/de/freelancer/embroidery-parameter',
    'freelnacer-vector-parameter' => '/de/freelancer/vector-parameter',

    'freelancer-get-order-detail' => '/de/freelancer/free-get-order-detail',
    'freelancer-order-detail' => '/de/freelancer/free-order-detail',

    'embroidery-freelancer-green' => '/de/freelancer/embroidery-freelancer-green',
    'embroidery-freelancer-yellow' => '/de/freelancer/embroidery-freelancer-yellow',
    'embroidery-freelancer-red' => '/de/freelancer/embroidery-freelancer-red',
    'embroidery-freelancer-blue' => '/de/freelancer/embroidery-freelancer-blue',
    'embroidery-freelancer-all' => '/de/freelancer/embroidery-freelancer-all',
    'embroidery-freelancer-green-dashboard' => '/de/freelancer/embroidery-freelancer-green-dashboard',
    'embroidery-freelancer-yellow-dashboard' => '/de/freelancer/embroidery-freelancer-yellow-dashboard',
    'embroidery-freelancer-red-dashboard' => '/de/freelancer/embroidery-freelancer-red-dashboard',
    'embroidery-freelancer-blue-dashboard' => '/de/freelancer/embroidery-freelancer-blue-dashboard',
    'embroidery-freelancer-get-request-detail' => '/de/freelancer/embroidery-freelancer-get-request-detail',
    'embroidery-freelancer-order_detail' => '/de/freelancer/embroidery-freelancer-order_detail',
    'embroidery-freelancer-startjob' => '/de/freelancer/embroidery-freelancer-startjob',
    'embroidery-freelancer-endjob' => '/de/freelancer/embroidery-freelancer-endjob',
    'embroidery-freelancer-endchange' => '/de/freelancer/embroidery-freelancer-endchange',


    'vector-freelancer-green' => '/de/freelancer/vector-freelancer-green',
    'vector-freelancer-yellow' => '/de/freelancer/vector-freelancer-yellow',
    'vector-freelancer-red' => '/de/freelancer/vector-freelancer-red',
    'vector-freelancer-blue' => '/de/freelancer/vector-freelancer-blue',
    'vector-freelancer-all' => '/de/freelancer/vector-freelancer-all',
    'vector-freelancer-green-dashboard' => '/de/freelancer/vector-freelancer-green-dashboard',
    'vector-freelancer-yellow-dashboard' => '/de/freelancer/vector-freelancer-yellow-dashboard',
    'vector-freelancer-red-dashboard' => '/de/freelancer/vector-freelancer-red-dashboard',
    'vector-freelancer-blue-dashboard' => '/de/freelancer/vector-freelancer-blue-dashboard',
    'vector-freelancer-get-request-detail' => '/de/freelancer/vector-freelancer-get-request-detail',
    'vector-freelancer-order_detail' => '/de/freelancer/vector-freelancer-order_detail',
    'vector-freelancer-endchange' => '/de/freelancer/vector-freelancer-endchange',








    // Admin Routes
    'admin-login' => '/de/admin/login/',
    'admin-sign-in' => '/de/admin/signin/',
    // 'admin-vieworders' => '/de/admin/view-orders',
    'admin-orderdetails' => '/de/admin/order-details/',
    'admin-logout' => '/de/admin/logout',
    'admin-changepassword' => '/de/admin/change-password',
    'admin-updatepassword' => '/de/admin/update-password',
    'admin-profile' => '/de/admin/profile',
    'admin-updateprofile' => '/de/admin/profile-update',
    'admin-view-orders' => '/de/admin/admin-view-orders',

    'admin-customer-list' => '/de/admin/customer-list',
    'admin-customer-search' => '/de/admin/customer-search',
    'admin-get-differences' => '/de/admin/get-differences/',
    'admin-accept-change' => '/de/admin/accept-change/',
    'admin-accept-change-mail' => '/de/admin/accept-change-mail/',
    'admin-decline-change' => '/de/admin/decline-change/',
    'admin-decline-change-mail' => '/de/admin/decline-change-mail/',
    'admin-get-customer-profile' => '/de/admin/get-customer-profile',
    'admin-change-profile' => '/de/admin/change-profile/',
    'admin-add-customer' => '/de/admin/add-customer',
    'admin-customer-search-table' => '/de/admin/customer-search-table',
    'admin-customer-searched-result' => '/de/admin/customer-searched-result',
    'admin-confirm-profile' => '/de/admin/confirm-profile',
    'admin-confirm-profile-mail' => '/de/admin/confirm-profile-mail',
    'admin-decline-profile' => '/de/admin/decline-profile',
    'admin-decline-profile-mail' => '/de/admin/decline-profile-mail',

    'admin-parameter-em-table' => '/de/admin/parameter-em-table',
    'admin-parameter-ve-table' => '/de/admin/parameter-ve-table',
    'admin-parameter-em' => '/de/admin/parameter-em',
    'admin-parameter-ve' => '/de/admin/parameter-ve',
    'admin-green-table' => '/de/admin/green-table',
    'admin-yellow-table' => '/de/admin/yellow-table',
    'admin-red-table' => '/de/admin/red-table',
    'admin-blue-table' => '/de/admin/blue-table',
    'admin-all-table' => '/de/admin/all-table',
    'admin-get-order-detail' => '/de/admin/get-order-detail',
    'admin-order-detail' => '/de/admin/order-detail',
    'admin-parameter' => '/de/admin/parameter',
    'admin-startjob' => '/de/admin/startjob',
    'admin-endjob' => '/de/admin/endjob',
    'admin-get-request-detail' => '/de/admin/get-request-detail',
    'admin-change-parameter' => '/de/admin/change-parameter',
    'admin-change-order-detail' => '/de/admin/change-order-detail',
    'admin-endchange' => '/de/admin/endchange',
    'admin-delete-order' => '/de/admin/delete-order',
    'admin-request-text' => '/de/admin/request-text',
    'admin-detail-delete-file' => '/de/admin/detail-delete-file/',
    'admin-change_delete_file' => '/de/admin/change_delete_file/',
    'admin-change-em-parameter-confirm' => '/de/admin/change-em-parameter-confirm',
    'admin-change-ve-parameter-confirm' => '/de/admin/change-ve-parameter-confirm',
    'admin-change-em-parameter-confirm-mail' => '/de/admin/change-em-parameter-confirm-mail',
    'admin-change-ve-parameter-confirm-mail' => '/de/admin/change-ve-parameter-confirm-mail',
    'admin-change-em-parameter-decline' => '/de/admin/change-em-parameter-decline',
    'admin-change-ve-parameter-decline' => '/de/admin/change-ve-parameter-decline',
    'admin-change-em-parameter-decline-mail' => '/de/admin/change-em-parameter-decline-mail',
    'admin-change-ve-parameter-decline-mail' => '/de/admin/change-ve-parameter-decline-mail',
    'admin-dashboard-green-table' => '/de/admin/dashboard-green-table',
    'admin-dashboard-red-table' => '/de/admin/dashboard-red-table',
    'admin-dashboard-yellow-table' => '/de/admin/dashboard-yellow-table',
    'admin-dashboard-blue-table' => '/de/admin/dashboard-blue-table',
];