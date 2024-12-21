<link href="<?php echo base_url();?>assets/css/bootstrap-tagsinput.css" rel="stylesheet">
	<!-- Content -->
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Posts</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>ajouter Post</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
			
		<?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>
      <div id="messages"></div>
        <div class="row">
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<form method="post" action="<?=base_url('customer/blogs/addBlog'); ?>" enctype="multipart/form-data" > 
                     <div class="add_listing_info">
						   <div class="form-group"> 
				                <h3>sélectionner  photo</h3>
				                  <label for="image">Images  </label>
                                   <div class="kv-avatar">
                               <div class="file-loading">
                                 <input id="image" name="image" type="file" >
                                 </div>
                              </div>
                         </div>
					  </div> 
				 	  
					  <div class="add_listing_info">
                            <h3>  Informations</h3>				
                            <div class="form-group">
                                    <label class="label-title">Titre de post</label>
                                    <input type="text" name="title" class="form-control" required>
                             </div>
                             <div class="form-group">
                                <label class="label-title">Contenu</label>
                                <textarea name="content"  class="form-control" required></textarea>
                            </div>  
							<div class="form-group">
                                <label class="label-title">Tags</label>
                      <input type="text" name="tags" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" /> 
                           </div>         
                        </div> 
				 
                        <div class="add_listing_info">
                            <input type="submit" value="Soumettre" class="btn">
                        </div>   



				</form>
				 
				 
			</div>
			
			 
		</div>
        
	</div>
	<!-- Content / End -->
</div>
</div> 

 <div class="modal fade" tabindex="1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Listings</h4>
      </div>

      <form role="form" action="<?php echo base_url('customer/bookmarks/romoveFavoris') ?>" method="post" id="removeFavoris">
        <div class="modal-body">
          <p>vouler vous supprimer ? </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  <script src="<?php echo base_url();?>assets/js/bootstrap-tagsinput.js"></script> 
  <script type="text/javascript">
	  $("#posts").addClass('active');
	  
    $("#image").fileinput({
        overwriteInitial: true,
        showClose: true,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
          // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview}  {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });    
 </script>
 
 <script type="text/javascript">
 tagClass: function(item) {
  return 'label label-info';
},
focusClass: 'focus',
itemValue: function(item) {
  return item ? item.toString() : item;
},
itemText: function(item) {
  return this.itemValue(item);
},
itemTitle: function(item) {
  return null;
},
freeInput: true,
addOnBlur: true,
maxTags: undefined,
maxChars: undefined,
confirmKeys: [13, 44],
delimiter: ',',
delimiterRegex: null,
cancelConfirmKeysOnEmpty: false,
onTagExists: function(item, $tag) {
  $tag.hide().fadeIn();
},
trimValue: false,
allowDuplicates: false,
triggerChange: true
  
</script>