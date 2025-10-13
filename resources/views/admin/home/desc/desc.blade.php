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
                        <li class="breadcrumb-item active">Description Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Description Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="tab-content" id="wizard-tabContent">
                                        <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                            <form class="row g-3 needs-validation custom-input" 
                                                action="{{ route('admin.home.desc.store') }}" 
                                                method="POST" 
                                                enctype="multipart/form-data">
                                              @csrf

                                              @if(@$isEdit)
                                                  <input type="hidden" name="desc_id" value="{{ $id }}">
                                                  <input type="hidden" name="old_name" value="{{ $desc?->description_video }}">
                                              @endif

                                              <!-- Title -->
                                              <div class="form-group">
                                                  <label for="title">Title <span class="txt-danger">*</span></label>
                                                  <input type="text" name="title" id="title" placeholder="Enter Title"
                                                        class="form-control" required
                                                        value="{{ old('title', $desc->title ?? '') }}">
                                              </div>
                                              
                                              <!-- Description -->
                                              <div class="form-group">
                                                  <label for="description">Description <span class="txt-danger">*</span></label>
                                                  <textarea name="description" id="summernote" placeholder="Enter Description"
                                                            class="form-control">{!! old('description', $desc->description ?? '') !!}</textarea>
                                              </div>

                                              <!-- Year -->
                                              <div class="form-group">
                                                  <label for="year">Year <span class="txt-danger">*</span></label>
                                                  <input type="text" name="year" id="year" placeholder="Enter Year"
                                                        class="form-control" required
                                                        value="{{ old('year', $desc->year ?? '') }}">
                                              </div>

                                              <!-- Year Description -->
                                              <div class="form-group">
                                                  <label for="year_description">Year Description <span class="txt-danger">*</span></label>
                                                  <input type="text" name="year_description" id="year_description" placeholder="Enter Year Description"
                                                        class="form-control" required
                                                        value="{{ old('year_description', $desc->year_description ?? '') }}">
                                              </div>

                                              <!-- Description Video -->
                                              <div class="form-group">
                                                  <label for="description_video">Description Video Upload <span class="txt-danger">*</span></label>
                                                  <input type="file" name="description_video" id="description_video" accept="video/*"
                                                        class="form-control" {{ @$isEdit ? '' : 'required' }}>

                                                  @if(@$isEdit && $desc->description_video)
                                                      <div class="mt-2">
                                                          <video width="200" controls>
                                                              <source src="{{ asset('uploads/videos/' . $desc->description_video) }}" type="video/mp4">
                                                              Your browser does not support the video tag.
                                                          </video>
                                                      </div>
                                                  @endif
                                              </div>

                                              <!-- Video Description Text -->
                                              <div class="form-group">
                                                  <label for="video_description_text">Video Description <span class="txt-danger">*</span></label>
                                                  <input type="text" name="video_description_text" id="video_description_text" placeholder="Enter a brief description of the video"
                                                        class="form-control" required
                                                        value="{{ old('video_description_text', $desc->video_description_text ?? '') }}">
                                              </div>

                                              <!-- Form Actions -->
                                              <div class="col-12 text-end">
                                                  <a href="{{ route('admin.home.desc.index')}}" class="btn btn-danger px-4">Cancel</a>
                                                  <button class="btn btn-primary" type="submit">
                                                      {{ $isEdit ?? false ? 'Update' : 'Add' }}
                                                  </button>
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
    <!-- Container-fluid Ends -->
</div>
@endsection