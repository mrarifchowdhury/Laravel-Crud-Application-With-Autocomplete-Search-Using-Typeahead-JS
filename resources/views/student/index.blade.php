@extends('layouts.layout')
@section('title', 'Student Information')
@section('customecolor', 'alert-success')
@section('heading','STUDENT RECORD - LARAVEL 6.0 CRUD APPLICATION')
@section('content')
	

<div class="row">

   

        <div class="col-md-5">
        <!-- Automatic Search Div -->
            <div id="custom-search-input">
                {!! Form::open(array('route' => ['searchAction'],'class'=>'form-horizontal','method'=>'POST')) !!}
                    <div class="input-group" >
                        <input id="search" name="search" type="text" class="form-control float-left " placeholder="Search Student Record" style="height:45px" />
                        &nbsp;<button type="submit" class="btn font-weight-bold btn-sm rounded alert-success">Search</button>
                    </div>
                {!! Form::close() !!}  

            </div>
        </div>


        <div class="col-md-7">
        <!-- Button trigger modal -->
        <a href="" class="btn mb-4 float-right btn-outline-success btn-md " data-toggle="modal" data-target="#centralModalLg">Add New Student</a>
        </div>
        


    <div class="col-md-12">
        <table class="table  table-success table-hover ">
            <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                <tbody>
                    <?php $i=0; ?>
                    @foreach ($datas as $data)
                    <tr>
                        <th>{{++$i}}</th>
                        <th>{{ $data->firstname }}</th>
                        <th>{{ $data->lastname }}</th>
                        <th>{{ $data->gender }}</th>
                        <th>{{ $data->country }}</th>
                        <th>{{ $data->city }}</th>
                        <th>{{ $data->address }}</th>
                        <th class=" text-center ">
                           
                            <a href="{{ route('student.edit', $data->id) }}" class="btn btn-secondary btn-xl" style="padding: 2px 11px;">Edit</a>
                            
                            <!-- Delete Button trigger delete modal -->
                            <a href="#my-modal{{$data->id}}" class="btn btn-warning btn-xl rounded" data-toggle="modal" style="padding: 2px 11px;">&#10060;</a>
                        </th>
                    </tr>



                      
        <!-- ..................................... Delete Confirmation Model ............................................... -->

        <!-- Start Delete Confirmation Model -->
        <div id="my-modal{{$data->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-0">
                    <div class="modal-body p-0">
                        <div class="card border-0 p-sm-3 p-2 justify-content-center">
                            <div class="card-header pb-0 bg-white border-0 ">
                                <div class="row">
                                    <div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>
                                </div>
                                <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p>
                                
                            </div>
                            <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                                <div class="row justify-content-end no-gutters">
                                    <div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button></div>


                                <div class="col-auto">
                                    {{Form::open(array('route'=>['student.destroy',$data->id],'method'=>'DELETE'))}}
                                    <button type="submit" class="btn btn-danger px-4 confirm" >Delete</button>
                                    {!! Form::close() !!}
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Delete Confirmation Model -->







                    @endforeach
                </tbody>
            </thead>
        </table>

        <!-- ..................................... Add New Student Modal ............................................... -->

        <!-- Central Modal Small -->
        <div class="modal fade" id="centralModalLg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
            <!-- Change class .modal-lg to change the size of the modal -->
            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(array('route' => ['student.store'],'class'=>'form-horizontal','method'=>'POST')) !!}

                <div class="modal-body">

                    <!-- Extended default form grid -->
                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="Enter Your First Name">
                        </div>
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Last Name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Enter Your Last Name">
                        </div>
                    </div>
                    <!-- Grid row -->
                    
                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                        <label for="inputZip">Country</label>
                        <input type="text" class="form-control" name="country" placeholder="Bangladesh">
                        </div>
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" name="city" placeholder="Dhaka">
                        </div>
                        
                    </div>

                    <!-- Default input -->
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="1234 Main St">
                    </div>

                    <!-- Default input -->
                    <div class="form-group">
                        <label for="inputAddress">Gender</label>
                        <input type="text" class="form-control" name="gender" placeholder="Male/Female">
                    </div>



                    
                    <!-- Extended default form grid -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        <!-- Central Modal Small -->


      

    </div>
</div>

@endsection