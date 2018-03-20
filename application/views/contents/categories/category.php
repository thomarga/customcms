<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kategori <?php echo $category_name ?></h3> &nbsp;<span class="label label-primary"><?php echo $counts ?> Pos</span>
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
                    </tr>
                  <?php } ?>
                <tfoot>
                  <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Penulis</th>
                    <th width="10%">Tanggal</th>
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
