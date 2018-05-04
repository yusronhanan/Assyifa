  <?php if ($this->session->userdata('role') != 'user') { ?>
  <script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
  <?php } ?>
   <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo base_url() ?>assets/img/about-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Ta'aruf</h1>
              <span class="subheading">Tak kenal, maka ta'aruf</span>
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
              if ($this->session->userdata('logged_in') == true && $this->session->userdata('role') != 'user') {
               ?>
            <p class="tag-post float-right" style="margin-bottom: 10px">
            <a href="#" data-toggle="modal" title="Edit Deskripsi Pesantren" data-target="#editAboutusText"><i class="fa fa-pencil"></i></a>
           
            </p> <?php } ?>
          <?php echo $aboutus_text ?>
          
          <div class="map-responsive">
    <iframe src="<?php echo $aboutus_maps ?>" width="700" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>
        <?php  if ($this->session->userdata('logged_in') == true && $this->session->userdata('role') != 'user') {
               ?> ?>
                <p class="tag-post pull-right">
            
               <a href="#" data-toggle="modal" title="Edit Google Maps Embed" data-target="#editAboutusMaps"><i class="fa fa-pencil"></i></a>
             </p>
               <div class="modal fade" id="editAboutusMaps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Google Maps</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>posting/edit_aboutus" method="post">
                                        <div class="modal-body">
                                            Google Maps Code
                                            <input type="text" name="aboutus_maps" placeholder="Link Embed Google Maps" class="form-control"  required value="<?php echo $aboutus_maps ?>">
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

                            <div class="modal fade" id="editAboutusText" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Deskripsi</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>posting/edit_aboutus" method="post">
                                        <div class="modal-body">
                                           
                                            
              <div class="form-group">
                <label> Deskripsi Tentang Pesantren</label>
                <textarea rows="5" name="aboutus_text" class="ckeditor" id="ckeditor" id="message" required data-validation-required-message="Please enter a description."><?php echo $aboutus_text ?></textarea>

                <p class="help-block text-danger"></p>
              </div>
               </div>
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
               <?php } ?>
        </div>
      </div>
    </div>
