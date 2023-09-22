 <?php $__env->startSection('contents'); ?>
<div class="d-flex align-items-center justify-content-between">
    <h3 class="mb-0">Resource upload</h3>

</div>

<br>
<?php if(Session::has('success')): ?>
<div class="alert alert-success" role="alert" id="exportsuccess">
    <?php echo e(Session::get('success')); ?>

</div>
<?php endif; ?>
<div class="col-12">
    <div class="card recent-sales overflow-auto" id="bri_ind_container">
        <div class="card-body">
            <form id="resourcedocs">
                <?php echo csrf_field(); ?>
                <div class="row">
                    
                        <div class="alert alert-success" id="success" style='display: none;'>
                            File Uploaded Successfully.
                        </div>
                        <div class="alert alert-info" id="updatesuccess" style='display: none;'>
                            Updated Successfully.
                        </div>
                        <div class="alert alert-danger" id="deletesuccess" style='display: none;'>
                            File Deleted Successfully.
                        </div>
                        <br>
                    
                    <div class="col-lg-7">
                        <label>Resource Documents</label>
                        <span class="form-control" style="width: 400px;padding:0px">
                            <input type="file" name="resource" id="resource">
                        </span>
                    </div>
                    <div class="col-lg-1" style="padding-top: 10px;">
                        <!-- Image loader -->
                            <label></label>
                            <div id='loader' style='display: none;'>
                                <img src="<?php echo e(asset('admin_assets/img/gif/ajaxload.gif')); ?>" width='32px' height='32px'>
                            </div>
                        <!-- Image loader -->
                    </div>
                    <div class="col-lg-3" style="padding-top: 10px;">
                        <br>
                        <button class="resource btn btn-success">Upload</button>
                    </div>
                </div>
            </form>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="php-email-form">
                        <table id="resourcedocuments" class="table table-hover responsive manageresourcedocuments data-table" style="width:100%">
                            <thead>
                            <tr>
                                <th width="300px">Name</th>
                                <th>Upload Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Modal -->
    <div class="modal" id="myModal" >
    <div class="modal-dialog modal-md modal-centered">
    <!-- Modal content-->
    <div class="modal-content">

        <div class="modal-header " style="background-color:#085ad5e0;color: #fff;">
        <h4>Resource Documents Edit</h4>
        <button type="button" id="CloseModal" class="close" data-dismiss="modal" >&times;</button>
        </div>
        <form id="resourceFileEdit">                                                     
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label>Resource Document Name</label>
                <span class="form-control">
                    <label id="resource_name"></label> 
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Resource Document Status</label>
                <input type="hidden" id="active_status_val" value="">
                <select class="form-select" name="active_status" id="active_status">
                    <option value="publish">Publish</option>
                    <option value="Unpublish">Unpublish</option>
                </select>
            </div>
        </div>
        </div>
        <input type="hidden" id="filedataid" name="id" value="">
        <div class="modal-footer">
        <button class="btn btn-add m-t-15 waves-effect mb-3 btn btn-info" id="resourceFilesUpdate" >Update</button>
        <button class="btn btn-add m-t-15 waves-effect mb-3 btn btn-secondary" id="closeModal" type="button">Close</button>
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
        <button class="btn btn-add m-t-15 waves-effect mb-3 btn btn-info" id="resourceFilesDel" >Yes</button>
        <button class="btn btn-add m-t-15 waves-effect mb-3 btn btn-secondary" id="closeModalDel" type="button">
        No</button>
        </div>
        </div>
    </form>
    </div>
    </div>
    </div>
