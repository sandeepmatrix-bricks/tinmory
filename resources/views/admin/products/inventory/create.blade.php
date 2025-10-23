@extends('layouts.admin-header')
@section('content')

<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6"></div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">
                <svg class="stroke-icon">
                  <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg>
              </a>
            </li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item active">Add Inventory</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0 card-no-border">
            <h4>Add Inventory</h4>
          </div>

          <div class="card-body">
            <h4 class="card-title mb-2">Add Inventory for {{ $productDetails->product_name }}</h4>
            <div class="mb-3">
              @include('admin.products.product_nav', ['productId' => $productId])
            </div>

            <form action="{{ route('admin.inventory.save', $productId) }}" method="POST">
              @csrf
              <div class="row">
                
                {{-- Warehouse Selection (only for super admin) --}}
                @if(Auth::user()->role === 'super_admin')
                <div class="col-md-6 mb-3">
                  <label for="warehouse">Select Warehouse</label>
                  <select name="warehouse_id" id="warehouse" class="form-control" required>
                    <option value="">-- Select Warehouse --</option>
                    @foreach($warehouses as $warehouse)
                      <option value="{{ $warehouse->id }}">{{ $warehouse->warehouse_name }} - {{ $warehouse->location }}</option>
                    @endforeach
                  </select>
                </div>
                @else
                {{-- For warehouse user, assign their own warehouse automatically --}}
                <input type="hidden" name="warehouse_id" value="{{ $userWarehouse->id }}">
                @endif

                {{-- Variant Selection --}}
                <div class="col-md-6 mb-3">
                  <label for="variant">Select Variant</label>
                  <select name="variant_id" id="variant" class="form-control">
                    <option value="">Default / No Variant</option>
                    @foreach($variants as $variant)
                      <option value="{{ $variant->id }}">{{ $variant->color_name }} ({{ $variant->color_code }})</option>
                    @endforeach
                  </select>
                </div>

                {{-- Stock Quantity --}}
                <div class="col-md-6 mb-3">
                  <label for="stock_quantity">Stock Quantity</label>
                  <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" min="0" value="0" required>
                </div>

                {{-- Reserved Quantity --}}
                <div class="col-md-6 mb-3">
                  <label for="reserved_quantity">Reserved Quantity</label>
                  <input type="number" name="reserved_quantity" id="reserved_quantity" class="form-control" min="0" value="0">
                </div>

              </div>

              <div class="mt-3">
                <button type="submit" class="btn btn-primary">Add Inventory</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
