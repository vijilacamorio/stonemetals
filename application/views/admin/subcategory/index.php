<?php error_reporting(0) ?>
<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Manage Sub Pages</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/subcategory/subcategory_index'); ?>">Manage Sub Pages</a></li>
            <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
            </ol>
        </div>
        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                         <a href="<?php echo base_url('admin/subcategory/add_subcategory'); ?>" class="btn btn-primary">Add Sub Pages</a>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Page Name</th>
                                        <th>Sub Pages Name</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                             <tbody>

                             <?php foreach ($getsubcategory_data as $subcategory): ?>
                                                <tr>
                                                    <td><?php echo $subcategory['category_name']; ?></td>
                                                    <td><?php echo $subcategory['subcategory_name']; ?></td>
                                                    <td><?php echo ($subcategory['is_active'] == 1) ? 'Active' : 'Inactive'; ?></td>
                                                    <td><?php echo $subcategory['created_date']; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('admin/subcategory/subcategory_data_edit?id=' . $subcategory['id']); ?>" 
                                                         class="table  table-striped"data-toggle="tooltip"  data-placement="left"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                     
                                                         

                                                        <a onclick="deleteSubcategory(<?php echo $subcategory['id']; ?>)" class="btnclr btn m-b-5 m-r-2"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
 
                                                    </td>  
                                                </tr>
                                            <?php endforeach; ?>
 


                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/layout/footer'); ?>



<script type="text/javascript">
   // Delete category
     function deleteSubcategory(id) {
         Swal.fire({
             title: "Delete",
             text: "Are you sure want to delete this Category?",
             icon: "warning",
             showCancelButton: true,
             confirmButtonColor: "#3085d6",
             cancelButtonColor: "#d33",
             confirmButtonText: "Yes, delete it!"
         }).then((result) => {
             if (result.isConfirmed) {
                 // Proceed with deletion deleteCategories
                 $.ajax({
                     type: 'POST',
                     url: '<?php echo base_url('admin/subcategory/deletesubCategories'); ?>',
                     data: {id: id},
                     dataType: 'json',
                     success: function(response) {
                         if (response.success) {
                             Swal.fire({
                                 title: "Success",
                                 text: response.message,
                                 icon: "success",
                                 buttons: {
                                     confirm: {
                                         text: "OK",
                                         closeModal: true
                                     }
                                 }
                             }).then((result) => {
                             if (result.isConfirmed) {
                                 location.reload();
                             }
                         });
                         } else {
                             Swal.fire({
                                 title: "Error",
                                 text: response.message,
                                 icon: "error",
                             });
                         }
                     },
                     error: function(xhr, status, error) {
                         console.error(xhr.responseText);
                     }
                 });
             }
         });
     }
</script>