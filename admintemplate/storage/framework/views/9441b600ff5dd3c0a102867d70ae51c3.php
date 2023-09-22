 <?php $__env->startSection('contents'); ?>
<div class="d-flex align-items-center justify-content-between">
    <h3 class="mb-0">News & Events</h3>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
        Add News
    </button>
</div>
<br><br>
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            
            <table class="table table-hover responsive  data-table" id="newseventstable" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>    
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    <?php echo csrf_field(); ?>
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" id="price" placeholder="Price" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Images</label>
                                    <input type="file" name="images[]" class="form-control" id="images" multiple accept="image/*" />
                                  
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
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


<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Edit News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm">
                    <?php echo csrf_field(); ?>
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
                                    <label for="price" class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" id="editdate" placeholder="Price" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Images</label>
                                    <input type="file" name="images[]" class="form-control" id="editimages" multiple accept="image/*" />
                               <div id="resource_name">

                               </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="editdescription" placeholder="Description"></textarea>
                                </div>
                                <input type="text" name="imagename" id="imagename" hidden>
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
<?php if(Session::has('success')): ?>
<div class="alert alert-success" role="alert" id="exportsuccess">
    <?php echo e(Session::get('success')); ?>

</div>
<?php endif; ?>


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
        },
        submitHandler: function (form) {
           var formData = new FormData(form); 
           $.ajax({
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                url: "<?php echo e(route('newsevents.store')); ?>",
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
      ajax: "<?php echo e(route('newsevents.get')); ?>",
      columns: [
       
          {data: 'id',orderable: true, searchable: true},
          {data: 'title',orderable: true, searchable: true},
          {data: 'date',orderable: true, searchable: true,
            "render": function (data) {
                var date = new Date(data);
                var month = date.getMonth() + 1;
                return date.getDate() + "/" +  (month.length > 1 ? month : "0" + month)+ "/" + date.getFullYear();
            }
          },
          {data: 'description',orderable: true, searchable: true},
          {data: 'image',orderable: true, searchable: true},
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
        },
        submitHandler: function (form) {
           var formData = new FormData(form); 
           $.ajax({
                method: "POST",
                data: formData,
                contentType: false, 
                processData: false,
                url: "<?php echo e(route('newsevents.update')); ?>",
                success: function (response) {
                    $("#editProductModal").modal("hide");
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
        url : "<?php echo e(Route('newsevents.show')); ?>",
        method : "GET",
        data : data,
            success: function(response) {
                var imageUrl = "<?php echo e(asset('new_images/')); ?>";
                $( "#edittitle" ).empty().val(response.fileData['title']);
                $( "#editid" ).empty().val(response.fileData['id']);
                $( "#editdate" ).empty().val(response.fileData['date']);
                $( "#editdescription" ).empty().val(response.fileData['description']);
                $( "#imagename" ).empty().val(response.fileData['image']);
                $( "#resource_name" ).html('<img src="' + imageUrl +'/'+response.fileData['image']+ '" alt="Image" style="height: 70px;">');
                
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
        url: "<?php echo e(route('newsevents.show')); ?>",
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
        var token = "<?php echo e(csrf_token()); ?>";
        var data = {
          'id' : id,
          "_token": token,
          };
          console.log(data);
        $.ajax({
        method : "get",
        url: "<?php echo e(route('newsevents.destroy')); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Loreto Sisters\admintemplate\resources\views/products/index.blade.php ENDPATH**/ ?>