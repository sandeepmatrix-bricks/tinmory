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
                        <li class="breadcrumb-item active">Edit FAQs</li>
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

                    {{-- ✅ Edit Title Section --}}
                    @if($type === 'title')
                        <div class="card-header">
                            <h4>Edit Title</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.home.faqs.update', $faq->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="titles" 
                                           id="title" 
                                           class="form-control" 
                                           value="{{ old('titles', $faq->title) }}" 
                                           required>
                                </div>

                                <div class="text-end mt-3">
                                    <a href="{{ route('admin.home.faqs.index') }}" class="btn btn-danger px-4">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update Title</button>
                                </div>
                            </form>
                        </div>

                    {{-- ✅ Edit Question & Answer Section --}}
                    @elseif($type === 'qa')
                        <div class="card-header">
                            <h4>Edit FAQ</h4>
                            <p class="f-m-light mt-1">Update the question and answer below.</p>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.home.faqs.update', $faq->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="question" class="form-label">Question <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="question" 
                                           id="question" 
                                           class="form-control" 
                                           value="{{ old('question', $faq->question) }}" 
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label for="answer" class="form-label">Answer <span class="text-danger">*</span></label>
                                    <textarea name="answer" 
                                              id="answer" 
                                              class="form-control" 
                                              rows="5" 
                                              required>{{ old('answer', $faq->answer) }}</textarea>
                                </div>

                                <div class="text-end mt-3">
                                    <a href="{{ route('admin.home.faqs.index') }}" class="btn btn-danger px-4">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update FAQ</button>
                                </div>
                            </form>
                        </div>

                    @else
                        <div class="card-body">
                            <p class="text-muted mb-0">Invalid FAQ type.</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
