<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
 <div class="content-wrapper">
  <section class="content"> 
      <div class="box">
		  
		   <div class="box-body pad">  
            <h1>Télécharger l'image sélectionnée</h1>
		 <form role="form"  method="post" action="<?php echo base_url('admin/Photos/create') ?>"  enctype="multipart/form-data">
             <div class="form-group">
                 <label for="image">Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image_tag" name="product_image_tag[]" type="file" multiple />
                          <input id="album" name="album" value="<?php echo $album ;?>"   />
                      </div>
                  </div>
            </div>
			  <input id="album" name="album" value="<?php echo $album ;?>"  hidden />
			   </br>
			      <div class="form-group   ">
                      <button type="submit" class="btn btn-primary">Sauvegarder</button>
					 <a href="<?php echo base_url('admin/Photos/albums') ?>" class="btn btn-warning">Annuler</a>
				 </div>
           </form>
		    
		 
        </div> 
		</div>
	 </section>
    </div>
 

<script type="text/javascript">
 
    $("#managePhotos").addClass('active');
    $("#AddPhoto").addClass('active');
  
   var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
    $("#product_image_tag").fileinput({
        overwriteInitial: true,  
        showClose: true,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors',
        msgErrorClass: 'alert alert-block alert-danger',
          // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview}  {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif","mp4"]
   
	});
 
 
</script>