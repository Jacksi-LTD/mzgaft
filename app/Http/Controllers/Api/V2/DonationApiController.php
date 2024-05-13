<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Api\DontaionRequest;
use App\Http\Resources\DonationResource;
use Validator;
use App\Http\Resources\AdviceResource;
use App\Models\Donation;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DonationApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $advices=Donation::orderBy('id','desc')->get();
        return JsonResponse::success(DonationResource::collection($advices));
    }




    public function store(Request $request)
    {
        $rules = [
            'amount'     => 'required',
            'bank'     => 'required',
            'trans_number'     => 'required',
            'image'     => 'required',
        ];

        $messages = [
            'required' => ':attribute field is required.',
        ];

        $customMessages = [
            'amount.required' => 'The Transfer Amount is mandatory.',
            'bank.required' => 'Please specify the Bank Name.',
            'trans_number.required' => 'We need the Transaction Number to proceed.',
            'image.required' => 'Upload a Transfer Receipt Image.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages, []);

        if ($validator->fails()) {

            return JsonResponse::fail($validator->errors()->first());
        }

        $don=Donation::create($request->all());
        if ($request->hasFile('image')) {
            $don->addMedia($request->image)->toMediaCollection('image');
        }
        return JsonResponse::success($don);
    }




}
