<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Manage Contacts</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/contacts'); ?>">Manage Contacts</a></li>
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
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                <?php
                                    if(!empty($condata)){
                                        foreach($condata as $cdata){ ?>
                                <tr>
                                    <td><?php echo $cdata['name']; ?></td>
                                    <td><?php echo $cdata['phone']; ?></td>
                                    <td><?php echo $cdata['email']; ?></td>
                                    <td><?php echo $cdata['message']; ?></td>
                                    <td><?php echo date('d-m-Y H:i:s',strtotime($cdata['created_date'])); ?></td>
                                </tr>
                            <?php } 
                                    } ?>

 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

<?php $this->load->view('admin/layout/footer'); ?>
 