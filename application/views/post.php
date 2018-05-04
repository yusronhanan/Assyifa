<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/brands.css" integrity="sha384-Pln/erVatVEIIVh7sfyudOXs5oajCSHg7l5e2Me02e3TklmDuKEhQ8resTIwyI+w" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/fontawesome.css" integrity="sha384-rnr8fdrJ6oj4zli02To2U/e6t1qG8dvJ8yNZZPsKHcU7wFK3MGilejY5R/cUc5kf" crossorigin="anonymous"> <!-- Page Header -->
    <?php 
$base = base_url();
     ?>
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
             <p >
            Share : 
            <br>
            <a href="https://api.whatsapp.com/send?text=<?php echo rawurlencode ('Saya telah membaca artikel : *'.$p->title_post.'*, '.$p->desc_post.'. Silahkan menuju link '.$base.'post/'.$p->hash_post.'') ?>" target="_blank" data-action="share/whatsapp/share"> <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-whatsapp fa-stack-1x fa-inverse"></i>
                  </span></a>

                  <a href="https://twitter.com/intent/tweet?url=<?php echo $base.'post/'.$p->hash_post ?>&text=<?php echo rawurlencode ('Saya telah membaca artikel : *'.$p->title_post.'*, '.$p->desc_post.'.') ?>&via=yusron_hzvi&hashtags=ngajiyuk" target="_blank"> <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span></a>

            <a href="https://plus.google.com/share?url=<?php echo $base.'post/'.$p->hash_post ?>&text=<?php echo rawurlencode ('Saya telah membaca artikel : *'.$p->title_post.'*, '.$p->desc_post.'.') ?>&hl=in" target="_blank"> <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                  </span></a>
           
            <a href="https://www.facebook.com/sharer.php?u=<?php echo $base.'post/'.$p->hash_post ?>" target="_blank"> <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span></a>

                 

                  
            </p>
            
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
