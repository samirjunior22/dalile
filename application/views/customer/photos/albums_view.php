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
	bottom:0px;
}

.pricetext {
	font-weight:bold;
	font-size:1.4em;
	bottom:0px;
}
 </style>
 <div class="content-wrapper">
  <section class="content"> 
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo site_url('/admin/photos/create_album');?>" class="btn btn-primary">Ajouter Album</a> 
        </div>
    </div>
    <div class="row">
  <div class="col-lg-12" style="margin-top: 10px;">
  
    <div id=' '> 
	 <div id='gallerys'>
	 <h3> </h3>
	 <?php foreach ($album as $albums) {?> 
			
			<div class="col-md-2 column productbox" style="height: 240px;">
               
			<a href="<?php echo base_url('/admin/photos/index/'.$albums['id']) ; ?>">
				<div style='display:inline-block;'>
					<img src="<?php echo base_url('galery/images/icons/photo.png');  ?>" title="la veglia al vegliardo" style="height:100px;wight:150px;">
				</div>
			</a>
              <div class="producttitle"><?php echo $albums['album']  ?></div>
              <div class="productprice"><div class="pull-right" > <a  data-toggle="modal" data-target="#removeModal" class="btn btn-danger btn-sm" role="button"> <i class="fa fa-trash"></i></a></div><div class="pricetext"><?php echo date('Y-m-d',$albums['date_add']) ?></div> </div>
          </div>
		 
	  <?php  } ?>
	  
 </div>
 <br>
 
	</div>
	
	 
        
    </div>
 <div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Supprimer Album</h4>
      </div>

      <form role="form" action="<?php echo site_url('/admin/photos/remove_album/'.$albums['id']);?>" method="post" id="removeForm">
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
 
 $(document).ready(function() {
    $("#managePhotos").addClass('active');
    $("#mainPhoto").addClass('active'); 
  });
  </script>
 