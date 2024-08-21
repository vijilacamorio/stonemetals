<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
         </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/seosetting'); ?>">Manage Seo Setting</a></li>
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
                    <h3 class="box-title m-b-0">Edit Seo Setting</h3>
                    <p class="text-muted m-b-30 font-13"></p>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                     
                         <form name="editseosetting" method="post" class="editseosetting" >

                         <div class="displaymessage"></div>
                                <div class="form-group">
                                    <label for="title">Page<span class="text-danger">*</span></label> 
                                    <select name="category_name" id="categoryname" class="form-control">
                                        <option value="">Select Page</option>
                                        <?php foreach($categoryname as $category){ 
                                        $selectcat = ($data_seosetting[0]['category_name'] == $category['id']) ? 'selected' : ''; 
                                        ?>
                                        <option <?php echo $selectcat; ?> value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
 
                            
                                <div class="form-group">
                                    <label for="meta_title">Meta Title <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?php echo $data_seosetting[0]['meta_title'] ?>"  placeholder="Meta Title">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data_seosetting[0]['id'] ?>"   >

                                </div>

                                <div class="form-group">
                                    <label for="meta_description">Meta Description<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="meta_description" name="meta_description" value="<?php echo $data_seosetting[0]['meta_description'] ?>"  placeholder="Meta Description">
                                </div>


                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="<?php echo $data_seosetting[0]['meta_keywords'] ?>"  placeholder="Meta Keywords">
                                </div>
 
                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_active" id="status"  >
                                     <option value="1" <?= $data_seosetting[0]['is_active'] == 1 ? 'selected' : '' ?>>Active</option>
                                     <option value="0" <?= $data_seosetting[0]['is_active'] == 0 ? 'selected' : '' ?>>In Active</option>
                                </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Submit</button>
                                <a href="<?php echo base_url('admin/seosetting'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/layout/footer'); ?>
 
 
<script>
$('.editseosetting').on('submit', function(event) {
    event.preventDefault(); 
    var formData = $(this).serialize();
    $.ajax({
        url: '<?php echo base_url('admin/seosetting/edit_seosetting'); ?>', 
        type: 'POST',
        data: formData,
        dataType:'json',
        success: function(response) {
          if(response.status =='success'){
            $('.displaymessage').html('<div class="alert alert-success alert-rounded">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            setTimeout(function() {
               window.location.href = '<?php echo base_url("admin/seosetting"); ?>';
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
