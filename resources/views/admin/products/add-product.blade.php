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
                    <li class="breadcrumb-item">Products</li>
                    <li class="breadcrumb-item active">Add Product</li>
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
                  <form class="card" action="{{route('admin.new_product_insert')}}" method="post">
                    {{csrf_field()}}
                    
                    <div class="card-header">
                      <h4 class="card-title mb-0">Add Product</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                              <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input class="form-control" type="text" placeholder="Product Name" name="product_name">
                              </div>
                        </div>
                        <div class="col-md-4">
                              <div class="mb-3">
                                    <label class="form-label">Slug</label>
                                    <input class="form-control" type="text" placeholder="prod_slug" name="prod_slug">
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label class="form-label">Product Category</label>
                            <select class="form-control btn-square" name="category_id" id="category_id">
                              <option value="0">--Select--</option>
                              @foreach($fetch_all_categories as $all_categories)
                              <option value="{{$all_categories->id}}">{{$all_categories->category_name}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label">Product Description</label>
                            <textarea class="form-control" name="product_description" id="editor" rows="10" cols="80"></textarea>
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