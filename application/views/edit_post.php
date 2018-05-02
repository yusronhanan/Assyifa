<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>

<!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo base_url() ?>assets/img/contact-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Menjawab</h1>
              <span class="subheading">Berbagi bersama supaya tidak saling tersesat.</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <?php 
          if (!empty($q)) { ?>
          <div class="post-preview">
             
            <a href="close.html">  <p class="post-question pull-right"><i class="fa fa-close"></i></p></a>
            <a >
             
              <h3 class="post-subtitle" style="color:#0085a1">
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
              , ditanya <?php echo $q->date_question;?>
              
            </p>
          </div>
          <hr>
          <?php  }  ?>
          
          <!-- Pager -->
        
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <?php if (!empty($q)) {?>
          <form name="sentMessage" id="contactForm" novalidate action="<?php echo base_url() ?>posting/editposting/<?php echo $p->hash_post ?>" method="POST">
            <?php }
            else{
              ?>
            <form name="sentMessage" id="contactForm" novalidate action="<?php echo base_url() ?>posting/editposting/<?php echo $p->hash_post ?>" method="POST">
            <?php
            } ?>
            <!-- <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Nama" id="name" required data-validation-required-message="Please enter your name." value="a" >
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Please enter your email address." value="a" disabled>
                <p class="help-block text-danger"></p>
              </div>
            </div> -->
            <div class="control-group">
              <div class="form-group floating-label-form-group controls floating-label-form-group-with-value">
                <label>Judul Post</label>
                <textarea rows="2" name="title_post" class="form-control" placeholder="Judul" id="message" required data-validation-required-message="Please enter a title."><?php echo $p->title_post ?></textarea>
                <p class="help-block text-danger"></p>
              </div>
               </div>
               <br>
               <div class="control-group">
              <div class="form-group floating-label-form-group controls floating-label-form-group-with-value">
                <label>Deskripsi Post</label>
                <textarea rows="2" name="desc_post" class="form-control" placeholder="Deskripsi Post" id="message" required data-validation-required-message="Please enter a description."><?php echo $p->desc_post ?></textarea>
                <p class="help-block text-danger"></p>
              </div>
               </div>
               
               <br>
           <div class="control-group">
              <div class="form-group">
                <label>Konten</label>
                <textarea rows="5" name="text_post" class="ckeditor" id="ckeditor" id="message" required data-validation-required-message="Please enter a answer."><?php echo $p->text_post ?></textarea>

                <p class="help-block text-danger"></p>
              </div>
               </div>
            <div class="control-group">
              <div class="form-group">
                <?php if (!empty($q)) {?>

                <label class="checkbox">
                  <input type="checkbox" id="hide_q" name="type_answering" value="hide_q"> Sembunyikan pertanyaan
             <?php if ($p->status_q == 'hide_q') {?>
             <script type="text/javascript">
               document.getElementById('hide_q').checked = true;
             </script>
        <?php } ?>
        </label>        
                <?php } ?>

              </div>
            </div>

            <div class="control-group pull-right">
              <div class="form-group">
                <div class="checkbox">
  <label>
    <input type="checkbox" data-toggle="toggle" id="publish" name="publish" value="yes">
    Publish post ini
  </label>
</div>
             <?php if ($p->publish == 'yes') {?>
             <script type="text/javascript">
               document.getElementById('publish').checked = true;
             </script>
        <?php } ?>

              </div>
            </div>

            <br>
            <div id="success"></div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>

          </form>
        </div>
      </div>
    </div>