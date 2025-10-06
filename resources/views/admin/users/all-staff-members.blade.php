@extends('layouts.admin-header')
@section('content')
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <!-- <h4>Edit Profile</h4> -->
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active"> Regional Managers</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0 card-no-border">
                    <h4>Regional Managers</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                          	<th>Sr.No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        	@php $i = 1; @endphp
                        	@foreach($fetch_all_regional_managers as $all_regional_managers)
                        	@php
                        		$get_country_name = DB::table('countries')->where('id','=',$all_regional_managers->user_country)->first();
                        		$get_state_name = DB::table('states')->where('id','=',$all_regional_managers->user_state)->first();
                        		$get_city_name = DB::table('cities')->where('id','=',$all_regional_managers->user_city)->first();
                        	@endphp
                          <tr>
                          	<td>{{$i++}}</td>
                            <td>{{$all_regional_managers->name}} {{$all_regional_managers->user_last_name}}</td>
                            <td>{{$all_regional_managers->email}}</td>
                            <td>{{$all_regional_managers->user_mobile_no}}</td>
                            <td>{{$get_country_name->name}}</td>
                            <td>{{$get_state_name->name}}</td>
                            <td>{{$get_city_name->name }}</td>
                            
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="{{route('admin.update_regional_manager_show')}}/{{$all_regional_managers->id}}"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="{{route('admin.delete_regional_manager')}}/{{$all_regional_managers->id}}"><i class="icon-trash"></i></a></li>
                              </ul>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Scroll - vertical dynamic Ends-->
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
@endsection