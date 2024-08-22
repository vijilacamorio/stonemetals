<aside class="left-sidebar">
     <div class="scroll-sidebar">
         <div class="user-profile">

              <div class="profile-img"> <img src="<?php echo base_url(); ?>backend/assets/images/logo.JPEG" alt="user" />
                 <div class="notify setpos">  </div>
            </div>
             <div class="profile-text">
                <h5>Admin</h5> 
        </div>
         <nav class="sidebar-nav">
            <ul id="sidebarnav">
             
                <li> <a class=" waves-effect waves-dark <?php echo $this->uri->segment(2) =='admin' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard  </span></a>
                </li>
                <li> <a class=" waves-effect waves-dark <?php echo $this->uri->segment(2) =='category' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/category" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Pages</span></a>
 
        
                </li>

                <li> <a class="waves-effect waves-dark <?php echo $this->uri->segment(2) =='subcategory' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/subcategory" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Sub Pages</span></a>
                </li>

                <li> 
                     <li> <a class=" waves-effect waves-dark <?php echo $this->uri->segment(2) =='page' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/page" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Page Content</span></a> 
                </li>

                
                <li> <a class="waves-effect waves-dark <?php echo $this->uri->segment(2) =='blog' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/blog" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Blog</span></a>   
                </li>


                <li> <a class="waves-effect waves-dark <?php echo $this->uri->segment(2) =='banner' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/banner" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Banners</span></a>
                </li>
                <li> <a class="waves-effect waves-dark <?php echo $this->uri->segment(2) =='gallery' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/gallery" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Galleries</span></a>
                </li>
                <li> <a class="waves-effect waves-dark <?php echo $this->uri->segment(2) =='seosetting' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/seosetting" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Seo Settings</span></a>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark <?php echo $this->uri->segment(2) =='setting' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>admin/setting" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Setting</span></a> 
                 </li>

 
             </ul>
        </nav>
     </div>
 </aside>