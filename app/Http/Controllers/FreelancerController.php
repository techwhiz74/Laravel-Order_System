<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderChange;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\Order_address;
use App\Models\OrderAddress;
use Intervention\Image\Facades\Image;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\DeliveryFile;
use Illuminate\Support\Facades\Validator;



use DataTables;

use App\Models\Order_file_upload;
use Illuminate\Support\Env;

use function PHPUnit\Framework\returnCallback;

class FreelancerController extends Controller
{
    public function freelancerloginpage()
    {
        return view('freelancer.login');
    }

    public function adminloginpage11()
    {
        return view('admin.login');
    }

    public function freelancerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->user_type == "freelancer") {
                return redirect('/');
            } else {
                Auth::logout();
                return redirect(__('routes.freelancer-login'))->with('danger', 'Oops! You do not have the required access permission');
            }
        }
        return redirect(__('routes.freelancer-login'))->with('danger', 'Oppes! You have entered invalid credentials');
    }

    public function goFreelancerLogin()
    {
        return redirect()->route('freelancer-login', ['locale' => app()->getLocale()]);
    }


    public function freelancerLogout()
    {
        Session::flush();
        Auth::logout();

        return Redirect(__('routes.freelancer-login'));
    }

    public function viewOrder(Request $request)
    {
        $authuser = auth()->user()->id;
        if ($request->status_filter != '') {
            if ($request->status_filter == 'pending') {
                $data = Order::with('Order_address', 'category', 'Orderfile_uploads')->orderBy('id', 'desc')->where('status', 'pending')->get();
                return Datatables::of($data)->addIndexColumn()
                    ->editColumn('catgory', function ($row) {
                        $category = $row->category->category_name;
                        return $category;
                    })
                    ->editColumn('company', function ($row) {
                        $company = $row->order_address->company;
                        return $company;
                    })
                    ->editColumn('user', function ($row) {
                        $user = $row->user->name;
                        return $user;
                    })
                    ->editColumn('date', function ($row) {
                        $date = $row->created_at->format('Y-m-d');
                        return $date;
                    })
                    ->addColumn('detail', function ($row) {
                        $btn = '<a style="text-decoration:none;" class="btn btn-secondary btn-sm" href=' . __("routes.freelancer-orderdetails") . $row->id . '>Order deatils</a>';
                        return $btn;
                    })
                    // ->addColumn('action', function ($row) {
                    //     $btn =  '<div class="d-flex" style="gap:20px;">
                    //                 <div><a href=""><i class="fa-solid fa-circle-xmark" style="color: #d41616;"></i></a></div>
                    //                 <div><a href=""><i class="fa-solid fa-circle-check" style="color: #0d8604;"></i></a></div>
                    //             </div>';
                    //     return $btn;
                    // })
                    ->addColumn('upload', function ($row) {
                        $btn = '<a href=' . __("routes.delivery-files") . $row->id . ' class="btn btn-secondary btn-sm"> Upload Files </a>';
                        return $btn;
                    })
                    ->rawColumns(['catgory', 'upload', 'user', 'date', 'company', 'detail'])
                    ->make(true);
            }
            if ($request->status_filter == 'delivered') {
                $data = Order::with('Order_address', 'category', 'Orderfile_uploads')->orderBy('id', 'desc')->where('status', 'delivered')->get();
            }
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('catgory', function ($row) {
                    $category = $row->category->category_name;
                    return $category;
                })
                ->editColumn('company', function ($row) {
                    $company = $row->order_address->company;
                    return $company;
                })
                ->editColumn('date', function ($row) {
                    $date = $row->created_at->format('Y-m-d');
                    return $date;
                })
                ->editColumn('user', function ($row) {
                    $user = $row->user->name;
                    return $user;
                })
                ->editColumn('selection', function ($row) {
                    $date = __($row->selection);
                    return $date;
                })
                ->addColumn('detail', function ($row) {
                    $btn = '<a style="text-decoration:none;" class="btn btn-secondary btn-sm" href=' . __("routes.freelancer-orderdetails") . $row->id . '>Order deatils</a>';
                    return $btn;
                })
                // ->addColumn('action', function ($row) {
                //     $btn =  '<div class="d-flex" style="gap:20px;">
                //                 <div><a href=""><i class="fa-solid fa-circle-xmark" style="color: #d41616;"></i></a></div>
                //                 <div><a href=""><i class="fa-solid fa-circle-check" style="color: #0d8604;"></i></a></div>
                //             </div>';
                //     return $btn;
                // })
                ->addColumn('upload', function ($row) {
                    $btn = '<a href=' . __("routes.delivery-files") . $row->id . ' class="btn btn-secondary btn-sm"> Upload Files </a>';
                    return $btn;
                })
                ->rawColumns(['catgory', 'upload', 'user', 'date', 'company', 'detail'])
                ->make(true);
        } else {
            if ($request->ajax()) {
                $data = Order::with('Order_address', 'category', 'Orderfile_uploads')->orderBy('id', 'desc')->where('assigned_to', $authuser)->get();
                return Datatables::of($data)->addIndexColumn()
                    ->editColumn('catgory', function ($row) {
                        $category = $row->category->category_name;
                        return $category;
                    })
                    ->editColumn('user', function ($row) {
                        $user = $row->user->name;
                        return $user;
                    })
                    ->editColumn('company', function ($row) {
                        $company = $row->Order_address->company;
                        return $company;
                    })
                    ->editColumn('date', function ($row) {
                        $date = $row->created_at->format('Y-m-d');
                        return $date;
                    })
                    ->editColumn('selection', function ($row) {
                        $date = __($row->selection);
                        return $date;
                    })
                    ->addColumn('detail', function ($row) {
                        $btn = '<a style="text-decoration:none;" class="btn btn-secondary btn-sm" href=' . __("routes.freelancer-orderdetails") . $row->id . '>Order deatils</a>';
                        return $btn;
                    })
                    // ->addColumn('action', function ($row) {

                    //     $btn =  '<div class="d-flex" style="gap:20px;">
                    //                 <div><a href=""><i class="fa-solid fa-circle-xmark" style="color: #d41616;"></i></a></div>
                    //                 <div><a href=""><i class="fa-solid fa-circle-check" style="color: #0d8604;"></i></a></div>
                    //             </div>';
                    //     return $btn;
                    // })
                    ->addColumn('upload', function ($row) {
                        $btn = '<a href=' . __("routes.delivery-files") . $row->id . ' class="btn btn-secondary btn-sm"> Upload Files </a>';
                        return $btn;
                    })
                    ->rawColumns(['catgory', 'upload', 'user', 'date', 'company', 'detail'])
                    ->make(true);
            }
        }
        return view('freelancer.orders.vieworders');
    }

    public function orderDetails($locale, $id)
    {
        $authuser = auth()->user()->id;
        $order = Order::with('Order_address', 'Orderfile_uploads', 'Orderfile_formats')->where('id', $id)->first();
        return view('common.orderdetails', compact('order'));
    }

    public function downloadAddressFIle(Request $request)
    {
        $uploadedFile = $request->image;
        $jpgImage = Image::make($uploadedFile)->encode('jpg');
        // $response = response()->streamDownload(function () use ($jpgImage) {
        //     echo $jpgImage;
        // }, $filename . '.jpg');

        // return $response->header('Content-Type', 'image/jpeg');
    }


    public function downloadFile(Request $request)
    {
        $file = $request->addressfile;
        $file_path = public_path() . "/orders/$file";

        $headers = array(
            'Content-Type: image/jpeg',
        );
        return Response::download($file_path, $file, $headers);
    }

    public function checkFiles(Request $request)
    {
        $id = $request->id;
        $category = $request->category;
        $ordersfiles = Order_file_upload::where('order_id', $id)->get();
        // $ordersfiles = Order::with('Orderfile_uploads')->where('id', $id)->first();
        return response()->json([
            'data' => $ordersfiles
        ]);
    }

    public function freelancerProfile()
    {
        $authuser = auth()->user()->id;
        $user = User::where('id', $authuser)->first();
        return view('freelancer.profile.profile', compact('user'));
    }
    public function Profileupdate(Request $request)
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

    public function changePassword()
    {
        return view('freelancer.changepassword');
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
            return redirect(__('routes.freelancer-changepassword'));
        }
    }

    public function DeleteFile($locale, $id, $orderid)
    {
        $indexToDelete = $id;
        $ordersid = $orderid;

        $deleteFile = DeliveryFile::where('order_id', $orderid)->first();
        $deliveryFiles = json_decode($deleteFile->delivery_files);
        if ($indexToDelete >= 0 && $indexToDelete < count($deliveryFiles)) {
            unset($deliveryFiles[$indexToDelete]);
            $deliveryFiles = array_values($deliveryFiles);
            $update = DeliveryFile::where('order_id', $orderid)->update([
                'delivery_files' => $deliveryFiles,
            ]);
        } else {
            return response()->json([
                'message' => 'Not Deleted',
            ]);
        }
        return back()->with('success', 'File Deleted Successfully');
    }


    public function filtersData()
    {
        dd('ok');
    }
    public function EmbroideryFreelancerGreenTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Embroidery')->where('status', 'Offen')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $date = $row->created_at->format('d.m.Y');
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
                ->addColumn('action', function ($row) {
                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none;" onclick="openOrderChangeModal(' . $row->id . ')"><img src="' . asset('asset/images/ÄndernIcon.svg') . '"></button></div>';
                    return $btn;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="openOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
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
                ->rawColumns(['order', 'action', 'date', 'detail', 'status', 'type', 'deliver_time'])
                ->make(true);
        }
    }
    public function EmbroideryFreelancerYellowTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Embroidery')->where('status', 'In Bearbeitung')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $date = $row->created_at->format('d.m.Y');
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
                ->addColumn('action', function ($row) {
                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none;" onclick="openOrderChangeModal(' . $row->id . ')"><img src="' . asset('asset/images/ÄndernIcon.svg') . '"></button></div>';
                    return $btn;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="openOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
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
                ->rawColumns(['order', 'action', 'date', 'detail', 'status', 'type', 'deliver_time'])
                ->make(true);
        }
    }
    public function EmbroideryFreelancerRedTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Embroidery')->where('status', 'Ausgeliefert')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $date = $row->created_at->format('d.m.Y');
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
                ->addColumn('action', function ($row) {
                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none;" onclick="openOrderChangeModal(' . $row->id . ')"><img src="' . asset('asset/images/ÄndernIcon.svg') . '"></button></div>';
                    return $btn;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="openOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
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
                ->rawColumns(['order', 'action', 'date', 'detail', 'status', 'type', 'deliver_time'])
                ->make(true);
        }
    }
    public function EmbroideryFreelancerBlueTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Embroidery')->where('status', 'Änderung')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $date = $row->created_at->format('d.m.Y');
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
                ->addColumn('action', function ($row) {
                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none;" onclick="openOrderChangeModal(' . $row->id . ')"><img src="' . asset('asset/images/ÄndernIcon.svg') . '"></button></div>';
                    return $btn;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="openOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
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
                                        <button onclick="FreelancerDetailRequest(' . $row->id . ', \'Originaldatei\')" style="border:none; background-color:none;"><i class="fa-solid fa-exclamation blink" style="color:#ff0000; transform:scale(2,1);"></i></button>
                                    </div>
                                </div>
                            ';
                    }
                    return $req;
                })
                ->rawColumns(['order', 'action', 'date', 'detail', 'status', 'type', 'deliver_time', 'request'])
                ->make(true);
        }
    }
    public function EmbroideryFreelancerAllTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Embroidery')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $date = $row->created_at->format('d.m.Y');
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
                ->addColumn('action', function ($row) {
                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none;" onclick="openOrderChangeModal(' . $row->id . ')"><img src="' . asset('asset/images/ÄndernIcon.svg') . '"></button></div>';
                    return $btn;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="openOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
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
                                        <button onclick="FreelancerDetailRequest(' . $row->id . ', \'Originaldatei\')" style="border:none; background-color:none;"><i class="fa-solid fa-exclamation blink" style="color:#ff0000; transform:scale(2,1);"></i></button>
                                    </div>
                                </div>
                            ';
                    }
                    return $req;
                })
                ->rawColumns(['order', 'action', 'date', 'detail', 'status', 'type', 'deliver_time', 'request'])
                ->make(true);
        }
    }
    public function EmbroideryFreelancerGreenDashboardTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Embroidery')->where('status', 'Offen')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->addColumn('art', function ($row) {
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

                ->rawColumns(['order', 'status', 'art'])
                ->make(true);
        }
    }
    public function EmbroideryFreelancerYellowDashboardTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Embroidery')->where('status', 'In Bearbeitung')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->addColumn('art', function ($row) {
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

                ->rawColumns(['order', 'status', 'art'])
                ->make(true);
        }
    }
    public function EmbroideryFreelancerRedDashboardTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Embroidery')->where('status', 'Ausgeliefert')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->addColumn('art', function ($row) {
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

                ->rawColumns(['order', 'status', 'art'])
                ->make(true);
        }
    }
    public function EmbroideryFreelancerBlueDashboardTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Embroidery')->where('status', 'Änderung')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->addColumn('art', function ($row) {
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
                ->addColumn('request', function ($row) {
                    $req = '';

                    if ($row->status == 'Änderung') {
                        $req = '
                                <div class="d-flex" style="gap:20px;">
                                    <div style="display: flex; margin:auto;">
                                        <button onclick="FreelancerDetailRequest(' . $row->id . ', \'Originaldatei\')" style="border:none; background-color:none;"><i class="fa-solid fa-exclamation blink" style="color:#ff0000; transform:scale(2,1);"></i></button>
                                    </div>
                                </div>
                            ';
                    }
                    return $req;
                })

                ->rawColumns(['order', 'status', 'art', 'request'])
                ->make(true);
        }
    }
    public function getRequestDetail(Request $request)
    {
        $order = Order::findOrfail($request->get('id'));
        $order_change = OrderChange::where('order_number', $order->order_number)->first();
        $order_file_uploads = Order_file_upload::where('order_id', $request->get('id'))->pluck('base_url');
        return response()->json(['order' => $order, 'order_change' => $order_change, 'detail' => $order_file_uploads]);
    }
    public function OrderDetail(Request $request)
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

                    $btn = '<a href="' . asset($row->base_url) . '" download="' . $row->order->customer_number . '-' . $row->order->order_number . '-' . $row->index . '"><button type="button" style="background:none; border:none; padding:0;"><i class="fa-solid fa-download" style="font-size:14px; color:#222222;"></i></button></a>';
                    return $btn;
                })

                ->rawColumns(['customer_number', 'order_number', 'download'])
                ->make(true);
        }
    }

    public function VectorFreelancerGreenTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Vector')->where('status', 'Offen')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $date = $row->created_at->format('d.m.Y');
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
                ->addColumn('action', function ($row) {
                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none;" onclick="openOrderChangeModal(' . $row->id . ')"><img src="' . asset('asset/images/ÄndernIcon.svg') . '"></button></div>';
                    return $btn;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="openOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
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
                ->rawColumns(['order', 'action', 'date', 'detail', 'status', 'type', 'deliver_time'])
                ->make(true);
        }
    }
    public function VectorFreelancerYellowTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Vector')->where('status', 'In Bearbeitung')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $date = $row->created_at->format('d.m.Y');
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
                ->addColumn('action', function ($row) {
                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none;" onclick="openOrderChangeModal(' . $row->id . ')"><img src="' . asset('asset/images/ÄndernIcon.svg') . '"></button></div>';
                    return $btn;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="openOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
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
                ->rawColumns(['order', 'action', 'date', 'detail', 'status', 'type', 'deliver_time'])
                ->make(true);
        }
    }
    public function VectorFreelancerRedTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Vector')->where('status', 'Ausgeliefert')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $date = $row->created_at->format('d.m.Y');
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
                ->addColumn('action', function ($row) {
                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none;" onclick="openOrderChangeModal(' . $row->id . ')"><img src="' . asset('asset/images/ÄndernIcon.svg') . '"></button></div>';
                    return $btn;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="openOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
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
                ->rawColumns(['order', 'action', 'date', 'detail', 'status', 'type', 'deliver_time'])
                ->make(true);
        }
    }
    public function VectorFreelancerAllTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Vector')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->editColumn('date', function ($row) {
                    $date = $row->created_at->format('d.m.Y');
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
                ->addColumn('action', function ($row) {
                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none;" onclick="openOrderChangeModal(' . $row->id . ')"><img src="' . asset('asset/images/ÄndernIcon.svg') . '"></button></div>';
                    return $btn;
                })
                ->addColumn('detail', function ($row) {

                    $btn = '<div style="width:100%;text-align:center;"><button style="border:none; background:none; " onclick="openOrderDetailModal(' . $row->id . ', \'Originaldatei\')"><img src="' . asset('asset/images/DetailIcon.svg') . '" alt="order-detail-icon" ></button></div>';
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
                ->rawColumns(['order', 'action', 'date', 'detail', 'status', 'type', 'deliver_time'])
                ->make(true);
        }
    }
    public function VectorFreelancerGreenDashboardTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Vector')->where('status', 'Offen')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->addColumn('art', function ($row) {
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

                ->rawColumns(['order', 'status', 'art'])
                ->make(true);
        }
    }
    public function FreelancerFileUpload(Request $request)
    {
        $freelancer_request_id = $request->post('freelancer_request_id');
        $order = Order::findOrfail($freelancer_request_id);

        $order->status = "Ausgeliefert";
        $order->save();
        OrderChange::where('order_number', $order->order_number)->delete();
        $files = $request->file("files");
        $uploadDir = 'public/';
        $filePath = $order->customer_number . '/' .
            $order->customer_number . '-' . $order->order_number . '-' . $order->project_name . '/Stickprogramm Änderung/';
        $path = $uploadDir . $filePath;
        foreach ($files as $key => $file) {
            // Check whether the current entity is an actual file or a folder (With a . for a name)
            if (strlen($file->getClientOriginalName()) != 1) {
                Storage::makeDirectory($uploadDir);
                $fileName = $order->customer_number . '-' . $order->order_number . '-' . ($key + 1) . '.' . $file->getClientOriginalExtension();
                $exist_file = Order_file_upload::where('base_url', 'LIKE', 'storage/' . $filePath . '%')->orderBy('base_url', 'desc')->first();
                if ($exist_file != null) {
                    $filePathArray = explode('/', $exist_file->base_url);
                    $fileNameArray = explode('-', $filePathArray[4]);
                    $fileExtensionArray = explode('.', $fileNameArray[2]);
                    $index = $fileExtensionArray[0];
                    $index = $index + 1;
                    $fileName = $order->customer_number . '-' . $order->order_number . '-' . $index . '.' . $file->getClientOriginalExtension();
                    if ($file->storePubliclyAs($path, $fileName)) {
                        $order_file_upload = new Order_file_upload();
                        $order_file_upload->order_id = $order->id;
                        $order_file_upload->index = $index;
                        $order_file_upload->extension = $file->getClientOriginalExtension();
                        $order_file_upload->base_url = 'storage/' . $filePath . $fileName;
                        $order_file_upload->save();
                        echo "The file " . $fileName . " has been uploaded";
                    } else
                        echo "Error";
                } else {
                    if ($file->storePubliclyAs($path, $fileName)) {
                        $order_file_upload = new Order_file_upload();
                        $order_file_upload->order_id = $order->id;
                        $order_file_upload->index = $key + 1;
                        $order_file_upload->extension = $file->getClientOriginalExtension();
                        $order_file_upload->base_url = 'storage/' . $filePath . $fileName;
                        $order_file_upload->save();
                        echo "The file " . $fileName . " has been uploaded";
                    } else
                        echo "Error";
                }

            }
        }
        return "OK!";
    }
    public function VectorFreelancerYellowDashboardTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Vector')->where('status', 'In Bearbeitung')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->addColumn('art', function ($row) {
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

                ->rawColumns(['order', 'status', 'art'])
                ->make(true);
        }
    }
    public function VectorFreelancerRedDashboardTable(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::orderBy('id', 'desc')->where('type', 'Vector')->where('status', 'Ausgeliefert')->get();
            return DataTables::of($data)->addIndexColumn()
                ->editColumn('order', function ($row) {
                    $order = $row->customer_number . '-' . $row->order_number;
                    return $order;
                })
                ->addColumn('art', function ($row) {
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

                ->rawColumns(['order', 'status', 'art'])
                ->make(true);
        }
    }
}