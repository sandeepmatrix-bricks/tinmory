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
                        <li class="breadcrumb-item active">Add FAQs</li>
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
                        <h4>Add Frequently Asked Questions</h4>
                        <p class="f-m-light mt-1">Add multiple FAQ entries and submit the form.</p>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.home.faqs.store') }}" method="POST">
                            @csrf

                            <table class="table table-bordered dynamicTable" id="highlightItemsTable">
                                <thead>
                                    <tr>
                                        <th>Title <span class="txt-danger">*</span></th>
                                        <th>Question <span class="txt-danger">*</span></th>
                                        <th>Answer <span class="txt-danger">*</span></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="titles[]" placeholder="Enter FAQ Section Title" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="questions[]" placeholder="Enter Question" class="form-control" required>
                                        </td>
                                        <td>
                                            <textarea name="answers[]" placeholder="Enter Answer" class="form-control" required></textarea>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary addRow">Add More</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="text-end">
                                <a href="{{ route('admin.home.faqs.index') }}" class="btn btn-danger px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add FAQs</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
