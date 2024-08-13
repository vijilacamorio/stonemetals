<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
         </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/setting/setting_index'); ?>">Manage Setting</a></li>
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
                    <h3 class="box-title m-b-0">Edit Setting</h3>
                    <p class="text-muted m-b-30 font-13"></p>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                         <form name="editsetting" method="post" class="editsetting">
                         <div class="displaymessage"></div>
                          
                                <?php if (!empty($settings[0]['logo'])): ?>
                                <div class="form-group">
                                    <label for="current_logo">Current Logo:</label><br>
                                    <img src="<?php echo base_url('uploads/logos/' . $settings[0]['logo']); ?>" alt="Current Logo" style="max-width: 150px;">
                                </div>
                                <?php endif; ?>
 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Address<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="inputText" name="email_address" value="<?php echo $settings[0]['email_address']; ?>">
                                    <input type="hidden" name="settingid" value="<?php echo $settings[0]['setting_id']; ?>">

                                </div>
 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile Number<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="inputText" name="mobile_number" value="<?php echo $settings[0]['mobile_number']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Location<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="inputText" name="location" value="<?php echo $settings[0]['location']; ?>">
                                </div>
                                 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Facebook Url<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="inputText" name="facebook_url" value="<?php echo $settings[0]['facebook_url']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Instagram Url<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="inputText" name="instagram_url" value="<?php echo $settings[0]['instagram_url']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Linkedin Url<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" id="inputText" name="linkedin_url" value="<?php echo $settings[0]['linkedin_url']; ?>">
                                </div>

 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Settings Status<span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_active">
                                    <option value="">Select Status</option>
                                    <option value="1" <?= $settings[0]['is_active'] == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?= $settings[0]['is_active'] == 0 ? 'selected' : '' ?>>In Active</option>
                                </select>                               
                             </div>

 
                                <br>
                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Submit</button>
                                <a href="<?php echo base_url('admin/setting/setting_index'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/layout/footer'); ?>

<script>
$('.editsetting').on('submit', function(event) {
    event.preventDefault(); 
    var formData = $(this).serialize();
    $.ajax({
        url: '<?php echo base_url('admin/setting/updateSettings'); ?>', 
        type: 'POST',
        data: formData,
        dataType:'json',
        success: function(response) {
          if(response.status =='success'){
            $('.displaymessage').html('<div class="alert alert-success alert-rounded">'+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
            setTimeout(function() {
               window.location.href = '<?php echo base_url("admin/setting/setting_index"); ?>';
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
