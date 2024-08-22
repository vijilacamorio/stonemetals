<footer class="site-footer footer-large footer-dark text-white footer-style1" >
<!-- FOOTER BLOCKES START -->  
<div class="footer-top bg-no-repeat bg-bottom-right" style="background-image:url(images/background/footer-bg.png)">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12"> 
                <div class="footer-h-left"> 
                    <div class="widget widget_about">
                        <div class="logo-footer clearfix">
                            <a href="index.html"><img src="images/logo-4-light.png" alt="" ></a>
                        </div>
                        <p>Content -1</p>
                     </div>
                    <div class="widget recent-posts-entry">
                       <ul class="widget_address"> 
                            <li><i style="color:white;"  class="fa fa-map-marker"></i><?php echo $settings[0]['location']; ?></li>
                            <li><i style="color:white;" class="fa fa-envelope"></i><?php echo $settings[0]['email_address']; ?></li>
                            <li> <i style="color:white;" class="fa fa-phone"></i><?php echo $settings[0]['mobile_number']; ?> </li>
                        </ul>  
                    </div>
                    <ul class="social-icons  wt-social-links footer-social-icon">
                        <!-- <li><a  href="javascript:void(0);" class="fa fa-google"></a></li>
                        <li><a href="javascript:void(0);" class="fa fa-rss"></a></li>
                        <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                        <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
                        <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li> -->
                    </ul> 
                </div>                              
            </div> 
            <div class="row footer-h-right">
    <!-- First Column -->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget widget_services" style="margin-left:15px;" >
            <h3 class="widget-title" style="color:white;" >Useful links</h3>
            <ul>
                <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('about'); ?>">About</a></li>
                <li><a href="<?php echo base_url('faq'); ?>">Gallery</a></li>
                <li><a href="<?php echo base_url('faq'); ?>">Blog</a></li>
                <li><a href="<?php echo base_url('faq'); ?>">FAQ</a></li>
                <li><a href="<?php echo base_url('faq'); ?>">Contact Us</a></li>
            </ul>
        </div>
    </div>
    <!-- Second Column -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="widget widget_services" style="margin-left:15px;"  >
            <h3 class="widget-title" style="color:white;" >Applications</h3>
            <ul>
                <li><a href="<?php echo base_url('about'); ?>">Metal screens / jalis</a></li>
                <li><a href="<?php echo base_url('faq'); ?>">Wall art</a></li>
                <li><a href="<?php echo base_url('services'); ?>">Stone Inlays/Medallions/Stone</a></li>
                <li><a href="<?php echo base_url('services'); ?>">Borders</a></li>
                <li><a href="<?php echo base_url('services'); ?>">Stone Water Features / Landscaping</a></li>
                <li><a href="<?php echo base_url('services'); ?>">Metal Railings & Gates</a></li>
                <li><a href="<?php echo base_url('services'); ?>">Metal & Stone Furniture</a></li>
                <li><a href="<?php echo base_url('services'); ?>">Stone Ribbing/Flute</a></li>
            </ul>
        </div>
    </div>
    <!-- Third Column -->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="widget widget_services" style="margin-left:15px;"  >
            <h3 class="widget-title" style="color:white;">Services</h3>
            <ul>
                <li><a href="<?php echo base_url('about'); ?>">Powder coating</a></li>
                <li><a href="<?php echo base_url('faq'); ?>">Fabrication</a></li>
                <li><a href="<?php echo base_url('services'); ?>">Services</a></li>
            </ul>
        </div>
    </div>
    <!-- Fourth Column - Our Services -->
    <div class="col-lg-2 col-md-6 col-sm-12">
        <div class="widget widget_services" style="margin-left:15px;" >
            <h3 class="widget-title" style="color:white;">Our Services</h3>
            <ul>
                <?php foreach($menu_array as $menuval) { 
                    if($menuval['slug'] == 'services') {
                        foreach($menuval['submenu'] as $ssmenu) { ?>
                            <li><a href="<?php echo base_url('services#'.$ssmenu['slug']); ?>"><?php echo $ssmenu['name']; ?></a></li>
                        <?php } 
                    } 
                } ?>
            </ul>
        </div>
    </div>
</div>
            </div> 
        </div>
    </div>
</div>
<!-- FOOTER COPYRIGHT -->
<div class="footer-bottom">
  <div class="container-fluid">
    <div class="wt-footer-bot-left d-flex justify-content-between">
        <span class="copyrights-text">Copyright © <?php echo date('Y'); ?> <span class="site-text-primary" style="color:white;">Amorio Technologies</span></span>
        <ul class="copyrights-nav"  > 
            <li><a  style="color:white;" href="javascript:void(0);">Terms  &amp; Condition</a></li>
            <li><a  style="color:white;" href="javascript:void(0);">Privacy Policy</a></li>
            <li><a  style="color:white;" href="contact-1.html">Contact Us</a></li>
        </ul>     
    </div>
  </div>   
