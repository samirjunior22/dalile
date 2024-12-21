 <style> 
/* image thumbnail */
.thumb {
    display: block;
	width: 100%;
	margin: 0;
}

/* Style to article Author */
.by-author {
	font-style: italic;
	line-height: 1.3;
	color: #aab6aa;
}

/* Main Article [Module]
-------------------------------------
* Featured Article Thumbnail
* have a image and a text title.
*/
.featured-article {
	width: 482px;
	height: 350px;
	position: relative;
	margin-bottom: 1em;
}

.featured-article .block-title {
	/* Position & Box Model */
	position: absolute;
	bottom: 0;
	left: 0;
	z-index: 1;
	/* background */
	background: rgba(0,0,0,0.7);
	/* Width/Height */
	padding: .5em;
	width: 100%;
	/* Text color */
	color: #fff;
}

.featured-article .block-title h2 {
	margin: 0;
}

/* Featured Articles List [BS3]
--------------------------------------------
* show the last 3 articles post
*/

.main-list {
	padding-left: .5em;
}

.main-list .media {
	padding-bottom: 1.1em;
	border-bottom: 1px solid #38ccff;
}

  .modal-full-height { 
  width: 60%; 
  max-width: 100%; 
  min-height: 0;
 
   height: auto;
   bottom: auto; 
 
	}
	
	.box{
    padding: 5px;
 
    overflow: hidden;
    position: relative;
}
.box:before{
    content: "";
    width: 140px;
    height: 140px;
    border-width: 0 0 5px 5px;
    border-style: solid;
    border-color: #38ccff;
    position: absolute;
    bottom: 0;
    left: 1px;
}
.box:after{
    content: "";
    width: 206px;
    height: 206px;
    border-width: 5px 5px 0 0;
    border-style: solid;
    border-color: #38ccff;
    position: absolute;
    top: 0;
    left: auto;
    right: 0;
}
.box img{
    width: 100%;
    height: auto;
}
 
.box .box-content{
    opacity: 1;
    transform: translateY(0);
}
.box-content .title{
    font-size: 25px;
    font-weight: 600;
    color: #fff;
    margin: 0 0 5px 0;
}
.box-content .post{
    display: inline-block;
    font-size: 15px;
    color: #fff;
    text-transform: capitalize;
}
@media only screen and (max-width:990px){
    .box{ margin-bottom: 30px; }
}
 </style> 
	<!-- Content -->
	<div class="dashboard-content">
		<!-- Titlebar -->
	 
			<div class="row">
				<div class="col-md-12">
					<h2>Album   : <?php echo $listing['Title']?></h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li> Photos</li>
						</ul>
					</nav>
				</div>
			</div>	
			  <div id="messages"></div>

      <div id="messages"></div>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('errors')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('errors'); ?>
          </div>
        <?php endif; ?>
				
			<div class="row">
			<div class="dashboard-info-box">
              <div class="col-md-12">			
			   <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                  <button type="button" data-target="#add" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-picture-o"></i> ajouter photo</button>
                  <button type="button" class="btn btn-default btn-sm" onclick='location.reload(true); return false;'><i class="fa fa-refresh"></i> Reload</button>
                  </div>
                <!-- /.pull-right -->
              </div>
              </div>
			</div>	
		 </div>	
	   <div class="row">
              <div class="dashboard-info-box">		
			 
              
              </div>
			</div>				
		<div class="row">
		<div class="col-lg-12 col-md-12">
			 
			  <div class="row">
			   <?php foreach ($results as $result) {?> 
 
       <div class="col-md-4 col-sm-6">
            <div class="box">
                <img src="<?php echo base_url('assets/images/product_image/'.$result['photo']); ?>">
                <div class="box-content">
                   <button onclick="removeFunc(<?php echo $result['id'] ?>)"  class="post btn-danger btn-sml" data-target="#removeModal" data-toggle="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                   <button onclick="editFunc(<?php echo $result['id'] ?>)"  class="post btn-success btn-sml" data-target="#update" data-toggle="modal"><i class="fa fa-edit" aria-hidden="true"></i></button>
                </div>
				 
            </div>
			    
        </div>
  
  
   <?php  } ?>
  
       </div>
 
			</div>
			</div>
    </div>
	<!-- Content / End -->
