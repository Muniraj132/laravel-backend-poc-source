@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')

    <div class="row mt-3">
        <!-- User Card -->
        <!-- User Count Card -->
        <div class="col-md-3">
          <div class="card bg-primary text-white">
              <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                      <div>
                          <i class="fas fa-users fa-3x"></i>
                      </div>
                      <div class="text-right">
                          <h5 class="card-title">Users</h5>
                          <p class="card-text">Total Users:</p>
                          <strong>{{ $userCount }}</strong>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <!-- Product Card -->
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-shopping-cart fa-3x"></i>
                        </div>
                        <div class="text-right">
                            <h5 class="card-title">News Letters</h5>
                            <p class="card-text">Total Newsletter:</p>
                            <strong>{{ $productCount }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Card (Replace with your data) -->
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-chart-bar fa-3x"></i>
                        </div>
                        <div class="text-right">
                            <h5 class="card-title">News</h5>
                            <p class="card-text">Total News Data:</p>
                            <strong>{{ $contentCount }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <!-- Additional Card (Replace with your data) -->
                <div class="col-md-3">
                  <div class="card bg-info text-white">
                      <div class="card-body">
                          <div class="d-flex justify-content-between align-items-center">
                              <div>
                                  <i class="fas fa-chart-bar fa-3x"></i>
                              </div>
                              <div class="text-right">
                                  <h5 class="card-title">Something </h5>
                                  <p class="card-text">Some Data:</p>
                                  <strong>{{ $productCount }}</strong>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
    </div>
        <br><br>

        <div class="card recent-sales overflow-auto">
            <div class="d-flex align-items-center justify-content-between" style="margin: 30px ;">
                <h3 class="mb-0">Upcoming Events</h3>
            
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    Add
                </button>
            </div>
            <div class="card-body">
                 <table class="table table-hover responsive  data-table" id="newseventstable" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>    
                    </tbody>
                </table>
            </div>
        </div>

        
{{-- model --}}
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Events</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    @csrf
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <label for="price" class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" id="price" placeholder="Price" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <label for="image" class="form-label">Images</label>
                                    <input type="file" name="images[]" class="form-control" id="images" multiple accept="image/*" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="mb-2">
                                <label  class="form-label">Event  Status</label>
                                <select class="form-control" name="active_status" id="active_status">
                                    <option value="publish">Publish</option>
                                    <option value="Unpublish">Unpublish</option>
                                </select>
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<hr />
{{-- edi model --}}

<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Edit News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm">
                    @csrf
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="edittitle" placeholder="Title" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" id="editdate" placeholder="Price" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">  
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Images</label>
                                    <input type="file" name="images[]" class="form-control" id="editimages" multiple accept="image/*" />
                               <div id="resource_name">
                               </div>  
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="editdescription" placeholder="Description"></textarea>
                                </div>
                                <input type="text" name="imagename" id="imagename" hidden>
                                <input type="text" name="id" id="editid" hidden>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="mb-2">
                                <label  class="form-label">Event  Status</label>
                                <select class="form-control" name="active_status" id="active_status">
                                    <option value="publish">Publish</option>
                                    <option value="Unpublish">Unpublish</option>
                                </select>
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <!-- Delete Modal -->
    <div class="modal" id="myModalDel" >
    <div class="modal-dialog modal-md modal-centered">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header" style="background-color:#085ad5e0;color: #fff;">
        <h4>Delete</h4>
        <button type="button" id="CloseModalDel" class="close" data-dismiss="modal" >&times;</button>
        </div>
        <form id="resourceFileDel">                                                      
        <div class="modal-body">
        <div class="row">
        <div class="form-group col-md-12">
            <label class="label-name" style="font-size:20px">Are you sure you want to delete?</label>
            <input type="hidden" name="id" id="id" value="">
        </div>
        </div>
        <div class="modal-footer">
        <button class="btn btn-add m-t-15 waves-effect mb-3 btn btn-info" id="newseventsDel" >Yes</button>
        <button class="btn btn-add m-t-15 waves-effect mb-3 btn btn-secondary" id="closeModalDel" type="button">
        No</button>
        </div>
        </div>
    </form>
    </div>
    </div>
    </div>
</div>
@if(Session::has('success'))
<div class="alert alert-success" role="alert" id="exportsuccess">
    {{ Session::get('success') }}
</div>
@endif
<!-- Font Awesome File -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.1.96/css/materialdesignicons.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Datatable js Files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<!-- Validate js Files -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

<!-- drag drop -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!-- Tooltip -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // $("#exportsuccess").removeAttr('style').delay(2000).fadeOut();

    $("#addProductForm").validate({
        rules: {
            title: {
                required: true,
            },
            date: {
                required: true,
            },
            description: {
                required: true,
            },
            active_status: {
                required: true,
            }
        },
        messages: {
            title: {
                required: "Please enter a Title",
            },
            date: {
                required: "Please enter a Date"
            },
            description: {
                required: "Please enter a Description",
            },
            active_status: {
                required: "Please Choose a Event status",
            }
        },
        submitHandler: function (form) {
           var formData = new FormData(form); 
           $.ajax({
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                url: "{{ route('events.store') }}",
                success: function (response) {
                    $("#addProductModal").modal("hide");
                    $('#addProductModal form')[0].reset();
                    table.draw();
                    swal("Success!", "" + response.success + "", "success");
                },
            });
        },
    });

    
   
 var table = $('#newseventstable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('events.get') }}",
      columns: [
       
          {data: 'id',orderable: true, searchable: true},
          {data: 'title',orderable: true, searchable: true},
          {data: 'date',orderable: true, searchable: true,
            "render": function (data) {
                var date = new Date(data);
                var month = date.getMonth() + 1;
                return (month.length > 1 ? month : "0" + month) + "/" + date.getDate() + "/" + date.getFullYear();
            }
          },
          {data: 'description',orderable: true, searchable: true},
          {data: 'active_status',orderable: true, searchable: true},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });
    $("#editProductForm").validate({
        rules: {
            title: {
                required: true,
            },
            date: {
                required: true,
            },
            description: {
                required: true,
            },
            active_status: {
                required: true,
            }
        },
        messages: {
            title: {
                required: "Please enter a Title",
            },
            date: {
                required: "Please enter a Date"
            },
            description: {
                required: "Please enter a Description",
            },
            active_status: {
                required: "Please Choose a Event status",
            }
        },
        submitHandler: function (form) {
           var formData = new FormData(form); 
           $.ajax({
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                url: "{{ route('events.update') }}",
                success: function (response) {
                    $("#editProductModal").modal("hide");
                    $('#editProductModal form')[0].reset();
                    table.draw();
                    swal("Success!", "" + response.success + "", "success");
                },
            });
        },
    });

    $('.data-table').on('click','.newseventsedit',function() { 
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        newsview(id,data);
    });

    function newsview(id,data){
        var id = data; 
        var data = {'id' : id};
        $.ajax({
        url : "{{Route('events.show')}}",
        method : "GET",
        data : data,
            success: function(response) {
                var imageUrl = "{{ asset('upcomingEvents/') }}";
                $( "#edittitle" ).empty().val(response.fileData['title']);
                $( "#editid" ).empty().val(response.fileData['id']);
                $( "#editdate" ).empty().val(response.fileData['date']);
                $( "#editdescription" ).empty().val(response.fileData['description']);
                $( "#imagename" ).empty().val(response.fileData['image']);
                $( "#resource_name" ).html('<img src="' + imageUrl +'/'+response.fileData['image']+ '" alt="Image" style="height: 70px;">');
                if(response.fileData['active_status'] === 'publish' ){
                    $('#active_status option[value="publish"]').prop("selected", "selected");
                }else{
                    $('#active_status option[value="Unpublish"]').prop("selected", "selected");
                }
             }
        });
        $('#editProductModal').appendTo("body").modal('toggle');
    }
    $('.data-table').on('click','.newseventsdel',function() {
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        newseventsdel(id,data);
    });
    function newseventsdel(id,data){
      var id = data; 
      var data = {'id' : id};
      $.ajax({
        method : "GET",
        url: "{{ route('events.show') }}",
        data : data,
          success: function(response) {
            $('#id').empty().val(response.fileData['id']);
          }
       });
      $('#myModalDel').appendTo("body").modal('toggle');
    }
    $("#closeModalDel").click(function() {
          $('#myModalDel').modal('hide');
      });
      $("#CloseModalDel").click(function() {
          $('#myModalDel').modal('hide'); 
      });

      $('#newseventsDel').on('click',function(e) {
      e.preventDefault();
        var id = $("#id").val();
        var token = "{{ csrf_token() }}";
        var data = {
          'id' : id,
          "_token": token,
          };
          console.log(data);
        $.ajax({
        method : "get",
        url: "{{ route('events.destroy') }}",
        data : data,
          success: function(response) {
            console.log(response);
            $('#myModalDel').modal('hide');
            swal("Success!", "" + response.success + "", "success");
            table.draw();
          }
       });
    });
</script>
@endsection
