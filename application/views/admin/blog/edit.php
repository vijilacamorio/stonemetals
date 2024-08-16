<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
         </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/blog/blog_index'); ?>">Edit Blog</a></li>
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
                    <h3 class="box-title m-b-0">Edit Blog</h3>
                    <p class="text-muted m-b-30 font-13"></p>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                     
                         <form name="editblog" method="post" class="editblog" enctype="multipart/form-data">

                         <div class="displaymessage"></div>
                                <div class="form-group">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $getBlog[0]['title'];  ?>" >
                                    <input type="hidden" class="form-control" id="blogid" name="blogid" value="<?php echo $getBlog[0]['id'];  ?>" >

                                </div>

                                <div class="form-group">
                                    <label for="title">Content <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                     <textarea class="tinymce-editor" id="mymce" name="content"><?php echo $getBlog[0]['content']; ?></textarea>
                                </div>
                                </div>  
  
                                <div class="form-group">
                                    <label for="exampleInput1">Image (1200px 700px)<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="file" name="featured_image" id="formFile" style="width: 209%;margin-left: -14px;"  >
                                        <input type="hidden" name="old_bannerimage" value="<?php echo $getBlog[0]['featured_image'];?>">
                                        <br>
                                        <?php
                                        $image_url = !empty($getBlog[0]['featured_image']) ? base_url().BLOG_IMG_PATH.$getBlog[0]['featured_image'] : '';
                                        $alt_text = !empty($getBlog[0]['featured_image']) ? $getBlog[0]['title'] : '';
                                        ?>
                                        <img src="<?php echo $image_url; ?>" alt="<?php echo $alt_text; ?>" width="100">
                                  </div>
                                </div>
  
                                <div class="form-group">
                                    <label for="meta_title">Meta Title <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title">
                                </div>

                                <div class="form-group">
                                    <label for="meta_description">Meta Description<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="meta_description" name="meta_description"  value="<?php echo $getBlog[0]['meta_description'];  ?>"  placeholder="Meta Description">
                                </div>


                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"  value="<?php echo $getBlog[0]['meta_keywords'];  ?>"  placeholder="Meta Keywords">
                                </div>
 
                                <div class="form-group">
                                    <label for="status">Blog Status<span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_active" id="status"  >
                                    <option value="">Select Status</option>
                                    <option value="1" <?= $getBlog[0]['is_active'] == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?= $getBlog[0]['is_active'] == 0 ? 'selected' : '' ?>>In Active</option>
                                </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Submit</button>
                                <a href="<?php echo base_url('admin/blog/blog_index'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/layout/footer'); ?>
 
 

<script>
 
$('.editblog').on('submit', function(event) {
    event.preventDefault(); 
    tinymce.triggerSave();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '<?php echo base_url('admin/blog/updateBlogs'); ?>', 
        type: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(response) {
          if(response.status =='success'){
            $('.displaymessage').html('<div class="alert alert-success alert-rounded">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            setTimeout(function() {
              $('.editblog')[0].reset();
              window.location.href = '<?php echo base_url("admin/blog/blog_index"); ?>';
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
