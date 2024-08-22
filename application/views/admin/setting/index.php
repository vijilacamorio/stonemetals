<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Manage Setting</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/setting'); ?>">Manage Setting</a></li>
            <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
            </ol>
        </div>
        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                          <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Email Address</th>
                                        <th>Mobile Number</th>
                                        <th>Location</th>
                                        <th>Created Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
          
                                        <?php foreach ($settingdata as $setting): ?>
                                                <tr>
                                                    <td><?php echo $setting['email_address']; ?></td>
                                                    <td><?php echo $setting['mobile_number']; ?></td>
                                                    <td><?php echo $setting['location']; ?></td>
                                                    <td><?php echo $setting['created_date']; ?></td>
                                                    <td>
                                                        <?php if($setting['is_active'] == 1){ ?>
                                                        <span class="badge bg-success">Active</span>
                                                        <?php }else{ ?>
                                                        <span class="badge bg-danger">Inactive</span>
                                                        <?php } ?>
                                                    </td>                                       
                                                     <td>
                       <a href="<?php echo base_url('admin/setting/editSettings/' . $setting['setting_id']); ?>" class="btn btn-primary">Edit</a>
                                                    </td>  
                                                </tr>
                                            <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/layout/footer'); ?>