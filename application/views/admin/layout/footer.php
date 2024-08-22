<footer class="footer">
    © <?php echo date('Y') ?> - Designed and developed by <a href="https://amoriotech.com" target="_blank">Amorio Technologies</a>
</footer>
</div>
       
</div>
    
    <script src="<?php echo base_url(); ?>backend/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>backend/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>backend/main/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>backend/main/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>backend/main/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>backend/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>backend/main/js/custom.min.js"></script>
    
    <script src="<?php echo base_url(); ?>backend/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--morris JavaScript -->
    <script src="<?php echo base_url(); ?>backend/assets/plugins/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>backend/assets/plugins/morrisjs/morris.min.js"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url(); ?>backend/main/js/dashboard1.js"></script>
    <script src="<?php echo base_url(); ?>backend/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/t6d9eb3gnmp6qwcugj346vj2ks5n3l1duwo3gmx8ltgjd3n0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="<?php echo base_url();?>backend/main/js/sweetalert.min.js"></script>
  
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $(document).ready(function() {
        $(".dataTables_filter").removeAttr("top");
    });

    tinymce.init({
        selector: "#mymce",
        plugins: 'link image code',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code',
        menubar: false,
    });
</script>
<style>
    .close{
        position: relative;
        bottom: 23px;   
    }
    .dataTables_empty{
        text-align: center !important;
    }
</style>
</body>

</html>