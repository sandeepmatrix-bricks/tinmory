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
              <a href="index.html">
                <svg class="stroke-icon">
                  <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg>
              </a>
            </li>
            <li class="breadcrumb-item">Variant</li>
            <li class="breadcrumb-item active">Add Variant</li>
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
          <form class="card" action="{{ route('admin.new_variant_insert') }}" method="post">
            @csrf

            <input type="hidden" name="product_id" value="{{ $data['prductId'] }}">
            @if($data['isView'])
              <input type="hidden" name="variant_id" value="{{ $data['variantId'] }}">
            @endif
            <div class="card-header">
              <h4 class="card-title mb-0">{{ $data['isView'] ? 'Edit' : 'Add' }} Variant</h4>
              <div class="card-options">
                <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                  <i class="fe fe-chevron-up"></i>
                </a>
                <a class="card-options-remove" href="#" data-bs-toggle="card-remove">
                  <i class="fe fe-x"></i>
                </a>
              </div>
            </div>

            <div class="card-body">
              <div class="row">

                {{-- Color Code --}}
                <div class="col-md-4">
                  <div class="mb-3">
                    <label for="color_code" class="form-label">Color Code</label>
                    <input 
                      id="color_code"
                      class="form-control form-control-color"
                      type="color"
                      name="color_code"
                      value="{{ old('color_code', $data['variantData']['color_code'] ?? '#000000') }}">
                    
                    <small class="form-text text-muted">
                      Selected color: <span id="selectedColor">{{ old('color_code', $data['variantData']['color_code'] ?? '#000000') }}</span>
                    </small>
                  </div>
                </div>

                
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Color Name</label>
                    <input 
                      class="form-control"
                      type="text"
                      placeholder="Color Name"
                      name="color_name"
                      value="{{ old('color_name', $data['variantData']['color_name'] ?? '') }}">
                  </div>
                </div>

                
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">SKU</label>
                    <input 
                      class="form-control"
                      type="text"
                      placeholder="SKU"
                      name="sku"
                      value="{{ old('sku', $data['variantData']['sku'] ?? '') }}">
                  </div>
                </div>

              </div>
            </div>

            <div class="card-footer text-end">
              <button class="btn btn-primary" type="submit" name="submit">{{ $data['isView'] ? 'Update' : 'Add' }}</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>

{{-- Color Preview Script --}}
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const colorInput = document.getElementById("color_code");
    const colorValue = document.getElementById("selectedColor");

    if (colorInput) {
      colorValue.textContent = colorInput.value;
      colorInput.addEventListener("input", () => {
        colorValue.textContent = colorInput.value;
      });
    }
  });
</script>
@endsection
