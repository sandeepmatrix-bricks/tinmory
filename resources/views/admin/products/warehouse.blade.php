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
    <h4 class="card-title mb-2">Update {{ $productDetails->product_name }} Details</h4>
    <div class="mb-3">
        @include('admin.products.product_nav', ['productId' => $productId]) 
    </div>

    <form action="{{ route('admin.show_warehouse', $productId) }}" method="GET" class="mb-4">
        <div class="row align-items-end">
            {{-- Country Dropdown --}}
            <div class="col-md-6">
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
            </div>

            {{-- Warehouse Multi-select Dropdown with Checkboxes --}}
              <div class="col-md-6 mt-3">
    <label for="warehouseDropdown">Select Warehouses</label>
    @if(isset($warehouses) && count($warehouses) > 0)
        {{-- data-bs-auto-close="outside" ensures clicking inside doesn't close the dropdown --}}
        <div class="dropdown w-100" data-bs-auto-close="outside">
            <button class="btn btn-outline-secondary dropdown-toggle w-100"
                    type="button"
                    id="warehouseDropdown"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                <span id="warehouseDropdownLabel">{{ count($selectedWarehouseIds ?? []) > 0 ? count($selectedWarehouseIds) . ' selected' : 'Choose Warehouses' }}</span>
            </button>

            <div class="dropdown-menu p-3 w-100" aria-labelledby="warehouseDropdown" style="max-height: 300px; overflow-y: auto;">
                {{-- Search Input --}}
                <div class="mb-2">
                    <input type="text" id="warehouseSearch" class="form-control" placeholder="Search warehouse...">
                </div>

                <ul id="warehouseList" class="list-unstyled mb-0">
                    @foreach($warehouses as $warehouse)
                        <li class="form-check">
                            <input
                                class="form-check-input warehouse-checkbox"
                                type="checkbox"
                                name="warehouse_ids[]"
                                value="{{ $warehouse->id }}"
                                id="warehouse_{{ $warehouse->id }}"
                                {{ in_array($warehouse->id, $selectedWarehouseIds ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label" for="warehouse_{{ $warehouse->id }}">
                                {{ $warehouse->warehouse_name }} - {{ $warehouse->location }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        <p class="text-muted mt-2">No warehouses found for selected country.</p>
    @endif
</div>
        </div>

        <div class="mt-4">
            <button type="submit" formaction="{{ route('admin.save_warehouses', $productId) }}" formmethod="POST" class="btn btn-primary">
                @csrf
                Save Selection
            </button>
        </div>
    </form>
</div>

        </div>
      </div>
      <!-- Scroll - vertical dynamic Ends-->
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>


@endsection
