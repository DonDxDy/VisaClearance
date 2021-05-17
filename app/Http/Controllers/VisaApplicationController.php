<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\VisaApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisaApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offices = Office::select('command', 'id')->get();

        $user = Auth()->user();

        // dd($user);

        return view('visa_applications.create', compact('offices', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([ 
        //     'email' => Auth()->user()->email, 
        // ]);

        VisaApplication::create($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Visa Application started successfully.');
    }

    public function editApplication()
    {
        return view('visa_applications.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisaApplication  $visaApplication
     * @return \Illuminate\Http\Response
     */
    public function show(VisaApplication $visaApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisaApplication  $visaApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(VisaApplication $visaApplication)
    {
        //
    }

    public function editUserInfo()
    {
        $offices = Office::select('command', 'id')->get();

        $user = Auth()->user();

        $visaApplication = VisaApplication::where('user_id', $user->id)->first();

        // dd($visaApplication);

        return view('visa_applications.create', compact('offices', 'user', 'visaApplication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisaApplication  $visaApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisaApplication $visaApplication)
    {

        $visaApplication->update($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Visa Application started successfully.');
    }

    public function upsert(Request $request)
    {
        VisaApplication::updateOrCreate(['email' => $request->email], $request->all());

        return redirect()->route('dashboard')
        ->with('success', 'Visa Application started successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisaApplication  $visaApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisaApplication $visaApplication)
    {
        //
    }
}
