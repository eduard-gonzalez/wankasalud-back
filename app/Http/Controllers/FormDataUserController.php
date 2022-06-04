<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Models\FormDataUser;

class FormDataUserController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'video_url' => 'required|string',
        ]);

        $video_url = "";
        if($request->has('video_url')) $video_url = $request->video_url;

        if($validator->fails()) return response()->json(['status' => 'error', 'message' => 'There was an error saving the data.  Please try again later.'], 201);

        $formDataUser = FormDataUser::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'video_url' => $request->video_url
        ]);

        $details = [
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'video_url' => $request->video_url
        ];

        \Mail::to($request->email)->send(new \App\Mail\DataForm($details));

        return response()->json(['status' => 'success', 'message' => 'Thanks, a member of our team will be in touch shortly.'], 201);
    }
}
