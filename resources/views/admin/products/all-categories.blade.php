@extends('layouts.admin-header')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>
                     Display Category</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">ECommerce</li>
                    <li class="breadcrumb-item active">Category</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12"> 
                
                <div class="card"> 
                  <div class="category-buton"><a class="btn button-primary" href="#!" data-bs-toggle="modal" data-bs-target="#category-pill-modal" style="float:right;"><i class="me-2 fa fa-plus"> </i>Create New Category </a></div>
                                        <div class="modal fade" id="category-pill-modal" tabindex="-1" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h3 class="modal-title fs-5">Create new category</h3>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body custom-input"> 
                                                <div class="create-category">
                                                  <div>
                                                    <form action="{{route('admin.new_product_category_insert')}}" method="post">
                                                      {{csrf_field()}}
                                                    <label class="form-label" for="categoryName">Category Name <span class="txt-danger"> *</span></label>
                                                    <input class="form-control m-0" id="category_name" name="category_name" type="text" required="">
                                                    <label class="form-label" for="categoryName">Slug <span class="txt-danger"> *</span></label>
                                                    <input class="form-control m-0" id="category_slug" name="category_slug" type="text" required="">
                                                    <label for="content">Content:</label>
                                                    <textarea class="form-control" name="category_description" id="editor" rows="10" cols="80"></textarea>

                                                    <button class="btn btn-primary" style="margin-top:1% !important;" type="submit" name="submit">Add</button>
                                                  </form>
                                                  </div>
                                                  
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
                                        </div>
                  <div class="card-body">
                    
                    <div class="list-product list-category">
                      <table class="table" id="project-status">
                        <thead> 
                          <tr> 
                            <th>
                              <div class="form-check"> 
                                <input class="form-check-input checkbox-primary" type="checkbox">
                              </div>
                            </th>
                            <th> <span class="f-light f-w-600">Category</span></th>
                            
                            <th> <span class="f-light f-w-600">Action</span></th>
                          </tr>
                        </thead>
                        <tbody> 
                          @foreach($fetch_all_categories as $all_categories)
                          <tr class="product-removes">
                            <td>
                              <div class="form-check"> 
                                <input class="form-check-input checkbox-primary" type="checkbox">
                              </div>
                            </td>
                            <td> 
                              <div class="product-names">
                                
                                <p>{{$all_categories->category_name}}</p>
                              </div>
                            </td>
                            
                            <td> 
                              <div class="product-action">
                                <svg>    
                                  <use href="../assets/svg/icon-sprite.svg#edit-content"></use>
                                </svg>
                                <svg>
                                  <use href="../assets/svg/icon-sprite.svg#trash1"> </use>
                                </svg>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
@endsection