@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
<div class="main-wrapper">
        <div class="chart-wrapper">
        <div class="user-wrapper">   
                <div class="invoice">
                        <div class="invoice__header">
                            <img class="invoice__logo" src="{{asset(isset($logo) ? $logo->img_path : 'images/logo.png')}}" alt="">
                        </div>
                        <div class="invoice_heading">
                            <h1>Result Details</h1>
                            
                        </div>
                        <div class="row invoice__address">
                            <div class="col-6">
                                <div class="text-right">
                                    

                                    <p>Agent Name:</p>
                                    <p>Day Time Phone:</p>

                                    <address>
                                       Address:<br>
                                        
                                    </address>

                                    <p>Insurance #:</p>

                                    <p>Total Questions:</p>
                                    <p>Total Correct Anwers:</p>
                                    <p>Percentage:</p>
                                    <p>Status:</p>
                                    
                                   
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="text-left">
                                    

                                    <p>{{$quiz->resultBelongsToQuiz->agent_name}}</p>
                                    <p>{{$quiz->resultBelongsToQuiz->day_time_phone}}</p>

                                    <address>
                                    {{$quiz->resultBelongsToQuiz->address}}<br>
                                        
                                    </address>

                                    <p>{{$quiz->resultBelongsToQuiz->insurance_no}}</p>
                                    <p>{{$quiz->resultBelongsToQuiz->total_ques}}</p>
                                    <p>{{$quiz->resultBelongsToQuiz->total_corr_ans}}</p>
                                    <p>{{$quiz->resultBelongsToQuiz->percentage}}%</p>
                                    <p>{{$quiz->status == 1 ? 'Passed' : 'Fail'}}</p>
                                 

                                   
                                </div>
                            </div>
                        </div>

                        <div class="row invoice__attrs">
                            <div class="col-3">
                                <div class="invoice__attrs__item">
                                    <small>Result ID</small>
                                    <h3>{{$quiz->id}}</h3>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="invoice__attrs__item">
                                    <small>Date</small>
                                    <h3>{{date('M d,Y', strtotime($quiz->created_at))}}</h3>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="invoice__attrs__item">
                                    <small>Amount</small>
                                    <h3>${{$quiz->total_amount}}</h3>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="invoice__attrs__item">
                                    <small>Pay Status</small>
                                    <h3>{{$quiz->pay_status == 1 ? 'Paid' : 'Not Paid'}}</h3>
                                </div>
                            </div>
                        </div>


                       
                       

                      
                    

                </div>
                </div>

                </div>
                </div>
                </div>             
</div>
@endsection
@section('hcss')
<!-- <link rel="stylesheet" href="{{asset('css/demo.css')}}"> -->
@endsection
@section('css')
<style>
    /* .sidebar {
        width: 270px;
        position: fixed;
        left: 0;
        padding: 102px 2rem .5rem;
        height: 100%;
        overflow: hidden;
        z-index: 19;
        background: #f5f5f5;
    } */
    section.content {
        overflow-y: auto;
        overflow-x: hidden;
    }
    .invoice {
        min-width: auto;
    }
    .table thead th,
    .table-bordered, .table-bordered td, .table-bordered th {
        border-bottom: 1px solid #9c9ea6;
    }
    .table-bordered, .table-bordered td, .table-bordered th {
        border: 1px solid #9c9ea6;
    }
    .invoice_heading {
        text-align: center;
        margin: 25px auto;
        width: 25%;
        border: 2px solid black;
        margin-top: 0px;
        /* border-radius: 25px; */
        }
</style>
@endsection