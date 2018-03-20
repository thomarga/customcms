<section class="content">
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
                  <th>Penulis</th>
                  <th>Kategori</th>
                  <th>Tag</th>
                  <th>Tanggal</th>
                  <th width="15%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($posts as $post) { ?>
                    <tr>
                      <td><?php echo $post['title']; ?></td>
                      <td>Muas</td>
                      <td>
                        <?php foreach ($categories as $category) { 
                          echo isset($category['category_name']) ? $post['category_name']."," :'';
                         } ?>
                      </td>
                      <td> PHP, HTML</td>
                      <td>2-2-2018</td>
                      <td>
                        <a href="#" class="btn btn-info btn-sm">Edit</a> || 
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                      </td>
                    </tr>
                  <?php } ?>
                
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
