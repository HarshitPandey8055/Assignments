        <!--Start  Footer -->
        <footer class="footer-main"> 2014 - 2021 &copy; <?php
    $data = sitedata();
    echo output($data['webiste_name']);
   ?></footer>  
         <!--End footer -->

       </div>
      <!--End main content -->

    <!--Begin core plugin -->
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/moment/moment.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.slimscroll.js "></script>
    <script src="<?= base_url(); ?>assets/js/jquery.nicescroll.js"></script>
    <script src="<?= base_url(); ?>assets/js/functions.js"></script>
    <!-- End core plugin -->

    <!--Begin Page Level Plugin-->

    <?php if($this->uri->segment(1)=='dashboard') { ?>
          <script src="<?= base_url(); ?>assets/plugins/morris-chart/morris.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/morris-chart/raphael-min.js"></script>
    <script src="<?= base_url(); ?>assets/pages/dashboard.js"></script>
    <?php } ?>
    <!--End Page Level Plugin-->
    <script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

     <!--Begin Page Level Plugin-->
    <script src="<?= base_url(); ?>assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/pages/table-data.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom.js"></script>


    <script src="<?= base_url(); ?>assets/plugins/jquery-toast/jquery.toast.min.js"></script>
<script type="text/javascript">
   <?php if ($this->session->flashdata('successmessage')) { ?>
     $.toast({
        heading: 'Information',
        text: '<?= ucfirst($this->session->flashdata('successmessage')); ?>',
        icon: 'success',
        loader: true,        // Change it to false to disable loader
        position: 'top-right',
        stack: false  // To change the background
    })


   <?php } else if ($this->session->flashdata('warningmessage')) { ?>
       $.toast({
        heading: 'Error',
        text: '<?= ucfirst($this->session->flashdata('warningmessage')); ?>',
        icon: 'error',
        loader: true,        // Change it to false to disable loader
        position: 'top-right',
        stack: false  // To change the background
        })
   <?php } ?>
   
    
</script>
    <!--End Page Level Plugin-->

</body>
</html>