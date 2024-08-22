<div style="background: black;height: 75px;padding-top: 20px;">
        <h3 style="text-align:center;color:white;"><?php echo $page_title; ?></h3>
        </div>
<div class="container mt-5 mb-5" >
<?php if (!empty($blog)) { ?>
  <div class="row">
    <?php foreach ($blog as $blogd) { ?>
      <div class="col-12 col-md-4" style="border: 1px solid;">
        <img src="<?php echo base_url() . BLOG_IMG_PATH . $blogd['featured_image']; ?>" alt="" style="margin-left: 3px; margin-top: 8px;">
        <div class="card-body">          
          <h3 class="card-title"><?php echo $blogd['title']; ?></h3>
          <p class="card-text"><?php echo $blogd['short_description']; ?></p>
          <button type="button" class="btn btn-dark "><a href="<?php echo base_url('blog/'.$blogd['slug']); ?>" class="text-white">Read More</a></button>

          
        </div>
      </div>
    <?php } ?>
  </div>
<?php } ?>

</div>