</div>
</div> 
 
<div class="modal fade" tabindex="-1" role="dialog" id="add">
  <div class="modal-dialog modal-full-height" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> ajouter Photos</h4>
      </div>
        <form role="form"  method="post" action="<?php echo base_url('customer/Gallery/insertPhoto/'.$listing['id']) ?>"  enctype="multipart/form-data">
             <div class="form-group">
                 <label for="image">Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="image_tag" name="image_tag[]" type="file" multiple />
                       </div>
                  </div>
               </div>
			   <div class="form-group">
                      <input id="prix" name="price" type="text"  placeholder="Prix"   />
				 </div>
			   </br>
			      <div class="form-group   ">
                      <button type="submit" class="btn btn-primary">Sauvegarder</button>
					 <a href="<?php echo base_url('admin/Photos/albums') ?>" class="btn btn-warning">Annuler</a>
				 </div>
           </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="update">
  <div class="modal-dialog modal-full-height" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> ajouter Photos</h4>
      </div>
        <form role="form"  method="post" action="<?php echo base_url('customer/Gallery/update_photo/'.$listing['id']) ?>"  enctype="multipart/form-data">
             <div class="form-group">
                 <label for="image">Image</label>
                  <div class="kv-avatar">
				    <div class="file-loading">
                          <input id="image_tag_update" name="image_tag_update" type="file"  />
                       </div>
                  </div>
               </div>
			   <div class="form-group">
                      <input id="price" name="price" type="text"  placeholder="Prix"   />
                      <input id="id_photo" name="id_photo" type="hidden"     />
				 </div>
			   </br>
			      <div class="form-group   ">
                      <button type="submit" class="btn btn-primary">Sauvegarder</button>
					 <a href="<?php echo base_url('admin/Photos/albums') ?>" class="btn btn-warning">Annuler</a>
				 </div>
           </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <div class="modal fade" tabindex="1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">supprimer Photo</h4>
      </div>

      <form role="form" action="<?php echo base_url('customer/Gallery/remove') ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>vouler vous supprimer ? </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">supprimer</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <script type="text/javascript">
  var URL = '<?php echo base_url('assets/images/product_image') ?>' ;
	   $("#Gere").addClass('act');
	   $("#Gallery").addClass('open');
	   $("#Gallery").addClass('active');
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
    $("#image_tag").fileinput({
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
	   $("#image_tag_update").fileinput({
        overwriteInitial: true,  
        showClose: true,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors',
      defaultPreviewContent: '<img id="photo" src="" alt=" Avatar">',
        msgErrorClass: 'alert alert-block alert-danger',
         layoutTemplates: {main2: '{preview}  {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif","mp4"]
   
	});
 function removeFunc(id)
  {
  if(id) {
    $("#removeForm").on('submit', function() {
      var form = $(this);
 
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: {photo_id:id }, 
        dataType: 'json',
        success:function(response) {
        if(response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeModal").modal('hide');
            location.reload();
          } else {

            $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
            '</div>'); 
          }
        }
      }); 

      return false;
    });
  }
}   
function editFunc(id)
{ 
  $.ajax({
    url: '/customer/Gallery/fetchPhotos/'+id,
    type: 'post',
    dataType: 'json',
    success:function(response) {

      $("#photo").attr("src", URL+'/'+response.photo);
      $("#price").val(response.alt);
      $("#id_photo").val(response.id);

      // submit the edit from 
      $("#updateForm").unbind('submit').bind('submit', function() {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action') + '/' + id,
          type: form.attr('method'),
          data: form.serialize(), // /converting the form data into array and sending it to server
          dataType: 'json',
          success:function(response) {

            manageTable.ajax.reload(null, false); 

            if(response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');


              // hide the modal
              $("#editModal").modal('hide');
              // reset the form 
              $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

            } else {

              if(response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#"+index);

                  id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');
                  
                  id.after(value);

                });
              } else {
                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                '</div>');
              }
            }
          }
        }); 

        return false;
      });

    }
  });
} 
 </script>