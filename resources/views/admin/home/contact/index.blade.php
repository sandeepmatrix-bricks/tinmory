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
              <a href="">
                <svg class="stroke-icon">
                  <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg>
              </a>
            </li>
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Contact Details</li>
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
            <a class="btn btn-primary" href="{{ route('admin.home.contact.create') }}" style="float: right;">
              <i class="fa fa-plus"></i> Add Contact Details
            </a>
            <h4>Description Details Form</h4>
            <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
          </div>

          <div class="card-body">
            
          </div>

        </div>
      </div>

    </div>
  </div>
  <!-- Container-fluid Ends -->
</div>

@endsection
