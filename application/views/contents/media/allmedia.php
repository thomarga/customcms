<section class="content">
  <div class="row">
    <!-- /.col -->
    <div class="col-md-12">
      <!-- Custom Tabs (Pulled to the right) -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a href="#tab_1" data-toggle="tab">Image</a></li>
          <li><a href="#tab_2" data-toggle="tab">Video</a></li>
          <li><a href="#tab_3" data-toggle="tab">File</a></li>
          <li class="pull-left header"><i class="fa fa-image"></i><?php echo $title ?></li>
        </ul>
        <div class="tab-content">
          <div class="input-group">
            <span class="input-group-addon">URL</span>
            <input id="url" type="text" value="" class="form-control" readonly>
            <span onclick="CopyFunction()" class="input-group-addon"><i class="fa fa-copy"></i></span>
          </div>
          <br>
          <div class="tab-pane active" id="tab_1">
            <div>
              <ul class="mailbox-attachments clearfix" style="display: flex; flex-wrap: wrap;">
                <?php 
                foreach ($data as $d):
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
                      <a href="<?php echo base_url()."media/edit/".$d->idmedia ?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-pencil-square" title="Change a caption"></i></a>
                    </span>
                  </div>
                </li>
                <?php endforeach; ?>
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
      <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<script>
  function clickMe(e) {
      var x = document.getElementById(e.id).src;
      document.getElementById("url").value = x;
  }
  function CopyFunction() {
      var copyText = document.getElementById("url");
      copyText.select();
      document.execCommand("Copy");
  }
</script>
