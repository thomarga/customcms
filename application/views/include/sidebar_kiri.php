<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url() ?>assets/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="<?php echo base_url() ?>assets/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li>
      <li class="treeview active">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Pos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('cms-admin/posts-all') ?>"><i class="fa fa-circle-o"></i>Semua Pos</a></li>
          <li><a href="<?php echo base_url('cms-admin/post-new') ?>"><i class="fa fa-circle-o"></i>Tambah Pos</a></li>
          <li><a href="<?php echo base_url('cms-admin/category') ?>"><i class="fa fa-circle-o"></i>Kategori</a></li>
        </ul>
      </li>
      <li class="treeview active">
        <a href="#">
          <i class="fa fa-photo"></i> <span>Media</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i>All Media</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Add Media</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
