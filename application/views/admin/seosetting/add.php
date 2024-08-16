<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
         </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/seosetting/seosetting_index'); ?>">Manage Seo Setting</a></li>
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
                    <h3 class="box-title m-b-0">Add Seo Setting</h3>
                    <p class="text-muted m-b-30 font-13"></p>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                     
                         <form name="addseosetting" method="post" class="addseosetting" >

                         <div class="displaymessage"></div>
                                <div class="form-group">
                                    <label for="title">Category<span class="text-danger">*</span></label>
                                    <select name="category_name" id="categoryname" class="form-control"  >
                                        <option value=""> <?php echo ('Select Category') ?></option>
                                        <?php foreach($categoryname as $category) { ?>
                                        <option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></option>
                                        <?php } ?>
                                    </select>
 
                                </div>
 
                            
                                <div class="form-group">
                                    <label for="meta_title">Meta Title <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title">
                                </div>

                                <div class="form-group">
                                    <label for="meta_description">Meta Description<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description">
                                </div>


                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords">
                                </div>
 
                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                    <select name="is_active" id="status" class="form-control">
                                        <option value="" disabled selected>Select Option</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Submit</button>
                                <a href="<?php echo base_url('admin/seosetting/seosetting_index'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/layout/footer'); ?>
 

 
<script>
$('.addseosetting').on('submit', function(event) {
    event.preventDefault(); 
    var formData = $(this).serialize();
    $.ajax({
        url: '<?php echo base_url('admin/seosetting/create_seosetting'); ?>', 
        type: 'POST',
        data: formData,
        dataType:'json',
        success: function(response) {
          if(response.status =='success'){
            $('.displaymessage').html('<div class="alert alert-success alert-rounded">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            setTimeout(function() {
               window.location.href = '<?php echo base_url("admin/seosetting/seosetting_index"); ?>';
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
