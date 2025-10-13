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
                        <li class="breadcrumb-item active">Add Highlight Items</li>
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
                        <h4>Add Highlight Items & Background Image</h4>
                        <p class="f-m-light mt-1">Fill up the details and submit the form.</p>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.home.highlights.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Background Image Upload -->
                            <div class="form-group mb-4">
                                <label for="background_image">Background Image <span class="txt-danger"> </span></label>
                                <input type="file" name="background_image" id="background_image" accept="image/*" class="form-control" required>
                            </div>

                            <!-- Highlight Items Table -->
                            <table class="table table-bordered" id="highlightItemsTable">
                                <thead>
                                    <tr>
                                        <th>Icon <span class="txt-danger">*</span></th>
                                        <th>Title <span class="txt-danger">*</span></th>
                                        <th>Description <span class="txt-danger">*</span></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="file" name="icons[]" accept="image/*" class="form-control" required>
                                            <small class="text-secondary">Max size 2MB. Format: jpg, jpeg, png, webp</small>
                                        </td>
                                        <td>
                                            <input type="text" name="titles[]" placeholder="Enter Title" class="form-control" required>
                                        </td>
                                        <td>
                                            <textarea name="descriptions[]" placeholder="Enter Description" class="form-control" required></textarea>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary addRow">Add More</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Form Actions -->
                            <div class="text-end">
                                <a href="{{ route('admin.home.highlights.index') }}" class="btn btn-danger px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add</button>
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
