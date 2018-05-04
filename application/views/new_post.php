<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>

<!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo base_url() ?>assets/img/contact-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>New Post</h1>
              <span class="subheading">Tak ada amal jariyah paling bermanfaat selain ilmu.</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        
          
          <!-- Pager -->
        
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form name="sentMessage" id="contactForm" novalidate action="<?php echo base_url() ?>posting/post_in" method="POST">
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
              <div class="form-group floating-label-form-group controls">
                <label>Judul Post</label>
                <textarea rows="2" name="title_post" class="form-control" placeholder="Judul Post" id="message" required data-validation-required-message="Please enter a title."></textarea>
                <p class="help-block text-danger"></p>
              </div>
               </div>
               <br>
              <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Deskripsi Post</label>
                <textarea rows="2" name="desc_post" class="form-control" placeholder="Deskripsi Post" id="message" required data-validation-required-message="Please enter a description."></textarea>
                <p class="help-block text-danger"></p>
              </div>
               </div>
               
               <br>
           <div class="control-group">
              <div class="form-group">
                <label>Konten Post</label>
                <textarea rows="5" name="text_post" class="ckeditor" id="ckeditor" id="message" required data-validation-required-message="Please enter a answer."></textarea>

                <p class="help-block text-danger"></p>
              </div>
               </div>
            

            <br>

            <div class="control-group">
              <div class="form-group">
                <div class="checkbox">
                  Tags :
                  <?php foreach ($tags as $t) { ?>
  <label>
    <input class="tagss" type="checkbox" data-toggle="toggle" name="tags[]" value="<?php echo $t->text ?>"> <?php echo $t->text ?> 
  </label>
  <?php } ?><a href="#" title="New Tag" data-toggle="modal" data-target="#newTag"><span class="badge"><i class="fa fa-plus"></i></span></a>
</div>

              </div>
            </div>
            <br>
            <div class="control-group pull-right">
              <div class="form-group">
                <div class="checkbox">
  <label>
    <input type="checkbox" data-toggle="toggle" id="publish" name="publish" value="yes">
    Publish post ini
  </label>
</div>

              </div>
            </div>
            <br>
            <div id="success"></div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Save</button>
            </div>

          </form>
        </div>
      </div>
    </div>


     <div class="modal fade" id="newTag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Tag Baru</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>posting/new_tag" method="post">
                                        <div class="modal-body">
                                            Keyword Tag
                                            <input type="text" name="tag" placeholder="Tag" class="form-control"  required>
                                            <br>
                                            <input type="hidden" name="backto" value="newpost">
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
       
