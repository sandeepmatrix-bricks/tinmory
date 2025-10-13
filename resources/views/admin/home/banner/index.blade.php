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
                    <li class="breadcrumb-item active"> Banner Details</li>
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
                    <a class="btn btn-primary" href="{{route('admin.home.banners.form')}}" style="float:right;"><i class="fa fa-plus"></i>Add Banner</a>
                  </div>
                  <div class="card-body">        
                    <div class="table-responsive custom-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                          	<th>Sr.No.</th>
                            <th>Description</th>
                            <th>Uploaded Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                            <tbody>
                                @php $i = 1; @endphp

                                @foreach($banners as $banner)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $banner?->banner_description }}</td>
                                        <td><img src="{{ asset('uploads/banners/' . $banner->banner_image) }}" alt="Banner Image" style="width:150px;"></td>
                                        <td> 
                                          <ul class="action"> 
                                            <li class="edit"> <a href="{{route('admin.home.banners.edit', ['id' => $banner->id])}}"><i class="icon-pencil-alt"></i></a></li>
                                            <li class="delete">
                                              <form action="{{ route('admin.home.banners.delete', ['id' => $banner->id]) }}" method="POST" 
                                                    onsubmit="return confirm('Are you sure you want to delete this banner?');" 
                                                    style="display: inline;">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" 
                                                          style="all: unset; cursor: pointer;" 
                                                          title="Delete">
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