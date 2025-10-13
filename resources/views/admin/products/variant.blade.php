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
                    <li class="breadcrumb-item">Products</li>
                    <li class="breadcrumb-item active"> Update Product</li>
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
                    <h4>All Variant</h4>
                    <a class="btn btn-primary" href="{{route('admin.variants_create',$productId)}}" style="float:right;"><i class="fa fa-plus"></i>Add Variant</a>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title mb-2">Update {{$productDetails->product_name}} Details</h4>
                    <div class="mb-3">
                      @include('admin.products.product_nav', ['productId' => $productId]) 
                    </div>

                    <div class="table-responsive custom-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                          	<th>Sr.No.</th>
                            <th>Color Code</th>
                            <th>Color Name</th>
                            <th>SKU</th>
                             <th>Action</th>
                          </tr>
                        </thead>
                            <tbody>
                                @php $i = 1; @endphp

                                @foreach($variantList as $variant)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $variant->color_code }}</td>
                                        <td>{{ $variant->color_name }}</td>
                                        <td>{{ $variant->sku }}</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit">
                                                    <a href="{{ route('admin.variants_create', ['prductId' => $variant->id, 'isview' => true]) }}">
                                                        <i class="icon-pencil-alt"></i>
                                                    </a>
                                                </li>
                                                <li class="delete">
                                                    <form action="{{ route('admin.delete_variant', $variant->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this variant?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer; color: #dc3545;">
                                                            <i class="icon-trash"></i>
                                                        </button>
                                                    </form>
                                                </li>
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