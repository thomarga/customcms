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
        <div class="box-body pad">
          <form method="post" action="<?php echo base_url()?>media/create" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group" hidden>
                  <label>ID Media</label>
                  <input type="text" name="idmedia" class="form-control">
                </div>
                <div class="form-group">
                  <label>Caption</label>
                  <textarea type="text" name="media_caption" class="form-control"></textarea>
                </div>
                <div class="form-group" hidden readonly>
                  <label>URL</label>
                  <input type="text" name="media_url" class="form-control">
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Choose File
                    <input type="file" name="media_name">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Upload</button>
              </div>
            </form>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col-->
  </div>
  <!-- ./row -->
</section>
