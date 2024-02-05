<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryFile;
use App\Models\Order;
use App\Models\DeliveryPage;
use Illuminate\Support\Facades\Storage;
use Helper;


class DeliveryFileController extends Controller
{


    public function DeliveryPage($locale, $id)
    {

        $orderid = $id;
        $freelancer_files = DeliveryFile::where('order_id', $id)->first();
        if ($freelancer_files) {
            $data = json_decode($freelancer_files->delivery_files);
            $orderdata = Order::with('Order_address', 'Orderfile_uploads', 'category')->where('id', $id)->first();
            $delivery_files = DeliveryFile::where('order_id', $id)->first();
            return view('freelancer.upload.deliveryfiles', compact('orderdata', 'orderid', 'delivery_files', 'freelancer_files'));
        } else {

            return view('freelancer.upload.deliveryfiles', compact('freelancer_files', 'orderid'));
        }
    }

    public function UploadDeliveryFiles(Request $request)
    {
        $order = Order::find($request->order_id);
        foreach ($request->file('file_upload') as $file) {
            $uploadFileName = pathinfo($file->getClientOriginalName() ,PATHINFO_FILENAME);
            $uploadFinalName = $order->user_id . '-' . $order->id .'-'. Helper::slugify($uploadFileName).'.'.$file->getClientOriginalExtension();
            $upload_destination = $order->user_id . '-' . $order->id .'-'. Helper::slugify($order->project_name). '/Stickprogramm/'  . $uploadFinalName;
            $upload_path = Storage::disk('s3')->put($upload_destination, file_get_contents($file), [
                'ContentDisposition' => 'attachment'
            ]);
            $upload_imageUrl = Storage::disk('s3')->url($upload_destination);
            $files[] = $upload_imageUrl;
        }

        $existingFile = DeliveryFile::where('order_id', $request->order_id)->first();
        if ($existingFile) {
            $file = json_decode($existingFile->delivery_files);
            if ($file) {
                $existingFile->delivery_files = array_merge($file, $files);
                $existingFile->save();
            } else {
                $existingFile->delivery_files = $files;
                $existingFile->save();
            }
        } else {
            $data = Order::where('id', $request->order_id)->first();
            DeliveryFile::create([
                'order_id' => $request->order_id,
                'customer_id' => $data->user_id,
                'freelancer_id' => $data->assigned_to,
                'delivery_files' => json_encode($files)
            ]);
            $update = Order::where('id', $request->order_id)->update([
                'status' => 'delivered',
            ]);
        }



        return response()->json([
            'message' => 'success'
        ]);
    }
}
