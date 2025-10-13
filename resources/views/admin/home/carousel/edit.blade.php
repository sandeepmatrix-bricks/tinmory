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
                            <a href="{{ route('admin.home.carousels.index') }}">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Edit Carousel Item</li>
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
                        <h4>Edit Carousel Item</h4>
                        <p class="f-m-light mt-1">Update carousel image, title, and description.</p>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.home.carousels.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <table class="table table-bordered" id="carouselItemsTable">
                                <thead>
                                    <tr>
                                        <th>Background Image <span class="txt-danger">*</span></th>
                                        <th>Uploaded Image <span class="txt-danger">*</span></th>
                                        <th>Title <span class="txt-danger">*</span></th>
                                        <th>Description <span class="txt-danger">*</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                           
                                            <input type="file" name="image" accept="image/*" class="form-control">
                                            <small class="text-secondary">Leave blank to keep current image</small>
                                        </td>
                                        <td>
                                            @if($data->image)
                                                <img src="{{ asset('uploads/carousels/' . $data->image) }}" 
                                                     alt="Carousel Image" 
                                                     style="max-width: 150px; border-radius: 6px; display:block; margin-bottom:10px;">
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <input type="text" name="title" value="{{ old('title', $data->title) }}" 
                                                   placeholder="Enter Title" class="form-control" required>
                                        </td>
                                        <td>
                                            <textarea name="description" placeholder="Enter Description" 
                                                      class="form-control" required>{{ old('description', $data->description) }}</textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="text-end">
                                <a href="{{ route('admin.home.carousels.index') }}" class="btn btn-danger px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Carousel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends -->
</div>
@endsection
