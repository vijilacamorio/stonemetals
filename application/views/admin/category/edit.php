<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/category'); ?>">Manage Page</a></li>
                <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
            </ol>
        </div>
        <div class="">
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <h3 class="box-title m-b-0"><?php echo $page_title; ?></h3>
                    <p class="text-muted m-b-30 font-13"></p>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                         <form name="editcategory" method="post" class="editcategory">
                         <div class="displaymessage"></div>
                           
                         
                         <div class="form-group">
                                    <label for="exampleInputEmail1">Page Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="categoryname" name="category_name" value="<?php echo $getCategory[0]['category_name']; ?>">
                                </div>



                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $getCategory[0]['id']; ?>">
                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_active" id="status"  >
                                    <option value="">Select Status</option>
                                    <option value="1" <?= $getCategory[0]['is_active'] == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?= $getCategory[0]['is_active'] == 0 ? 'selected' : '' ?>>In Active</option>
                                </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Submit</button>
                                <a href="<?php echo base_url('admin/category'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/layout/footer'); ?>

<script>
$('.editcategory').on('submit', function(event) {
    event.preventDefault(); 
    var formData = $(this).serialize();
    $.ajax({
        url: '<?php echo base_url('admin/category/category_data_update'); ?>', 
        type: 'POST',
        data: formData,
        dataType:'json',
        success: function(response) {
          if(response.status =='success'){
            $('.displaymessage').html('<div class="alert alert-success alert-rounded">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            setTimeout(function() {
              $('.editcategory')[0].reset();
              window.location.href = '<?php echo base_url("admin/category/category_index"); ?>';
            }, 3000); 
          }else{
            $('.displaymessage').html('<div class="alert alert-danger alert-rounded">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
          }
        },
        error: function(xhr, status, error) {
          alert('An error occurred: ' + error);
        }
    });

});

</script>
