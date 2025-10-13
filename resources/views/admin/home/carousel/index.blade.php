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
            <li class="breadcrumb-item active">Carousel Details</li>
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
            <a class="btn btn-primary" href="{{ route('admin.home.carousels.create') }}" style="float: right;">
              <i class="fa fa-plus"></i> Add Carousel Item
            </a>
          </div>

          <div class="card-body">
            <div class="table-responsive custom-scrollbar">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Background Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  @php $i = 1; @endphp
                  @foreach($carousels as $carousel)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>
                        @if($carousel->image)
                          <img src="{{ asset('uploads/carousels/' . $carousel->image) }}" 
                               alt="Carousel Background" 
                               style="width: 80px; border-radius: 6px;">
                        @else
                          <span class="text-muted">No Image</span>
                        @endif
                      </td>
                      <td>{{ $carousel->title }}</td>
                      <td>{!! Str::limit($carousel->description, 100) !!}</td>
                      <td>
                        <ul class="action">
                          <li class="edit">
                            <a href="{{ route('admin.home.carousels.edit', $carousel->id) }}">
                              <i class="icon-pencil-alt"></i>
                            </a>
                          </li>
                          <li class="delete">
                            <form action="{{ route('admin.home.carousels.destroy', $carousel->id) }}" 
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this item?');"
                                  style="display: inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" style="all: unset; cursor: pointer;" title="Delete">
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

              @if($carousels->isEmpty())
                <p class="text-center text-muted mt-3">No carousel items added yet.</p>
              @endif
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
  <!-- Container-fluid Ends -->
</div>

@endsection
