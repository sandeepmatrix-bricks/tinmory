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
            <li class="breadcrumb-item active"> Update Warehouse</li>
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
            <h4>All Warehouses</h4>
          </div>
          <div class="card-body">
            <h4 class="card-title mb-2">Update {{$productDetails->product_name}} Details</h4>
            <div class="mb-3">
              @include('admin.products.product_nav', ['productId' => $productId]) 
            </div>

            <form action="{{ route('admin.show_warehouse', $productId) }}" method="GET" class="mb-4">
              <div class="form-group">
                <label for="country">Select Country</label>
                <select name="country_id" id="country" class="form-control" onchange="this.form.submit()">
                  <option value="">-- Select Country --</option>
                  @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ request('country_id') == $country->id ? 'selected' : '' }}>
                      {{ $country->name }}
                    </option>
                  @endforeach
                </select>
              </div>
            </form>

            @if(isset($warehouses) && count($warehouses) > 0)
                <form action="{{ route('admin.save_warehouses', $productId) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Select Warehouses:</label>
                        <div class="row">
                            @foreach($warehouses as $warehouse)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" 
                                        type="checkbox" 
                                        name="warehouse_ids[]" 
                                        value="{{ $warehouse->id }}" 
                                        id="warehouse_{{ $warehouse->id }}"
                                        {{ in_array($warehouse->id, $selectedWarehouseIds ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="warehouse_{{ $warehouse->id }}">
                                        {{ $warehouse->warehouse_name }} - {{ $warehouse->location }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Save Selection</button>
                </form>
            @else
                <p class="text-muted">No warehouses found for selected country.</p>
            @endif

          </div>
        </div>
      </div>
      <!-- Scroll - vertical dynamic Ends-->
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>

@endsection
