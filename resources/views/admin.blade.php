@extends('layouts.app')
<style>
    .button {
      background-color: #0e1418;
      border: none;
      color: white;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 20px;
      cursor: pointer;
      width: 80%;
      height: 40%;
      margin: 3%;
    }
  </style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Panel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                @foreach($companies["data"] as $key=>$company)
                <div class="col border" >
                    <div class="row">
                        <div class="col-md-9 border border-primary" style="background-color: rgb(148, 155, 155)">
                            <div class="row"> <span style="font-size: 20px; color:white"> Company Name : &nbsp;&nbsp;&nbsp;{{$company["Name"]}}</span></div>
                            <div class="row"> <span style="font-size: 20px; color:white"> Industry Title  : &nbsp;&nbsp;{{$company["IndustryTitle"]}}</span></div>
                            <div class="row"> <span style="font-size: 20px; color:white"> Address : &nbsp;&nbsp;&nbsp;{{$company["Address"]}}</span></div>
                        </div>
                        <div class="col-md-3 border border-warning" style="background-color: rgb(148, 155, 155)">
                            <a href="https://www.w3docs.com/" class="button">Edit </a>
                            <a href="{{ route('delete_company_route', $company['id']) }}" class="button">Delete </a>

                        </div>
                    </div>
                    <div class="row">
                        @foreach($company["employees"] as $key2 => $val)
                        <div class="col-md-1">
                            <p>{{$key2+1}} </p>
                        </div>
                        <div class="col-md-8 border border-secondary">

                            <div class="row"> Employee Name : &nbsp;&nbsp;&nbsp;{{$val["Name"]}}</div>
                            <div class="row"> Designation  : &nbsp;&nbsp;&nbsp;{{$val["Designation"]}}</div>
                            <div class="row"> Address : &nbsp;&nbsp;&nbsp;{{$val["Address"]}}</div>

                        </div>
                        <div class="col-md-3 border border-warning" style="background-color: rgb(148, 155, 155)">
                            <a href="https://www.w3docs.com/" class="button">Edit </a>
                            <a href="{{ route('delete_employee_route', $val['id']) }}" class="button">Delete </a>

                        </div>
                        @endforeach
                    </div>
                </div>
                <br>
                @endforeach
            </div>
        </div>
        </div>
    </div>
        <ul class="pagination justify-content-center">
        @foreach($companies["links"] as $key => $val)
            <li class="page-item"><a class="page-link" href="{{$val["url"]}}">{!!$val["label"]!!}</a></li>&nbsp;&nbsp;&nbsp;
        @endforeach
        </ul>

</div>
@endsection
