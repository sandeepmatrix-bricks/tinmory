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
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Information Details</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Container-fluid starts-->
  <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h4>Information Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                <form class="row g-3 needs-validation custom-input" action="{{route('admin.home.banners.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                      @if(@$isEdit)
                                        <input type="hidden" name="banner_id" value="{{$id}}">
                                        <input type="hidden" name="old_image_name" value="{{$banner?->banner_image}}">
                                     @endif
                                    <!-- Banner Heading-->
                                    <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="banner_description">Banner Description <span class="txt-danger">*</span></label>
                                        <input class="form-control" id="banner_description" type="text" name="banner_description" placeholder="Enter Banner Description" value="{{ @$isEdit ? @$banner?->banner_description: ' ' }}">
                                        <div class="invalid-feedback">Please enter a Banner Description.</div>
                                    </div>

                                   

                                    <!-- Banner Image-->
                                    <div class="col-xxl-4 col-sm-12">
                                        <label class="form-label" for="banner_image">Banner Image <span class="txt-danger">*</span></label>
                                        <input class="form-control" id="banner_image" type="file" name="banner_image" accept=".jpg, .jpeg, .png, .webp">
                                        <div class="invalid-feedback">Please upload a Banner Image.</div>
                                        <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                        <br>
                                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                    </div>

                                    <!-- Preview Section -->
                                    @php
                                        $hasImage = !empty($banner->banner_image);
                                    @endphp

                                    <div class="col-xxl-4 col-sm-12" id="bannerImagePreviewContainer" style="{{ $hasImage ? '' : 'display: none;' }}">
                                        <img
                                            id="banner_image_preview"
                                            src="{{ $hasImage ? asset('uploads/banners/' . $banner->banner_image) : '' }}"
                                            alt="Preview"
                                            class="img-fluid"
                                            style="max-height: 200px; border: 1px solid #ddd; padding: 5px;"
                                        >
                                    </div>

                                    <!-- Form Actions -->
                                    <div class="col-12 text-end">
                                        <a href="{{route('admin.home.banners.index')}}" class="btn btn-danger px-4">Cancel</a>
                                        <button class="btn btn-primary" type="submit">{{@$isEdit ? 'Update': 'Add'}} </button>
                                    </div>
                                </form>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

          </div>
  <!-- Container-fluid Ends-->
</div>
@endsection