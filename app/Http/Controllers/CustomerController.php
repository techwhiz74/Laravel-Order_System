<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\TempCustomer;
use App\Models\CustomerEmParameter;
use App\Models\CustomerVeParameter;
use App\Models\TempCustomerEmParameter;
use App\Models\TempCustomerVeParameter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\DeliveryFile;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use App\Mail\inviteEmployeeMail;
use App\Mail\CustomerRegisterMail;
use App\Mail\CustomerRegisterCustomerMail;
use App\Mail\ChangeProfileAdminMail;
use App\Mail\ChangeProfileCustomerMail;
use App\Mail\ChangeEmParameterAdminMail;
use App\Mail\ChangeEmParameterCustomerMail;
use App\Mail\ChangeVeParameterAdminMail;
use App\Mail\ChangeVeParameterCustomerMail;

use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Validator;





class CustomerController extends Controller
{
    //
    public function homePage()
    {
        $em_parameter = auth()->user() ? CustomerEmParameter::where('customer_id', auth()->user()->id)->first() : null;
        $ve_parameter = auth()->user() ? CustomerVeParameter::where('customer_id', auth()->user()->id)->first() : null;
        return view('home', compact('em_parameter', 've_parameter'));
    }


    public function login()
    {
        return view('users.login');
    }



