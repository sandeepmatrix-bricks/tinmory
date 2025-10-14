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
                            <a href="{{ route('admin.home.contact.index') }}">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Add Contact Details</li>
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
                        <h4>Add Footer Contact Information</h4>
                        <p class="f-m-light mt-1">Fill in all footer contact details and social media links.</p>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.home.contact.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">

                                <!-- Description -->
                               <div class="col-xxl-12 col-sm-12 mb-4">
                                    <label class="form-label" for="description">Description Details <span class="txt-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Enter Description Details" required rows="2"></textarea>
                                </div>

                                <!-- Address -->
                                <div class="col-xxl-4 col-sm-6">
                                    <label class="form-label" for="address">Address <span class="txt-danger">*</span></label>
                                    <input class="form-control mb-2" id="address" type="text" name="address" placeholder="Enter Address" required>
                                    <input class="form-control" id="address_link" type="url" name="address_link" placeholder="Enter Google Map Link (optional)">
                                </div>

                                <!-- Email -->
                                <div class="col-xxl-4 col-sm-6">
                                    <label class="form-label" for="email">Email <span class="txt-danger">*</span></label>
                                    <input class="form-control" id="email" type="email" name="email" placeholder="Enter Email" required>
                                </div>

                                <!-- Contact Number -->
                                <div class="col-xxl-4 col-sm-6">
                                    <label class="form-label" for="contact_number">Contact Number <span class="txt-danger">*</span></label>
                                    <input class="form-control" id="contact_number" type="text" name="contact_number" placeholder="Enter Contact Number" required maxlength="12">
                                </div>

                                <!-- Social Media Links -->
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <label class="form-label"><strong>Social Media Links</strong></label>
                                        <button type="button" id="add-social-media-row" class="btn btn-success">Add Link</button>
                                    </div>

                                    <table class="table table-bordered" id="socialMediaTable">
                                        <thead>
                                            <tr>
                                                <th>Platform <span class="txt-danger">*</span></th>
                                                <th>Link <span class="txt-danger">*</span></th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="social_media[0][platform]" class="form-control" required>
                                                        <option value="">Select Platform</option>
                                                        <option value="Facebook">Facebook</option>
                                                        <option value="Twitter">Twitter</option>
                                                        <option value="Instagram">Instagram</option>
                                                        <option value="LinkedIn">LinkedIn</option>
                                                        <option value="YouTube">YouTube</option>
                                                        <option value="Pinterest">Pinterest</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="url" name="social_media[0][link]" class="form-control" placeholder="Enter URL" required>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger removeRow">Remove</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="text-end mt-4">
                                <a href="{{ route('admin.home.contact.index') }}" class="btn btn-danger px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save Footer Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid ends -->
</div>

{{-- JavaScript for Dynamic Add/Remove --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    let tableBody = document.querySelector('#socialMediaTable tbody');
    let addRowButton = document.getElementById('add-social-media-row');
    let rowCount = 1;

    addRowButton.addEventListener('click', function () {
        let newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>
                <select name="social_media[${rowCount}][platform]" class="form-control" required>
                    <option value="">Select Platform</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Twitter">Twitter</option>
                    <option value="Instagram">Instagram</option>
                    <option value="LinkedIn">LinkedIn</option>
                    <option value="YouTube">YouTube</option>
                    <option value="Pinterest">Pinterest</option>
                </select>
            </td>
            <td><input type="url" name="social_media[${rowCount}][link]" class="form-control" placeholder="Enter URL" required></td>
            <td><button type="button" class="btn btn-danger removeRow">Remove</button></td>
        `;
        tableBody.appendChild(newRow);
        rowCount++;
    });

    tableBody.addEventListener('click', function (e) {
        if (e.target.classList.contains('removeRow')) {
            e.target.closest('tr').remove();
        }
    });
});
</script>
@endsection
