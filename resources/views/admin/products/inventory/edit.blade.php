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
            <li class="breadcrumb-item active">Edit Inventory</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">

          <div class="card-body">
            <h4 class="card-title mb-4">Edit Inventory for {{$productName }}</h4>
            
            <form action="{{ route('admin.inventory.update')}}" method="POST">
              @csrf
              @method('post')

              <div class="row">
                <input type="hidden" name="product_id" value="{{ $inventory->product_id }}">
                <input type="hidden" name="inventory_id" value="{{ $inventory->id }}">

                {{-- Warehouse Selection (only for super admin) --}}
                @if(Auth::user()->role === 'super_admin')
                <div class="col-md-6 mb-3">
                  <label for="warehouse">Select Warehouse</label>
                  <select name="warehouse_id" id="warehouse" class="form-control" required>
                    <option value="">-- Select Warehouse --</option>
                    @foreach($warehouses as $warehouse)
                      <option value="{{ $warehouse->id }}" {{ $inventory->warehouse_id == $warehouse->id ? 'selected' : '' }}>
                        {{ $warehouse->warehouse_name }} - {{ $warehouse->location }}
                      </option>
                    @endforeach
                  </select>
                </div>
                @else
                <input type="hidden" name="warehouse_id" value="{{ $userWarehouse->id }}">
                @endif

                {{-- Variant Selection --}}
                <div class="col-md-6 mb-3">
                  <label for="variant">Select Variant</label>
                  <select name="variant_id" id="variant" class="form-control">
                    <option value="">Default / No Variant</option>
                    @foreach($variants as $variant)
                      <option value="{{ $variant->id }}" {{ $inventory->variant_id == $variant->id ? 'selected' : '' }}>
                        {{ $variant->color_name }} ({{ $variant->color_code }})
                      </option>
                    @endforeach
                  </select>
                </div>

                {{-- Stock Quantity --}}
                <div class="col-md-6 mb-3">
                  <label for="stock_quantity">Stock Quantity</label>
                  <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" min="0" value="{{ $inventory->stock_quantity }}" required>
                </div>

                {{-- Reserved Quantity --}}
                <div class="col-md-6 mb-3">
                  <label for="reserved_quantity">Reserved Quantity</label>
                  <input type="number" name="reserved_quantity" id="reserved_quantity" class="form-control" min="0" value="{{ $inventory->reserved_quantity }}">
                </div>

                {{-- Available Quantity (auto-calculated, read-only) --}}
                <div class="col-md-6 mb-3">
                  <label for="available_quantity">Available Quantity</label>
                  <input type="number" name="available_quantity" id="available_quantity" class="form-control" readonly value="{{ $inventory->available_quantity }}">
                </div>

              </div>

              <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit">Update Inventory</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
