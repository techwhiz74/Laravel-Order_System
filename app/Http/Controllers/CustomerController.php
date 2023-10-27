<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TempCustomer;
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
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Validator;





class CustomerController extends Controller
{
    //
    public function homePage()
    {
        return view('home');
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
                'company_addition' => 'required',
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
                'kd_group' => 'nullable',
                'kd_category' => 'nullable',
                'payment_method' => 'nullable',
                'bank_name' => 'nullable',
                'IBAN' => 'nullable',
                'BIC' => 'nullable',
                'upload' => 'required',

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

        $data = $request->all();
        $userid = User::create([
            // 'customer_number' => $data['customer_number'],
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
            'kd_group' => $data['kd_group'],
            'kd_category' => $data['kd_category'],
            'payment_method' => $data['payment_method'],
            'bank_name' => $data['bank_name'],
            'IBAN' => $data['IBAN'],
            'BIC' => $data['BIC'],
            'password' => Hash::make($data['password']),
            'user_type' => 'customer',
            'image' => 'https://upload-files-cos.s3.amazonaws.com/6-profile1693225145-1692011047-2021-10-20.jpg',
        ]);
        $update = User::where('id', $userid->id)->update([
            'org_id' => $userid->id
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/')->with('message', 'You have Successfully loggedin');
        }
    }

    public function customerLogout()
    {
        Session::flush();
        Auth::logout();

        return Redirect(__('routes.customer-login'));
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
            session()->flash('message', 'password updated successfully');
            return redirect(__('/'));
        } else {
            session()->flash('message', 'old password does not matched');
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



        // var_dump($request->all());
        // die();
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'name' => 'required',
        //         'first_name' => 'required',
        //         'email' => 'required|email',
        //         'company' => 'required',
        //         'company_addition' => 'required',
        //         'street_number' => 'required',
        //         'postal_code' => 'required',
        //         'location' => 'required',
        //         'country' => 'required',
        //         'website' => 'required',
        //         'phone' => 'required',
        //         'mobile' => 'required',
        //         'tax_number' => 'nullable',
        //         'vat_number' => 'nullable',
        //         'register_number' => 'nullable',
        //         'kd_group' => 'nullable',
        //         'kd_category' => 'nullable',
        //         'payment_method' => 'nullable',
        //         'bank_name' => 'nullable',
        //         'IBAN' => 'nullable',
        //         'BIC' => 'nullable',
        //     ],
        //     [
        //         'email.required' => __('home.email') . ' ' . __('home.required'),
        //     ]
        // );

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput()
        //         ->with('sidebar', true);
        // }

        // $user = new TempCustomer();
        // // $address = $request->address;
        // // if ($request->hasFile('image')) {
        // //     $file = $request->file('image');
        // //     $filename = time() . '-' . $file->getClientOriginalName();
        // //     $destination = $user->id . '-profile' . $filename;
        // //     $path = Storage::disk('s3')->put($destination, file_get_contents($file));
        // //     $imageUrl = Storage::disk('s3')->url($destination);
        // //     $user->image = $imageUrl;
        // // }
        // $user->name = $request->name;
        // $user->first_name = $request->first_name;
        // $user->email = $request->email;
        // $user->company = $request->company;
        // $user->company_addition = $request->company_addition;
        // $user->street_number = $request->street_number;
        // $user->postal_code = $request->postal_code;
        // $user->location = $request->location;
        // $user->country = $request->country;
        // $user->website = $request->website;
        // $user->phone = $request->phone;
        // $user->mobile = $request->mobile;
        // $user->tax_number = $request->tax_number;
        // $user->vat_number = $request->vat_number;
        // $user->register_number = $request->register_number;
        // $user->kd_group = $request->kd_group;
        // $user->kd_category = $request->kd_category;
        // $user->payment_method = $request->payment_method;
        // $user->bank_name = $request->bank_name;
        // $user->IBAN = $request->IBAN;
        // $user->BIC = $request->BIC;

        // $user->save();
        // return redirect()->back()->with('success', 'Profile was updated. Please wait for acceptation of admin');
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

    // public function updateEmployee(Request $request)
    // {
    //     try {

    //         $user = User::where('id', $request->id)->first();
    //         $data = $request->all();

    //         if ($request->input('email') != $user->email) {
    //             $confirmed = $request->has('confirmed_email_update');
    //             if ($confirmed == '1') {
    //                 $customer = auth()->user();
    //                 $email = $data['email'];
    //                 $url = url(__('routes.employer-setPassword'));
    //                 $max = 16;
    //                 $randomNumber = Str::random($max);
    //                 $link = $url . '/' . $randomNumber;
    //                 try {

    //                     if ($request->hasFile('image')) {
    //                         $file = $request->file('image');
    //                         $filename = time() . '-' . $file->getClientOriginalName();
    //                         $destination = $user->id . '-profile' . $filename;
    //                         $path = Storage::disk('s3')->put($destination, file_get_contents($file));
    //                         $imageUrl = Storage::disk('s3')->url($destination);
    //                     } else {
    //                         $imageUrl = $user->image;
    //                     }
    //                     $user->update([
    //                         'name' => $request->name,
    //                         'email' => $request->email,
    //                         'contact_no' => $request->input('number'),
    //                         'salutation' => $request->salutation,
    //                         'company' => $request->company,
    //                         'address' => $request->address,
    //                         'zip_code' => $request->zip_code,
    //                         'place' => $request->place,
    //                         'vat_no' => $request->vat_no,
    //                         'site' => $request->site,
    //                         'thread' => $request->thread,
    //                         'emb_fileType' => $request->file_emb,
    //                         'vec_fileType' => $request->file_vect,
    //                         'thread_notes' => $request->thread_instruction,
    //                         'thread_cut_notes' => $request->thread_cut,
    //                         'needle_notes' => $request->needle_instruction,
    //                         'font_notes' => $request->font_instruction,
    //                         'special_notes' => $request->special_instruction,
    //                         'emp_invite_id' => $randomNumber,
    //                         'password' => '',
    //                         'image' => $imageUrl
    //                     ]);
    //                     Mail::to($email)->send(new inviteEmployeeMail($data, $link, $customer)); // Pass $link to the mail constructor

    //                     return back()->with('success', 'Profile is updated successfully and invitation mail sent to new employee !');
    //                 } catch (\Exception $e) {
    //                     return response()->json(['message' => 'Error sending invitation email.', 'error' => $e->getMessage()], 500);
    //                 }
    //             }
    //         } else {
    //             $address = $request->address;
    //             if ($request->hasFile('image')) {
    //                 $file = $request->file('image');
    //                 $filename = time() . '-' . $file->getClientOriginalName();
    //                 $destination = $user->id . '-profile' . $filename;
    //                 $path = Storage::disk('s3')->put($destination, file_get_contents($file));
    //                 $imageUrl = Storage::disk('s3')->url($destination);
    //             } else {
    //                 $imageUrl = $user->image;
    //             }
    //             $user->update([
    //                 'name' => $request->name,
    //                 'contact_no' => $request->input('number'),
    //                 'salutation' => $request->salutation,
    //                 'company' => $request->company,
    //                 'address' => $request->address,
    //                 'zip_code' => $request->zip_code,
    //                 'place' => $request->place,
    //                 'vat_no' => $request->vat_no,
    //                 'site' => $request->site,
    //                 'thread' => $request->thread,
    //                 'emb_fileType' => $request->file_emb,
    //                 'vec_fileType' => $request->file_vect,
    //                 'thread_notes' => $request->thread_instruction,
    //                 'thread_cut_notes' => $request->thread_cut,
    //                 'needle_notes' => $request->needle_instruction,
    //                 'font_notes' => $request->font_instruction,
    //                 'special_notes' => $request->special_instruction,
    //                 'image' => $imageUrl
    //             ]);
    //             return back()->with('success', 'Profile updated successfully!');
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'message' => 'An error occurred.',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

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
                                <button onclick="editEmployee(' . $row->id . ')" style="border:none; background-color:none;"><i
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