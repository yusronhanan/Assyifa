   <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo base_url() ?>assets/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Asy-Syifa' Blog</h1>
              <span class="subheading">Berbenah bersama, Berbagi bersama</span>
            </div>
          </div>
        </div>
      </div>
    </header>
 <!-- Main Content -->
    <div class="container">
      <!-- Sidebar Widgets Column -->
        
        <div class="col-md-4">

          <!-- Search Widget -->
          <?php 
          if (!empty($this->input->get('keyword'))) {
            $keyword = $this->input->get('keyword');
          }else{
            $keyword = '';
          }
           ?>
          
          <form action="<?php echo base_url() ?>postku/" method="get">
                
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan judul" value="<?php echo $keyword ?>">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
                
              </div>
            </div>
          </div>

                </form>

          

        </div>
        
        <!-- not main -->

      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php 
          if (!empty($post)) {
            foreach ($post as $p) {
           ?>
          <div class="post-preview">
           
              <?php 
            if ($p->publish == 'yes') {
             ?>
             <span class="badge">Published</span>
            <?php } else{?>
            <span class="badge" style="background-color: #dc3545">Draft</span>
            <?php } ?>
             <p class="post-question pull-right">
             <a href="<?php echo base_url().'deletepost/'.$p->hash_post ?>" onclick="return confirm('Apakah anda benar ingin menghapus pesan ini?')"><i class="fa fa-trash"></i></a>
            <a href="<?php echo base_url().'editpost/'.$p->hash_post ?>"><i class="fa fa-pencil"></i></a>
            </p>
            
            
            <a href="<?php echo base_url().'post/'.$p->hash_post ?>">
              <h2 class="post-title">
                <?php echo $p->title_post ?>
              </h2>
              <?php if ($p->question_id != NULL) { ?>
              <p class="post-question">Pertanyaan dari  <?php 
              if ($p->type_question == 'anonim') {
                echo 'Anonim';
              }
              else{
              echo $p->name_questioner; 
              }
              ?></p>
              <?php } ?>
              <h3 class="post-subtitle">
                <?php
                if (strlen($p->desc_post) < 52) {
                          echo $p->desc_post;
                        }
                        else{
                        echo  substr($p->desc_post, 0,52).'...';
                        } ?>

              </h3>
            </a>
            <p class="post-meta">Tag 
              <?php 
              $tag = explode(',', $p->tag);
              for($i=0;$i<count($tag);$i++) {
               ?>
              <a href="<?php echo base_url().'?tag='.$tag[$i]; ?>"><span class="badge"><?php echo $tag[$i] ?></span></a>
              <?php } ?>
               , Posted 
               <?php if ($this->session->userdata('role') == 'admin') { ?>
               by
              <a href="<?php echo base_url().'?author='.$p->hash_penjawab; ?>"><?php echo $p->name_answering ?></a>
               <?php } ?>
               on <?php echo $p->date_post ?> </p>

            

            
            
          </div>
          <hr>
          <?php } } ?>
        
          <!-- Pager -->
          <div class="clearfix">
            <!-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> -->
            <?php echo $pagination ?>


          </div>
        </div>
      </div>
    </div>