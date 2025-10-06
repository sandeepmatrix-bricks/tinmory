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
                    <li class="breadcrumb-item active">Update Product</li>
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
                  
                    
                    <div class="card-header">
                      <h4 class="card-title mb-0">Update {{$fetch_product_details->product_name}} Details</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div>
                            <a class="btn btn-outline-primary btn-sm" href="" title="Basic Details">Basic Details</a>
                            <a class="btn btn-outline-primary btn-sm" href="{{route('admin.update_product_details_gallery_show')}}/{{$product_id}}" title="Gallery">Product Gallery</a>
                            <a class="btn btn-outline-primary btn-sm" href="" title="Price">Price</a>
                            <a class="btn btn-outline-primary btn-sm" href="" title="Inventory">Inventory</a>
                            <a class="btn btn-outline-primary btn-sm" href="" title="Advance">Tag</a>
                            <a class="btn btn-outline-primary btn-sm" href="" title="FAQ">FAQ</a>
                            
                        </div>
                      <br>
                      <div class="row">
                          <table class="table" id="project-status">
                        <thead> 
                          <tr> 
                            <th>
                              <div class="form-check"> 
                                <input class="form-check-input checkbox-primary" type="checkbox">
                              </div>
                            </th>
                            <th> <span class="f-light f-w-600">Image</span></th>
                            
                            <th> <span class="f-light f-w-600">Action</span></th>
                          </tr>
                        </thead>
                        <tbody> 
                          @foreach($fetch_gallery as $gallery)
                          <tr class="product-removes">
                            <td>
                              <div class="form-check"> 
                                <input class="form-check-input checkbox-primary" type="checkbox">
                              </div>
                            </td>
                            <td> 
                              <div class="product-names">
                                    <img src="{{asset('product-images')}}/{{$gallery->image_upload}}" style="width:50%;">
                                <p></p>
                              </div>
                            </td>
                            
                            <td> 
                              <div class="product-action">
                                <svg>    
                                  <use href="../assets/svg/icon-sprite.svg#edit-content"></use>
                                </svg>
                                <svg>
                                  <use href="../assets/svg/icon-sprite.svg#trash1"> </use>
                                </svg>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      </div>
                      
                      
                    </div>
                    
                  
                </div>
                
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
@endsection