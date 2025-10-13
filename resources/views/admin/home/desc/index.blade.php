@extends('layouts.admin-header')
@section('content')

<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active"> Description Details</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0 card-no-border">
                    <a class="btn btn-primary" href="{{ route('admin.home.desc.form')}}" style="float:right;"><i class="fa fa-plus"></i>Add Description</a>
                  </div>
                  <div class="card-body">        
                    <div class="table-responsive custom-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>Sr.No.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Year</th>
                            <th>Year Description</th>
                            <th>Video</th>
                            <th>Video Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $i = 1; @endphp
                          @foreach($desc as $item)
                            <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $item->title }}</td>

                              {{-- You can render HTML safely if description comes from Summernote or CKEditor --}}
                              <td>{!! Str::limit($item->description, 100) !!}</td>

                              <td>{{ $item->year }}</td>
                              <td>{{ $item->year_description }}</td>

                              <td>
                                @if($item->description_video)
                                  <video width="150" controls>
                                    <source src="{{ asset('uploads/videos/' . $item->description_video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                  </video>
                                @else
                                  No video
                                @endif
                              </td>

                              <td>{{ $item->video_description_text }}</td>

                              <td> 
                                <ul class="action"> 
                                  <li class="edit">
                                    <a href="{{ route('admin.home.desc.edit', ['id' => $item->id]) }}">
                                      <i class="icon-pencil-alt"></i>
                                    </a>
                                  </li>
                                  <li class="delete">
                                    <form action="{{ route('admin.home.desc.delete', ['id' => $item->id]) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this description?');" 
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
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Scroll - vertical dynamic Ends-->
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>

@endsection