<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title ?>
          </h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
            title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <?php 
        foreach ($data as $d):
        ?>
        <div class="box-body pad">
          <form method="post" action="<?php echo base_url()?>media/update" enctype="multipart/form-data">
              <div class="form-group">
                  <ul class="mailbox-attachments clearfix" style="display: flex; flex-wrap: wrap;">
                    <li>
                      <span class="mailbox-attachment-icon has-img"><img src="<?php echo base_url() ?>uploads/<?php echo $d->media_name ?>" alt=""></span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="box-body">
                <div class="form-group" hidden>
                  <label>ID Media</label>
                  <input type="text" name="idmedia" value="<?php echo $d->idmedia ?>" class="form-control">
                </div>
                <div class="form-group">
                  <label>Caption</label>
                  <textarea type="text" name="media_caption" class="form-control"><?php echo $d->media_caption ?></textarea>
                </div>
                <div class="form-group">
                  <label>URL</label>
                  <input type="text" name="media_url" value="<?php echo base_url() ?>uploads/<?php echo $d->media_name ?>" class="form-control" readonly>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </form>
        </div>
      </div>
      <?php endforeach; ?>
      <!-- /.box -->
    </div>
    <!-- /.col-->
  </div>
  <!-- ./row -->
</section>
