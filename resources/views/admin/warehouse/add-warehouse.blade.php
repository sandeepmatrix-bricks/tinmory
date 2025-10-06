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
                    <li class="breadcrumb-item">Warehouse</li>
                    <li class="breadcrumb-item active">Add Warehouse</li>
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
                  <form class="card" action="{{route('admin.new_warehouse_insert')}}" method="post">
                    {{csrf_field()}}
                    
                    <div class="card-header">
                      <h4 class="card-title mb-0">Add Warehouse</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                              <div class="mb-3">
                                    <label class="form-label">Warehouse Name</label>
                                    <input class="form-control" type="text" placeholder="Warehouse Name" name="warehouse_name">
                              </div>
                        </div>
                        <div class="col-md-4">
                              <div class="mb-3">
                                    <label class="form-label">Location</label>
                                    <input class="form-control" type="text" placeholder="Location" name="location">
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label class="form-label">Assign Manager</label>
                            <select class="form-control btn-square" name="manager_id" id="manager_id">
                              <option value="0">--Select--</option>
                              @foreach($fetch_regional_manager as $regional_manager)
                              <option value="{{$regional_manager->id}}">{{$regional_manager->name}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label class="form-label">Country</label>
                            <select class="form-control btn-square" name="warehouse_country" id="warehouse_country">
                              <option value="0">--Select--</option>
                              @foreach($fetch_all_countries as $all_countries)
                              <option value="{{$all_countries->id}}">{{$all_countries->name}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label class="form-label">State</label>
                            <select class="form-control btn-square" name="warehouse_state" id="warehouse_state">
                              <option value="0">--Select--</option>
                              @foreach($fetch_all_states as $all_states)
                              <option value="{{$all_states->id}}">{{$all_states->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label class="form-label">City</label>
                            <select class="form-control btn-square" name="warehouse_city" id="warehouse_city">
                              <option value="0">--Select--</option>
                              @foreach($fetch_all_cities as $all_cities)
                              <option value="{{$all_cities->id}}">{{$all_cities->name}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Postal Code</label>
                            <input class="form-control" type="text" placeholder="Postal Code" name="postal_code">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Capacity</label>
                            <input class="form-control" type="number" placeholder="Capacity" name="capacity">
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