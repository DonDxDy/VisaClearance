<x-main-layout>

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('uploadDocument') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class=" mx-auto  col-md-10">
            <div class="outline-danger mb-4 d-flex" > 
                <span class="ml-2 font-weight-bolder h5 text-danger" style=" height: 50px; width: 300px; line-height: 50px;">1. Submit Application Online</span>
                <div style="clip-path: polygon(75% 0%, 100% 50%, 65% 100%, 0% 100%, 12% 47%, 3% 0%);" >
                    <div class="bg-danger" style="height: 50px; width: 400px; line-height: 50px;"> <span class="ml-5 font-weight-bolder h5">2. Submit Documents</span>
                    </div>
                    </div> 
                </div>

                <p class="bg-danger" style="width: 100%; height: 40px; line-height: 40px;"> <span class="ml-3 font-weight-bolder h5 text-light">Applicant Details</span> </p>


            <div class="form-row mb-4">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <strong>Evidence of Business <a href="{{ Storage::url($visaApplication->evidence_business_status) }}" download> {{ $visaApplication->evidence_business_status ?? '' }}</a></strong>
                    <input type="file" name="evidence_business_status" class="form-control" value="{{ $visaApplication->evidence_business_status ?? '' }}" >
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <strong>Evidence of Business Link <a href="{{ Storage::url($visaApplication->evidence_business_link) }}" download> {{ $visaApplication->evidence_business_link ?? '' }}</a></strong>
                    <input type="file" name="evidence_business_link" class="form-control" value="{{ $visaApplication->evidence_business_link ?? '' }}" >
                </div>  
            </div>  
            <div class="form-row mb-4">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <strong>Evidence of CBN payment <a href="{{ Storage::url($visaApplication->evidence_of_cbn_payment) }}" download> {{ $visaApplication->evidence_of_cbn_payment ?? '' }}</a></strong>
                    <input type="file" name="evidence_of_cbn_payment" class="form-control" value="{{ $visaApplication->evidence_of_cbn_payment ?? '' }}" >
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <strong>Evidence of Tax Clearance <a href="{{ Storage::url($visaApplication->tax_clearance) }}" download> {{ $visaApplication->tax_clearance ?? '' }}</a></strong>
                    <input type="file" name="tax_clearance" class="form-control" value="{{ $visaApplication->tax_clearance ?? '' }}" >
                </div>  
            </div>  
            <div class="form-row mb-4">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <strong>Evidence of LGA / State <a href="{{ Storage::url($visaApplication->certificate_of_lga_state) }}" download> {{ $visaApplication->certificate_of_lga_state ?? '' }}</a></strong>
                    <input type="file" name="certificate_of_lga_state" class="form-control" value="{{ $visaApplication->certificate_of_lga_state ?? '' }}" >
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <strong>Passport Photograph <a href="{{ Storage::url($visaApplication->passport_photograph) }}" download> {{ $visaApplication->passport_photograph ?? '' }}</a></strong>
                    <input type="file" name="passport_photograph" class="form-control" value="{{ $visaApplication->passport_photograph ?? '' }}" >
                </div>  
            </div>  
            <div class="form-row mb-4">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <strong>International Passport <a href="{{ Storage::url($visaApplication->international_passport) }}" download> {{ $visaApplication->international_passport ?? '' }}</a></strong>
                    <input type="file" name="international_passport" class="form-control" value="{{ $visaApplication->international_passport ?? '' }}" >
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <strong>Application for clearance <a href="{{ Storage::url($visaApplication->application_for_clearance) }}" download> {{ $visaApplication->application_for_clearance ?? '' }}</a></strong>
                    <input type="file" name="application_for_clearance" class="form-control" value="{{ $visaApplication->application_for_clearance ?? '' }}" >
                </div>  
            </div>  
            <div class="form-row mb-4">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <strong>Sponsor Letter <a href="{{ Storage::url($visaApplication->sponsor_letter) }}" download> {{ $visaApplication->sponsor_letter ?? '' }}</a></strong>
                    <input type="file" name="sponsor_letter" class="form-control" value="{{ $visaApplication->sponsor_letter ?? '' }}" >
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <strong>Statement of Account <a href="{{ Storage::url($visaApplication->statement_of_account_sponsor) }}" download> {{ $visaApplication->statement_of_account_sponsor ?? '' }}</a></strong>
                    <input type="file" name="statement_of_account_sponsor" class="form-control" value="{{ $visaApplication->statement_of_account_sponsor ?? '' }}" >
                </div>   
            </div>   
            <div class="col-xs-12 col-sm-12 col-md-12 text-right"> 
                <div style="clip-path: polygon(100% 0%, 100% 47%, 100% 100%, 5% 100%, 0% 50%, 5% 0%);" >
                    <div class="bg-danger" style="width: 100px;"><a href="{{ route('editUserInfo') }}"> <button type="button" class="btn btn-danger bg-danger">Back</button></a>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </div>
        

    </form>
  </x-main-layout>