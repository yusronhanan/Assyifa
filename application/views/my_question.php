 <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo base_url() ?>assets/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Pertanyaanku</h1>
              <span class="subheading">Terimakasih Ya Allah telah memudahkan aku dalam mencari ilmu.</span>
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
          if (!empty($my_q)) {
          foreach ($my_q as $q) { ?>
          <div class="post-preview">
            
              
               <a href="close.html">  <p class="post-question pull-right"><i class="fa fa-close"></i></p></a> 
                <?php if ($q->status_question == 'selesai') {
              echo '<a href="'.base_url().'post/'.$q->hash_post.'" target="_blank">';
            }
            else{
              echo '<a>';
            } ?>
              <h3 class="post-subtitle">
                <?php echo $q->text_question ?>
              </h3>
            </a>
            <p class="post-meta">
            <?php if ($q->status_question == 'selesai') {
              echo '<span class="badge badge-yes">Telah Dijawab</span>';
            }
            else{
              echo '<span class="badge badge-no">Belum Dijawab</span>';
            } ?> Ditanyakan <?php echo $q->date_question ?> 
            <?php if ($q->type_question == 'anonim') {
              echo '(anonim)';
            }?>
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