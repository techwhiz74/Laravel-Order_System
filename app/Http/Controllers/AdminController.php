<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TempCustomer;
use App\Models\OrderChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Order_file_upload;
use App\Models\Customer_parameter;
use DateTimeZone;




class AdminController extends Controller
{
    public function adminloginpage()
    {
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->user_type == "admin") {
                return redirect('/');
                // return redirect()->route('admin-vieworders', app()->getLocale())->with('success', 'You have successfully logged in');
            } else {
                Auth::logout();
                return redirect(__('routes.admin-login'))->with('danger', 'Oops! You do not have the required access permission');
            }
        }
        return redirect(__('routes.admin-login'))->with('danger', 'Oppes! You have entered invalid credentials');
    }

    public function goAdminLogin()
    {
        return redirect()->route('admin-login', ['locale' => app()->getLocale()]);
    }

    public function adminLogout()
    {
        Session::flush();
        Auth::logout();

        return Redirect(__('routes.admin-login'));
    }

    public function viewOrders(Request $request)
    {

        $authuser = auth()->user()->id;
        if ($request->status_filter != '') {
            if ($request->status_filter == 'pending') {
                $data = Order::with('Order_address', 'category', 'user')->orderBy('id', 'desc')->where('status', 'pending')->get();
            }
            if ($request->status_filter == 'delivered') {
                $data = Order::with('Order_address', 'category', 'user')->orderBy('id', 'desc')->where('status', 'delivered')->get();
            }
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('catgory', function ($row) {
                    $category = $row->category->category_name;
                    return $category;
                })
                ->editColumn('user', function ($row) {
                    $user = $row->user->name;
                    return $user;
                })
                ->editColumn('date', function ($row) {
                    $date = $row->created_at->format('Y-m-d');
                    return $date;
                })
                ->editColumn('selection', function ($row) {
                    $date = __($row->selection);
                    return $date;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<div class="d-flex" style="gap:20px;">
                                    <div><a class="btn btn-secondary btn-sm" href=' . __("routes.admin-orderdetails") . $row->id . '>Order detail</a></div>
                                </div>';
                    return $btn;
                })
                ->rawColumns(['catgory', 'date', 'user', 'action', 'selection'])
                ->make(true);
        } else {
            if ($request->ajax()) {
                $data = Order::with('Order_address', 'category', 'user')->orderBy('id', 'desc')->get();
                return Datatables::of($data)->addIndexColumn()
                    ->editColumn('catgory', function ($row) {
                        $category = $row->category->category_name;
                        return $category;
                    })
                    ->editColumn('user', function ($row) {
                        $user = $row->user->name;
                        return $user;
                    })
                    ->editColumn('date', function ($row) {
                        $date = $row->created_at->format('Y-m-d');
                        return $date;
                    })
                    ->editColumn('selection', function ($row) {
                        $date = __($row->selection);
                        return $date;
                    })
                    ->addColumn('action', function ($row) {

                        $btn = '<div class="d-flex" style="gap:20px;">
                                    <div><a class="btn btn-secondary btn-sm" href=' . __("routes.admin-orderdetails") . $row->id . '>Order detail</a></div>
                                </div>';
                        return $btn;
                    })
                    ->rawColumns(['catgory', 'date', 'user', 'action', 'selection'])
                    ->make(true);
            }
        }
        return view('admin.orders.vieworders');
    }

    public function changePassword()
    {
        return view('admin.changepassword');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'password_confirmation' => 'required|same:newpassword'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {

            $users = User::find(Auth::user()->id);
            $users->password = bcrypt($request->newpassword);
            $users->save();
            session()->flash('message', 'password updated successfully');
            return redirect(__('/'));
        } else {
            session()->flash('message', 'old password does not matched');
            return redirect(__('routes.admin-changepassword'));
        }
    }

    public function adminProfile()
    {
        $authuser = auth()->user()->id;
        $user = User::where('id', $authuser)->first();
        return view('admin.profile.profile', compact('user'));
    }
    public function profileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('sidebar', true);
        }
        $user = auth()->user();
        $address = $request->address;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $destination = $user->id . '-profile' . $filename;
            $path = Storage::disk('s3')->put($destination, file_get_contents($file));
            $imageUrl = Storage::disk('s3')->url($destination);
            $user->image = $imageUrl;
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact_no = $request->input('number');
        $user->address = $address;
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully!')->with('sidebar', true);
    }
    public function orderDetails($locale, $id)
    {
        $order = Order::with('Order_address', 'Orderfile_uploads', 'Orderfile_formats')->where('id', $id)->first();
        return view('common.orderdetails', compact('order'));
    }


    public function AdminviewOrders(Request $request)
    {
        $authuser = auth()->user()->id;
        if ($request->status_filter != '') {
            if ($request->status_filter == 'pending') {
                $data = Order::with('Order_address', 'category', 'user')->orderBy('id', 'desc')->where('status', 'pending')->get();
            }
            if ($request->status_filter == 'delivered') {
                $data = Order::with('Order_address', 'category', 'user')->orderBy('id', 'desc')->where('status', 'delivered')->get();
            }
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('catgory', function ($row) {
                    $category = $row->category->category_name;
                    return $category;
                })
                ->editColumn('user', function ($row) {
                    $user = $row->user->name;
                    return $user;
                })
                ->editColumn('date', function ($row) {
                    $date = $row->created_at->format('Y-m-d');
                    return $date;
                })
                ->editColumn('selection', function ($row) {
                    $date = __($row->selection);
                    return $date;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<div class="d-flex" style="gap:20px;">
                                    <div><a class="btn btn-secondary btn-sm" href=' . __("routes.admin-orderdetails") . $row->id . '>Order detail</a></div>
                                </div>';
                    return $btn;
                })
                ->rawColumns(['catgory', 'date', 'user', 'action', 'selection'])
                ->make(true);
        } else {
            if ($request->ajax()) {
                $data = Order::with('Order_address', 'category', 'user')->orderBy('id', 'desc')->get();
                return Datatables::of($data)->addIndexColumn()
                    ->editColumn('catgory', function ($row) {
                        $category = $row->category->category_name;
                        return $category;
                    })
                    ->editColumn('user', function ($row) {
                        $user = $row->user->name;
                        return $user;
                    })
                    ->editColumn('date', function ($row) {
                        $date = $row->created_at->format('Y-m-d');
                        return $date;
                    })
                    ->editColumn('selection', function ($row) {
                        $date = __($row->selection);
                        return $date;
                    })
                    ->addColumn('action', function ($row) {

                        $btn = '<div class="d-flex" style="gap:20px;">
                                    <div><a class="btn btn-secondary btn-sm" href=' . __("routes.admin-orderdetails") . $row->id . '>Order detail</a></div>
                                </div>';
                        return $btn;
                    })
                    ->rawColumns(['catgory', 'date', 'user', 'action', 'selection'])
                    ->make(true);
            }
        }
        return response()->json([
            'messgae' => 'done'
        ]);
    }

    public function CustomerList(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderBy('id', 'desc')->where('user_type', 'customer')->get();
            $temp_data = TempCustomer::orderBy('id', 'desc')->get();
            // $order_changes = OrderChange::orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('edit', function ($row) {
                    $edit = '
                        <div class="d-flex" style="gap:20px;">
                            <div style="display: flex; margin:auto;">
                                <button onclick="editCustomerProfile(' . $row->id . ')" style="border:none; background-color:inherit;"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button>
                            </div>
                        </div>';
                    return $edit;
                })
                ->addColumn('request', function ($row) use ($temp_data) {
                    $req = '';
                    foreach ($temp_data as $temp) {
                        if ($temp->customer_id == $row->id) {
                            $req = '
                                <div class="d-flex" style="gap:20px;">
                                    <div style="display: flex; margin:auto;">
                                        <button onclick="HandleProfileRequest(' . $row->id . ')" style="border:none; background-color:inherit;"><i class="fa-solid fa-exclamation blink" style="color:#ff0000; transform:scale(2,1);"></i></button>
                                    </div>
                                </div>
                            ';
                        }
                    }
                    // foreach ($order_changes as $order_change) {
                    //     if ($order_change->customer_id == $row->id) {
                    //         $req = '
                    //             <div class="d-flex" style="gap:20px;">
                    //                 <div style="display: flex; margin:auto;">
                    //                     <button onclick="HandleProfileRequest(' . $row->id . ')" style="border:none; background-color:inherit;"><i class="fa-solid fa-exclamation blink" style="color:#ff0000; transform:scale(2,1);"></i></button>
                    //                 </div>
                    //             </div>
                    //         ';
                    //     }
                    // }
                    return $req;
                })
                ->rawColumns(['edit', 'request'])
                ->make(true);
        }
    }

    public function getDifferences($locale, $id)
    {
        $user = User::findOrFail($id);
        $tempCustomer = TempCustomer::where('customer_id', $id)->orderBy('id', 'desc')->first();
        // $order_changes = OrderChange::where('customer_id', $id)->orderBy('id', 'desc')->get();

        $responseText = '';
        $count = 0;

        // foreach ($order_changes as $order_change) {
        //     $responseText .= '"' . $order_change["customer_name"] . '" hat eine Nachricht zu Bestellnummer ' . $order_change['order_number'] . ' gesendet: „' . $order_change['message'] . '“<br />';
        // }

        if ($tempCustomer) {
            if ($user['name'] != $tempCustomer['name']) {
                $responseText .= 'Der Kundin hat eine Änderung des "name" von "' . $user['name'] . '" in "' . $tempCustomer['name'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['first_name'] != $tempCustomer['first_name']) {
                $responseText .= 'Der Kundin hat eine Änderung des "first_name" von "' . $user['first_name'] . '" in "' . $tempCustomer['first_name'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['email'] != $tempCustomer['email']) {
                $responseText .= 'Der Kundin hat eine Änderung des "email" von "' . $user['email'] . '" in "' . $tempCustomer['email'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['company'] != $tempCustomer['company']) {
                $responseText .= 'Der Kundin hat eine Änderung des "company" von "' . $user['company'] . '" in "' . $tempCustomer['company'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['company_addition'] != $tempCustomer['company_addition']) {
                $responseText .= 'Der Kundin hat eine Änderung des "company_addition" von "' . $user['company_addition'] . '" in "' . $tempCustomer['company_addition'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['street_number'] != $tempCustomer['street_number']) {
                $responseText .= 'Der Kundin hat eine Änderung des "street_number" von "' . $user['street_number'] . '" in "' . $tempCustomer['street_number'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['postal_code'] != $tempCustomer['postal_code']) {
                $responseText .= 'Der Kundin hat eine Änderung des "postal_code" von "' . $user['postal_code'] . '" in "' . $tempCustomer['postal_code'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['location'] != $tempCustomer['location']) {
                $responseText .= 'Der Kundin hat eine Änderung des "location" von "' . $user['location'] . '" in "' . $tempCustomer['location'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['country'] != $tempCustomer['country']) {
                $responseText .= 'Der Kundin hat eine Änderung des "country" von "' . $user['country'] . '" in "' . $tempCustomer['country'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['website'] != $tempCustomer['website']) {
                $responseText .= 'Der Kundin hat eine Änderung des "websitewebsite" von "' . $user['name'] . '" in "' . $tempCustomer['name'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['phone'] != $tempCustomer['phone']) {
                $responseText .= 'Der Kundin hat eine Änderung des "phone" von "' . $user['phone'] . '" in "' . $tempCustomer['phone'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['mobile'] != $tempCustomer['mobile']) {
                $responseText .= 'Der Kundin hat eine Änderung des "mobile" von "' . $user['mobile'] . '" in "' . $tempCustomer['mobile'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['tax_number'] != $tempCustomer['tax_number']) {
                $responseText .= 'Der Kundin hat eine Änderung des "tax_number" von "' . $user['tax_number'] . '" in "' . $tempCustomer['tax_number'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['vat_number'] != $tempCustomer['vat_number']) {
                $responseText .= 'Der Kundin hat eine Änderung des "vat_number" von "' . $user['vat_number'] . '" in "' . $tempCustomer['vat_number'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['register_number'] != $tempCustomer['register_number']) {
                $responseText .= 'Der Kundin hat eine Änderung des "register_number" von "' . $user['register_number'] . '" in "' . $tempCustomer['register_number'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['kd_group'] != $tempCustomer['kd_group']) {
                $responseText .= 'Der Kundin hat eine Änderung des "kd_group" von "' . $user['kd_group'] . '" in "' . $tempCustomer['kd_group'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['kd_category'] != $tempCustomer['kd_category']) {
                $responseText .= 'Der Kundin hat eine Änderung des "kd_category" von "' . $user['kd_category'] . '" in "' . $tempCustomer['kd_category'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['payment_method'] != $tempCustomer['payment_method']) {
                $responseText .= 'Der Kundin hat eine Änderung des "payment_method" von "' . $user['payment_method'] . '" in "' . $tempCustomer['payment_method'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['bank_name'] != $tempCustomer['bank_name']) {
                $responseText .= 'Der Kundin hat eine Änderung des "bank_name" von "' . $user['bank_name'] . '" in "' . $tempCustomer['bank_name'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['IBAN'] != $tempCustomer['IBAN']) {
                $responseText .= 'Der Kundin hat eine Änderung des "IBAN" von "' . $user['IBAN'] . '" in "' . $tempCustomer['IBAN'] . '" angefordert.<br />';
                $count++;
            }
            if ($user['BIC'] != $tempCustomer['BIC']) {
                $responseText .= 'Der Kundin hat eine Änderung des "BIC" von "' . $user['BIC'] . '" in "' . $tempCustomer['BIC'] . '" angefordert.<br />';
                $count++;
            }
        }
        $responseText = substr($responseText, 0, strlen($responseText) - 2);

        echo $responseText;
    }

    public function acceptChangeRequest(Request $request)
    {
        $user = User::findOrFail($request->post('id'));
        $tempCustomer = TempCustomer::where('customer_id', $request->post('id'))->orderBy('id', 'desc')->first();
        $user->name = $request->post('name');
        $user->first_name = $request->post('first_name');
        $user->email = $request->post('email');
        $user->company = $request->post('company');
        $user->company_addition = $request->post('company_addition');
        $user->street_number = $request->post('street_number');
        $user->postal_code = $request->post('postal_code');
        $user->location = $request->post('location');
        $user->country = $request->post('country');
        $user->website = $request->post('website');
        $user->phone = $request->post('phone');
        $user->mobile = $request->post('mobile');
        $user->tax_number = $request->post('tax_number');
        $user->vat_number = $request->post('vat_number');
        $user->register_number = $request->post('register_number');
        $user->kd_group = $request->post('kd_group');
        $user->kd_category = $request->post('kd_category');
        $user->payment_method = $request->post('payment_method');
        $user->bank_name = $request->post('bank_name');
        $user->IBAN = $request->post('IBAN');
        $user->BIC = $request->post('BIC');
        $user->save();
        $tempCustomer->delete();
        return 'successfully changed!';
    }
    public function declineChangeRequest($locale, $id)
    {
        $user = TempCustomer::where('customer_id', $id)->orderBy('id', 'desc')->first();
        $user->delete();
    }
    public function GetCustomerProfile(Request $request)
    {
        $profile = User::findOrfail($request->get('id'));
        $temp = TempCustomer::where('customer_id', $request->get('id'))->first();
        return response()->json(['profile' => $profile, 'temp' => $temp]);
    }

    public function ChangeProfile(Request $request)
    {
        $id = $request->post('id');
        $customer_number = $request->post('customer_number');
        $name = $request->post('name');
        $first_name = $request->post('first_name');
        $email = $request->post('email');
        $company = $request->post('company');
        $company_addition = $request->post('company_addition');
        $street_number = $request->post('street_number');
        $postal_code = $request->post('postal_code');
        $location = $request->post('location');
        $country = $request->post('country');
        $website = $request->post('website');
        $phone = $request->post('phone');
        $mobile = $request->post('mobile');
        $tax_number = $request->post('tax_number');
        $vat_number = $request->post('vat_number');
        $register_number = $request->post('register_number');
        $kd_group = $request->post('kd_group');
        $kd_category = $request->post('kd_category');
        $payment_method = $request->post('payment_method');
        $bank_name = $request->post('bank_name');
        $IBAN = $request->post('IBAN');
        $BIC = $request->post('BIC');

        $data = User::where('id', $id)->first();
        $data->customer_number = $customer_number;
        $data->name = $name;
        $data->first_name = $first_name;
        $data->email = $email;
        $data->company = $company;
        $data->company_addition = $company_addition;
        $data->street_number = $street_number;
        $data->postal_code = $postal_code;
        $data->location = $location;
        $data->country = $country;
        $data->website = $website;
        $data->phone = $phone;
        $data->mobile = $mobile;
        $data->tax_number = $tax_number;
        $data->vat_number = $vat_number;
        $data->register_number = $register_number;
        $data->kd_group = $kd_group;
        $data->kd_category = $kd_category;
        $data->payment_method = $payment_method;
        $data->bank_name = $bank_name;
        $data->IBAN = $IBAN;
        $data->BIC = $BIC;
        $data->save();
    }
    public function AddCustomer(Request $request)
    {
        $customer_number = $request->post('customer_number');
        $name = $request->post('name');
        $first_name = $request->post('first_name');
        $company = $request->post('company');
        $company_addition = $request->post('company_addition');
        $street_number = $request->post('street_number');
        $postal_code = $request->post('postal_code');
        $location = $request->post('location');
        $country = $request->post('country');
        $website = $request->post('website');
        $phone = $request->post('phone');
        $mobile = $request->post('mobile');
        $tax_number = $request->post('tax_number');
        $vat_number = $request->post('vat_number');
        $register_number = $request->post('register_number');
        $kd_group = $request->post('kd_group');
        $kd_category = $request->post('kd_category');
        $payment_method = $request->post('payment_method');
        $bank_name = $request->post('bank_name');
        $IBAN = $request->post('IBAN');
        $BIC = $request->post('BIC');
        $email = $request->post('email');
        $password = $request->post('password');

        $add_customer = User::create([
            'customer_number' => $customer_number,
            'name' => $name,
            'first_name' => $first_name,
            'company' => $company,
            'company_addition' => $company_addition,
            'street_number' => $street_number,
            'postal_code' => $postal_code,
            'location' => $location,
            'country' => $country,
            'website' => $website,
            'phone' => $phone,
            'mobile' => $mobile,
            'tax_number' => $tax_number,
            'vat_number' => $vat_number,
            'register_number' => $register_number,
            'kd_group' => $kd_group,
            'kd_category' => $kd_category,
            'payment_method' => $payment_method,
            'bank_name' => $bank_name,
            'IBAN' => $IBAN,
            'BIC' => $BIC,
            'email' => $email,
            'password' => Hash::make($password),
            'user_type' => 'customer',
            'image' => 'https://upload-files-cos.s3.amazonaws.com/6-profile1693225145-1692011047-2021-10-20.jpg',
        ]);
        $add_customer->save();
    }
    public function CustomerSearchTable(Request $request)
    {
        $customers = User::orderBy('id', 'desc')->where('user_type', 'customer')
            ->where(function ($query) use ($request) {
                $query->where('customer_number', 'LIKE', '%' . $request->search_filter . '%')
                    ->orWhere('name', 'LIKE', '%' . $request->search_filter . '%')
                    ->orWhere('company', 'LIKE', '%' . $request->search_filter . '%')
                    ->orWhere('postal_code', 'LIKE', '%' . $request->search_filter . '%');
            })->get();

        $html = '';
        $data = [];
        if (count($customers) > 0) {
            foreach ($customers as $item) {
                $html .= '<tr><td>' . $item->customer_number . '</td>' .
                    '<td>' . $item->company . '</td>' .
                    '<td>' . $item->name . '</td>' .
                    '<td>' . $item->first_name . '</td>' .
                    '<td>' . $item->phone . '</td>' .
                    '<td>' . $item->email . '</td>' .
                    '<td>' . $item->street_number . '</td>' .
                    '<td>' . $item->postal_code . '</td>' .
                    '<td>' . $item->location . '</td>' .
                    '<td>' . $item->country . '</td>' .
                    '<td style="max-width:50px !important;"><input type="checkbox" name="selected_customer" value="' . $item->id . '"></td></tr>';
                $data['id'] = $item->id;
                $data['html'] = $html;
            }
        } else {
            $html .= '<tr><td colspan="11" class="text-center">Keine Daten</td></tr>';
            $data['html'] = $html;
        }
        echo json_encode($data);
    }
    public function CustomerSearchResult(Request $request)
    {
        $customer = User::findOrfail($request->get('id'));
        return response()->json($customer);
    }
    public function adminFileUpload(Request $request)
    {
        $type = $request->post('type');
        $deliver_time = $request->post('deliver_time');
        $project_name = $request->post('project_name');
        $size = $request->post('size');
        $width_height = $request->post('width_height');
        $products = $request->post('products');
        $special_instructions = $request->post('special_instructions');
        $customer_number = $request->post('customer_number');
        $searched_id = $request->post('searched_id');
        $last_order = Order::orderBy('order_number', 'desc')->first();

        $order = Order::where('type', $type)
            ->where('project_name', $project_name)
            ->where('size', $size)
            ->where('deliver_time', $deliver_time)
            ->where('width_height', $width_height)
            ->where('products', $products)
            ->where('special_instructions', $special_instructions)->first();

        if ($order == null) {
            $order = new Order();
            $order->customer_number = $customer_number;
            $order->order_number = $last_order == null ? '0001' : sprintf('%04s', $last_order->order_number + 1);
            $order->project_name = $project_name;
            $order->ordered_from = "Lion Werbe GmbH";
            $order->status = 'Offen';
            $order->type = $type;
            $order->size = $size;
            $order->deliver_time = $deliver_time;
            $order->width_height = $width_height;
            $order->products = $products;
            $order->special_instructions = $special_instructions;
            $order->category_id = 1;
            $order->user_id = $searched_id;
            $order->assigned_to = 4;
            $order->org_id = $searched_id;
            $order->save();
        }

        $files = $request->file("files");
        $uploadDir = 'public/';
        $filePath = $order->customer_number . '/' .
            $order->customer_number . '-' . $order->order_number . '-' . $order->project_name . '/Originaldatei/';
        $path = $uploadDir . $filePath;
        foreach ($files as $key => $file) {
            // Check whether the current entity is an actual file or a folder (With a . for a name)
            if (strlen($file->getClientOriginalName()) != 1) {
                Storage::makeDirectory($uploadDir);
                $fileName = $file->getClientOriginalName();

                if ($file->storePubliclyAs($path, $fileName)) {
                    $order_file_upload = new Order_file_upload();
                    $order_file_upload->order_id = $order->id;
                    $order_file_upload->extension = $file->getClientOriginalExtension();
                    $order_file_upload->base_url = 'storage/' . $filePath . $fileName;
                    $order_file_upload->save();
                    echo "The file " . $fileName . " has been uploaded";
                } else
                    echo "Error";
            }
        }
        return "OK!";
    }
    public function ConfirmProfile(Request $request)
    {
        $id = $request->post('admin_confirm_profile_id');
        $customer_number = $request->post('customer_number');
        $user = User::findOrfail($id);
        $user->customer_number = $customer_number;
        $user->save();
    }
    public function DeclineProfile(Request $request)
    {
        $id = $request->post('admin_decline_profile_id');
        User::findOrfail($id)->delete();
    }
    public function EmParameterTable(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderBy('id', 'desc')->where('user_type', 'customer')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('parameter', function ($row) {
                    $parameter = '
                        <div class="d-flex" style="gap:20px;">
                            <div style="display: flex; margin:auto;">
                                <button onclick="openEmParameter(' . $row->id . ')" style="border:none; background-color:inherit;"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button>
                            </div>
                        </div>';
                    return $parameter;
                })
                ->rawColumns(['parameter'])
                ->make(true);
        }
    }
    public function VeParameterTable(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderBy('id', 'desc')->where('user_type', 'customer')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('parameter', function ($row) {
                    $parameter = '
                        <div class="d-flex" style="gap:20px;">
                            <div style="display: flex; margin:auto;">
                                <button onclick="openVeParameter(' . $row->id . ')" style="border:none; background-color:inherit;"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button>
                            </div>
                        </div>';
                    return $parameter;
                })
                ->rawColumns(['parameter'])
                ->make(true);
        }
    }
    public function EmParameter(Request $request)
    {
        $parameter = Customer_parameter::where('customer_id', $request->get('id'))->first();
        return response()->json($parameter);
    }
    public function VeParameter(Request $request)
    {
        $parameter = Customer_parameter::where('customer_id', $request->get('id'))->first();
        return response()->json($parameter);
    }
    public function AdminGreenTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('status', 'Offen')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $timezone = new DateTimeZone('Europe/Berlin');
                    $date = $row->created_at->setTimezone($timezone)->format('d.m.Y H:i');
                    return $date;
                })
                ->addColumn('type', function ($row) {
                    $type = '';
                    if ($row->type == "Embroidery") {
                        $type = '<img src="' . asset('asset/images/reel-duotone.svg') . '" alt="embroidery" style="width:14px; display:flex; margin:auto;">';

                    } else if ($row->type == "Vector") {
                        $type = '<img src="' . asset('asset/images/bezier-curve-duotone.svg') . '" alt="vector" style="width:17px; display:flex; margin:auto;">';
                    }
                    return $type;
                })
                ->addColumn('status', function ($row) {

                    $status = '';
                    if ($row->status == "Offen") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-open"></div><div>Offen</div></div>';
                    } else if ($row->status == "In Bearbeitung") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-progress"></div><div>In Bearbeitung</div></div>';
                    } else if ($row->status == "Ausgeliefert") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-delivered"></div><div>Ausgeliefert</div></div>';
                    } else if ($row->status == "Änderung") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-change"></div><div>Änderung</div></div>';
                    }
                    return $status;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="AdminOpenOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
                    return $btn;
                })
                ->addColumn('deliver_time', function ($row) {
                    $deliver_time = '';
                    if ($row->deliver_time == "STANDARD") {
                        $deliver_time = "STANDARD";
                    } else if ($row->deliver_time == "EXPRESS") {
                        $deliver_time = '<div style="color:red;" class="blink">EXPRESS</div>';
                    }
                    return $deliver_time;
                })
                ->rawColumns(['order', 'date', 'detail', 'status', 'type', 'deliver_time'])
                ->make(true);
        }
    }
    public function AdminYellowTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('status', 'In Bearbeitung')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $timezone = new DateTimeZone('Europe/Berlin');
                    $date = $row->created_at->setTimezone($timezone)->format('d.m.Y H:i');
                    return $date;
                })
                ->addColumn('type', function ($row) {
                    $type = '';
                    if ($row->type == "Embroidery") {
                        $type = '<img src="' . asset('asset/images/reel-duotone.svg') . '" alt="embroidery" style="width:14px; display:flex; margin:auto;">';

                    } else if ($row->type == "Vector") {
                        $type = '<img src="' . asset('asset/images/bezier-curve-duotone.svg') . '" alt="vector" style="width:17px; display:flex; margin:auto;">';
                    }
                    return $type;
                })
                ->addColumn('status', function ($row) {

                    $status = '';
                    if ($row->status == "Offen") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-open"></div><div>Offen</div></div>';
                    } else if ($row->status == "In Bearbeitung") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-progress"></div><div>In Bearbeitung</div></div>';
                    } else if ($row->status == "Ausgeliefert") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-delivered"></div><div>Ausgeliefert</div></div>';
                    } else if ($row->status == "Änderung") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-change"></div><div>Änderung</div></div>';
                    }
                    return $status;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="AdminOpenOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
                    return $btn;
                })
                ->addColumn('deliver_time', function ($row) {
                    $deliver_time = '';
                    if ($row->deliver_time == "STANDARD") {
                        $deliver_time = "STANDARD";
                    } else if ($row->deliver_time == "EXPRESS") {
                        $deliver_time = '<div style="color:red;" class="blink">EXPRESS</div>';
                    }
                    return $deliver_time;
                })
                ->rawColumns(['order', 'date', 'detail', 'status', 'type', 'deliver_time'])
                ->make(true);
        }
    }
    public function AdminRedTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('status', 'Ausgeliefert')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $timezone = new DateTimeZone('Europe/Berlin');
                    $date = $row->created_at->setTimezone($timezone)->format('d.m.Y H:i');
                    return $date;
                })
                ->addColumn('type', function ($row) {
                    $type = '';
                    if ($row->type == "Embroidery") {
                        $type = '<img src="' . asset('asset/images/reel-duotone.svg') . '" alt="embroidery" style="width:14px; display:flex; margin:auto;">';

                    } else if ($row->type == "Vector") {
                        $type = '<img src="' . asset('asset/images/bezier-curve-duotone.svg') . '" alt="vector" style="width:17px; display:flex; margin:auto;">';
                    }
                    return $type;
                })
                ->addColumn('status', function ($row) {

                    $status = '';
                    if ($row->status == "Offen") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-open"></div><div>Offen</div></div>';
                    } else if ($row->status == "In Bearbeitung") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-progress"></div><div>In Bearbeitung</div></div>';
                    } else if ($row->status == "Ausgeliefert") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-delivered"></div><div>Ausgeliefert</div></div>';
                    } else if ($row->status == "Änderung") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-change"></div><div>Änderung</div></div>';
                    }
                    return $status;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="AdminOpenOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
                    return $btn;
                })
                ->addColumn('deliver_time', function ($row) {
                    $deliver_time = '';
                    if ($row->deliver_time == "STANDARD") {
                        $deliver_time = "STANDARD";
                    } else if ($row->deliver_time == "EXPRESS") {
                        $deliver_time = "EXPRESS ";
                    }
                    return $deliver_time;
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if ($row->status == "Ausgeliefert" || $row->status == "Änderung") {
                        $btn = '<button style="border:none; background:inherit; display:block; margin:auto;" onclick="AdminOpenOrderChangeModal(' . $row->id . ')"><img src="' . asset('asset/images/ÄndernIcon.svg') . '"></button>';
                    }
                    return $btn;
                })
                ->rawColumns(['order', 'date', 'detail', 'status', 'type', 'deliver_time', 'action'])
                ->make(true);
        }
    }
    public function AdminBlueTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('status', 'Änderung')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $timezone = new DateTimeZone('Europe/Berlin');
                    $date = $row->created_at->setTimezone($timezone)->format('d.m.Y H:i');
                    return $date;
                })
                ->addColumn('type', function ($row) {
                    $type = '';
                    if ($row->type == "Embroidery") {
                        $type = '<img src="' . asset('asset/images/reel-duotone.svg') . '" alt="embroidery" style="width:14px; display:flex; margin:auto;">';

                    } else if ($row->type == "Vector") {
                        $type = '<img src="' . asset('asset/images/bezier-curve-duotone.svg') . '" alt="vector" style="width:17px; display:flex; margin:auto;">';
                    }
                    return $type;
                })
                ->addColumn('status', function ($row) {

                    $status = '';
                    if ($row->status == "Offen") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-open"></div><div>Offen</div></div>';
                    } else if ($row->status == "In Bearbeitung") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-progress"></div><div>In Bearbeitung</div></div>';
                    } else if ($row->status == "Ausgeliefert") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-delivered"></div><div>Ausgeliefert</div></div>';
                    } else if ($row->status == "Änderung") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-change"></div><div>Änderung</div></div>';
                    }
                    return $status;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="AdminOpenOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
                    return $btn;
                })
                ->addColumn('deliver_time', function ($row) {
                    $deliver_time = '';
                    if ($row->deliver_time == "STANDARD") {
                        $deliver_time = "STANDARD";
                    } else if ($row->deliver_time == "EXPRESS") {
                        $deliver_time = "EXPRESS ";
                    }
                    return $deliver_time;
                })
                ->addColumn('request', function ($row) {
                    $req = '';

                    if ($row->status == 'Änderung') {
                        $req = '
                                <div class="d-flex" style="gap:20px;">
                                    <div style="display: flex; margin:auto;">
                                        <button onclick="AdminChange(' . $row->id . ', \'Originaldatei\')" style="border:none; background-color:inherit;"><img src="' . asset('asset/images/triangle-person-digging-duotone.svg') . '"></button>
                                    </div>
                                </div>
                            ';
                    }
                    return $req;
                })
                ->rawColumns(['order', 'date', 'detail', 'status', 'type', 'deliver_time', 'request'])
                ->make(true);
        }
    }
    public function AdminAllTable(Request $request)
    {

        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    $query->where('project_name', 'LIKE', '%' . $request->order_filter . '%')
                        ->orWhereRaw("CONCAT(customer_number, '-', order_number) LIKE ?", ['%' . $request->order_filter . '%'])
                        ->orWhere('deliver_time', 'LIKE', '%' . $request->order_filter . '%')
                        ->orWhere('ordered_from', 'LIKE', '%' . $request->order_filter . '%')
                        ->orWhereRaw("DATE_FORMAT(created_at, '%d.%m.%Y %H:%i') LIKE ?", ['%' . $request->order_filter . '%']);
                })->get();
            $order_changes = OrderChange::orderBy('id', 'desc')->get();
            if ($request->start_date_filter == '') {
                if ($request->end_date_filter == '') {
                    $data = Order::orderBy('id', 'desc')
                        ->where(function ($query) use ($request) {
                            $query->where('project_name', 'LIKE', '%' . $request->order_filter . '%')
                                ->orWhereRaw("CONCAT(customer_number, '-', order_number) LIKE ?", ['%' . $request->order_filter . '%'])
                                ->orWhere('deliver_time', 'LIKE', '%' . $request->order_filter . '%')
                                ->orWhere('ordered_from', 'LIKE', '%' . $request->order_filter . '%')
                                ->orWhereRaw("DATE_FORMAT(created_at, '%d.%m.%Y %H:%i') LIKE ?", ['%' . $request->order_filter . '%']);
                        })->get();
                } else {
                    $data = Order::orderBy('id', 'desc')
                        ->where(function ($query) use ($request) {
                            $query->where('project_name', 'LIKE', '%' . $request->order_filter . '%')
                                ->orWhereRaw("CONCAT(customer_number, '-', order_number) LIKE ?", ['%' . $request->order_filter . '%'])
                                ->orWhere('deliver_time', 'LIKE', '%' . $request->order_filter . '%')
                                ->orWhere('ordered_from', 'LIKE', '%' . $request->order_filter . '%')
                                ->orWhereRaw("DATE_FORMAT(created_at, '%d.%m.%Y %H:%i') LIKE ?", ['%' . $request->order_filter . '%']);
                        })
                        ->where('created_at', '<=', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date_filter))))->get();
                }
            } else {
                if ($request->end_date_filter == '') {
                    $data = Order::orderBy('id', 'desc')
                        ->where(function ($query) use ($request) {
                            $query->where('project_name', 'LIKE', '%' . $request->order_filter . '%')
                                ->orWhereRaw("CONCAT(customer_number, '-', order_number) LIKE ?", ['%' . $request->order_filter . '%'])
                                ->orWhere('deliver_time', 'LIKE', '%' . $request->order_filter . '%')
                                ->orWhere('ordered_from', 'LIKE', '%' . $request->order_filter . '%')
                                ->orWhereRaw("DATE_FORMAT(created_at, '%d.%m.%Y %H:%i') LIKE ?", ['%' . $request->order_filter . '%']);
                        })
                        ->where('created_at', '>=', date('Y-m-d', strtotime($request->start_date_filter)))->get();
                } else {
                    $data = Order::orderBy('id', 'desc')
                        ->where(function ($query) use ($request) {
                            $query->where('project_name', 'LIKE', '%' . $request->order_filter . '%')
                                ->orWhereRaw("CONCAT(customer_number, '-', order_number) LIKE ?", ['%' . $request->order_filter . '%'])
                                ->orWhere('deliver_time', 'LIKE', '%' . $request->order_filter . '%')
                                ->orWhere('ordered_from', 'LIKE', '%' . $request->order_filter . '%')
                                ->orWhereRaw("DATE_FORMAT(created_at, '%d.%m.%Y %H:%i') LIKE ?", ['%' . $request->order_filter . '%']);
                        })
                        ->whereBetween('created_at', [date('Y-m-d', strtotime($request->start_date_filter)), date('Y-m-d', strtotime('+1 day', strtotime($request->end_date_filter)))])->get();
                }
            }

            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $timezone = new DateTimeZone('Europe/Berlin');
                    $date = $row->created_at->setTimezone($timezone)->format('d.m.Y H:i');
                    return $date;
                })
                ->addColumn('type', function ($row) {
                    $type = '';
                    if ($row->type == "Embroidery") {
                        $type = '<button style="border:none; background:inherit; display:block; margin:auto;"><img src="' . asset('asset/images/reel-duotone.svg') . '" alt="embroidery" style="width:18px"></button>';

                    } else if ($row->type == "Vector") {
                        $type = '<button style="border:none; background:inherit; display:block; margin:auto;"><img src="' . asset('asset/images/bezier-curve-duotone.svg') . '" alt="vector" style="width:18px"></button>';
                    }
                    return $type;
                })
                ->addColumn('status', function ($row) {

                    $status = '';
                    if ($row->status == "Offen") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-open"></div><div>Offen</div></div>';
                    } else if ($row->status == "In Bearbeitung") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-progress"></div><div>In Bearbeitung</div></div>';
                    } else if ($row->status == "Ausgeliefert") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-delivered"></div><div>Ausgeliefert</div></div>';
                    } else if ($row->status == "Änderung") {
                        $status = '<div class="status-wrapper"><div class="status-sphere-change"></div><div>Änderung</div></div>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if ($row->status == "Ausgeliefert" || $row->status == "Änderung") {
                        $btn = '<button style="border:none; background:inherit; display:block; margin:auto;" onclick="AdminOpenOrderChangeModal(' . $row->id . ')"><img src="' . asset('asset/images/ÄndernIcon.svg') . '"></button>';
                    }
                    return $btn;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<button style="border:none; background:inherit; display:block; margin:auto;" onclick="AdminOpenOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button>';
                    return $btn;
                })
                ->addColumn('deliver_time', function ($row) {
                    $deliver_time = '';
                    if ($row->deliver_time == "STANDARD") {
                        $deliver_time = "STANDARD";
                    } else if ($row->deliver_time == "EXPRESS") {
                        $deliver_time = "EXPRESS ";
                    }
                    return $deliver_time;
                })
                ->addColumn('delete', function ($row) {
                    $delete = '<button style="border:none; background:inherit; display:block; margin:auto;" onclick="deleteOrder(' . $row->id . ')"><img src="' . asset('asset/images/trash-solid.svg') . '" alt="order-delete-icon" ></button>';
                    return $delete;
                })
                ->addColumn('request', function ($row) {
                    $req = '';

                    if ($row->status == 'Änderung') {
                        $req = '
                                <div class="d-flex" style="gap:20px;">
                                    <div style="display: flex; margin:auto;">
                                        <button onclick="AdminChange(' . $row->id . ', \'Originaldatei\')" style="border:none; background-color:inherit;"><img src="' . asset('asset/images/triangle-person-digging-duotone.svg') . '"></button>
                                    </div>
                                </div>
                            ';
                    }
                    return $req;
                })
                ->rawColumns(['order', 'action', 'date', 'detail', 'status', 'type', 'deliver_time', 'delete', 'request'])
                ->make(true);
        }

    }
    public function DeleteOrder(Request $request)
    {
        $delete_id = $request->post('delete_id');
        $order = Order::findOrfail($delete_id);
        $order->delete();
    }
    public function JobFileUpload(Request $request)
    {
        $order_id = $request->post('admin_detail_id');
        $order = Order::findOrfail($order_id);


        $order->status = 'In Bearbeitung';
        $order->save();


        $files = $request->file("files");
        $uploadDir = 'public/';
        if ($order->type == 'Embroidery') {
            $filePath = $order->customer_number . '/' .
                $order->customer_number . '-' . $order->order_number . '-' . $order->project_name . '/Stickprogramm/';
        } else if ($order->type == 'Vector') {
            $filePath = $order->customer_number . '/' .
                $order->customer_number . '-' . $order->order_number . '-' . $order->project_name . '/Vektordatei/';
        }
        $path = $uploadDir . $filePath;
        foreach ($files as $key => $file) {
            // Check whether the current entity is an actual file or a folder (With a . for a name)
            if (strlen($file->getClientOriginalName()) != 1) {
                Storage::makeDirectory($uploadDir);
                $fileName = $file->getClientOriginalName();

                if ($file->storePubliclyAs($path, $fileName)) {
                    $order_file_upload = new Order_file_upload();
                    $order_file_upload->order_id = $order->id;
                    $order_file_upload->extension = $file->getClientOriginalExtension();
                    $order_file_upload->base_url = 'storage/' . $filePath . $fileName;
                    $order_file_upload->save();
                    echo "The file " . $fileName . " has been uploaded";
                } else
                    echo "Error";
            }
        }
        return "OK!";
    }
    public function ChangeFileUpload(Request $request)
    {
        $freelancer_request_id = $request->post('admin_change_id');
        $order = Order::findOrfail($freelancer_request_id);
        $customer = User::findOrfail($order->user_id);
        $time = $request->post('admin_change_time');

        OrderChange::where('time', $time)->delete();
        $change_number = OrderChange::where('order_number', $order->order_number)->where('changed_from', 'LIKE', '%' . 'freelancer' . '%')->orderBy('id', 'desc')->first() ?
            OrderChange::where('order_number', $order->order_number)->where('changed_from', 'LIKE', '%' . 'freelancer' . '%')->orderBy('id', 'desc')->first()->change_number : 0;

        $order_change = new OrderChange();
        $order_change->customer_id = $order->user_id;
        $order_change->customer_name = $customer->name;
        $order_change->order_number = $order->order_number;
        $order_change->change_number = $change_number + 1;
        $order_change->time = $time;
        if ($order->type == 'Embroidery') {
            $order_change->changed_from = "freelancer_em";
        } else {
            $order_change->changed_from = "freelancer_ve";
        }
        $order_change->save();


        $files = $request->file("files");
        $uploadDir = 'public/';
        $filePath = $order->customer_number . '/' .
            $order->customer_number . '-' . $order->order_number . '-' . $order->project_name . '/';
        $folderCount = OrderChange::where('order_number', $order->order_number)->where('changed_from', 'freelancer_em')->count();
        $folderName = 'Stickprogramm Änderung' . ($folderCount) . '/';
        $path = $uploadDir . $filePath . $folderName;
        foreach ($files as $key => $file) {
            // Check whether the current entity is an actual file or a folder (With a . for a name)
            if (strlen($file->getClientOriginalName()) != 1) {
                Storage::makeDirectory($uploadDir);
                $fileName = $file->getClientOriginalName();

                if ($file->storePubliclyAs($path, $fileName)) {
                    $order_file_upload = new Order_file_upload();
                    $order_file_upload->order_id = $order->id;
                    $order_file_upload->extension = $file->getClientOriginalExtension();
                    $order_file_upload->base_url = 'storage/' . $filePath . $folderName . $fileName;
                    $order_file_upload->save();
                    echo "The file " . $fileName . " has been uploaded";
                } else
                    echo "Error";
            }
        }
        return "OK!";
    }
    public function EndChange(Request $request)
    {
        $order = Order::findOrfail($request->get('end_change_id'));
        $order_change_count = OrderChange::where('order_number', $order->order_number)->where('changed_from', 'LIKE', '%' . 'freelancer' . '%')->count();
        if ($order_change_count > 0) {
            $order->status = 'Ausgeliefert';
            $order->save();
        } else {
            return response()->json(['message' => 'Error'], 500);
        }
    }
    public function RequestText(Request $request)
    {
        $order_id = $request->post('admin_request_id');
        $order_change_message = $request->post('admin_order_request_text');
        $time = $request->post('admin_request_time');

        $order = Order::findOrfail($order_id);
        $customer = User::findOrfail($order->user_id);

        $change_number = OrderChange::where('order_number', $order->order_number)->where('changed_from', 'LIKE', '%' . 'customer' . '%')->orderBy('id', 'desc')->first() ?
            OrderChange::where('order_number', $order->order_number)->where('changed_from', 'LIKE', '%' . 'customer' . '%')->orderBy('id', 'desc')->first()->change_number : 0;

        $order_change = new OrderChange();
        $order_change->customer_id = $order->user_id;
        $order_change->customer_name = $customer->name;
        $order_change->order_number = $order->order_number;
        $order_change->message = $order_change_message;
        $order_change->change_number = $change_number + 1;
        $order_change->time = $time;
        if ($order->type == "Embroidery") {
            $order_change->changed_from = "customer_em";
        } else if ($order->type == "Vector") {
            $order_change->changed_from = "customer_ve";
        }
        $order_change->save();

        $order->status = 'Änderung';
        $order->save();
    }
    public function RequestFileUpload(Request $request)
    {
        $order_id = $request->post('admin_request_id');
        $order_change_message = $request->post('admin_order_request_text');
        $time = $request->post('admin_request_time');


        $order = Order::findOrfail($order_id);
        $customer = User::findOrfail($order->user_id);


        OrderChange::where('time', $time)->delete();
        $change_number = OrderChange::where('order_number', $order->order_number)->where('changed_from', 'LIKE', '%' . 'customer' . '%')->orderBy('id', 'desc')->first() ?
            OrderChange::where('order_number', $order->order_number)->where('changed_from', 'LIKE', '%' . 'customer' . '%')->orderBy('id', 'desc')->first()->change_number : 0;

        $order_change = new OrderChange();
        $order_change->customer_id = $order->user_id;
        $order_change->customer_name = $customer->name;
        $order_change->order_number = $order->order_number;
        $order_change->message = $order_change_message;
        $order_change->change_number = $change_number + 1;
        $order_change->time = $time;
        if ($order->type == "Embroidery") {
            $order_change->changed_from = "customer_em";
        } else if ($order->type == "Vector") {
            $order_change->changed_from = "customer_ve";
        }
        $order_change->save();

        $order->status = 'Änderung';
        $order->save();
        $files = $request->file("files");
        $uploadDir = 'public/';
        $filePath = $order->customer_number . '/' .
            $order->customer_number . '-' . $order->order_number . '-' . $order->project_name . '/';
        $folderCount = OrderChange::where('order_number', $order->order_number)->where('changed_from', 'LIKE', '%' . 'customer' . '%')->count();
        $folderName = 'Änderungsdateien Kunde' . ($folderCount) . '/';
        $path = $uploadDir . $filePath . $folderName;
        foreach ($files as $key => $file) {
            // Check whether the current entity is an actual file or a folder (With a . for a name)
            if (strlen($file->getClientOriginalName()) != 1) {
                Storage::makeDirectory($uploadDir);
                $fileName = $file->getClientOriginalName();

                if ($file->storePubliclyAs($path, $fileName)) {
                    $order_file_upload = new Order_file_upload();
                    $order_file_upload->order_id = $order->id;
                    $order_file_upload->extension = $file->getClientOriginalExtension();
                    $order_file_upload->base_url = 'storage/' . $filePath . $folderName . $fileName;
                    $order_file_upload->save();
                    echo "The file " . $fileName . " has been uploaded";
                } else
                    echo "Error";
            }
        }
    }
    public function AdminOrderDetail(Request $request)
    {
        $authuser = auth()->user();
        if ($request->ajax()) {
            $change_data = Order_file_upload::where('order_id', $request->id)->where('base_url', 'LIKE', '%' . $request->type . '%')->orderBy('order_id', 'desc')->get();
            if ($request->type == 'Stickprogramm') {
                $change_data = Order_file_upload::where('order_id', $request->id)->where('base_url', 'LIKE', '%' . $request->type . '%')->where('base_url', 'NOT LIKE', '%Stickprogramm Änderung%')->orderBy('order_id', 'desc')->get();
            }

            return DataTables::of($change_data)->addIndexColumn()
                ->editColumn('customer_number', function ($row) {
                    $customer_number = $row->order->customer_number;
                    return $customer_number;
                })
                ->editColumn('order_number', function ($row) {
                    $order_number = $row->order->order_number;
                    return $order_number;
                })

                ->addColumn('download', function ($row) {

                    $btn = '<a href="' . asset($row->base_url) . '" download><button type="button" style="background:none; border:none; padding:0;"><i class="fa-solid fa-download" style="font-size:14px; color:#c4ae79;"></i></button></a>';
                    return $btn;
                })
                ->addColumn('delete', function ($row) use ($change_data) {
                    $btn = '';
                    foreach ($change_data as $change_item) {
                        $btn = '<button onClick = AdminDeleteFile(' . $row->id . ') style="border:none; background:inherit;"><i class="fa-solid fa-trash-can" style="color:#c4ae79;"></i></button>';
                    }

                    return $btn;
                })


                ->rawColumns(['customer_number', 'order_number', 'download', 'delete'])
                ->make(true);
        }
    }
    public function AdminChangeOrderDetail(Request $request)
    {
        $authuser = auth()->user();
        if ($request->ajax()) {
            $change_data = Order_file_upload::where('order_id', $request->id)->where('base_url', 'LIKE', '%' . $request->type . '%')->orderBy('order_id', 'desc')->get();
            if ($request->type == 'Stickprogramm') {
                $change_data = Order_file_upload::where('order_id', $request->id)->where('base_url', 'LIKE', '%' . $request->type . '%')->where('base_url', 'NOT LIKE', '%Stickprogramm Änderung%')->orderBy('order_id', 'desc')->get();
            }

            return DataTables::of($change_data)->addIndexColumn()
                ->editColumn('customer_number', function ($row) {
                    $customer_number = $row->order->customer_number;
                    return $customer_number;
                })
                ->editColumn('order_number', function ($row) {
                    $order_number = $row->order->order_number;
                    return $order_number;
                })

                ->addColumn('download', function ($row) {

                    $btn = '<a href="' . asset($row->base_url) . '" download><button type="button" style="background:none; border:none; padding:0;"><i class="fa-solid fa-download" style="font-size:14px; color:#c4ae79;"></i></button></a>';
                    return $btn;
                })
                ->addColumn('delete', function ($row) {
                    $btn = '<button onClick = AdminChangeDeleteFile(' . $row->id . ') style="border:none; background:inherit;"><i class="fa-solid fa-trash-can" style="color:#c4ae79;"></i></button>';
                    return $btn;
                })
                ->rawColumns(['customer_number', 'order_number', 'download', 'delete'])
                ->make(true);
        }
    }
}