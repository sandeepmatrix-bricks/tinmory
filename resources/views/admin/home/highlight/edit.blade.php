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
                            <a href="{{ route('admin.home.highlights.index') }}">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Edit Highlight Items & Background Image</li>
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
                        <h4>Edit Highlight Items & Background Image</h4>
                        <p class="f-m-light mt-1">Update the details and submit the form.</p>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.home.highlights.update', $highlightBackground->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Background Image Upload -->
                            <div class="form-group mb-4">
                                <label for="background_image">Background Image</label><br>
                                @if($highlightBackground->background_image)
                                    <img src="{{ asset('uploads/highlights/' . $highlightBackground->background_image) }}" 
                                         alt="Current Background" style="max-width: 300px; height: auto; margin-bottom: 10px;">
                                @endif
                                <input type="file" name="background_image" id="background_image" accept="image/*" class="form-control">
                                <small class="text-secondary">Leave blank to keep current image</small>
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
                                    @foreach($highlightItems as $index => $item)
                                    <tr>
                                        <td>
                                            @if($item->icon)
                                                <img src="{{ asset('uploads/highlight/icons' . $item->icon) }}" alt="Icon" style="max-width: 60px; height: auto; display:block; margin-bottom:5px;">
                                            @endif
                                            <input type="file" name="icons[{{ $index }}]" accept="image/*" class="form-control">
                                            <small class="text-secondary">Leave blank to keep current icon</small>
                                            <input type="hidden" name="item_ids[]" value="{{ $item->id }}">
                                        </td>
                                        <td>
                                            <input type="text" name="titles[]" value="{{ old('titles.' . $index, $item->title) }}" placeholder="Enter Title" class="form-control" required>
                                        </td>
                                        <td>
                                            <textarea name="descriptions[]" placeholder="Enter Description" class="form-control" required>{{ old('descriptions.' . $index, $item->description) }}</textarea>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary addRow">Add More</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Form Actions -->
                            <div class="text-end">
                                <a href="{{ route('admin.home.highlights.index') }}" class="btn btn-danger px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
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
