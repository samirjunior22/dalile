<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
 <style>
 
 .productbox {
    background-color:#ffffff;
	padding:10px;
	margin-bottom:10px;
	-webkit-box-shadow: 0 8px 6px -6px  #999;
	   -moz-box-shadow: 0 8px 6px -6px  #999;
	        box-shadow: 0 8px 6px -6px #999;
}

.producttitle {
    font-weight:bold;
	padding:5px 0 5px 0;
}

.productprice {
	border-top:1px solid #dadada;
	padding-top:5px;
}

.pricetext {
	font-weight:bold;
	font-size:1.4em;
}
 </style>
 <div class="content-wrapper">
  <section class="content">
 
     <div class="box">
        <div class="box-header with-border">
             <h3 class="box-title"><?php echo $album['album']; ?></h3>
               <div class="box-tools pull-right">
                     <a href="<?php echo site_url('admin/photos/create_view/'.$album['id']);?>" class="btn btn-primary">Ajouter Photos</a> 
                     <a href="<?php echo site_url('admin/photos/albums/');?>" class="btn btn-primary">Albums</a> 
                </div>
        </div>  
     
    
 <div class="box-body">
 <div id="messages"></div>
  <div class="col-lg-12" style="margin-top: 10px;">
  
    <div id='wrap'> 
	
	 <div id='gallery'>
	  <?php foreach ($photos as $photo) {?> 
			
			<div class="col-md-2 column productbox">
               
			<a href="<?php echo base_url(''.$photo["photo"].'');  ?>">
				<div style='display:inline-block;'>
					<img src="<?php echo base_url(''.$photo["photo"].'');  ?>" title="la veglia al vegliardo" style="height:100px;wight:150px;">
				</div>
			</a>
       <div class="productprice">
	      <div >
		   <button data-toggle="modal" data-target="#removeModal" onclick="removeFunc(<?php echo $photo["id"] ?>)" class="btn btn-danger btn-sm" role="button"> <i class="fa fa-trash"></i></button>
		  </div>
	   </div>
          </div>
		 
	  <?php  } ?>
			
		</div>
		
		
		<br>
 
	</div>
	
 
       </div>
     </div>
   </div>
   
     <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"> Text
                <small> </small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div> 
			  
   <form role="form"  method="post"  action="<?php echo base_url('admin/photos/update_album') ?>" id="Form" enctype="multipart/form-data">
       <div class="box-body pad">  
          <div class="nav-tabs-custom">
	        <br>
  <input name="add_by" type="text" value ="<?php echo $user->id ?>" placeholder=" <?php echo $user->id ?>" hidden>
  <input name="album_id" type="text" value ="<?php echo $album['id']; ?>" hidden>
			 <br>
		 <div class="row">
	        <div class="col-md-12">	
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"> عربية</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"> Français </a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"> Englais</a></li>
           
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
		
              <div class="tab-pane active" id="tab_1">
               <div class="box box-info">
                    <div class="box-header">
				      <div class="form-group">
                             <label for="exampleInputEmail1" class="pull-right"> العنوان</label> 
				 <input class="form-control input-lg" name="title_ar" type="text"  placeholder=" العنوان " value="   <?php echo $album['description']; ?>"  dir="rtl">
                      </div>
					     <br>
                       <div class="form-group">  
                       <textarea type="text" class="form-control" id="editor_ar" name="editor_ar" rows="10" cols="80" autocomplete="off">
					     <?php echo $album['content_ar']; ?>
                       </textarea> 
					    </div>
                   </div>
                 </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
			    <div class="box box-info">
                   <div class="box-header">
				         <div class="box-header with-border">
                           <h3 class="box-title"> Titre</h3>
                         </div>
				      <div class="form-group"> 
                       <input class="form-control input-lg" name="title_fr" type="text" placeholder="Entrer  Titre " value="<?php echo $album['description_fr']; ?>" >
                      </div>
					    <br>
                       <div class="form-group"> 
                       <textarea type="text" class="form-control" id="editor_fr" name="editor_fr" rows="10" cols="80" autocomplete="off">
                         <?php echo $album['content_fr']; ?>
					 </textarea> 
					 
					    </div>
                   </div>
                 </div>  
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
			    <div class="box box-info">
                   <div class="box-header">
				         <div class="box-header with-border">
                           <h3 class="box-title"> Title</h3>
                         </div>
				      <div class="form-group"> 
                     <input class="form-control input-lg" name="title_en" type="text" placeholder=" write Title " value="<?php echo $album['description_en']; ?>">
                      </div>
					    <br>
                       <div class="form-group"> 
					   
                      <textarea type="text" class="form-control" id="editor_en" name="editor_en" rows="10" cols="80" autocomplete="off">
					      <?php echo $album['content_en']; ?>
                      </textarea> 

					 </div>
                   </div>
                 </div>  
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content --> 
		</div></div>
      </div> 
	 </div>	
	   
	      <div  class="box box-footer">
	       <button type="submit" class="btn btn-primary">Sauvgarder</button>
	       <a href="<?php echo base_url('admin/photos/') ?>" class="btn btn-warning">Annuler</a>
	     </div>
      </form>
	  </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Supprimer Photo</h4>
      </div>

      <form role="form" action="<?php echo site_url('/admin/photos/remove_photo');?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>Voulez-vous vraiment supprimer?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">OUI</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  </section>
  </div>
 <script>
   $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor_ar')
	 CKEDITOR.replace('editor_fr')
	  CKEDITOR.replace('editor_en')   
  })
		function callback(a){
			console.log('loaded gallery 1', a);
		}
		function callback2(a){
			console.log('loaded gallery 2', a);
		}
		//$('a').photobox({ thumbs:true });
		$('#gallery').photobox('a', { thumbs:false, time:0, history:false, beforeShow:callback });
		$('#gallery2').photobox('div > a', { thumbs:true, history:false }, callback2);
		$('#gallery3').photobox('a', { thumbs:true, history:false, thumb:'+ img' });

		// testing for gallery observers on DOM changes
		var imageLink = $('#gallery a:first');
		$('#addImage').on('click',function(){
			$('#gallery2 > div').append( imageLink.clone() );
		});

		$('#removeImage').on('click',function(){
			$('#gallery2 a:last').remove();
		});
		
 function removeFunc(id)  
{
  if(id) {
    $("#removeForm").on('submit', function() {

      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: {id : id }, 
        dataType: 'json',
        success:function(response) {
			
            if(response.success === true) {
			   $("#removeModal").modal('hide');
				location.reload();
				
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
           

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
	</script>
 