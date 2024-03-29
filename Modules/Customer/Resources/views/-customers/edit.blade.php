@extends('adminCpanel.layouts.layout')
@section('title')
  Edit Customer Information
@endsection
@section('header')
    <!-- icheck -->
    {!! Html::style(asset('admin/css/icheck-1.x/all.css')) !!}
@endsection

                    @section('content')
                        <!-- Start  Breadcrumb -->
                        <div class="row">
                            <div class="col-lg-12  float-right">
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-home"></i><a href="{{ url('\adminCpanel') }}">HOME</a></li>
                                    <li><i class="fa fa-users"></i><a href="{{ url('\adminCpanel\customers') }}">All Customers</a></li>						  	
                                    <li><i class="fa fa-user"></i>Edit Customer Information</li>						  	
                                </ol>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                        <!-- End  Breadcrumb -->
                        
                        {!! Form::model($customerInfo, ['route' => ['customers.update', $customerInfo->id], 'method' => "PATCH", 'class' => 'form', 'files' => true]) !!}
                        @include('adminCpanel.customers.form')
                        {!! Form::close() !!}
                    @endsection
    
@section('footer')
    <!-- icheck -->
    {!! Html::script(asset('admin/js/icheck.min.js')) !!}
    <script>
        $(document).ready(function() {
            /* 
                For iCheck =====================================>
            */
            $("input").iCheck({
                checkboxClass:"icheckbox_square-red",
                radioClass:"iradio_square-yellow",
                increaseArea:"20%" // optional
            });
        });
    </script>
@endsection