</div>   
</footer>
<!-- FOOTER END -->
<!-- Get In Touch -->                            
<div class="contact-slide-hide bg-cover bg-no-repeat" style="background-image:url(images/background/bg-7.jpg)"> 
<div class="contact-nav">
     <a href="javascript:void(0)" class="contact_close">&times;</a>
     <div class="contact-nav-form">
        <div class="contact-nav-info bg-white p-a30 bg-center bg-no-repeat" style="background-image:url(images/background/bg-map2.png);">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="contact-nav-media-section">
                        <div class="contact-nav-media">
                            <img src="images/self-pic.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <form class="cons-contact-form" method="post" action="form-handler2.php">
                        <div class="m-b30">
                            <!-- TITLE START -->
                             <h2 class="m-b30">Get In Touch</h2>
                            <!-- TITLE END --> 
                                <div class="row">
                                   <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input name="username" type="text" required class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                           <input name="email" type="text" class="form-control" required placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input name="phone" type="text" class="form-control" required placeholder="Phone">
                                         </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                             <input name="subject" type="text" class="form-control" required placeholder="Subject">
                                         </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <textarea name="message" class="form-control" rows="4" placeholder="Message"></textarea>
                                         </div>
                                    </div>
                                   <div class="col-md-12">
                                        <button type="submit" class="site-button site-btn-effect">Submit Now</button>
                                    </div>
                                </div>
                        </div>
                    </form>
                    <div class="contact-nav-inner text-black">
                        <!-- TITLE START -->
                        <h2 class="m-b30">Contact Info</h2>
                        <!-- TITLE END -->
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="wt-icon-box-wraper left icon-shake-outer">
                                        <div class="icon-content">
                                            <h4 class="m-t0">Phone number</h4>
                                            <p><?php echo $settings[0]['mobile_number']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="wt-icon-box-wraper left icon-shake-outer">
                                        <div class="icon-content">
                                            <h4 class="m-t0">Email address</h4>
                                            <p><?php echo $settings[0]['email_address']; ?></p>
                                        </div>
                                    </div>
                                </div>    
                                <div class="col-lg-4 col-md-12">
                                    <div class="wt-icon-box-wraper left icon-shake-outer">
                                        <div class="icon-content">
                                            <h4 class="m-t0">Address info</h4>
                                            <p><?php echo $settings[0]['location']; ?></p>
                                        </div>
                                    </div>
                                </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div> 
</div>     
<!-- BUTTON TOP START -->
<button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>
</div>
<!-- LOADING AREA START ===== -->
<div class="loading-area">
<div class="loading-box"></div>
<div class="loading-pic">
<div class="loader">
<span class="block-1"></span>
<span class="block-2"></span>
<span class="block-3"></span>
<span class="block-4"></span>
<span class="block-5"></span>
<span class="block-6"></span>
<span class="block-7"></span>
<span class="block-8"></span>
<span class="block-9"></span>
<span class="block-10"></span>
<span class="block-11"></span>
<span class="block-12"></span>
<span class="block-13"></span>
<span class="block-14"></span>
<span class="block-15"></span>
<span class="block-16"></span>
</div>
</div>
</div>
<!-- LOADING AREA  END ====== -->
<!-- JAVASCRIPT  FILES ========================================= --> 
<script  src="<?php echo base_url(); ?>assets/frontend/js/jquery-2.2.0.min.js"></script><!-- JQUERY.MIN JS -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/popper.min.js"></script><!-- POPPER.MIN JS -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/bootstrap-select.min.js"></script><!-- Form js -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/magnific-popup.min.js"></script><!-- MAGNIFIC-POPUP JS -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/waypoints.min.js"></script><!-- WAYPOINTS JS -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/counterup.min.js"></script><!-- COUNTERUP JS -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/waypoints-sticky.min.js"></script><!-- STICKY HEADER -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/isotope.pkgd.min.js"></script><!-- MASONRY  -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/owl.carousel.min.js"></script><!-- OWL  SLIDER  -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/stellar.min.js"></script><!-- PARALLAX BG IMAGE   -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/theia-sticky-sidebar.js"></script><!-- STICKY SIDEBAR  -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/lc_lightbox.lite.js" ></script><!-- IMAGE POPUP -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/switcher.js"></script><!-- SHORTCODE FUCTIONS  -->
<!-- REVOLUTION JS FILES -->
<script  src="<?php echo base_url(); ?>assets/frontend/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
<script  src="<?php echo base_url(); ?>assets/frontend/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->    
<script  src="<?php echo base_url(); ?>assets/frontend/plugins/revolution/revolution/js/extensions/revolution-plugin.js"></script>
<!-- REVOLUTION SLIDER SCRIPT FILES -->
<script  src="<?php echo base_url(); ?>assets/frontend/js/rev-script-5.js"></script>
<!-- <script  src="<?php echo base_url(); ?>assets/frontend/js/jquery-3.6.0.min.js"></script> 
<script  src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.min.js"></script>  -->
<!-- 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
 -->
</body>
</html>