    public function customerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->user_type == "customer" || Auth::user()->user_type == 'employer') {
                return redirect('/');
            } else {
                Auth::logout();
                return redirect(__('routes.customer-login'))->with('danger', 'Oops! You do not have the required access permission');
            }
        }
        return redirect(__('routes.customer-login'))->with('danger', 'Oppes! You have entered invalid credentials');
    }



    // ----------------------------Customer Register------------------------------

    public function registration()
    {
        return view('users.register');
    }

    public function customerRegistration(Request $request)
    {
        $request->validate(
            [
                // 'customer_number' => 'required',
                'name' => 'required',
                'first_name' => 'required',
                'email' => 'required|email|unique:users',
                'company' => 'required',
                'company_addition' => 'nullable',
                'street_number' => 'required',
                'postal_code' => 'required',
                'location' => 'required',
                'country' => 'required',
                'website' => 'nullable',
                'phone' => 'required',
                'mobile' => 'nullable',
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password',
                'tax_number' => 'nullable',
                'vat_number' => 'nullable',
                'register_number' => 'nullable',
                'payment_method' => 'nullable',
                'bank_name' => 'nullable',
                'IBAN' => 'nullable',
                'BIC' => 'nullable',
                'upload' => 'required',
                'avatar_upload' => 'nullable',

            ],
            [
                'email.required' => __('home.email') . ' ' . __('home.required'),
                'email.unique' => __('home.unique_email'),
                'password.required' => __('home.password_req_val'),
                'password.min' => __('home.password_min_val'),
                'confirm_password.required' => __('home.confirm_req_val'),
                'confirm_password.same' => __('home.password_confirm_val')
            ]
        );
        $file = $request->file('upload');
        $avatar_file = $request->file('avatar_upload');
        $upload_dir = 'public/';
        $folder = $request->name . '-' . $request->email;
        $path = $upload_dir . $folder;
        if ($avatar_file) {
            $avatar_filename = $avatar_file->getClientOriginalName();
        }
        $filename = $file->getClientOriginalName();
        $files = [];
        if (strlen($file->getClientOriginalName()) != 1) {
            Storage::makeDirectory($upload_dir);
            if ($avatar_file) {
                if ($file->storeAs($folder, $filename, 'public') && $avatar_file->storeyAs($folder, $avatar_filename, 'public')) {
                    $data = $request->all();
                    $data['upload'] = $path . '/' . $filename;
                    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
                    $data['avatar_upload'] = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/storage' . '/' . $folder . '/' . $avatar_filename;
                    $fullPath = '/public' . '/' . $folder . '/' . $avatar_filename;
                    $file_path = Storage::path($fullPath);
                    echo $file_path;
                    chmod($file_path, 0755);
                    $publicPath = public_path();
                    $publicStoragePath = $publicPath . '/storage';
                    chmod($publicStoragePath, 0755);
                    $files[] = 'public/' . $folder . '/' . $filename;
                    $userid = User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'company' => $data['company'],
                        'company_addition' => $data['company_addition'],
                        'first_name' => $data['first_name'],
                        'street_number' => $data['street_number'],
                        'postal_code' => $data['postal_code'],
                        'location' => $data['location'],
                        'country' => $data['country'],
                        'website' => $data['website'],
                        'phone' => $data['phone'],
                        'mobile' => $data['mobile'],
                        'tax_number' => $data['tax_number'],
                        'vat_number' => $data['vat_number'],
                        'register_number' => $data['register_number'],
                        'payment_method' => $data['payment_method'],
                        'bank_name' => $data['bank_name'],
                        'IBAN' => $data['IBAN'],
                        'BIC' => $data['BIC'],
                        'password' => Hash::make($data['password']),
                        'user_type' => 'customer',
                        'image' => $data['avatar_upload'],
                        'upload_url' => $data['upload'],
                    ]);

                    $update = User::where('id', $userid->id)->update([
                        'org_id' => $userid->id
                    ]);
                    $credentials = $request->only('email', 'password');
                    if (Auth::attempt($credentials)) {
                        $recipient_admin = User::where('user_type', 'admin')->first()->email;
                        $recipient_customer = auth()->user()->email;
                        $data['user'] = Auth::user();
                        // Mail::to($recipient_admin)->send(new CustomerRegisterMail($data, $files));
                        // Mail::to($recipient_customer)->send(new CustomerRegisterCustomerMail($data, $files));

                        $authuser = auth()->user();
                        return redirect('/')->with('message', 'You have Successfully loggedin');
                    }
                } else {
                    return redirect('/')->withErrors('Failed login');
                }
            } else {
                if ($file->storePubliclyAs($path, $filename)) {
                    $data = $request->all();
                    $data['upload'] = $path . '/' . $filename;
                    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
                    $files[] = 'public/' . $folder . '/' . $filename;
                    $userid = User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'company' => $data['company'],
                        'company_addition' => $data['company_addition'],
                        'first_name' => $data['first_name'],
                        'street_number' => $data['street_number'],
                        'postal_code' => $data['postal_code'],
                        'location' => $data['location'],
                        'country' => $data['country'],
                        'website' => $data['website'],
                        'phone' => $data['phone'],
                        'mobile' => $data['mobile'],
                        'tax_number' => $data['tax_number'],
                        'vat_number' => $data['vat_number'],
                        'register_number' => $data['register_number'],
                        'payment_method' => $data['payment_method'],
                        'bank_name' => $data['bank_name'],
                        'IBAN' => $data['IBAN'],
                        'BIC' => $data['BIC'],
                        'password' => Hash::make($data['password']),
                        'user_type' => 'customer',
                        'upload_url' => $data['upload'],
                    ]);

                    $update = User::where('id', $userid->id)->update([
                        'org_id' => $userid->id
                    ]);
                    $credentials = $request->only('email', 'password');
                    if (Auth::attempt($credentials)) {
                        $recipient_admin = User::where('user_type', 'admin')->first()->email;
                        // $recipient_customer = auth()->user()->email;
                        $data['user'] = Auth::user();
                        // Mail::to($recipient_admin)->send(new CustomerRegisterMail($data, $files));
                        // Mail::to($recipient_customer)->send(new CustomerRegisterCustomerMail($data, $files));

                        $authuser = auth()->user();
                        return redirect('/')->with('message', 'You have Successfully loggedin');
                    }
                } else {
                    return redirect('/')->withErrors('Failed login');
                }
            }

        }

    }

    public function customerLogout()
    {
        Session::flush();
        Auth::logout();

        return Redirect(__('routes.customer-login'));
    }
    public function customerChangeAvatar()
    {
        return view('users.change-avatar');
    }
    public function customerChangEAvatarHandle(Request $request)
    {
        $avatar_file = $request->file('change_avatar');
        $upload_dir = 'public/';
        $folder = 'customer-avatar';
        $avatar_filename = $avatar_file->getClientOriginalName();
        if (strlen($avatar_file->getClientOriginalName()) != 1) {
            Storage::makeDirectory($upload_dir);
            if ($avatar_file->storeAs($folder, $avatar_filename, 'public')) {
                $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
                $avatar_url = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/storage' . '/' . $folder . '/' . $avatar_filename;
                $fullPath = '/public' . '/' . $folder . '/' . $avatar_filename;
                $file_path = Storage::path($fullPath);
                echo $file_path;
                chmod($file_path, 0755);
                $publicPath = public_path();
                $publicStoragePath = $publicPath . '/storage';
                chmod($publicStoragePath, 0755);
                $customer = auth()->user();
                $customer->image = $avatar_url;
                $customer->save();
            }
        }
        return redirect('/');
    }

    public function changePassword()
    {
        return view('users.changepassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([

            'oldpassword' => 'required',
            'newpassword' => 'required',
            'password_confirmation' => 'required|same:newpassword'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {

            $users = User::find(Auth::user()->id);
            $users->password = bcrypt($request->newpassword);
            $users->save();
            session()->flash('message', 'Password updated successfully');
            return redirect(__('/'));
        } else {
            session()->flash('message', 'Old password does not matched');
            return redirect(__('routes.customerchange-password'));
        }
    }

    public function CustomerProfile()
    {
        $authuser = auth()->user()->id;
        $user = User::where('id', $authuser)->first();
        $employees = User::orderBy('id', 'desc')->where('org_id', $authuser)->where('user_type', 'employer')->get();
        return view('users.profile.profile', compact('user', 'employees'));
    }
    public function GetProfile(Request $reqeust)
    {
        $customer = auth()->user();
        return response()->json($customer);
    }


    public function profileUpdate(Request $request)
    {
        $id = $request->post('id');
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

        TempCustomer::where('customer_id', $id)->delete();

        $profile_upload = new TempCustomer();
        $profile_upload->customer_id = $id;
        $profile_upload->name = $name;
        $profile_upload->first_name = $first_name;
        $profile_upload->email = $email;
        $profile_upload->company = $company;
        $profile_upload->company_addition = $company_addition;
        $profile_upload->street_number = $street_number;
        $profile_upload->postal_code = $postal_code;
        $profile_upload->location = $location;
        $profile_upload->country = $country;
        $profile_upload->website = $website;
        $profile_upload->phone = $phone;
        $profile_upload->mobile = $mobile;
        $profile_upload->tax_number = $tax_number;
        $profile_upload->vat_number = $vat_number;
        $profile_upload->register_number = $register_number;
        $profile_upload->kd_group = $kd_group;
        $profile_upload->kd_category = $kd_category;
        $profile_upload->payment_method = $payment_method;
        $profile_upload->bank_name = $bank_name;
        $profile_upload->IBAN = $IBAN;
        $profile_upload->BIC = $BIC;
        $profile_upload->save();

        return "ok";
    }
    public function profileUpdateMail(Request $request)
    {
        $customer = User::findOrfail($request->input("customer_id"));
        $temp_customer = TempCustomer::where('customer_id', $customer->id)->first();

        $recipient_admin = User::where('user_type', 'admin')->first()->email;
        $recipient_customer = $customer->email;
        try {
            Mail::to($recipient_admin)->send(new ChangeProfileAdminMail($customer, $temp_customer));
            Mail::to($recipient_customer)->send(new ChangeProfileCustomerMail($customer, $temp_customer));
            return response()->json(['message' => 'Great! Successfully sent your email']);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['error' => 'Sorry! Please try again later']);
        }
    }
    public function GetEmParameter(Request $request)
    {
        $customer = auth()->user();
        $parameter = CustomerEmParameter::where('customer_id', $customer->id)->first();
        return response()->json($parameter);
    }
    public function GetVeParameter(Request $request)
    {
        $customer = auth()->user();
        $parameter = CustomerVeParameter::where('customer_id', $customer->id)->first();
        return response()->json($parameter);
    }
    public function ChangeEmParameter(Request $request)
    {
        $parameter1 = $request->post('parameter1');
        $parameter2 = $request->post('parameter2');
        $parameter3 = $request->post('parameter3');
        $parameter4 = $request->post('parameter4');
        $parameter5 = $request->post('parameter5');
        $parameter6 = $request->post('parameter6');
        $parameter7 = $request->post('parameter7');
        $customer = auth()->user();
        $exist_parameter = CustomerEmParameter::where('customer_id', $customer->id)->first();
        if ($exist_parameter == null) {
            $parameter = new CustomerEmParameter();
            $parameter->customer_id = $customer->id;
            $parameter->parameter1 = "";
            $parameter->parameter2 = "";
            $parameter->parameter3 = "";
            $parameter->parameter4 = "";
            $parameter->parameter5 = "";
            $parameter->parameter6 = "";
            $parameter->parameter7 = "";
            $parameter->save();
            $temp_parameter_double = new TempCustomerEmParameter();
            $temp_parameter_double->parameter_id = $parameter->id;
            $temp_parameter_double->customer_id = $customer->id;
            $temp_parameter_double->parameter1 = $parameter1;
            $temp_parameter_double->parameter2 = $parameter2;
            $temp_parameter_double->parameter3 = $parameter3;
            $temp_parameter_double->parameter4 = $parameter4;
            $temp_parameter_double->parameter5 = $parameter5;
            $temp_parameter_double->parameter6 = $parameter6;
            $temp_parameter_double->parameter7 = $parameter7;
            $temp_parameter_double->save();
        } else {
            TempCustomerEmParameter::where('parameter_id', $exist_parameter->id)->orderBy('id', 'desc')->delete();
            $temp_parameter = new TempCustomerEmParameter();
            $temp_parameter->parameter_id = $exist_parameter->id;
            $temp_parameter->customer_id = $customer->id;
            $temp_parameter->parameter1 = $parameter1;
            $temp_parameter->parameter2 = $parameter2;
            $temp_parameter->parameter3 = $parameter3;
            $temp_parameter->parameter4 = $parameter4;
            $temp_parameter->parameter5 = $parameter5;
            $temp_parameter->parameter6 = $parameter6;
            $temp_parameter->parameter7 = $parameter7;
            $temp_parameter->save();
        }

    }
    public function ChangeEmParameterMail(Request $request)
    {
        $customer = auth()->user();
        $parameter_old = CustomerEmParameter::where('customer_id', $customer->id)->first();
        $parameter_new = TempCustomerEmParameter::where('parameter_id', $parameter_old->id)->first();

        $recipient_admin = User::where('user_type', 'admin')->first()->email;
        $recipient_customer = auth()->user()->email;

        $customer = auth()->user();
        try {
            Mail::to($recipient_admin)->send(new ChangeEmParameterAdminMail($parameter_old, $parameter_new, $customer));
            Mail::to($recipient_customer)->send(new ChangeEmParameterCustomerMail($parameter_old, $parameter_new, $customer));
            return response()->json(['message' => 'Great! Successfully sent your email']);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['error' => 'Sorry! Please try again later']);
        }
    }
    public function ChangeVeParameter(Request $request)
    {
        $parameter8 = $request->post('parameter8');
        $parameter9 = $request->post('parameter9');

        $customer = auth()->user();
        $exist_parameter = CustomerVeParameter::where('customer_id', $customer->id)->first();
        if ($exist_parameter == null) {
            $parameter = new CustomerVeParameter();
            $parameter->customer_id = $customer->id;
            $parameter->parameter8 = "";
            $parameter->parameter9 = "";
            $parameter->save();
            $temp_parameter_double = new TempCustomerVeParameter();
            $temp_parameter_double->parameter_id = $parameter->id;
            $temp_parameter_double->customer_id = $customer->id;
            $temp_parameter_double->parameter8 = $parameter8;
            $temp_parameter_double->parameter9 = $parameter9;
            $temp_parameter_double->save();
        } else {
            TempCustomerVeParameter::where('parameter_id', $exist_parameter->id)->orderBy('id', 'desc')->delete();
            $temp_parameter = new TempCustomerVeParameter();
            $temp_parameter->parameter_id = $exist_parameter->id;
            $temp_parameter->customer_id = $customer->id;
            $temp_parameter->parameter8 = $parameter8;
            $temp_parameter->parameter9 = $parameter9;
            $temp_parameter->save();
        }
    }
    public function ChangeVeParameterMail(Request $request)
    {
        $customer = auth()->user();
        $parameter_old = CustomerVeParameter::where('customer_id', $customer->id)->first();
        $parameter_new = TempCustomerVeParameter::where('parameter_id', $parameter_old->id)->first();
        $recipient_admin = User::where('user_type', 'admin')->first()->email;
        $recipient_customer = auth()->user()->email;

        $customer = auth()->user();
        try {
            Mail::to($recipient_admin)->send(new ChangeVeParameterAdminMail($parameter_old, $parameter_new, $customer));
            Mail::to($recipient_customer)->send(new ChangeVeParameterCustomerMail($parameter_old, $parameter_new, $customer));
            return response()->json(['message' => 'Great! Successfully sent your email']);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['error' => 'Sorry! Please try again later']);
        }
    }

    public function files($locale, $id)
    {
        $authuser = auth()->user()->id;
        $order = Order::findOrFail($id);
        $files = DeliveryFile::where('order_id', $id)->where('customer_id', $order->user_id)->first();
        if ($files == '') {
            return view('users.downloadfiles', compact('files'));
        } else {
            $data = json_decode($files->delivery_files);
            return view('users.downloadfiles', compact('data', 'files'));
        }
    }

    public function setEmployerPassword()
    {
        $currentUrl = request()->fullUrl();
        $lastSegment = Str::afterLast($currentUrl, '/');
        $customerid = User::where('emp_invite_id', $lastSegment)->first();
        if ($customerid == '') {
            return redirect(__('routes.customer-login'))->with([
                'danger' => 'Link Expired Please create a new Invite '
            ]);
        } else {
            $customerid = User::where('emp_invite_id', $lastSegment)->first();
            $customerid = $customerid->org_id;
            return view('common.setpassword', compact('lastSegment', 'customerid'));
        }
    }

    public function EmployerPasswordUpdate(Request $request)
    {

        $validate = $request->validate([
            'emp_id' => 'required',
            'customerid' => 'required',
            'password' => 'required|confirmed'
        ]);
        if ($validate) {
            $employerid = User::where('emp_invite_id', $request->emp_id)->update([
                'password' => Hash::make($request->password),
                'user_type' => 'employer',
                'emp_invite_id' => ''
            ]);
            return redirect(__('routes.customer-login'))->with('success', 'Employer Password Updated Successfully');
        } else {
            return back();
        }
    }

    public function InviteEmployeeView()
    {
        return view('users.employee.inviteEmployee');
    }

    public function sendInvite(Request $request)
    {
        try {
            $data = $request->all();
            $customer = auth()->user();
            $email = $data['email'];
            $routeName = 'homepage';
            $url = url(__('routes.employer-setPassword'));
            $max = 16;
            $randomNumber = Str::random($max);
            $link = $url . '/' . $randomNumber;
            try {
                Mail::to($email)->send(new inviteEmployeeMail($data, $link, $customer)); // Pass $link to the mail constructor
                $userid = User::create([
                    'email' => $data['email'],
                    'user_type' => 'employer',
                    'org_id' => $customer['id'],
                    'emp_invite_id' => $randomNumber,
                ]);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Error sending invitation email.', 'error' => $e->getMessage()], 500);
            }
            return response()->json([
                'success' => true,
                'message' => 'Invitation sent successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error sending invitation email.', 'error' => $e->getMessage()], 500);
        }
    }

    public function listEmployees(Request $request)
    {
        $authuser = auth()->user()->id;
        $data = User::orderBy('id', 'desc')->where('org_id', $authuser)->where('user_type', 'employer')->get();
        return view('users.employee.listEmployees', compact('data'));
    }

    public function addEmployee(Request $request)
    {
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type' => 'employer',
            'org_id' => auth()->user()->id,
        ]);
        return 'Okay';
    }

    public function getEmployee($locale, $id)
    {
        $data = User::findOrFail($id);
        return response()->json($data);
    }

    public function updateEmployee(Request $request)
    {
        $data = $request->all();
        User::find($data['id'])->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return 'Okay';
    }

    public function editEmployee($locale, $id)
    {
        $user = User::where('id', $id)->first();
        return view('users.employee.editEmployee', compact('user'));
    }


    public function deleteEmployee($locale, $id)
    {
        $delete = User::where('id', $id)->delete();
        if ($delete) {
            return response()->json([
                'success' => 'Successfully deleted'
            ]);
        } else {
            abort(422, 'Error deleting employee.');
        }
    }
    public function EmployeeProfile()
    {
        $authuser = auth()->user()->id;
        $user = User::where('id', $authuser)->first();
        return view('users.employee.employeeProile', compact('user'));
    }
    public function EmployeeTable(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('user_type', 'employer', )->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('name', function ($row) {
                    $name = '<div style="padding-left:22px;">' . $row->name . '</div>';
                    return $name;
                })
                ->editColumn('created_on', function ($row) {
                    $created_on = $row->created_at->format('d.m.Y');
                    return $created_on;
                })
                ->addColumn('edit', function ($row) {
                    $edit = '
                        <div class="d-flex" style="gap:20px;">
                            <div style="display: flex; margin:auto;">
                                <button onclick="editEmployee(' . $row->id . ')" style="border:none; background-color:inherit;"><i
                                        class="fa-solid fa-pen-to-square" style="color:#c4ae79;"></i></button>
                            </div>
                        </div>';
                    return $edit;
                })
                ->addColumn('delete', function ($row) {
                    $delete = '
                        <div class="d-flex" style="gap:20px;">
                            <div style="display: flex; margin:auto;">
                                <span><i class="fa-solid fa-trash" style="color:#c4ae79;"
                                        onclick="deleteEmployee(' . $row->id . ')"
                                        style="cursor:pointer;"></i></span>
                            </div>
                        </div>';
                    return $delete;
                })
                ->rawColumns(['name', 'created_on', 'edit', 'delete'])
                ->make(true);

        }
    }

}