</div>
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
    
    $(document).ready(function() {

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $(".dataTables_filter input")
        .attr("placeholder", "Search here...")
        .css({
        display: "inline-block"
        }); 

        $('[data-toggle="tooltip"]').tooltip();

});
    var table = $('#resourcedocuments').DataTable({
      processing: true,
      serverSide: true,
      ajax: "<?php echo e(route('resourcefilesget')); ?>",
      columns: [
          {data: 'resource',orderable: true, searchable: true},
          {data: 'created_at',orderable: true, searchable: true,
            "render": function (data) {
                var date = new Date(data);
                var month = date.getMonth() + 1;
                return (month.length > 1 ? month : "0" + month) + "/" + date.getDate() + "/" + date.getFullYear();
            }
          },
          {data: 'active_status',orderable: true, searchable: true},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });
    $("#resourcedocs").validate({
        rules: {
            resource : {
                required: true,
                // fileSize: 5120,
                extension: "doc|pdf|docx|xlsx"
            },    
        },
        messages : {
            resource: {
                required: "Please upload a file.",
                extension: "You can upload only pdf,doc,docx,xlsx extensions files.",
                // fileSize: "The file size must be between 2MB and 5MB."
            }
        },
        submitHandler: function(form) {
            var resource = $('#resource')[0].files;
            var _token = '<?php echo e(csrf_token()); ?>';
            fileUpload(resource,_token);
        }
    });
    function fileUpload(files,token){
      var fd = new FormData();
      fd.append('resource',files[0]);
      fd.append('_token',token);
      $.ajax({
        url: "<?php echo e(url('ResourceUploadFile')); ?>",
        method: 'post',
        data:fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: function(){
            // Show image container
            $("#loader").show();
           },
        success: function(response){
            console.log(response);
            $('#resource').val('');
            table.draw();
        },
        complete:function(response){
            // Hide image container
            $("#loader").hide();
            $("#success").show();
           },
        error: function(response){
          console.log("error : " + JSON.stringify(response) );
        }

      });
    }
    $('.data-table').on('click','.resourcefilesdel',function() {
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        resourceFilesDel(id,data);
    });
    function resourceFilesDel(id,data){
      var id = data; 
      var data = {'id' : id};
      $.ajax({
        method : "GET",
        url: "<?php echo e(route('resourcefilesview')); ?>",
        data : data,
          success: function(response) {
            console.log(response);
            $('#id').empty().val(response.fileData['id']);
          }
       });
      $('#myModalDel').appendTo("body").modal('toggle');
    }
    $('.data-table').on('click','.resourcefilesedit',function() { 
        var id = $(this).attr('id');
        var data = $(this).attr('data-id');
        resourceFileview(id,data);
    });
    function resourceFileview(id,data){
        var id = data; // Address
        var data = {'id' : id};
        $.ajax({
        url : "<?php echo e(Route('resourcefilesview')); ?>",
        method : "GET",
        data : data,
            success: function(response) {
               
                $( "#filedataid" ).empty().val(response.fileData['id']);
                $( "#resource_name" ).empty().append("<div><label for='resource_name'>"+response.fileData['resource']+"</label></div>");
                if(response.fileData['active_status'] === 'publish' ){
                    $('#active_status option[value="publish"]').prop("selected", "selected");
                }else{
                    $('#active_status option[value="Unpublish"]').prop("selected", "selected");
                }
            }
        });
        $('#myModal').appendTo("body").modal('toggle');
    }
    $("#closeModal").click(function() {
        $('#myModal').modal('hide');
    });
    $("#CloseModal").click(function() {
        $('#myModal').modal('hide');
    });
   
    $("#closeModalDel").click(function() {
          $('#myModalDel').modal('hide');
      });
      $("#CloseModalDel").click(function() {
          $('#myModalDel').modal('hide'); 
      });


      $('#resourceFilesDel').on('click',function(e) {
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
        url: "<?php echo e(route('destroyresourcefile')); ?>",
        data : data,
          success: function(response) {
            console.log(response);
            $('#myModalDel').modal('hide');
            $("#deletesuccess").show();
            table.draw();
          }
       });
    });

    $('#resourceFilesUpdate').on('click',function(e) {
      e.preventDefault();
        var id = $("#filedataid").val();
        var token = "<?php echo e(csrf_token()); ?>";
        var active_status = $("#active_status").val();
        var data = {
          'id' : id,
          "_token": token,
          "active_status" : active_status
          };

          resourceFileUpdate(data);
    });
    function resourceFileUpdate(data){
        var data = data;
        $.ajax({
        url : "<?php echo e(Route('resourcefilesupdate')); ?>",
        method : "post",
        data : data,
            success: function(response) {
                $('#myModal').modal('hide');
                $("#updatesuccess").show();
                table.draw();
            }
        });
        $('#myModal').appendTo("body").modal('toggle');
    }
    // Disable Success Message
  function disabledsuccessmsg() {
    setTimeout(function() {
      document.getElementById("success").style.display = "none";
    }, 100);
    setTimeout(function() {
      document.getElementById("deletesuccess").style.display = "none";
    }, 100);
    setTimeout(function() {
      document.getElementById("updatesuccess").style.display = "none";
    }, 100);
  }
  document.getElementById("bri_ind_container").addEventListener("click", disabledsuccessmsg);

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Loreto Sisters\admintemplate\resources\views/newsletter/index.blade.php ENDPATH**/ ?>