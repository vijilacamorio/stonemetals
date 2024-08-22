<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/faq'); ?>">Manage Faq</a></li>
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
                        <form name="editgallery" method="post" class="editgallery" enctype="multipart/form-data">
                         <div class="displaymessage"></div>
                            <div class="form-group">
                                    <label for="exampleInput1">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="inputText" name="faq_title" value="<?php echo $faqedit[0]['faq_title']; ?>" >
                                    <input type="hidden" name="gallery_id" id="gallery_id" value="<?php echo $faqedit[0]['id']; ?>">

                                </div>

 
                                <div class="form-group">
                                    <label for="exampleInput1">Content <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="faq_answer" name="faq_answer" ><?php echo $faqedit[0]['faq_answer']; ?></textarea>
                                </div>
 
                                
                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                    <select class="form-control" name="is_active">
                                    <option value="">Select Status</option>
                                    <option value="1" <?= $faqedit[0]['is_active'] == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?= $faqedit[0]['is_active'] == 0 ? 'selected' : '' ?>>In Active</option>
                                </select>                     
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Submit</button>
                                <a href="<?php echo base_url('admin/faq'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/layout/footer'); ?>

<script>
$('.editgallery').on('submit', function(event) {
    event.preventDefault(); 
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '<?php echo base_url('admin/faq/updateFaq'); ?>', 
        type: 'POST',
        data: formData,
        dataType:'json',
        contentType: false,
        processData: false,
        success: function(response) {
          if(response.status =='success'){
            $('.displaymessage').html('<div class="alert alert-success alert-rounded"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+response.msg+'</div>');
            setTimeout(function() {
            //   $('.addcategory')[0].reset();
              window.location.href = '<?php echo base_url("admin/faq"); ?>';
            }, 3000); 
          }else{
            $('.displaymessage').html('<div class="alert alert-danger alert-rounded"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+response.msg+'</div>');
          }
        },
        error: function(xhr, status, error) {
          alert('An error occurred: ' + error);
        }
    });

});

</script>
