 
 <?php $__env->startSection('contents'); ?>


<div class="d-flex align-items-center justify-content-between">
    <h3 class="mb-0">Content List</h3>

    <a href="/content/create" class="btn btn-primary">
        Add Content
    </a>
</div>
<br />
<br />

<div class="col-12">
    <?php if(Session::has('success')): ?>
<div class="alert alert-success" role="alert" id="exportsuccess">
    <?php echo e(Session::get('success')); ?>

</div>
<?php endif; ?>
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <table class="table" id="contenttable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <!-- Delete Modal -->
    <div class="modal" id="myModalDel">
        <div class="modal-dialog modal-md modal-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #085ad5e0; color: #fff;">
                    <h4>Delete</h4>
                    <button type="button" id="CloseModalDel" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="resourceFileDel">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="label-name" style="font-size: 20px;">Are you sure you want to delete?</label>
                                <input type="hidden" name="id" id="id" value="" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-add m-t-15 waves-effect mb-3 btn btn-info" id="newseventsDel">Yes</button>
                            <button class="btn btn-add m-t-15 waves-effect mb-3 btn btn-secondary" id="closeModalDel" type="button">
                                No
                            </button>
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" />

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
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $(".dataTables_filter input").attr("placeholder", "Search here...").css({
            display: "inline-block",
        });

        $('[data-toggle="tooltip"]').tooltip();

        
    });

    $("#contenttable").DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(route('contentsget')); ?>",
        columns: [
            { data: "id", orderable: true, searchable: true },
            { data: "content", orderable: true, searchable: true },
            {
                data: "created_at",
                orderable: true,
                searchable: true,
                render: function (data) {
                    var date = new Date(data);
                    var month = date.getMonth() + 1;
                    return (month.length > 1 ? month : "0" + month) + "/" + date.getDate() + "/" + date.getFullYear();
                },
            },
            { data: "action", name: "action", orderable: false, searchable: false },
        ],
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Loreto Sisters\admintemplate\resources\views/content/index.blade.php ENDPATH**/ ?>