  <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo base_url() ?>assets/img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?php echo $p->title_post ?></h1>
              <h2 class="subheading"><?php echo $p->desc_post ?></h2>
               <span class="meta">
                
            <?php if (!empty($q)) {?>
             Menjawab pertanyaan dari <?php if ($q->type_question == 'anonim') {
                echo 'Anonim';
              }
              else{
              echo $q->name_questioner; 
              } ?>
                <br>
                <br>
                <?php } ?>
                Posted by
                <a href="<?php echo base_url().'?author='.$p->hash_code; ?>"><?php echo $p->name_answering ?></a>
                on <?php echo $p->date_post ?></span>
            
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <?php if (!empty($q)) {?>
             <?php if ($p->status_q == 'show_q') {?>
             <p>Pertanyaan : <br><?php echo $q->text_question ?> </p>
             <hr>
             <?php } ?>
                
                <?php } ?>
           <?php echo $p->text_post ?>

           <?php if (!empty($p->tag) || $p->tag != '') {?>
            <p class="tag-post">
             Tag 
             <?php 
              $tag = explode(',', $p->tag);
              for($i=0;$i<count($tag);$i++) {
               ?>
              <a href="<?php echo base_url().'?tag='.$tag[$i]; ?>"><span class="badge"><?php echo $tag[$i] ?></span></a>
              <?php } ?>
            </p>
            <?php } ?>
             <?php 
              if (($p->id_user == $this->session->userdata('logged_id') && $this->session->userdata('role') != 'user') || $this->session->userdata('role') == 'admin') {
               ?>
            <p class="tag-post float-right">
            
               <a href="<?php echo base_url().'deletepost/'.$p->hash_post ?>" onclick="return confirm('Apakah anda benar ingin menghapus pesan ini?')"><i class="fa fa-trash"></i></a>
            <a href="<?php echo base_url().'editpost/'.$p->hash_post ?>"><i class="fa fa-pencil"></i></a>
             
            </p> <?php } ?>
          </div>
        </div>
      </div>
    </article>
