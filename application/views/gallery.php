    <!-- ABOUT SECTION START -->
    <div class="section-full welcome-section-outer">
        <br>
        <div style="background: black;height: 75px;padding-top: 20px;">
        <h3 style="text-align:center;color:white;"><?php echo $page_title; ?></h3>
        </div>
         <!-- SERVICES SECTION START -->
         <div class="section-full p-t80 p-b50 bg-gray bg-cover" style="background-color:white;">
                    <div class="container">
                       <div class="section-content" >
                            <div class="owl-carousel h3-project-slider  mfp-gallery">
                            <!-- COLUMNS 1 --> 
                            <?php foreach ($gallery_data as $gallery_item): ?>
                                    <div class="item">
                                        <div class="line-filter-outer">
                                            <div class="line-filter-media">
                                                <?php if (isset($gallery_item['gallery_image']) && !empty($gallery_item['gallery_image'])): ?>
                                                    <img src="<?= base_url(GALLERY_IMG_PATH . htmlspecialchars($gallery_item['gallery_image'])) ?>" alt="Gallery Image" style="height: 415px;">
                                                <?php endif; ?>
                                                <div class="hover-effect-1">
                                                    <div class="hover-effect-content text-white">
                                                        <h3 class="m-tb0 h-category"><?= htmlspecialchars($gallery_item['gallery_name']) ?></h3>
                                                        <p><?= htmlspecialchars($gallery_item['gallery_content']) ?></p>
                                                        <a href="<?= base_url(GALLERY_IMG_PATH . htmlspecialchars($gallery_item['gallery_image'])) ?>" class="mfp-link"><i class="fa fa-search-plus" style="margin-top:12px;"></i> </a>   
                                                    </div>
                                                </div>     
                                            </div> 
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>                                                              
                          </div>
                       </div>
                    </div>
            <!-- SERVICES SECTION  SECTION END -->  
        </div>  
        <!-- ABOUT SECTION  SECTION END -->       