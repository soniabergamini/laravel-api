<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactRequestController extends Controller
{
    public function store(Request $request) {

        // $request->validated();

        // Validation
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|min:2|max:50',
                'email' => 'required|email|min:5|max:50',
                'message' => 'required'
            ]
        );

        // Validation Failure
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Fill & Save data on DB
        $newContactRequest = new ContactRequest();
        $newContactRequest->fill($data);
        $newContactRequest->save();

        // Send Email


        // Validation Success
        return response()->json([
            'success' => true
        ]);
    }
}
