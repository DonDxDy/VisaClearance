<x-main-layout>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>STATE/SPECIAL AREA COMMANDS </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('offices.create') }}" title="Add an office"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Command</th>
            <th>Address</th>
            <th>Email</th> 
            <th width="280px">Action</th>
        </tr>
        @foreach ($offices as $office)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $office->command }}</td>
                <td>{{ $office->address }}</td>
                <td>{{ $office->email }}</td>
                <td style="width:15%">                      
                    <div class="dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                        Actions
                    </button>
                    <div class="dropdown-menu"> 
                        <a href="{{ route('offices.show', $office->id ) }}" title="View Service" class="dropdown-item text-success font-weight-bolder"><i class="fa fa-eye"></i>View</a>
                        <a href="{{ route('offices.edit', $office->id ) }}" title="Edit Service" class="dropdown-item text-primary font-weight-bolder"><i class="fa fa-edit"></i>Edit</a>
                        {{-- <a href="{{ route('serviceDelete', $service->id ) }}" title="Delete Service" class="dropdown-item text-danger font-weight-bolder"><i class="fa fa-trash"></i>Delete</a> --}}
                       
                        {{-- <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('services.show', $service->id ) }}" title="View Service" class="dropdown-item text-success font-weight-bolder"><i class="fa fa-eye"></i>View</a>
                        <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('services.edit', $service->id ) }}" title="Edit Service" class="dropdown-item text-primary font-weight-bolder"><i class="fa fa-edit"></i>Edit</a>
                        <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('serviceDelete', $service->id ) }}" title="Delete Service" class="dropdown-item text-danger font-weight-bolder"><i class="fa fa-trash"></i>Delete</a> --}}
                        </div>
                    </div>
                </td> 
                
            </tr>
        @endforeach
    </table>


  </x-main-layout>