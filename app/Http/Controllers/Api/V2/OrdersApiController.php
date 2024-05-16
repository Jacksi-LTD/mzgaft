<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Api\DontaionRequest;
use App\Http\Resources\DonationResource;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use Validator;
use App\Http\Resources\AdviceResource;
use App\Models\Donation;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrdersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        //$advices=Donation::orderBy('id','desc')->get();
        //return JsonResponse::success(DonationResource::collection($advices));
    }




    public function store(Request $request)
    {
        $rules = [
            'name'     => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'products'     => 'required|array',
        ];

        $messages = [
            'required' => ':attribute field is required.',
        ];

        $customMessages = [
            'name.required' => 'The name is mandatory.',
            'email.required' => 'The email is mandatory.',
            'phone.required' => 'phone is mandatory.',
            'products.required' => 'products is mandatory.',
            'products.array' => 'products must be array.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages, []);

        if ($validator->fails()) {

            return JsonResponse::fail($validator->errors()->first());
        }

        $order=Order::create($request->all());
        if(isset($request->products) && $request->products[0] != null){

            foreach ($request->products as $key=>$pro){
               $product=Product::findOrFail($pro['id']);
               $new=new Order_item();
               $new->order_id =$order->id;
               $new->product_id =$pro['id'];
               $new->qty =$pro['qty'];
               $new->price =$product->price;
               $new->total =$product->price * $pro['qty'];
               $new->save();
            }
        }

        return JsonResponse::success($order);
    }




}
