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
           <?php 
        if (!empty($this->input->get('keyword'))) {
            $keyword = $this->input->get('keyword');
          }else{
            $keyword = '';
          }
        ?>
          <!-- Search Widget -->
          <form action="<?php echo base_url() ?>pertanyaanku/" method="get">
                
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan pertanyaan" value="<?php echo $keyword ?>">
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
          if (!empty($my_q)) {
          foreach ($my_q as $q) { ?>
          <div class="post-preview">
            <?php 
            if (($q->id_questioner == $this->session->userdata('logged_id') && $this->session->userdata('role') != 'ustad') || $this->session->userdata('role') == 'admin') {
             ?>
             <p class="post-question pull-right">
             <a href="<?php echo base_url().'deletequestion/'.$q->hash_question ?>" onclick="return confirm('Apakah anda benar ingin menghapus pesan ini?')"><i class="fa fa-trash"></i></a>
            </p>
            

            
            <?php } ?> 
              
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
            <?php echo $pagination ?>
            <!-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> -->
          </div>
        </div>
      </div>
    </div>