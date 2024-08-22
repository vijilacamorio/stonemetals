<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Manage Faq</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/faq'); ?>">Manage Faq</a></li>
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
                        <!-- <h4 class="card-title">Data Table</h4> -->
                        <a href="<?php echo base_url('admin/faq/add'); ?>" class="btn btn-primary">Add Faq</a>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Answer</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                <?php foreach ($faqdata as $faqd): ?>
                                <tr>
                                    <td><?php echo $faqd['faq_title']; ?></td>
                                    <td><?php echo $faqd['faq_answer']; ?></td>
                                    <td><?php echo ($faqd['is_active'] == 1) ? 'Active' : 'Inactive'; ?></td>
                                    <td><?php echo date('d-m-Y H:i:s', strtotime($faqd['modified_date'])); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('admin/faq/editFaq?id=' . $faqd['id']); ?>" 
                                        class="table  table-striped" data-toggle="tooltip" data-placement="left"> 
                                        <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a onclick="delFaq(<?php echo $faqd['id']; ?>)" class="btnclr btn m-b-5 m-r-2">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
     function delFaq(id) {
         Swal.fire({
             title: "Delete",
             text: "Are you sure want to delete this Faq?",
             icon: "warning",
             showCancelButton: true,
             confirmButtonColor: "#3085d6",
             cancelButtonColor: "#d33",
             confirmButtonText: "Yes, delete it!"
         }).then((result) => {
             if (result.isConfirmed) {
                 // Proceed with deletion
                 $.ajax({
                     type: 'POST',
                     url: '<?php echo base_url('admin/faq/deleteFaq'); ?>',
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