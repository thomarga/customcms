<section class="content">
  <form method="POST" action="<?php echo base_url('post/save') ?>">
    <div class="row">
      <div class="col-md-9">
        <div class="box box-default">
          <div class="box-header">
            <h3 class="box-title"><?php echo $title ?>
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
              <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">
              
            <div class="form-group">
              <input type="text" name="title" id="" class="form-control" placeholder="Masukkan Judul">
            </div>
            <div class="form-group">
            Permalink : <a href="<?php echo base_url('')?>"><u>http://localhost/customcms/<?php echo date('Y').'/'.date('m').'/'.date('d').'/contoh' ?></a></u> &nbsp;&nbsp;<button type="button" id="edit-slug" class="btn btn-default btn-sm">Edit</button>
            </div>
            <br>
            <div class="form-group">
              <button type="button" id="media" data-toggle="modal" data-target="#modal-media" class="btn btn-default"><i class="fa fa-camera"> Tambahkan Media</i></button>
            </div>
            <div class="form-group">
              <textarea id="editor1" name="content">
              </textarea> 
            </div>
          </div>
        </div>
      </div>  
      <div class="col-md-3">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Terbitkan</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-sm-7">
                <button type="submit"  name="actionbtn" class="btn btn-default" value="konsep">Simpan Konsep</button>   
              </div>
              <div class="col-sm-5">
                <button type="submit"  name="actionbtn" class="btn btn-primary" value="terbit">Terbitkan</button>
              </div>
            </div>
            
          </div>
          <!-- /.box-body -->
        </div>
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Kategori</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- <div class="form-group">
              
            <input type="checkbox" name="category[]" value=""> Tak Berkategori
            </div> -->
            <?php
            foreach ($categories as $data) { ?>
              <div class="form-group">
                <input type="checkbox" name="category[]" value="<?php echo $data->idcategory ?>">&nbsp;&nbsp;<?php echo $data->category_name ?>
              </div>
           <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Tag</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <input type="text" class="form-control" id="tag" name="tag" data-provide="typeahead" >
            </div>
            <p><i>Pisahkan tag dengan koma</i></p>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
                
    </div>
  </form>


</section>


<div class="modal fade bs-example-modal-lg" id="modal-media">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#tab_1" data-toggle="tab">Image</a></li>
            <li><a href="#tab_2" data-toggle="tab">Video</a></li>
            <li><a href="#tab_3" data-toggle="tab">File</a></li>
            <li class="pull-left header"><i class="fa fa-image"></i>Media</li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <div>
                <ul class="mailbox-attachments clearfix" style="display: flex; flex-wrap: wrap;">
                  <?php 
                  foreach ($media as $d){
                  ?>
                  <li>
                    <span class="mailbox-attachment-icon has-img"><img src="<?php echo base_url() ?>uploads/<?php echo $d->media_name ?>" alt="Attachment" id="<?php echo $d->idmedia ?>" onclick="clickMe(this)" title="<?php echo SUBSTR($d->media_caption,0,35) ?>..."></span>
                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> <?php echo $d->media_name ?></a>
                      <span class="mailbox-attachment-size">
                        <?php
                        $img = get_headers(base_url().'uploads/'.$d->media_name, 1);
                        $size = $img["Content-Length"]*0.001; 
                        print $size." KB";
                        ?>
                      </span>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
              The European languages are members of the same family. Their separate existence is a myth.
              For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
              in their grammar, their pronunciation and their most common words. Everyone realizes why a
              new common language would be desirable: one could refuse to pay expensive translators. To
              achieve this, it would be necessary to have uniform grammar, pronunciation and more common
              words. If several languages coalesce, the grammar of the resulting language is more simple
              and regular than that of the individual languages.
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
              <ul class="mailbox-attachments clearfix" style="display: flex; flex-wrap: wrap;">
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                    <span class="mailbox-attachment-size">
                      1,245 KB
                      <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                    </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>
                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App Description.docx</a>
                    <span class="mailbox-attachment-size">
                      1,245 KB
                      <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                    </span>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
        <button type="button" class="btn btn-primary">Sisipkan ke pos</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  function clickMe(e) {
      var x = document.getElementById(e.id).src;
      document.getElementById("editor1").value = x;

      $('#modal-media').modal('hide');
  }
</script>