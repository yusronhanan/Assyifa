   <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo base_url() ?>assets/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Kumpulan Pertanyaan</h1>
              <span class="subheading">Ya Allah, Sesungguhnya Engkaulah Maha Mengetahui apa yang ada di langit dan di bumi.</span>
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
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          

        </div>
        <!-- not main -->

      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php 
          if (!empty($question)) {
          foreach ($question as $q) { ?>
          <div class="post-preview">
             
            <a href="close.html">  <p class="post-question pull-right"><i class="fa fa-close"></i></p></a>
            <a href="post.html">
             
              <h3 class="post-subtitle">
                <?php echo $q->text_question ?>
              </h3>
            </a>
            <p class="post-meta">Pertanyaan dari
              <?php 
              if ($q->type_question == 'anonim') {
                echo 'Anonim';
              }
              else{
              echo $q->name_questioner; 
              }
              ?>
              , ditanya <?php echo $q->date_question;
              if ($q->status_question == 'proses') { ?>
              <a href="<?php echo base_url().'menjawab/'.$q->hash_question ?>" class="pull-right"><button class="btn btn-danger">Jawab</button></a>
              <?php } else{ ?>
              <a href="<?php echo base_url().'post/'.$q->hash_question ?>" class="pull-right"><button class="btn btn-primary">Lihat</button></a>
              <?php }  ?>
            </p>
          </div>
          <hr>
          <?php } } else{
            echo 'kosong';
          } ?>
          
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>