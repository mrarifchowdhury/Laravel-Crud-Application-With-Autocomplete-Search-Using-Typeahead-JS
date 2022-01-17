@extends('layouts.layout')
@section('title', 'Student Search Result')
@section('customecolor', 'alert-primary')
@section('heading','Student Search Result')

@section('content')

<div class="container">

    <p class=" text-right  ">
        <a href="{{route('student.index')}}" class="text-primary font-weight-bolder ">Back To Home</a>
    </p>

    <hr>

<div class="row mb-4"> 
    <div class="col-md-5 mb-5">
    Matching Record Found : <span class="text-danger"> {{count($result) }}</span>
    </div>

    <div class="col-md-7">
    <h6 class="text-right"> Searched Keyword "<span class="text-danger">{{ $input['search'] }}</span>"</h6>
    </div>
</div>


<div class="row justify-content-center align-items-center">

    <?php $i=0; ?>
    @foreach ($result as $data)

            @if (count($result) <2)
            <div class="col-md-6 ">
            @else
            <div class="col-md-3 "> 
            @endif

            <table class="table table-borderless  table-hover rounded shadow">
                            <tr><td>Matching Data: <b><span class="text-primary font-italic">  {{++$i}}  </span>
                                <span>
                                <a href="{{ route('student.edit', $data->id) }}" class="btn btn-primary btn-sm float-right rounded-pill" style="padding: 2px 11px;">Edit</a>    
                                </span></b></td></tr>
                            <tr><td>Name :         <b><span class="text-primary font-italic">  {{ $data->firstname.' '.$data->lastname }}  </span></b></td></tr>
                            <tr><td>Gender :       <b><span class="text-primary font-italic">  {{ $data->gender }}                         </span></b></td></tr>
                            <tr><td>Country :      <b><span class="text-primary font-italic">  {{ $data->country }}                        </span></b></td></tr>
                            <tr><td>City :         <b><span class="text-primary font-italic">  {{ $data->city }}                           </span></b></td></tr>
                            <tr><td>Address :      <b><span class="text-primary font-italic">  {{ $data->address }}                        </span></b></td></tr>
            </table>
        </div>
    @endforeach

</div>
</div>

@endsection