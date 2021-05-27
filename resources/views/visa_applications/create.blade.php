<x-main-layout>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
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

    {{-- <style>
        * {
            outline: 2px solid red;
        }
    </style> --}}


    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Office</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('offices.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div> --}}


    <form action="{{ route('upsert') }}" method="POST" >
        @csrf
        @method('put')

        <div class=" mx-auto  col-md-10">
            <div class="outline-success mb-3 d-flex" > 
                <div style="clip-path: polygon(50% 0, 55% 50%, 50% 100%, 0 100%, 0% 50%, 0 1%);" >
                    <div class="bg-success" style="height: 50px; width: 600px; line-height: 50px;"> <span class="ml-3 font-weight-bolder h5">1. Submit Application Online</span>
                    </div>
                </div>
                <div>
                    <div class="" style="height: 50px; width: 500px; line-height: 50px; margin-left: -250px;"> <span class="ml-3 font-weight-bolder h5 text-success">2. Submit Documents</span></div>
                    {{-- <div class="" style="height: 50px; width: 500px; line-height: 50px; margin-left: -250px;"> <span class="ml-3 font-weight-bolder h5 text-success">2. Review and Confirm Payment</span></div> --}}
                </div>
            </div>
            <p class="bg-success" style="width: 100%; height: 40px; line-height: 40px;"> <span class="ml-3 font-weight-bolder h5 text-light">Applicant Details</span> </p>
           
            <div class="form-row mb-3">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <strong>Family Name</strong>
                    <input type="text" name="last_name" class="form-control" value="{{ $visaApplication->last_name ?? $user->lastname }}" required>
                    <label for="last_name">Enter your family name exactly as shown in your passport</label>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>First Name</strong>
                    <input type="text" name="first_name" class="form-control" value="{{ $visaApplication->first_name ?? $user->firstname }}" required>
                    <label for="first_name">Enter your first name exactly as shown in your passport</label>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>Other Name(s)</strong>
                    <input type="text" name="other_names" class="form-control" value="{{ $visaApplication->other_names ?? '' }}" required>
                    <label for="other_names">Enter your other name(s) exactly as shown in your passport</label>
                </div>  
            </div>  
            <div class="form-row mb-3">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>Phone</strong>
                    <input type="number" name="phone" class="form-control" value="{{ $visaApplication->phone ?? '' }}" required>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>Email</strong>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>Date of Birth</strong>
                    <input type="date" name="date_of_birth" class="form-control" value="{{ $visaApplication->date_of_birth ?? '' }}" required>
                </div>  
            </div>  
            <div class="form-row mb-3">
                <div class="col-xs-12 col-sm-12 col-md-2">
                    <strong>Gender</strong>
                    <select name="gender" class="form-control" required>
                        <option value="{{ $visaApplication->gender ?? '' }}">{{ $visaApplication->gender ?? 'Select your Gender' }}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <strong>Address</strong>
                    <input type="text" name="address" class="form-control" value="{{ $visaApplication->address ?? '' }}" required>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>State of Residence</strong>
                    <input type="text" name="state_of_residence" class="form-control" value="{{ $visaApplication->state_of_residence ?? '' }}" required>
                </div>  
            </div>  
            <div class="form-row mb-3">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>LGA of Origin</strong>
                    <input type="text" name="lga_of_origin" class="form-control" value="{{ $visaApplication->lga_of_origin ?? '' }}" required>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>State of Origin</strong>
                    <input type="text" name="state_of_origin" class="form-control" value="{{ $visaApplication->state_of_origin ?? '' }}" required>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>Country of Birth</strong>
                    <input type="text" name="country_of_birth" class="form-control" value="{{ $visaApplication->country_of_birth ?? '' }}" required>
                </div>  
            </div>  
            <div class="form-row mb-3">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>Guarantor 1</strong>
                    <input type="text" name="guarantor_1_names" class="form-control" value="{{ $visaApplication->guarantor_1_names ?? '' }}" required>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>Guarantor 2</strong>
                    <input type="text" name="guarantor_2_names" class="form-control" value="{{ $visaApplication->guarantor_2_names ?? '' }}" required>
                </div>   
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>NDLEA Office</strong>
                    <select name="office_id" id="" class="form-control" required>
                        <option value="{{ $visaApplication->office_id ??  ''}}">{{ $visaApplication->office_id ?? 'Select Office' }}</option>
                        @foreach ($offices as $office)
                            <option value="{{ $office->id }}">{{ $office->command }}</option>
                        @endforeach
                    </select>
                </div>  
            </div>  
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-success">Next</button>
            </div>
        </div>

    </form>

  </x-main-layout>
