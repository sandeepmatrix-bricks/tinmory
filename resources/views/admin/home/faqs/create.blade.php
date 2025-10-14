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
                    
                    @if (isset($type))
                        <div class="card-header">
                            <h4>Add Title</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.home.faqs.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="titles" id="title" placeholder="Enter FAQ Section Title" class="form-control" required >
                                </div>

                                <div class="text-end mt-3">
                                    <a href="{{ route('admin.home.faqs.index') }}" class="btn btn-danger px-4">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Add Title</button>
                                </div>
                            </form>
                        </div>
                    @else 
                        <div class="card-header">
                            <h4>Add Frequently Asked Questions</h4>
                            <p class="f-m-light mt-1">Add multiple FAQ entries and submit the form.</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.home.faqs.store') }}" method="POST">
                                @csrf

                                <table class="table table-bordered dynamicTable" id="faqItemsTable">
                                    <thead>
                                        <tr>
                                            <th>Question <span class="txt-danger">*</span></th>
                                            <th>Answer <span class="txt-danger">*</span></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ✅ JavaScript for Dynamic Add/Remove --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tableBody = document.querySelector('#faqItemsTable tbody');

        // Add More button HTML
        function addButtonHtml() {
            return '<button type="button" class="btn btn-primary addRow">Add More</button>';
        }

        // Remove button HTML
        function removeButtonHtml() {
            return '<button type="button" class="btn btn-danger removeRow">Remove</button>';
        }

        // Add a new row
        function addRow() {
            // Change last row’s action button from Add → Remove
            const lastRow = tableBody.querySelector('tr:last-child');
            lastRow.querySelector('td:last-child').innerHTML = removeButtonHtml();

            // Create new row
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
               
                <td>
                    <input type="text" name="questions[]" placeholder="Enter Question" class="form-control" required>
                </td>
                <td>
                    <textarea name="answers[]" placeholder="Enter Answer" class="form-control" required></textarea>
                </td>
                <td>${addButtonHtml()}</td>
            `;

            tableBody.appendChild(newRow);
        }

        // Event delegation for Add / Remove buttons
        tableBody.addEventListener('click', function (e) {
            if (e.target.classList.contains('addRow')) {
                addRow();
            }

            if (e.target.classList.contains('removeRow')) {
                e.target.closest('tr').remove();

                // Update last row’s action button back to Add
                const rows = tableBody.querySelectorAll('tr');
                if (rows.length > 0) {
                    rows.forEach((row, index) => {
                        const actionCell = row.querySelector('td:last-child');
                        if (index === rows.length - 1) {
                            actionCell.innerHTML = addButtonHtml();
                        } else {
                            actionCell.innerHTML = removeButtonHtml();
                        }
                    });
                }
            }
        });
    });
</script>
@endsection
