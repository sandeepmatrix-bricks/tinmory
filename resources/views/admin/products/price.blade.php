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
              <a href="#">
                <svg class="stroke-icon">
                  <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg>
              </a>
            </li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item active">Update Variant Prices</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0 card-no-border">
            <h4>Update {{ $productDetails->product_name }} Variant Prices</h4>
          </div>

          <div class="card-body">
            {{-- Product Navigation --}}
            <div class="mb-3">
              @include('admin.products.product_nav', ['productId' => $productId])
            </div>

            {{-- Country Dropdown --}}
            <div class="row align-items-end mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="country">Select Country</label>
                    <select name="country_id" id="country" class="form-control">
                        <option value="">-- Select Country --</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ request('country_id') == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>


            {{-- Variant Price Table --}}
            <div id="variantTableContainer" style="display:none;">
              <form action="{{ route('admin.save_prices') }}" method="POST">
                @csrf
                <input type="hidden" name="country_id" id="selectedCountry">
                <input type="hidden" name="product_id" value="{{ $productId }}">

                <div class="table-responsive custom-scrollbar">
                  <table class="display table table-striped" id="basic-1">
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Color Code</th>
                                <th>Color Name</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>

                <div class="card-footer text-end mt-4">
                  <button type="submit" class="btn btn-primary">Save Prices</button>
                </div>
              </form>
            </div>

            <p id="noCountryMsg" class="text-muted">
              Please select a country to view and set variant prices.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- AJAX Script --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
  const countrySelect = document.getElementById('country');
  const variantContainer = document.getElementById('variantTableContainer');
  const noCountryMsg = document.getElementById('noCountryMsg');
  const hiddenCountryInput = document.getElementById('selectedCountry');
  const productId = document.querySelector('input[name="product_id"]').value;
  const tbody = document.querySelector('#basic-1 tbody');

  countrySelect.addEventListener('change', function() {
    const countryId = this.value;

    if (!countryId) {
      variantContainer.style.display = 'none';
      noCountryMsg.style.display = 'block';
      noCountryMsg.textContent = 'Please select a country to view and set variant prices.';
      return;
    }

    hiddenCountryInput.value = countryId;

    // Fetch variant data without refreshing page
    fetch(`{{ route('admin.show_price', ':productId') }}`.replace(':productId', productId) + `?country_id=${countryId}`, {
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => response.json())
    .then(data => {
      tbody.innerHTML = ''; // clear old rows

      if (data.length > 0) {
        console.log(data);
        data.forEach((variant, index) => {
          tbody.innerHTML += `
            <tr>
              <td>${index + 1}</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <span class="color-dot"
                    style="display:inline-block;width:20px;height:20px;background-color:${variant.color_code ?? '#ccc'};border-radius:50%;border:1px solid #ddd;">
                  </span>
                  ${variant.color_code ?? '—'}
                </div>
              </td>
              <td>${variant.color_name ?? 'N/A'}</td>
              <td>${variant.sku ?? '—'}</td>
              <td>
                <input type="number" name="prices[${variant.id}]" step="0.01"
                       class="form-control" placeholder="Enter Price"
                       value="${variant.price ?? ''}">
              </td>
              <td class="text-center">
                <div class="form-check form-switch d-flex justify-content-center">
                  <input class="form-check-input" type="checkbox"
                         name="status[${variant.id}]" value="1"
                         ${variant.status == 1 ? 'checked' : ''}>
                </div>
              </td>
            </tr>
          `;
        });

        variantContainer.style.display = 'block';
        noCountryMsg.style.display = 'none';
      } else {
        variantContainer.style.display = 'none';
        noCountryMsg.textContent = 'No variants found for this country.';
        noCountryMsg.style.display = 'block';
      }
    })
    .catch(err => {
      console.error('Error:', err);
      noCountryMsg.textContent = 'Something went wrong. Please try again.';
      variantContainer.style.display = 'none';
      noCountryMsg.style.display = 'block';
    });
  });
});
</script>

@endsection
