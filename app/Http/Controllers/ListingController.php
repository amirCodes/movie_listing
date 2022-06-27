<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Actors;
use App\Models\Producers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        return view('listings.index', ['listings' => Listing::latest()->get()]);
    }
    //Show producers list
    // public function showProducer(Producers $listings)
    // {
    //     // return view('listings.show', [
    //     //     'listing' => $listing,
    //     // ]);
        
    //     return response()->json($listings);
    //     // return Response::json($listing);
    // }
    public function getProducer(){
        $producers = Producers::orderby('id','asc')->select('*')->get(); 
        // Fetch all records
        $response['data'] = $producers;
        //  dd($response);
        return response()->json($response);
      }
    //Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    // Show Create Form
    public function create()
    {
        return view('listings.create', ['actors' => Actors::latest()->get(), 'producers' => Producers::latest()->get()]);
    }

    // Store Producer data
    public function createProducers(Request $request)
    {
        $request->validate([
            'name'=> ['required', Rule::unique('listings', 'name')],
            'sex' => 'required',
            'DOB' => 'required',
            'bio' => 'required',
        ]);

        $post = Producers::updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'sex' => $request->sex,
            'DOB' => $request->DOB,
            'bio' => $request->bio,
        ]);

        return response()->json(['code' => 200, 'message' => 'Producer Created successfully', 'data' => $post], 200);
    }

    // Store Actors data
    public function createActors(Request $request)
    {
    }
    // Store Listing Data
    public function store(Request $request)
    {
        
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('listings', 'name')],  //Name is required and it should be  unigue
            'YOR' => 'required',
            'plot' => 'required',
        ]);

        if ($request->hasFile('poster')) {
            $formFields['poster'] = $request->file('poster')->store('posters', 'public');
        }
    
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // Show Edit Form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing, 'actors' => Actors::latest()->get(), 'producers' => Producers::latest()->get()]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'YOR' => 'required',
            'plot' => 'required',
        ]);

        if ($request->hasFile('poster')) {
            $formFields['poster'] = $request->file('poster')->store('posters', 'public');
        }
        $listing->update($formFields);

        return redirect('/')->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }
}
