@extends('layouts.app') @section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h3 class="mb-0">User List</h3>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
        Add User
    </button>
</div>
<br><br>
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            
            <table class="table table-hover responsive  data-table" id="newseventstable" style="width:100%">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- model --}}
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    @csrf
                    <div class="container">
                      <div class="row mb-3">
                          <div class="col-md-12">
                              <div class="mb-3">
                                  <label for="yourName" class="form-label">Your Name</label>
                                  <input type="text" name="name" class="form-control" id="yourName" required />
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="mb-3">
                                  <label for="yourEmail" class="form-label">Your Email</label>
                                  <input type="email" name="email" class="form-control" id="yourEmail" required />
                              </div>
                          </div>
                          <div class="col-md-12">
                            <div class="mb-3">
                                <label for="userRole" class="form-label">Role</label>
                                <select name="role" class="form-control" id="userRole">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                      </div>
                      
              
                      <div class="row mb-3">
                          <div class="col-md-12">
                              <div class="mb-3">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="yourPassword" required>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="mb-3">
                                  <label for="password_confirmation" class="form-label">Confirm Password</label>
                                  <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required />
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
                <h5 class="modal-title" id="addProductModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm">
                    @csrf
                    <div class="container">
                      <div class="row mb-3">
                          <div class="col-md-12">
                              <div class="mb-3">
                                  <label for="yourName" class="form-label">Your Name</label>
                                  <input type="text" name="name" class="form-control" id="edityourName" required />
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="mb-3">
                                  <label for="yourEmail" class="form-label">Your Email</label>
                                  <input type="email" name="email" class="form-control" id="edityourEmail" required />
                              </div>
                          </div>
                          <div class="col-md-12">
                            <div class="mb-3">
                                <label for="userRole" class="form-label">Role</label>
                                <select name="role" class="form-control" id="edituserRole">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <input type="text" name="id" id="editid" hidden>
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
            name: {
                required: true,
            },
            email: {
                required: true,
            },
            role: {
                required: true,
            },
            password: {
                required: true,
            },
            password_confirmation: {
                required: true,
            },
        },
        messages: {
          name: {
                required: "Please enter a Name",
            },
            email: {
                required: "Please enter a Email"
            },
            role: {
                required: "Please Choose a Role",
            },
            password: {
                required:"Please enter a Password",
            },
            password_confirmation: {
                required: "Please enter a confirm password",
            },
        },
        submitHandler: function (form) {
           var formData = new FormData(form); 
           $.ajax({
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                url: "{{ route('userregister.save') }}",
                success: function (response) {
                    $("#addProductModal").modal("hide");
                    table.draw();
                    swal("Success!", "" + response.success + "", "success");
                },
            });
        },
    });

    
   
 var table = $('#newseventstable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('usersget') }}",
      columns: [
       
      {data: 'id',orderable: true, searchable: true},
          {data: 'name',orderable: true, searchable: true},
          {data: 'email',orderable: true, searchable: true},
          {data: 'role',orderable: true, searchable: true},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });
    $("#editProductForm").validate({
      rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
            },
            role: {
                required: true,
            }
        },
        messages: {
          name: {
                required: "Please enter a Name",
            },
            email: {
                required: "Please enter a Email"
            },
            role: {
                required: "Please Choose a Role",
            }
        },
        submitHandler: function (form) {
           var formData = new FormData(form); 
           $.ajax({
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                url: "{{ route('users.update') }}",
                success: function (response) {
                    $("#editProductModal").modal("hide");
                    table.draw();
                    swal("Success!", "" + response.success + "", "success");
                },
            });
        },
    });

    $('.data-table').on('click','.usersedit',function() { 
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        newsview(id,data);
    });

    function newsview(id,data){
        var id = data; 
        var data = {'id' : id};
        $.ajax({
        url : "{{Route('users.edit')}}",
        method : "GET",
        data : data,
            success: function(response) {
                console.log(response.fileData['id']);
                $( "#edityourName" ).empty().val(response.fileData['name']);
                $( "#editid" ).empty().val(response.fileData['id']);
                $( "#edityourEmail" ).empty().val(response.fileData['email']);
                $( "#edityourPassword" ).empty().val(response.fileData['password']);
                $( "#editpassword_confirmation" ).empty().val(response.fileData['password']);
                if(response.fileData['role'] === 'admin' ){
                    $('#edituserRole option[value="admin"]').prop("selected", "selected");
                }else{
                    $('#edituserRole option[value="user"]').prop("selected", "selected");
                }
                
             }
        });
        $('#editProductModal').appendTo("body").modal('toggle');
    }
    $('.data-table').on('click','.usersdel',function() {
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        newseventsdel(id,data);
    });
    function newseventsdel(id,data){
      var id = data; 
      var data = {'id' : id};
      $.ajax({
        method : "GET",
        url: "{{ route('users.edit') }}",
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
        method : "delete",
        url: "{{ route('users.destroy') }}",
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
