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
            <li class="breadcrumb-item active">FAQ Details</li>
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
            <a class="btn btn-primary" href="{{ route('admin.home.faqs.create') }}" style="float: right;">
              <i class="fa fa-plus"></i> Add FAQ
            </a>
          </div>

          <div class="card-body">
            <div class="table-responsive custom-scrollbar">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Title</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  @php $i = 1; @endphp
                  @foreach($FaqData as $faq)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $faq->title }}</td>
                      <td>{!! Str::limit($faq->question, 80) !!}</td>
                      <td>{!! Str::limit($faq->answer, 100) !!}</td>
                      <td>
                        <ul class="action">
                          <li class="edit">
                            <a href="{{ route('admin.home.faqs.edit', $faq->id) }}">
                              <i class="icon-pencil-alt"></i>
                            </a>
                          </li>
                          <li class="delete">
                            <form action="{{ route('admin.home.faqs.destroy', $faq->id) }}" 
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this FAQ?');"
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

              @if($FaqData->isEmpty())
                <p class="text-center text-muted mt-3">No FAQs added yet.</p>
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
