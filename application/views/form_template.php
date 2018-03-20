<!DOCTYPE html>
<html>
  <head>
    <title>CMS</title>
    <?php $this->load->view('include/head'); ?> <!-- head besisi meta, favicon, SEO keyword, dll -->
    <?php $this->load->view('include/link_form'); ?> <!-- link CSS dan JS untuk Form Template -->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php $this->load->view('include/sidebar_atas'); ?> <!-- Header (bagian atas) -->
      <?php $this->load->view('include/sidebar_kiri'); ?> <!-- Sidebar (bagian kiri) berisi Menu -->
      <div class="content-wrapper">
        <?php $this->load->view('contents/'.$file); ?> <!-- Isi, mengambil file dari folder contents -->
      </div>
      <?php $this->load->view('include/footer'); ?> <!-- Footer -->
      <div class="control-sidebar-bg"></div>
    </div> <!-- ./wrapper -->
  </body>
</html>
