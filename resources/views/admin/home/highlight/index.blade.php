@extends('layouts.admin-header')
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Highlight Section</h4>
                </div>
                <div class="col-6 text-end">
                    <a class="btn btn-primary" href="{{ route('admin.home.highlights.create') }}">
                        <i class="fa fa-plus"></i> Add Highlight Item
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Background Image Display -->
    <div class="container-fluid mb-4">
        <div class="card">
            <div class="card-header">
                <h5>Background Image</h5>
            </div>
            <div class="card-body text-center">
                @if($highlightBackground)
                    <img src="{{ asset('uploads/highlights/' . $highlightBackground->background_image) }}"
                         alt="Highlight Background"
                         style="max-width: 100%; height: auto; max-height: 200px;">
                @else
                    <p>No background image uploaded.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Highlight Items Table -->
    <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0 card-no-border">
                  </div>
                  <div class="card-body">        
                    <div class="table-responsive custom-scrollbar">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>Sr.No.</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($highlightItems as $item)
                                <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <img src="{{ asset('uploads/highlights/icons/' . $item->icon) }}" alt="Icon" style="width: 50px;">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{!! Str::limit($item->description, 100) !!}</td>
                                <td> 
                                    <ul class="action"> 
                                    <li class="edit">
                                        <a href="{{ route('admin.home.highlights.edit', $item->id) }}">
                                        <i class="icon-pencil-alt"></i>
                                        </a>
                                    </li>
                                    <li class="delete">
                                        <form action="{{ route('admin.home.highlights.destroy', $item->id) }}" method="POST" 
                                            onsubmit="return confirm('Are you sure you want to delete this item?');" 
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
</div>

@endsection
