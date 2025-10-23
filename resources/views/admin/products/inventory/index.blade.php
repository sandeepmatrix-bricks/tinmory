@extends('layouts.admin-header')
@section('content')

<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <!-- Optional title -->
        </div>
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
            <li class="breadcrumb-item active">Manage Inventory</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Container-fluid starts -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0 card-no-border">
            <h4>All Inventory</h4>

            {{-- Add Inventory Button (if needed in future) --}}
            <a class="btn btn-primary" href="{{ route('admin.inventory.create', $productId) }}" style="float:right;">
              <i class="fa fa-plus"></i> Add Inventory
            </a>
          </div>

          <div class="card-body">
            <h4 class="card-title mb-2">Manage Inventory for {{ $productDetails->product_name }}</h4>
            <div class="mb-3">
              @include('admin.products.product_nav', ['productId' => $productId])
            </div>

            {{-- Filters visible only for Super Admin --}}
            @if(Auth::user()->role === 'super_admin')
            <form action="{{ route('admin.inventory.index', $productId) }}" method="GET" class="mb-4">
              <div class="row align-items-end">
                <div class="col-md-6">
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

                <div class="col-md-6 mt-3">
                  <label for="warehouseDropdown">Select Warehouses</label>
                  @if(isset($warehouses) && count($warehouses) > 0)
                  <div class="dropdown w-100" data-bs-auto-close="outside">
                    <button class="btn btn-outline-secondary dropdown-toggle w-100"
                      type="button" id="warehouseDropdown"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <span id="warehouseDropdownLabel">
                        {{ count($selectedWarehouseIds ?? []) > 0 ? count($selectedWarehouseIds) . ' selected' : 'Choose Warehouses' }}
                      </span>
                    </button>

                    <div class="dropdown-menu p-3 w-100" aria-labelledby="warehouseDropdown" style="max-height: 300px; overflow-y: auto;">
                      <div class="mb-2">
                        <input type="text" id="warehouseSearch" class="form-control" placeholder="Search warehouse...">
                      </div>
                      <ul id="warehouseList" class="list-unstyled mb-0">
                        @foreach($warehouses as $warehouse)
                        <li class="form-check">
                          <input class="form-check-input warehouse-checkbox"
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
            </form>
            @endif

            {{-- Inventory Table --}}
            <div class="table-responsive custom-scrollbar">
              <form action="" method="POST">
                @csrf
                <table class="display" id="basic-1">
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>Warehouse</th>
                      <th>Variant</th>
                      <th>Stock Quantity</th>
                      <th>Reserved Quantity</th>
                      <th>Available Quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $i = 1; @endphp
                    @foreach($inventories as $inventory)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $inventory->warehouse->warehouse_name ?? 'N/A' }}</td>
                      <td>{{ $inventory->variant->color_name ?? 'Default' }}</td>
                      <td>{{ $inventory->stock_quantity }}</td>
                      <td>{{ $inventory->reserved_quantity }}</td>
                      <td>{{ $inventory->available_quantity }}</td>
                      <td>
                        <ul class="action">
                          <li class="edit">
                            <a href="">
                              <i class="icon-pencil-alt"></i>
                            </a>
                          </li>
                          <li class="delete">
                            <form action=""
                              method="POST" style="display:inline;"
                              onsubmit="return confirm('Are you sure you want to delete this record?');">
                              @csrf
                              @method('DELETE')
                              <button type="submit" style="border:none; background:none; padding:0; cursor:pointer; color:#dc3545;">
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
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends -->
</div>

{{-- JS for search filter --}}
@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('warehouseSearch');
  const warehouseList = document.getElementById('warehouseList');
  if (searchInput && warehouseList) {
    searchInput.addEventListener('keyup', function() {
      const searchValue = this.value.toLowerCase();
      warehouseList.querySelectorAll('li').forEach(li => {
        const text = li.textContent.toLowerCase();
        li.style.display = text.includes(searchValue) ? '' : 'none';
      });
    });
  }
});
</script>
@endsection

@endsection
