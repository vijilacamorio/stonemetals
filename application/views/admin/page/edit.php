<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/page'); ?>">Manage Page Content</a></li>
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
                         <form name="updatepage" method="post" class="updatepage" enctype="multipart/form-data">
                         <div class="displaymessage"></div>
                         
                                    <div class="form-group">
                                    <label for="categoryname">Page Name<span class="text-danger">*</span></label>
                                    <select name="category_name" id="categoryname" class="form-control"  >
                                        
                                        <?php foreach($categoryname as $category) {
                                        $selectedc  =  $page_data[0]['category_name'] == $category['id'] ? 'selected' : ''; ?>
                                        <option <?php echo $selectedc; ?> value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                  </div>
  
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sub Pages Name</label>
                                    <select name="subcategory_name" id="subcategory_name" class="form-control">
                                    <option value="">Select Sub pages</option>
                                    <?php foreach($subcategoryname as $sub) { 
                                        $selectedsub = ($sub['id'] == $page_data[0]['subcategory_name']) ? 'selected' : '';
                                    ?>
                                        <option value="<?php echo $sub['id']; ?>" <?php echo $selectedsub; ?>><?php echo $sub['subcategory_name']; ?></option>
                                    <?php } ?>
                                </select>
                         
                                
                                </div>


                                <div class="form-group">
                                    <label for="exampleInput1">Banner Image (1980px 1080px)<span class="text-danger">*</span></label>
                                        <div class="col-sm-6">
                                        <input class="form-control" type="file" name="images" id="formFile" style="width: 209%;margin-left: -14px;"  >
                                        <input type="hidden" name="old_image" value="<?php echo $settings[0]['logo'];?>">
                                        <br>
                                        <?php
                                        $image_url = !empty($page_data[0]['logo']) ? base_url().BANNER_IMG_PATH.$page_data[0]['logo'] : '';
                                        $alt_text = !empty($page_data[0]['logo']) ? $page_data[0]['meta_title'] : '';
                                        ?>
                                        <img src="<?php echo $image_url; ?>" alt="<?php echo $alt_text; ?>" width="100">
                                   </div>
                                </div>



                                <div class="form-group">
                                    <label for="title">Content <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                     <textarea class="tinymce-editor"  id="mymce" name="content"><?php echo $page_data[0]['content']; ?></textarea>
                                </div>
                                </div>  
 
                                <input type="hidden" class="form-control" id="pageid" name="pageid"   value="<?php echo $page_data[0]['id']; ?>" >


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"   value="<?php echo $page_data[0]['meta_title']; ?>" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="description" name="description"  value="<?php echo $page_data[0]['meta_description']; ?>" >
                                </div>

                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Keywords<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="keyword" name="keyword"   value="<?php echo $page_data[0]['meta_keywords']; ?>" >
                                </div>

                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                    <select name="is_active" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1" <?= $page_data[0]['is_active'] == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?= $page_data[0]['is_active'] == 0 ? 'selected' : '' ?>>In Active</option>
                                </select>        
                                </div>
                                <input type="hidden" name="update_id" id="update_id" value="<?php $page_data[0]['id'] ?>">
                                <br>
                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Submit</button>
                                <a href="<?php echo base_url('admin/page'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/layout/footer'); ?>
 
<script>
$('.updatepage').on('submit', function(event) {
    event.preventDefault(); 
    tinymce.triggerSave();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '<?php echo base_url('admin/page/page_edit'); ?>', 
        type: 'POST',
        data: formData,
        dataType:'json',
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response, "response");
          if(response.status =='success'){
            $('.displaymessage').html('<div class="alert alert-success alert-rounded">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            setTimeout(function() {
               window.location.href = '<?php echo base_url("admin/page"); ?>';
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