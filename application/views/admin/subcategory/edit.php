<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
         </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/subcategory/subcategory_index'); ?>">Manage Subcategory</a></li>
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
                    <h3 class="box-title m-b-0">Edit Subcategory</h3>
                    <p class="text-muted m-b-30 font-13"></p>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                         <form name="editsubcategory" method="post" class="editsubcategory">
                         <div class="displaymessage"></div>
                            <div class="form-group">
                                    <label for="categoryname">Category Name<span class="text-danger">*</span></label>

                                    <select name="category_name" id="categoryname" class="form-control"  >
                                        <option value="<?php echo $getsubcategory[0]['category_name']; ?>"> <?php echo $getsubcategory[0]['category_name']; ?></option>
                                        <?php foreach($categoryname as $category) { ?>
                                        <option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                  </div>
  
                                <div class="form-group">
                                    <label for="subcategory">Subcategory Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subcategory" name="subcategory_name" value="<?php echo $getsubcategory[0]['subcategory_name']; ?>"  placeholder="Subategory Name">
                                </div>
 
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $getsubcategory[0]['id']; ?>">

                                
                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_active" id="status"  >
                                    <option value="">Select Status</option>
                                    <option value="1" <?= $getsubcategory[0]['is_active'] == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?= $getsubcategory[0]['is_active'] == 0 ? 'selected' : '' ?>>In Active</option>
                                </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Submit</button>
                                <a href="<?php echo base_url('admin/subcategory/subcategory_index'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/layout/footer'); ?>

<script>
$('.editsubcategory').on('submit', function(event) {
    event.preventDefault(); 
    var formData = $(this).serialize();
    $.ajax({
        url: '<?php echo base_url('admin/subcategory/subcategory_data_update'); ?>', 
        type: 'POST',
        data: formData,
        dataType:'json',
        success: function(response) {
          if(response.status =='success'){
            $('.displaymessage').html('<div class="alert alert-success alert-rounded">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            setTimeout(function() {
              $('.editsubcategory')[0].reset();
              window.location.href = '<?php echo base_url("admin/subcategory/subcategory_index"); ?>';
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
