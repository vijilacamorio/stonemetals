<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ABOUT SECTION START -->
    <div class="section-full welcome-section-outer">
        <br>
        <div style="background: black;height: 75px;padding-top: 20px;">
        <h3 style="text-align:center;color:white;"><?php echo $page_title; ?></h3>
        </div>
            <div class="welcome-section-top bg-white   p-b50">
                <div class="container" style="max-width: 2000px;!important  ">
                    <div class="row d-flex justify-content-center">
                        <div  >
                            <div class="welcom-to-section"  >
                            <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body> 
     <div class="container" >
       <img src="<?php echo base_url();?>assets/img/news-5.jpg" alt="" style="height: 215px;width: 818px;" >
      <br><br><br>
      <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success">
              <?php echo $this->session->flashdata('success'); ?>
          </div>
      <?php endif; ?>
      <?php if($this->session->flashdata('error')): ?>
          <div class="alert alert-danger">
              <?php echo $this->session->flashdata('error'); ?>
          </div>
      <?php endif; ?>
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            Stone & Metals
          </p>
          <div class="info">
            <div class="information">
              <i class="fas fa-map-marker-alt" style="margin-bottom:42px;"></i> &nbsp; &nbsp;
              <p><?php echo $data[0]['location'];?></p> 
            </div>
            <div class="information">
              <i class="fas fa-envelope" style="margin-bottom: 20px;"></i>&nbsp;
              <p><?php echo $data[0]['email_address'];?></p> 
            </div>
            <div class="information">
              <i class="fas fa-phone" style="margin-bottom:17px;"></i>&nbsp; 
              <p><?php echo $data[0]['mobile_number'];?></p> 
            </div>
          </div>
          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
            <a href="<?php echo $data[0]['facebook_url']; ?>">
            <i class="fab fa-facebook-f"></i>
              </a>
              <!-- <a href="#">
                <i class="fab fa-twitter"></i>
              </a> -->
              <a href="<?php echo $data[0]['instagram_url']; ?>">
              <i class="fab fa-instagram"></i>
              </a>
              <a href="<?php echo $data[0]['linkedin_url']; ?>">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>
          <form action="pages/getdata_insert" autocomplete="off" method="post" >
           <h3 class="title">Contact us</h3>
              <div class="input-container">
                <input type="text" name="name" class="input" placeholder="Name"  />
              </div>
              <div class="input-container">
                <input type="email" name="email" class="input" placeholder="Email"  />
              </div>
               <div class="input-container">
                <input type="number" name="phone" class="input" placeholder="Phone"  />
              </div>
              <div class="input-container textarea">
                <textarea name="message" class="input" placeholder="Message"></textarea>
              </div>
            <input type="submit" value="Send" class="btn" />
        </form>
         </div>
      </div>
    </div>
  </body>
</html>
                            </div>
                         </div>
                     </div>
                </div> 
            </div>
        </div>  
        <!-- ABOUT SECTION  SECTION END -->  
        <script>
$(document).ready(function() {
  var succalert = '<div class="alert alert-success alert-dismissible" role="alert">';
  var failalert = '<div class="alert alert-danger alert-dismissible" role="alert">';
  $("#create_contactus").validate({
    rules: {
      name: "required",
      email: {
        required: true,
        email: true
      },
      phone: "required"
    },
    messages: {
      name: "Name is required",
      email: {
        required: "Email is required",
        email: "Please enter a valid email address"
      },
      phone: "Phone is required"
    },
    submitHandler: function(form) {
      var formData = new FormData(form);
      formData.append(csrfName, csrfHash);
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "<?php echo base_url('pages/getdata_insert'); ?>",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          if (response.status == 'success') {
            $('.error_display').html(succalert + response.msg + '</div>');
          } else {
            $('.error_display').html(failalert + response.msg + '</div>');
          }
        },
        error: function(xhr, status, error) {
          $('.error_display').html(failalert + 'An error occurred: ' + error + '</div>');
        }
      });
    }
  });
});
 $(document).ready(function(){
    setTimeout(function() {
        $(".alert-success, .alert-danger").fadeOut('slow');
    }, 500);  
});
 </script>
 <style>
