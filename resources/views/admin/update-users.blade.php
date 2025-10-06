@extends('layouts.admin-header')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <!-- <h4>Add User</h4> -->
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active"> Update User</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                
                <div class="col-xl-12">
                  <form class="card" action="{{route('admin.update_user_details')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{$fetch_user_details->id}}">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Update User Details</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                              <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <select class="form-control btn-square" name="user_role" id="user_role">
                                      <option value="0">--Select--</option>
                                      <option value="warehouse" @if($fetch_user_details->role == 'warehouse') selected @endif>Regional Manager</option>
                                      <option value="staff" @if($fetch_user_details->role == 'staff') selected @endif>Staff Member</option>
                                      
                                    </select>
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label class="form-label">Country</label>
                            <select class="form-control btn-square" name="user_country" id="user_country">
                              <option value="0">--Select--</option>
                              @foreach($fetch_all_countries as $all_countries)
                              <option value="{{$all_countries->id}}" @if($all_countries->id == $fetch_user_details->user_country) selected @endif>{{$all_countries->name}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label class="form-label">State</label>
                            <select class="form-control btn-square" name="user_state" id="user_state">
                              <option value="0">--Select--</option>
                              @foreach($fetch_all_states as $all_states)
                              <option value="{{$all_states->id}}" @if($all_states->id == $fetch_user_details->user_state) selected @endif>{{$all_states->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label class="form-label">City</label>
                            <select class="form-control btn-square" name="user_city" id="user_city">
                              <option value="0">--Select--</option>
                              @foreach($fetch_all_cities as $all_cities)
                              <option value="{{$all_cities->id}}" @if($all_cities->id == $fetch_user_details->user_city) selected @endif>{{$all_cities->name}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input class="form-control" type="text" placeholder="First Name" name="user_first_name" value="{{$fetch_user_details->name}}">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input class="form-control" type="text" placeholder="Last Name" name="user_last_name" value="{{$fetch_user_details->user_last_name}}">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input class="form-control" type="email" placeholder="Email" name="user_email_id" value="{{$fetch_user_details->email}}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Mobile No</label>
                            <input class="form-control" type="text" placeholder="Mobile Number" name="user_mobile_no" value="{{$fetch_user_details->user_mobile_no}}">
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input class="form-control" type="text" placeholder="Home Address" name="user_address" value="{{$fetch_user_details->user_address}}">
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <button class="btn btn-primary" type="submit" name="submit">Add</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
@endsection