@extends('layouts.warehouse-header')
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
                    <li class="breadcrumb-item">Ecommerce</li>
                    <li class="breadcrumb-item active"> All Products</li>
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
                    <h4>All Products</h4>
                    <a class="btn btn-primary" href="{{route('admin.add_product_show')}}" style="float:right;"><i class="fa fa-plus"></i>Add Product</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                          	<th>Sr.No.</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Sold Quantity</th>
                            <th>Status</th>
                            
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        	@php $i = 1; @endphp
                        	@foreach($fetch_all_products as $all_products)
                        	@php
                        		$get_category_name = DB::table('product_categories')->where('id','=',$all_products->category_id)->first();
                        		
                        	@endphp
                          <tr>
                          	<td>{{$i++}}</td>
                            <td>
                            	<div class="product-names">
	                                <div class="light-product-box"><img class="img-fluid" src="../assets/images/ecommerce/product-categories/laptop.png" alt="laptop"></div>
	                                <p>{{$all_products->product_name}}</p>
                              	</div>
                            </td>
                            <td></td>
                            <td>{{$get_category_name->category_name}}</td>
                            <td></td>
                            <td></td>
                            
                            
                            <td> 
                              <ul class="action"> 
                                <li class="edit"> <a href="{{route('admin.update_product_details_show')}}/{{$all_products->id}}"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href=""><i class="icon-trash"></i></a></li>
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