.form {
  width: 100%;
  max-width: 820px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  overflow: hidden;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
}
.contact-form {
  background-color: #111111;
  position: relative;
}
.circle {
  border-radius: 50%;
  background: linear-gradient(135deg, transparent 20%, #6c757d);
  position: absolute;
}
.circle.one {
  width: 130px;
  height: 130px;
  top: 130px;
  right: -40px;
}
.circle.two {
  width: 80px;
  height: 80px;
  top: 10px;
  right: 30px;
}
.contact-form:before {
  content: "";
  position: absolute;
  width: 26px;
  height: 26px;
  background-color: #6c757d;
  transform: rotate(45deg);
  top: 50px;
  left: -13px;
}
form {
  padding: 2.3rem 2.2rem;
  z-index: 10;
  overflow: hidden;
  position: relative;
}
.title {
  color: #fff;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
  margin-bottom: 0.7rem;
}
.input-container {
  position: relative;
  margin: 1rem 0;
}
.input {
  width: 100%;
  outline: none;
  border: 2px solid #fafafa;
  background: none;
  padding: 0.6rem 1.2rem;
  color: #fff;
  font-weight: 500;
  font-size: 0.95rem;
  letter-spacing: 0.5px;
  border-radius: 5px;
  transition: 0.3s;
}
textarea.input {
  padding: 0.8rem 1.2rem;
  min-height: 150px;
  border-radius: 5px;
  resize: none;
  overflow-y: auto;
}
.input-container label {
  position: absolute;
  top: 50%;
  left: 15px;
  transform: translateY(-50%);
  padding: 0 0.4rem;
  color: #fafafa;
  font-size: 0.9rem;
  font-weight: 400;
  pointer-events: none;
  z-index: 1000;
  transition: 0.5s;
}
.input-container.textarea label {
  top: 1rem;
  transform: translateY(0);
}
.btn {
  padding: 0.6rem 1.3rem;
  background-color: #fff;
  border: 2px solid #fafafa;
  font-size: 0.95rem;
  color: #1abc9c;
  line-height: 1;
  border-radius: 5px;
  outline: none;
  cursor: pointer;
  transition: 0.3s;
  margin: 0;
  width: 100%;
}
.btn:hover {
  background-color: transparent;
  color: #fff;
}
.input-container span {
  position: absolute;
  top: 0;
  left: 25px;
  transform: translateY(-50%);
  font-size: 0.8rem;
  padding: 0 0.4rem;
  color: transparent;
  pointer-events: none;
  z-index: 500;
}
.input-container span:before,
.input-container span:after {
  content: "";
  position: absolute;
  width: 10%;
  opacity: 0;
  transition: 0.3s;
  height: 5px;
  background-color: #1abc9c;
  top: 50%;
  transform: translateY(-50%);
}
.input-container span:before {
  left: 50%;
}
.input-container span:after {
  right: 50%;
}
.input-container.focus label {
  top: 0;
  transform: translateY(-50%);
  left: 25px;
  font-size: 0.8rem;
}
.input-container.focus span:before,
.input-container.focus span:after {
  width: 50%;
  opacity: 1;
}
.contact-info {
  padding: 2.3rem 2.2rem;
  position: relative;
}
.contact-info .title {
  color: #111111;
}
.text {
  color: #333;
  margin: 1.5rem 0 2rem 0;
}
.information {
  display: flex;
  color: #555;
  margin: 0.7rem 0;
  align-items: center;
  font-size: 0.95rem;
}
.information i {
  color: #6c757d;
}
.icon {
  width: 28px;
  margin-right: 0.7rem;
}
.social-media {
  padding: 2rem 0 0 0;
}
.social-media p {
  color: #333;
}
.social-icons {
  display: flex;
  margin-top: 0.5rem;
}
.social-icons a {
  width: 35px;
  height: 35px;
  border-radius: 5px;
  background: linear-gradient(45deg, #111111, #6c757d);
  color: #fff;
  text-align: center;
  line-height: 35px;
  margin-right: 0.5rem;
  transition: 0.3s;
}
.social-icons a:hover {
  transform: scale(1.05);
}
.contact-info:before {
  content: "";
  position: absolute;
  width: 110px;
  height: 100px;
  border: 22px solid #6c757d;
  border-radius: 50%;
  bottom: -77px;
  right: 50px;
  opacity: 0.3;
}
.big-circle:after {
  content: "";
  position: absolute;
  width: 360px;
  height: 360px;
  background-color: #fafafa;
  border-radius: 50%;
  top: calc(50% - 180px);
  left: calc(50% - 180px);
}
.square {
  position: absolute;
  height: 400px;
  top: 50%;
  left: 50%;
  transform: translate(181%, 11%);
  opacity: 0.2;
}
@media (max-width: 850px) {
  .form {
    grid-template-columns: 1fr;
  }
  .contact-info:before {
    bottom: initial;
    top: -75px;
    right: 65px;
    transform: scale(0.95);
  }
  .contact-form:before {
    top: -13px;
    left: initial;
    right: 70px;
  }
  .square {
    transform: translate(140%, 43%);
    height: 350px;
  }
  .big-circle {
    bottom: 75%;
    transform: scale(0.9) translate(-40%, 30%);
    right: 50%;
  }
  .text {
    margin: 1rem 0 1.5rem 0;
  }
  .social-media {
    padding: 1.5rem 0 0 0;
  }
}
@media (max-width: 480px) {
  .container {
    padding: 1.5rem;
  }
  .contact-info:before {
    display: none;
  }
  .square,
  .big-circle {
    display: none;
  }
  form,
  .contact-info {
    padding: 1.7rem 1.6rem;
  }
  .text,
  .information,
  .social-media p {
    font-size: 0.8rem;
  }
  .title {
    font-size: 1.15rem;
  }
  .social-icons a {
    width: 30px;
    height: 30px;
    line-height: 30px;
  }
  .icon {
    width: 23px;
  }
  .input {
    padding: 0.45rem 1.2rem;
  }
  .btn {
    padding: 0.45rem 1.2rem;
  }
}
        </style>
