<section class="content">
  <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $title ?>  &nbsp;&nbsp;<a href="<?php echo base_url('cms-admin/post-new') ?>" class="btn btn-default">Tambah Post</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Judul</th>
                  <th>Isi</th>
                  <th>Penulis</th>
                  <th width="10%">Tanggal</th>
                  <th width="12%"></th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($posts as $post) { ?>
                    
                  
                    <tr>
                      <td><?php echo $post->title; ?></td>
                      <td><?php echo character_limiter($post->content, 30) ?></td>
                      <td><?php echo $post->name ?></td>
                      <td>
                        <?php
                        if ($post->post_status == '1') {
                          echo "<span class='label label-primary'><i>Telah Terbit</i></span>";
                        }else{
                          echo "<span class='label label-default'><i>Terakhir Diubah</i></span>";
                        }
                        echo "<br>";
                        echo date("d/m/Y",strtotime($post->date_published)) ?>
                          
                        </td>
                      <td>
                        <a href="<?php echo base_url('cms-admin/post/view/'.$post->idpost) ?>" class="btn btn-default btn-md" title="lihat"><i class="fa fa-eye"></i></a> || 
                        <a href="#" class="btn btn-default btn-md" title="edit"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                <tfoot>
                  <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Penulis</th>
                    <th width="10%">Tanggal</th>
                    <th width="12%"></th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!-- /.box -->
    </div>
    <!-- /.col-->
  </div>
  <!-- ./row -->
</section>
