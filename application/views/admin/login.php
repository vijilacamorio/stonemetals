<?php error_reporting(0) ?>
<?php $this->load->view('admin/layout/header'); ?>
<style>
    .navbar-header , .navbar-collapse{
        display:none;
    }
</style>

 <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url();?>backend/assets/images/logo.JPEG" alt="" style="height:100px">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your email address & password to login</p>
                  </div>
                  <div class="displaymessage"></div>
                  <form class="row g-3 adminlogin">
                  
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email Address <span class="text-danger">*</span></label>
                      <div class="input-group has-validation">
                        <input type="email" name="emailaddress" class="form-control" placeholder="Enter your Email address">
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password <span class="text-danger">*</span></label>
                      <input type="password" name="password" class="form-control" placeholder="Enter your Password">
                    </div>

                    <div class="col-12 mt-3">
                      <button class="btn btn-primary w-100 mb-4" type="submit">Login</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>


  <?php $this->load->view('admin/layout/footer'); ?>

<script>
  $('.adminlogin').on('submit', function(event) {
      event.preventDefault(); 
      var formData = $(this).serialize();
      $.ajax({
          url: '<?php echo base_url('admin/user/authLogin'); ?>', 
          type: 'POST',
          data: formData,
          dataType:'json',
          success: function(response) {
            if(response.status =='success'){
              $('.displaymessage').html('<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">'+response.msg+'</div>');
              setTimeout(function() {
                $('.adminlogin')[0].reset();
                window.location.href = '<?php echo base_url('admin'); ?>';
              }, 3000); 
            }else{
              $('.displaymessage').html('<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">'+response.msg+'</div>');
            }
          },
          error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
          }
      });

  });
</script>
