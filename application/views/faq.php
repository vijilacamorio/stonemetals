    <!-- ABOUT SECTION START -->
    <div class="section-full welcome-section-outer">
        <br>
        <div style="background: black;height: 75px;padding-top: 20px;">
        <h3 style="text-align:center;color:white;"><?php echo $page_title; ?></h3>
        </div>
        
            <div class="welcome-section-top bg-white p-t80 p-b50">
                <div class="container">
                    <div >
                      


                        <section class="faq-section">
<div class="container">
  <div class="row">
                    <!-- ***** FAQ Start ***** -->
                    <div class="col-md-6 offset-md-3">

                        <div class="faq-title text-center pb-3">
                            <h2>FAQ</h2>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-3">
                        <div class="faq" id="accordion">
                            <div class="card">
                                <div class="card-header" id="faqHeading-1">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                            <span class="badge">1</span>What is Lorem Ipsum?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                                    </div>
                                </div>
                            </div>



                            <div class="card">
                                <div class="card-header" id="faqHeading-2">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2" data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                            <span class="badge">2</span> Where does it come from?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="card">
                                <div class="card-header" id="faqHeading-7">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-7" data-aria-expanded="false" data-aria-controls="faqCollapse-7">
                                            <span class="badge">7</span> Why do we use it?
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-7" class="collapse" aria-labelledby="faqHeading-7" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                </section>



                            
                    </div>
                </div> 
            </div>
        </div>  
        <!-- ABOUT SECTION  SECTION END -->       

        <style>

 
.faq-section {
    background: #fdfdfd;
    /* min-height: 100vh; */
    padding: 10vh 0 0;
}
.faq-title h2 {
  position: relative;
  margin-bottom: 45px;
  display: inline-block;
  font-weight: 600;
  line-height: 1;
}
.faq-title h2::before {
    content: "";
    position: absolute;
    left: 50%;
    width: 60px;
    height: 2px;
    background: #E91E63;
    bottom: -25px;
    margin-left: -30px;
}
.faq-title p {
  padding: 0 190px;
  margin-bottom: 10px;
}

.faq {
  background: #FFFFFF;
  box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.06);
  border-radius: 4px;
}

.faq .card {
  border: none;
  background: none;
  border-bottom: 1px dashed #CEE1F8;
}

.faq .card .card-header {
  padding: 0px;
  border: none;
  background: none;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}

.faq .card .card-header:hover {
    background: rgba(233, 30, 99, 0.1);
    padding-left: 10px;
}
.faq .card .card-header .faq-title {
  width: 100%;
  text-align: left;
  padding: 0px;
  padding-left: 30px;
  padding-right: 30px;
  font-weight: 400;
  font-size: 15px;
  letter-spacing: 1px;
  color: #3B566E;
  text-decoration: none !important;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
  cursor: pointer;
  padding-top: 20px;
  padding-bottom: 20px;
}

.faq .card .card-header .faq-title .badge {
  display: inline-block;
  width: 20px;
  height: 20px;
  line-height: 14px;
  float: left;
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;
  text-align: center;
  background: #E91E63;
  color: #fff;
  font-size: 12px;
  margin-right: 20px;
}

.faq .card .card-body {
  padding: 30px;
  padding-left: 35px;
  padding-bottom: 16px;
  font-weight: 400;
  font-size: 16px;
  color: #6F8BA4;
  line-height: 28px;
  letter-spacing: 1px;
  border-top: 1px solid #F3F8FF;
}

.faq .card .card-body p {
  margin-bottom: 14px;
}

@media (max-width: 991px) {
  .faq {
    margin-bottom: 30px;
  }
  .faq .card .card-header .faq-title {
    line-height: 26px;
    margin-top: 10px;
  }
}        </style>