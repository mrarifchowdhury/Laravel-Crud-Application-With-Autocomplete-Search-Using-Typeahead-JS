@extends('layouts.layout')
@section('title', 'Edit Student Record')
@section('customecolor', 'alert-primary')
@section('heading','Edit Student Record')
@section('content')

<div class="container">
    
    
    <p class=" text-right mt-5 ">
        <a  class="text-dark" >EDIT PAGE</a>
         | 
        <a href="{{route('student.index')}}" class="text-primary font-weight-bolder ">HOME</a>
    </p>
    
    <hr>

    {{Form::open(array('route'=>['student.update',$editData->id],'method'=>'PUT','files'=>true))}}
    
        <div class="row mt-5">
            <div class="col-md-5">
              <label for="firstname">First Name</label>
              <input class="form-control" id="firstname" name="firstname" type="text" value="{{ $editData->firstname}}">
            </div>
            <div class="col-md-5">
              <label for="lastname">Last Name</label>
              <input class="form-control" id="lastname"  name="lastname" type="text" value="{{ $editData->lastname}}">
            </div>
            <div class="col-md-2">
                <label for="lastname">Roll Number</label>
                <p class="form-control">{{ $editData->id}}</p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <label for="gender">Gender</label>
                <input class="form-control" id="gender" name="gender" type="text" value="{{ $editData->gender}}">
              </div>
              <div class="col-md-4">
                <label for="city">City</label>
                <input class="form-control" id="city" name="city" type="text" value="{{ $editData->city}}">
              </div>
              <div class="col-md-4">
                <label for="country">Country</label>
                <input class="form-control" id="country" name="country" type="text" value="{{ $editData->country}}">
              </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <label for="address">Address</label>
                <input class="form-control" id="address" name="address" type="text" value="{{ $editData->address}}">
            </div>
        </div>
        <div class="row mt-2">
             <div class="col-md-12">
                <button type="submit" class="btn btn-secondary float-right mr-0 mt-5">Update Data</button>
              </div>
        </div>


    {!! Form::close() !!}

</div>
    
@endsection