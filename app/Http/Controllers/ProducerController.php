<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producers;

use function GuzzleHttp\Promise\all;

class ProducerController extends Controller
{
    public function index()
    {
        $producers = Producers::get();
        return view('listings.create', [
            'producers' => $producers
        ]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $validator = Producers::make($request->all(), [
            'name' => 'required',
            'sex' => 'required',
            'DOB' => 'required',
            'bio' => 'required'
        ]);
  
        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
       
        Producers::create([
            'name' => $request->name,
            'sex' => $request->sex,
            'DOB' => $request->DOB,
            'bio' => $request->bio,
        ]);
  
        return response()->json(['success' => 'List created successfully.']);
    }
}
