<div class="section-full welcome-section-outer">
        <br>
        <div style="background: black;height: 75px;padding-top: 20px;">
          <h3 style="text-align:center;color:white;"><?php echo $page_title; ?></h3>
        </div>
        
            <div class="welcome-section-top bg-white p-t80 p-b50">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                    <?php
                        if(!empty($blog)){
                          foreach($blog as $blogd){
                            ?>
                        <div class="col-lg-7 col-md-12 m-b30">
                        
                            <div class="welcom-to-section">
                               <p style="text-align:justify;">Date: <?php echo date('d-m-Y', strtotime($blogd['modified_date'])); ?></p>
                               <p style="text-align:justify;"><?php echo $blogd['short_description']; ?></p>
                               <p style="text-align:justify;"><a href="<?php echo base_url('blog/'.$blogd['slug']); ?>">Read More</a></p>
                             </div>
                        </div>
                        <div class="col-lg-5 col-md-12 m-b30">
                        <img src="<?php echo base_url() . BLOG_IMG_PATH . $blogd['featured_image']; ?>" alt="" style="margin-left: 3px;margin-top: 8px;">
                        </div> 
                      <?php } 
                      } ?>     
                    </div>
                </div> 
            </div>
        </div> 