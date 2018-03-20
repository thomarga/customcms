<section class="content">
    <div class="row">
      <div class="col-md-9">
        <div class="box box-default">
          <div class="box-header">
            <h3><?php echo $post['title'] ?></h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
              <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">
              <p class="lead"><?php echo $post['content'] ?></p>
              <hr>
              <label class="la"></label>
          </div>
        </div>
      </div>  
      <div class="col-md-3">
        <div class="well">
        	<dl class="dl-horizontal">
        		<label>Url:</label>
        		<p><a href="<?php echo base_url('cms-admin/post/'.$post['slug'])?>">http://customcms/<?php echo $post['slug']; ?></a></p>
        	</dl>
        	<dl class="dl-horizontal">
        		<label>Kategori:</label>
        		<p>
        			<?php
        			if (count($categories) <= 0) {
        			 	echo "Tak Berkategori";
        			 }else{

	        			foreach ($categories as $category) { ?>
	        				<a href="<?php echo base_url('cms-admin/category/view/'.$category['idcategory'])?>"><?php echo $category['category_name']; ?></a>,
	        			<?php } 
        			 } ?>
        		</p>
        	</dl>
        	<dl class="dl-horizontal">
        		<label>Tag:</label>
        		<div class="tags">
        			<?php
        			foreach ($tags as $tag) { ?>
	        			<span class="label label-default"><?php echo $tag['tag'];?></span>
	        		<?php	} ?>
    				 
        		</div>
        	</dl>
          	<hr>

          	<div class="row">
          		<div class="col-sm-6">
          			<a href="#" class="btn btn-success btn-block">Edit</a>
          		</div>
          		<div class="col-sm-6">
          			<a onclick="return confirm('Apakah Anda Yakin?')" href="<?php echo base_url('cms-admin/post/delete/'.$post['idpost'])?>" class="btn btn-danger btn-block">Hapus</a>
          		</div>
          	</div>
          	<hr>
         	<a href="<?php echo base_url('cms-admin/posts-all') ?>" class="btn btn-default btn-block"><< Lihat Semua Pos</a>
        </div>
        
      </div>
                
    </div>
</section>
