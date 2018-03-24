<section class="content">
  <form method="POST" action="<?php echo base_url('post/save') ?>">
    <div class="row">
      <div class="col-md-9">
        <div class="box box-default">
          <div class="box-header">
            <h3 class="box-title"><?php echo $title ?>
            </h3>
            <!-- tools box -->
            <!-- <div class="pull-right box-tools">
              <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
              title="Remove">
              <i class="fa fa-times"></i></button>
            </div> -->
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
              <button type="button" id="media" class="btn btn-default"><i class="fa fa-camera"> Tambahkan Media</i></button>
            </div>
            <div class="form-group">
              <textarea id="editor1" name="content" rows="10" cols="80">
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
