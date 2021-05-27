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

        return redirect()->route('editDocument')
            ->with('success', 'Visa Application started successfully.');
    }


    public function editDocument()
    {
        $user = Auth()->user();

        $visaApplication = VisaApplication::where('user_id', $user->id)->first();

        return view('visa_applications.document', compact('visaApplication'));
    }


    public function uploadDocument(Request $request)
    {
        $user = Auth()->user();

        $visaApplication = VisaApplication::where('email', $user->email)->first();

        $evidenceBusinessStatus = $visaApplication->evidence_business_status;
        $evidenceBusinessLink = $visaApplication->evidence_business_link;
        $evidenceCBNPayment = $visaApplication->evidence_of_cbn_payment;
        $taxClearance = $visaApplication->tax_clearance;
        $certificateOfLGAState = $visaApplication->certificate_of_lga_state;
        $passportPhotograph = $visaApplication->passport_photograph;
        $internationalPassport = $visaApplication->international_passport;
        $applicationClearance = $visaApplication->application_for_clearance;
        $sponsorLetter = $visaApplication->sponsor_letter;
        $statementAccountSponsor = $visaApplication->statement_of_account_sponsor;


        if (gettype($request->file('evidence_business_status')) == 'object') {
            $evidenceBusinessStatus = $request->file('evidence_business_status');
            $evidenceBusinessStatus->move(public_path('storage'), $evidenceBusinessStatus->getClientOriginalName());
            $evidenceBusinessStatus = $evidenceBusinessStatus->getClientOriginalName();
        }

        if (gettype($request->file('evidence_business_link')) == 'object') {
            $evidenceBusinessLink = $request->file('evidence_business_link');
            $evidenceBusinessLink->move(public_path('storage'), $evidenceBusinessLink->getClientOriginalName());
            $evidenceBusinessLink = $evidenceBusinessLink->getClientOriginalName();
        }

        if (gettype($request->file('evidence_of_cbn_payment')) == 'object') {
            $evidenceCBNPayment = $request->file('evidence_of_cbn_payment');
            $evidenceCBNPayment->move(public_path('storage'), $evidenceCBNPayment->getClientOriginalName());
            $evidenceCBNPayment = $evidenceCBNPayment->getClientOriginalName();
        }

        if (gettype($request->file('tax_clearance')) == 'object') {
            $taxClearance = $request->file('tax_clearance');
            $taxClearance->move(public_path('storage'), $taxClearance->getClientOriginalName());
            $taxClearance = $taxClearance->getClientOriginalName();
        }

        if (gettype($request->file('certificate_of_lga_state')) == 'object') {
            $certificateOfLGAState = $request->file('certificate_of_lga_state');
            $certificateOfLGAState->move(public_path('storage'), $certificateOfLGAState->getClientOriginalName());
            $certificateOfLGAState = $certificateOfLGAState->getClientOriginalName();
        }

        if (gettype($request->file('passport_photograph')) == 'object') {
            $passportPhotograph = $request->file('passport_photograph');
            $passportPhotograph->move(public_path('storage'), $passportPhotograph->getClientOriginalName());
            $passportPhotograph = $passportPhotograph->getClientOriginalName();
        }

        if (gettype($request->file('international_passport')) == 'object') {
            $internationalPassport = $request->file('international_passport');
            $internationalPassport->move(public_path('storage'), $internationalPassport->getClientOriginalName());
            $internationalPassport = $internationalPassport->getClientOriginalName();
        }

        if (gettype($request->file('application_for_clearance')) == 'object') {
            $applicationClearance = $request->file('application_for_clearance');
            $applicationClearance->move(public_path('storage'), $applicationClearance->getClientOriginalName());
            $applicationClearance = $applicationClearance->getClientOriginalName();
        }

        if (gettype($request->file('sponsor_letter')) == 'object') {
            $sponsorLetter = $request->file('sponsor_letter');
            $sponsorLetter->move(public_path('storage'), $sponsorLetter->getClientOriginalName());
            $sponsorLetter = $sponsorLetter->getClientOriginalName();
        }

        if (gettype($request->file('statement_of_account_sponsor')) == 'object') {
            $statementAccountSponsor = $request->file('statement_of_account_sponsor');
            $statementAccountSponsor->move(public_path('storage'), $statementAccountSponsor->getClientOriginalName());
            $statementAccountSponsor = $statementAccountSponsor->getClientOriginalName();
        }


        VisaApplication::updateOrCreate(
            ['email' => $user->email],
            [
                'evidence_business_status' => $evidenceBusinessStatus,
                'evidence_business_link' => $evidenceBusinessLink,
                'evidence_of_cbn_payment' => $evidenceCBNPayment,
                'tax_clearance' => $taxClearance,
                'certificate_of_lga_state' => $certificateOfLGAState,
                'passport_photograph' => $passportPhotograph,
                'international_passport' => $internationalPassport,
                'application_for_clearance' => $applicationClearance,
                'sponsor_letter' => $sponsorLetter,
                'statement_of_account_sponsor' => $statementAccountSponsor,
            ]
        );

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
