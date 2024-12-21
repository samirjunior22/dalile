 	 <link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/labs.css">
     <link rel="stylesheet" href="<?php echo site_url('assets/filter-master/');?>css/masonry.css">
  <link rel="stylesheet" href="<?=base_url('assets/css/dist/simpleLightbox.min.css') ;?>">
  <script src="<?=base_url('assets/css/dist/simpleLightbox.min.js') ;?>"></script>
<style>
  .modal-full-height { 
  width: 100%; 
  max-width: 100%; 
  min-height: 0;
  top: 130px;
   height: auto;
 bottom: auto; 
     position: absolute;
     margin: 0;
    right: 0;
	}
   
    .imageGallery1 > a {

        float: left; width: 33.3333%; padding: 1px; box-sizing: border-box; position: relative;

    }

    .imageGallery1 > a:first-child { left: -1px; }
    .imageGallery1 > a:last-child { right: -1px; }

    .imageGallery1 > a > img {

        display: block; width: 100%;

    }
 
</style>


<style>
 
 @import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700);
/* written by riliwan balogun http://www.facebook.com/riliwan.rabo*/
.board{
 
margin:   auto;
min-height: 500px;
background: #fff;
/*box-shadow: 10px 10px #ccc,-10px 20px #ddd;*/
}
.board .nav-tabs {
    position: relative;
    /* border-bottom: 0; */
    /* width: 80%; */
    margin: 40px auto;
    margin-bottom: 0;
    box-sizing: border-box;

}

.board > div.board-inner{
    background: #fafafa url(https://subtlepatterns.com/patterns/geometry2.png);
    background-size: 30%;
}

p.narrow{
    width: 60%;
    margin: 10px auto;
}

.liner{
    height: 2px;
    background: #ddd;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    
}

span.round-tabs{
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: white;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}

span.round-tabs.one{
    color: rgb(34, 194, 34);border: 2px solid rgb(34, 194, 34);
}

li.active span.round-tabs.one{
    background: #fff !important;
    border: 2px solid #ddd;
    color: rgb(34, 194, 34);
}

span.round-tabs.two{
    color: #febe29;border: 2px solid #febe29;
}

li.active span.round-tabs.two{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #febe29;
}

span.round-tabs.three{
    color: #3e5e9a;border: 2px solid #3e5e9a;
}

li.active span.round-tabs.three{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #3e5e9a;
}

span.round-tabs.four{
    color: #f1685e;border: 2px solid #f1685e;
}

li.active span.round-tabs.four{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #f1685e;
}

span.round-tabs.five{
    color: #999;border: 2px solid #999;
}
span.round-tabs.six{
    color: #38ccff;border: 2px solid #999;
}
span.round-tabs.six {
    color: #38ccff;
    border: 2px solid #38ccff;
}

li.active span.round-tabs.five{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #999;
}

.nav-tabs > li.active > a span.round-tabs{
    background: #fafafa;
}
.nav-tabs > li {
    width: 16%;
}
/*li.active:before {
    content: " ";
    position: absolute;
    left: 45%;
    opacity:0;
    margin: 0 auto;
    bottom: -2px;
    border: 10px solid transparent;
    border-bottom-color: #fff;
    z-index: 1;
    transition:0.2s ease-in-out;
}*/
.nav-tabs > li:after {
    content: " ";
    position: absolute;
    left: 45%;
   opacity:0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #ddd;
    transition:0.1s ease-in-out;
    
}
.nav-tabs > li.active:after {
    content: " ";
    position: absolute;
    left: 45%;
   opacity:1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #ddd;
    
}
.nav-tabs > li a{
   width: 70px;
   height: 70px;
   margin: 20px auto;
   border-radius: 100%;
   padding: 0;
}
 

.tab-content{
}
.tab-pane{
   position: relative;
padding-top: 50px;
}
.tab-content .head{
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 25px;
    text-transform: uppercase;
    padding-bottom: 10px;
}
.btn-outline-rounded{
    padding: 10px 40px;
    margin: 20px 0;
    border: 2px solid transparent;
    border-radius: 25px;
}

.btn.green{
    background-color:#5cb85c;
    /*border: 2px solid #5cb85c;*/
    color: #ffffff;
}



@media( max-width : 585px ){
    
    .board {
width: 90%;
height:auto !important;
}
    span.round-tabs {
        font-size:16px;
width: 50px;
height: 50px;
line-height: 50px;
    }
    .tab-content .head{
        font-size:20px;
        }
    .nav-tabs > li a {
width: 50px;
height: 50px;
line-height:50px;
}

.nav-tabs > li.active:after {
content: " ";
position: absolute;
left: 35%;
}

.btn-outline-rounded {
    padding:12px 20px;
    }
}
ul li i, ol li i {
	
	margin: 0 0px 0 0;
}
 
.price{
  position: absolute;
  bottom: 8px;
  left: 16px;
  background-color: rgba(0, 0, 0, .8);
  font-size: 19px;
  font-weight: 600;
  line-height: 18px;
   padding: 4px;
  border: none;
  border-radius: 3px;
  box-sizing: content-box;
  color:#fff;
  -moz-osx-font-smoothing: grayscale;
  font-weight: normal;
  text-align: center;
  text-shadow: none;
}

</style>
<?php
if($this->session->userdata('v_user_id') != 0) {  
   $userid = $this->session->userdata('v_user_id') ; 
}else { 
	$userid = 0 ; 
}
 ?>
<section class="listing_detail_header" style="padding-top: 100px ; "  >
	<div class="container">
	<div class="col-md-6">
    		<h1><?php echo $listings['Title'] ; ?></h1>
            <p><?php echo $listings['Tag_Line'] ; ?></p>
        <div class="listing_rating">
                        <p><span class="review_score"><?php echo number_format($rating['rating'], 2).'/5'?></span> 
						<?php	for($i = 1; $i <= 5; $i++){
									if($i <= $rating['rating']){ ?>
							  <i class="fa fa-star active"></i>
									<?php } else { ?>
						   <i class="fa fa-star"></i> 
						<?php } } ?>
                           (<?=$rating['totals'].' Avis' ; ?>) </p>
 <?php if($userid != 0) {
 if(Checking_like($listings['id'] , $userid , 'type') != 0 ){
 echo '<p class="listing_like" ><a  class="jaime" value="0"><i  class="fa fa-heart-o thisLike"  style="color:white;background-color: #38ccff;" ></i><span id="ttljaime">'.$total_likes .' J\'aime</span></a></p>';  }else{
 echo '<p class="listing_like" ><a  class="jaime" value="1"><i  class="fa fa-heart-o thisLike"  ></i><span id="ttljaime">'.$total_likes .' J\'aime</span></a></p>'; }
 
 if(Checking_like($listings['id'] , $userid , 'Favoris') != 0 ){
 echo '<p class="listing_favorites" ><a class="favoris" value="0"><i class="fa fa-bookmark-o thisFav"  style="color:white;background-color: #38ccff;" ></i> Favoris</a></p>';  }else{
 echo '<p class="listing_favorites" ><a class="favoris" value="1"><i class="fa fa-bookmark-o thisFav"  ></i> Favoris</a></p>'; }
	

	}else {
  echo '<p class="listing_like" ><a style=" cursor: pointer;" onclick="al()"><i  class="fa fa-heart-o thisLike"  ></i><span id="ttljaime">'.$total_likes .' J\'aime</span></a></p>';							   
  echo '<p class="listing_favorites"><a h style=" cursor: pointer;" onclick="al()"><i class="fa fa-bookmark-o"></i> Favoris</a></p>';						   
						   }	   
						   ?>
              </div>  
			   <div class="widget_title">
                                <h6>Contact Info</h6>
                            </div>
                            <ul> <li><i class="fa fa-map-marker"></i> <?php echo $info['Address'] ; ?></li>
                                <li><i class="fa fa-phone"></i> <a href="tel:<?php echo $info['Phone'] ; ?>"> <?php echo $info['Phone'] ; ?></a></li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:contcat@example.com"> <?php echo $info['Email'] ; ?></a></li>
                                <li><i class="fa fa-link"></i> <a href="www.example.html"> </a></li>
                 </ul>
			  
	</div>
    <div class="col-md-6">
 <img  class="img-thumbnail" src="<?php echo base_url('assets/images/listings/'.$listings["photo"]) ; ?>" alt="image " /> 
  </div>
    </div>
</section>


<section style="background:#efefe9; ">
        <div class="container">
            <div class="row">
                <div class="board">
                   <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab">
                    <div class="liner"></div>
                     <li class="active">
                     <a href="#home" data-toggle="tab" title="A propos">
                      <span class="round-tabs one">
                              <i class="glyphicon glyphicon-home"></i>
                      </span> 
                  </a></li>

                  <li><a href="#profile" data-toggle="tab" title="Conatct Info">
                     <span class="round-tabs two">
                         <i class="glyphicon glyphicon-envelope"></i>
                     </span> 
                     </a>
                 </li>
                 <li><a href="#messages" data-toggle="tab" title="Gallery">
                     <span class="round-tabs three">

						  <i class="fa fa-photo"></i> 
                     </span> </a>
                     </li>

                     <li><a href="#settings" data-toggle="tab" title="Vue 360">
                         <span class="round-tabs four">
                             <i class="fa fa-street-view"></i>
                         </span> 
                     </a></li>
                     <li><a href="#review" data-toggle="tab" title="Commentaire">
                         <span class="round-tabs six">
                               <i class="fa fa-comments-o"></i>
                         </span> </a>
                     </li>
					 <li><a href="#doner" data-toggle="tab" title="Report">
                         <span class="round-tabs five">
                               <i class="fa fa-exclamation-triangle"></i>
                         </span> </a>
                     </li>
                     
                     </ul></div>

                     <div class="tab-content">
                      <div class="tab-pane fade in active" id="home">
                        <div class="panel-group" id="accordion" role="tablist" style="margin:15px;">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#description" aria-expanded="true" aria-controls="collapseOne">
                                 <i class="fa  fa-file-text-o"></i>A propos</a>
                                </a>
                              </h4>
                            </div>
                            <div id="description" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">
                             <p><?php echo $listings['Description']?>.</p>  </div>
                            </div>
                          </div>
                          
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#amenities" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-align-left"></i> Equipements</a>
                                  </h4>
                                </div>
                                <div id="amenities" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                  <div class="panel-body">
                                        <p><?php echo $listings['Amenities']?>.</p> 
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      <div class="tab-pane fade" id="profile">
			  <div class="ElemoListing_sidebar">
			  
                        <div class="row"  style="margin:15px;">
						  <div class="col-md-6">
                            <div class="widget_title">
                                <h6>Contact Info</h6>
                            </div>
                            <ul> <li><i class="fa fa-map-marker"></i> <?php echo $info['Address'] ; ?></li>
                                <li><i class="fa fa-phone"></i> <a href="tel:<?php echo $info['Phone'] ; ?>"> <?php echo $info['Phone'] ; ?></a></li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:contcat@example.com"> <?php echo $info['Email'] ; ?></a></li>
                                <li><i class="fa fa-link"></i> <a href="www.example.html"> </a></li>
                            </ul>
							 
							
                            <div class="social_links">
              <?php if($info['Facebook'] != null ) { ?> <a href="#" class="facebook_link"><i class="fa fa-facebook-f"></i></a> <?php } ?>
              <?php if($info['Linkdin'] != null ) { ?> <a href="#" class="linkedin_link"><i class="fa fa-linkedin"></i></a><?php } ?>
              <?php if($info['Twitter'] != null ) { ?> <a href="#" class="twitter_link"><i class="fa fa-twitter"></i></a><?php } ?>
              <?php if($info['Google'] != null ) { ?> <a href="#" class="google_plus_link"><i class="fa fa-google-plus"></i></a><?php } ?>
                            </div>
				          </div>
                       
                        <div class="sidebar_wrap col-md-6">
                            <div class="widget_title">
                                <h4>Regarder la vidéo</h4>
                            </div>
                            
				              <div class="listing_video">
	                          <iframe width="420" height="315" src="https://www.youtube.com/embed/<?php echo $listings['Video_URL'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			                  </div>
                         
                        </div>
						
						
                    </div>
                </div>
					    </div>
                      <div class="tab-pane fade" id="messages">
                           <div class="container" >
  <div class="imageGallery1">
	     <div class="row masonry bordered"> 
	 	    <?php foreach ($allPhoto as $image) {?>
			  <div class="brick" style="  position: relative;">
                    <div class="price"><?php echo  $image['alt'] ; ?> Dzd</div>
					<a href="<?php echo base_url('/assets/images/product_image/'.$image['photo']) ; ?>" >
					 <img  class="img-thumbnail" src="<?php echo base_url('/assets/images/product_image/'.$image['photo']) ; ?>" alt="image " /></a>
	              </div>
			   <?php } ?>  
         </div> 
    <script>
       $('.imageGallery1 a').simpleLightbox();
   </script>
  
      </div>
    </div>
						  
                      </div>
                      <div class="tab-pane fade" id="settings">
					       <div class="row">
						     <div class="col-md-6 ">
						  
							    <div class="vue">
							<?php if($listings['vue_360'] != null){ ?>	
                                 <iframe src="<?php echo $listings['vue_360']?>" height="450" width="100%" ></iframe> 
						    <?php } ?>
						         </div>
							</div>
						    <div class="col-md-6 ">
                             <div id="map" style="height:450px;" width="50%">
                               <div id="map" >
                               </div>
                             </div> 
							 </div>
							   
                          	</div> 
                         </div>
                       <div class="tab-pane fade" id="doner">
                            <div class="text-center">
                             <i class="img-intro icon-checkmark-circle"></i>
                          </div>
                           <h3 class="head text-center">Signaler cette annonce </h3>
                               <p class="narrow text-center">
                                 Veuillez indiquer quel problème a été trouvé!
                                </p>
								 <p class="text-center">
                                    <a data-toggle="modal" data-target="#report_modal" class=" menu btn btn-success btn-outline-rounded green"> Signaler <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                                 </p>
                         </div>
						 

						 <div class="tab-pane fade" id="review">
                            <div class="text-center">
                             <i class="img-intro icon-checkmark-circle"></i>
                           </div>
						   
						   
                          <div class="reviews_list" style="margin:15px;">
                            <div class="widget_title">
							<div class="pglist-p3 pglist-bg pglist-p-com" id="ld-rer">
							<div class="pglist-p-com-ti">
								<h3><span>Critiques</span>  d'utilisateurs</h3> </div>
							<div class="list-pg-inn-sp">
								<div class="lp-ur-all">
									<div class="lp-ur-all-left">
										<div class="lp-ur-all-left-1">
											<div class="lp-ur-all-left-11">Excellent</div>
											<div class="lp-ur-all-left-12">
												<div class="lp-ur-all-left-13"></div>
											</div>
										</div>
										<div class="lp-ur-all-left-1">
											<div class="lp-ur-all-left-11">Good</div>
											<div class="lp-ur-all-left-12">
												<div class="lp-ur-all-left-13 lp-ur-all-left-Good"></div>
											</div>
										</div>
									 
									 
									</div>
									<div class="lp-ur-all-right">
										<h5>NOTE GLOBALE</h5>
	  <p><span><?php echo number_format($rating['rating'], 2)?><i class="fa fa-star" aria-hidden="true"></i></span> <?php if($rating['totals']>0){echo 'Basé sur '.$rating['totals'].' Avis';}?> </p>
									</div>
								</div>
								<div class="lp-ur-all-rat">
									<h5 id="Review_User">Commentaire</h5>
									<ul id="ajax_table"> 
									 <?=$comments ; ?>	
					  	            </ul>
									<?php if( $rating['totals'] > 0) { ?>	
                          <a class="load-more">Voir plus de commentaires</a> 
                          <input type="hidden" id="row" value="0">
                          <input type="hidden" id="allrating" value="<?php echo $rating['totals'] ?>	">
					      <input type="hidden" id="listing" value="<?php echo $listings['id'] ?>	">  
					 <?php }else { ?>

					<a>Soyez le premier à commenter </a>
					 <?php } ?>
								</div>
							</div>
						</div>
                               
                             </div>
							 
 <div class="review_wrap" id="writereview"> 
  <div class="row">
    <div class="col-sm-12 " id="logout">
        <div class="page-header">
            <h3 class="reviews">Commenter</h3>
          </div>
         <div class="comment-tabs">
                         
            <div class="tab-content" >
                <div class="tab-pane active" id="comments-logout">  
                     
                 <br> 
				 <?php 	if($this->session->userdata('v_user_id') == 0) { ?> 
					  <div class="col-md-12">
            	       <div class="pricing_wrap">
                	     <div class="pricing_header">
                       </div>
                          <div class="plan_info">
                    	    <h4>Connectez-vous pour poster votre avis<h4>
                             <p>Vous n'avez pas de compte?<a href="<?=base_url('register/pric'); ?>">Inscrivez-vous </a></p>
                    <a data-toggle="modal" data-target="#myModal"> <i class="fa fa-sign-in"></i> Se connecter</a>
                          </div>
                        </div>
                      </div>
						 
					  <?php }else {?>	
                   <form id="formComment" method="post" class="form-horizontal"  > 
					  <div class="form-group">
                            	<label class="col-sm-2 control-label">Évaluation</label>
                                <div class="listing_rating col-sm-3">
								 <?php $i = 5 ; while($i > 0){ ?>
                                    <input class="rat" name="p_rating" id="rating-<?=$i ; ?>" value="<?=$i ; ?>" type="radio"  required>
                                    <label for="rating-<?=$i ; ?>" class="fa fa-star"></label> 
								 <?php $i-- ; } ?> 
                                </div>
                            </div> 
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Commentaire</label>
                            <div class="col-sm-10">
							 <textarea name="Review" cols="" rows="" class="form-control" placeholder="Votre commentaire..." required></textarea>
                            </div>
                        </div> 
						 <input name="Email" value="<?php echo  $this->session->userdata('v_user_id') ?>" type="hidden" placeholder=" Email" class="form-control"  >
						 <input name="listing_id" type="hidden" value="<?php echo $listings['id']?>" class="form-control" >
                             
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">                    
                          <button class="btn btn-success btn-circle text-uppercase" type="submit"  id="submitComment"><span class="glyphicon glyphicon-send"></span>envoyer</button>
                            </div>
                        </div>            
                     </form>
					 <?php } ?> 
					 
                </div> 
            </div>
        </div>
	</div>
  </div>
 </div> 
</div>

                         </div>
                        
						
						<div class="clearfix"></div>
                         </div>

       </div>
    </div>
  </div>
</section>


<script>

$(function(){
$('a[title]').tooltip();
});

</script>

<script>
     $(document).ready(function(){
		 
    var rowperpage = 3;  
    // Load more COMMENTAIRES
    $('.load-more').click(function(){ 
	    var row = Number($('#row').val());
        var allcount =  $('#allrating').val() ;
        var listing =  $('#listing').val() ;
        row = row + rowperpage; 
		loadMoreComment (row ,listing  ,allcount) ; 
    }); 
	function loadMoreComment (row ,listing  ,allcount) {
	if(row <= allcount){
            $("#row").val(row); 
            $.ajax({
                url: '<?=base_url('Listing_detail/loadReview'); ?>',
                type: 'post',
                data: {row:row , listings:listing},
                beforeSend:function(){
                    $(".load-more").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
                       
						 $("#ajax_table").append(response).show().fadeIn("slow");
						 
						 scroll();
                         var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){
 
                            // Change the text and background
                            $('.load-more').text("cacher");
                            
                        }else{
                            $(".load-more").text("Voir plus de commentaires");
                        }
                    }, 2000);

                },
			error: function(resultat, statut, erreur){
				
			alert("Hello! I am an alert box!!");
				
			}
            });
        }else{
            $('.load-more').text("Loading...");

            // Setting little delay while removing contents
            setTimeout(function() {
               
                // When row is greater than allcount then remove all class='post' element after 3 element
                $('.formComment:nth-child(3)').nextAll('.formComment').remove();
               scroll();
                // Reset the value of row
                $("#row").val(0);

                // Change the text and background
                $('.load-more').text("Load more");
                $('.load-more').css("background","#15a9ce");
                
            }, 2000); 
        } 
		
	 }
	
	var scroll  = function(){
        $('html, body').animate({
            scrollTop: $('.formComment:last').offset().top
        }, 500);
    }; 
	 
	// login 
	 var frm = $('#formLogin');
         frm.submit(function(e){
		 var pageURL = $(location).attr("href");
             
		   $.ajax({
                type: 'post',
                 url: '<?=base_url('login/login'); ?>',
                 data: frm.serialize(),
				 dataType : "JSON",
				 success:function(response){
					 if (response.success == true) {
					  
                     window.location.replace(pageURL);
					  } else { 
						 $('#error').html("<div id='message'></div>");
						 $('#error').addClass("alert").delay(1000).fadeOut(1000);
						 $("#formLogin")[0].reset();
                         $('#message').html("<span>"+response.messages+"</span>") 
					  } 
                },
                error: function(data) {
                    $('#error').html("<div id='errorMessage'></div>");
                    $('#errorMessage').html("<h3>"+response.messages+"</h3>")
                    .delay(2000).fadeOut(2000);
                } 
            }); 
            e.preventDefault();
        }); 
		

var frmc = $('#formComment');
    frmc.submit(function(e){
     $.ajax({
         type: 'post',
         url: '<?=base_url('Listing_detail/addRating'); ?>',
         data: frmc.serialize(),
		 dataType : "JSON",
	     success:function(response){
		 if (response.success == true) { 
            $.ajax({
            url: '<?=base_url('Listing_detail/getOneReview'); ?>',
            type: 'post',
            data: {review:response.messages},
            success: function(response){
				
                   $("#ajax_table").append(response).show().fadeIn("slow");
				   scrolltop();
 				   frmc[0].reset();
				  
                },
			error: function(resultat, statut, erreur){
				
			    alert("Ops !! reload the page .");
			 
			 }
            });
		  } else { 
			  $('#error').html("<div id='message'></div>");
			  $('#error').addClass("alert").delay(1000).fadeOut(1000);
			  $("#form1")[0].reset();
               $('#message').html("<span>"+response.messages+"</span>") 
			  } 
            },
           error: function(data) {
                 $('#error').html("<div id='errorMessage'></div>");
                 $('#errorMessage').html("<h3>"+response.messages+"</h3>")
                 .delay(2000).fadeOut(2000);
                } 
            }); 
            e.preventDefault();
        });

    var scrolltop = function(){
        $('html, body').animate({
            scrollTop: $('.formComment:first').offset().top
        }, 500);
    };  
	
}); 

 
 
$('textarea').keydown(function(e) {
   

	 var id = this.id;
	 var split_id = id.split("_");
     var text = split_id[0];
     var postid = split_id[1]; 
	 var message = $("#Te_"+postid).val();
	 if (event.keyCode == 13  && !e.shiftKey ) {
if (message == "") {
alert("Enter Some Text In Textarea");
} else {
	
	
	 var formc = $('#formReply'+postid);
     $.ajax({
         type: 'post',
         url: '<?=base_url('Listing_detail/addRating'); ?>',
         data: formc.serialize(),
		 dataType : "JSON",
	     success:function(response){
		 if (response.success == true) {
		 $.ajax({
            url: '<?=base_url('Listing_detail/getOneChild'); ?>',
            type: 'post',
            data: {review:response.messages},
            success: function(response){
				
                $('#replyco'+postid).prepend(response).show().fadeIn("slow"); 
				     scrollcom();
					$('textarea').val('');
 				   },
			error: function(resultat, statut, erreur){
				
			    alert("Ops !! reload the page .");
			 
			 }
            });			  
			   
		  } else { 
			  $('#error').html("<div id='message'></div>");
			  $('#error').addClass("alert").delay(1000).fadeOut(1000);
			   
               $('#message').html("<span>"+response.messages+"</span>") 
			  } 
            },
           error: function(data) {
                 $('#error').html("<div id='errorMessage'></div>");
                 $('#errorMessage').html("<h3>"+response.messages+"</h3>")
                 .delay(2000).fadeOut(2000);
                } 
            });
	      formc[0].reset();
		  return false ;
         }
$("textarea").val('');
return false;
}		 
     }); 
	 
	  var scrollcom = function(){
        $('html, body').animate({
            scrollTop: $('#com'+postid).offset().top
        }, 500);
    }; 
 
 
</script>

<script>
$(document).ready(function(){

    // like and unlike click
    $(".like, .unlike").click(function(){
        var id = this.id;   // Getting Button id
        var split_id = id.split("_");

        var text = split_id[0];
        var postid = split_id[1];  // postid

        // Finding click type
        var type = 0;
        if (text == "like"){
            type = 1;
        }else{
            type = 2;
        }
		var userid = $(".like").attr('rat'); 

        // AJAX Request
        $.ajax({
            url: '<?php echo base_url('listing_detail/likeunlike/1')?>',
            type: 'post',
            data: {postid:postid,type:type , userid:userid },
            dataType: 'json',
            success: function(data){
                var likes = data['likes'];
                var unlikes = data['unlikes'];

                $("#spanl"+postid).text(likes);        // setting likes
                $("#spanu"+postid).text(unlikes);    // setting unlikes

                if(type == 1){
                    $("#like_"+postid).css("color","#38ccff");
					$("#unlike_"+postid).css("color","#888");
                    $("#spanl"+postid).css("color","#38ccff");
                    $("#spanu"+postid).css("color","#888"); 
                }

                if(type == 2){
                    $("#unlike_"+postid).css("color","#38ccff");
					$("#like_"+postid).css("color","#888");
                    $("#spanu"+postid).css("color","#38ccff");
                    $("#spanl"+postid).css("color","#888");
                } 
              
            }
        });

    });
	
	
	 // like and unlike click
    $(".jaime").click(function(){ 
        var postid =  '<?php echo $listings['id'] ; ?>';
        var type =   $('.jaime').attr("value") ;
        var userid = ' <?php echo $userid ?>'; 
        // AJAX Request
        $.ajax({
            url: '<?php echo base_url('listing_detail/likeunlike/2')?>',
            type: 'post',
            data: {postid:postid,type:type , userid:userid },
            dataType: 'json',
            success: function(data){ 
				var likes = data['likes'];
                var typeU = data['type']; 
				$("#ttljaime").text(likes+' J\'aime '); 
				if (typeU == 1 ) { 
                $(".thisLike").css("color","white");
                $(".thisLike").css("background-color","#38ccff");
			    $(".jaime").attr("value", '0');
				$("#sp_"+postid).addClass("posLikefill");
                $("#sp_"+postid).attr("value", '0'); 
				  }   else {
				    $(".jaime").attr("value", '1');
				    $(".thisLike").removeAttr('style');
				    $("#sp_"+postid).removeClass("posLikefill");
                    $("#sp_"+postid).attr("value", '1');
				  }  
            }
        });

    });
	
	 // like and unlike click
    $(".favoris").click(function(){ 
        var postid =  '<?php echo $listings['id'] ; ?>';
        var type =   $('.favoris').attr("value") ;
        var userid = ' <?php echo $userid ?>'; 
        // AJAX Request
        $.ajax({
            url: '<?php echo base_url('listing_detail/likeunlike/3')?>',
            type: 'post',
            data: {postid:postid,type:type , userid:userid },
            dataType: 'json',
            success: function(data){ 
				var likes = data['likes'];
                var typeU = data['type']; 
			   if (typeU == 1 ) { 
                $(".thisFav").css("color","white");
                $(".thisFav").css("background-color","#38ccff");
			    $(".favoris").attr("value", '0');
				$("#spf_"+postid).addClass("posLikefill");
                $("#spf_"+postid).attr("value", '0'); 
				  }   else  {
				    $(".favoris").attr("value", '1');
				    $(".thisFav").removeAttr('style');
				    $("#spf_"+postid).removeClass("posLikefill");
                    $("#spf_"+postid).attr("value", '1');
				 } 
             }
        }); 
    }); 
}); 

 function like(id) {
	 // like and unlike click
        var postid = id;  // postid
         
        var type = $('#sp_'+id).attr("value") ;
        var userid = ' <?php echo $userid ?>';

        // AJAX Request
        $.ajax({
            url: '<?php echo base_url('listing_detail/likeunlike/2')?>',
            type: 'post',
            data: {postid:postid,type:type , userid:userid },
            dataType: 'json',
            success: function(data){
				
				var likes = data['likes'];
                var typeU = data['type'];
			    $("#ttljaime").text(likes+' J\'aime '); 
				 
				if (typeU == 1 ) {
					
                $("#sp_"+postid).addClass("posLikefill");
                $("#sp_"+postid).attr("value", '0');
				
				      if(postid == <?php echo $listings['id'] ; ?>){
					      $(".thisLike").css("color","white");
                          $(".thisLike").css("background-color","#38ccff");
			              $(".jaime").attr("value", '0');
					   }
				   }else { 
			           $("#sp_"+postid).removeClass("posLikefill");
                       $("#sp_"+postid).attr("value", '1');
					   if(postid == <?php echo $listings['id'] ; ?>){
					       $(".jaime").attr("value", '1');
				           $(".thisLike").removeAttr('style');
					  }
				  } 
            }
        });
 
 }
 
  
 function favor(id) {
	 // like and unlike click
        var postid = id;  // postid 
        var type = $('#spf_'+id).attr("value") ;
        var userid = ' <?php echo $userid ?>'; 
        // AJAX Request
        $.ajax({
            url: '<?php echo base_url('listing_detail/likeunlike/3')?>',
            type: 'post',
            data: {postid:postid,type:type , userid:userid },
            dataType: 'json',
            success: function(data){
				
				var likes = data['likes'];
                var typeU = data['type'];
				 
				if (typeU == 1 ) {
					
                $("#spf_"+postid).addClass("posLikefill");
                $("#spf_"+postid).attr("value", '0');
				  if(postid == <?php echo $listings['id'] ; ?>){
					  $(".thisFav").css("color","white");
                      $(".thisFav").css("background-color","#38ccff");
			           $(".favoris").attr("value", '0');
					  }
                     } else {
			        $("#spf_"+postid).removeClass("posLikefill");
                    $("#spf_"+postid).attr("value", '1');
					 if(postid == <?php echo $listings['id'] ; ?>){
						 $(".favoris").attr("value", '1');
				         $(".thisFav").removeAttr('style');
					  }
				  } 
              }
         }); 
      } 

function al(){
  swal({
  title: "Connectez-vous ",
  text: "pour terminer le processus  ",
  icon: "warning",
  buttons: [" Cansel", " Connecter"],
 
  
})
.then((willDelete) => {
  if (willDelete) {
     window.location.replace("<?=base_url('login/'); ?>" );
  } else {
    
  }
});
}


</script>
 <style>
  #response{display: none}
  div #fb, div #gp, div #tw{display: inline-block;}
  #fb{width: 180px;}
  #gp{width:  100px;}
  #tw{width: 180px;}
 </style>
 <div id="fb-root"></div>
 <script>(function(d, s, id) {
			 var js, fjs = d.getElementsByTagName(s)[0];
			 if (d.getElementById(id)) return;
			 js = d.createElement(s); js.id = id;
			 js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
			 fjs.parentNode.insertBefore(js, fjs);
		 }(document, 'script', 'facebook-jssdk'));
  </script>
   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdI0GSQlVslIEcOTXlbsJ2Lm9lBVy0o3g"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/src/markerclusterer.js"></script>
  <script src="<?php echo base_url(); ?>assets/maps/modernizr.js"></script>
 <script type="text/javascript">
 desktopScreen = Modernizr.mq( "only screen and (min-width:1024px)" ),
				zoom = desktopScreen ? 18 : 17,
				scrollable = draggable = !Modernizr.hiddenscroll || desktopScreen,
				isIE11 = !!(navigator.userAgent.match(/Trident/) && navigator.userAgent.match(/rv[ :]11/));
var markers = []; 
var key, count  = 0; 
var marker ;

 function initialize() {
	 markerOptions = {styles: [{
     height: 60,
     url: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m2.png",
     width: 60,
	 textSize : 17
     }]}; 
   
 var center = new google.maps.LatLng(<?php echo $lat.','.$lng?>);
  
       var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
		
	 var infoWindow = new google.maps.InfoWindow(), marker;
	 var data = [{ lat: <?php echo $lat ; ?>,
                  lng: <?php echo $lng ; ?>,
				  icon: '<?php echo $icon ; ?>',
	 infowindow_content: '<?php echo $infowindow_content ; ?>',} ] ;
 
		   var dataPhoto = data[0];
           var latLng = new google.maps.LatLng(dataPhoto.lat,dataPhoto.lng);
            marker = new google.maps.Marker({
             position: latLng , 
		     icon : {
					 url: isIE11 ? "<?php echo base_url(); ?>assets/images/markers/png/"+dataPhoto.icon : "<?php echo base_url(); ?>assets/images/markers/png/"+dataPhoto.icon,
					 scaledSize: new google.maps.Size(96, 96)
					 },
			 animation: google.maps.Animation.DROP, 
		   });
	  (function (marker, dataPhoto) {
                google.maps.event.addListener(marker, "click", function (e) {
                    //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                    infoWindow.setContent(dataPhoto.infowindow_content);
                    infoWindow.open(map, marker);
                });
         })(marker, dataPhoto);
       
	   markers.push(marker);
 
		  
     var markerCluster = new MarkerClusterer(map, markers , markerOptions); 
	   
  }

 google.maps.event.addDomListener(window, 'load', initialize);
   
 </script> 
 	<script> 
	
		
  $('#RadioGroup1_3').on('click', function() { 
	$('#text').removeAttr("disabled");
  });
   $('#RadioGroup1_0').on('click', function() { 
 
  $('#text').prop("disabled", true);
  });  
  $('#RadioGroup1_1').on('click', function() { 
  $('#text').prop("disabled", true);
  });
    $('#RadioGroup1_2').on('click', function() { 
  $('#text').prop("disabled", true);
  });
		
 </script>
 <script>
var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});
 
$.validator.setDefaults({
		submitHandler: function() {
			         $.ajax({
                             url:"<?=base_url('Listing_detail/send') ?>",
                             method:"POST",
                             data : $("#messagetForm").serialize(),
						     dataType: "json",
                             success:function(data)
                                    { 
								  if(data.success == true) {
										 swal("succès", " votre messages  a été bien envoyer ", "success")  
										 .then((value) => { 
										     $("#messagetForm").trigger("reset");
										    $('#message_modal').modal('hide');
										    });
											  }else {
										 
										  swal("Erreur", " Erreur ", "warning"); 
									  }
							    }
                        });
			 
		}
	});
	$("#messagetForm").validate({
			rules: {
				Email: "required",
				subject: "required",
				content: "required",
				 
			 },
			messages: {
				Email: " selection required",
				subject: " selection required",
				content: " selection required",
				 
			}
		});
</script>
 <?php $this->load->view('models/shar_listing');    ?>
 
 <?php $this->load->view('models/email_friends_modal');    ?>
 
<?php $this->load->view('models/report');    ?>
 
<?php $this->load->view('models/message_modal');    ?>

<?php $this->load->view('models/singin');    ?>
 

<script>
$.validator.setDefaults({
		submitHandler: function() {
			         $.ajax({
                             url:"<?=base_url('report/addReport'); ?>",
                             method:"POST",
                             data : $("#reportForm").serialize(),
						     dataType: "json",
                             success:function(data)
                                    { 
								  if(data.success == true) {
										 swal("succès", " succès ", "success")  
										 .then((value) => { 
										   $('#report_modal').modal('hide');
										    });
											  }else {
										 
										  swal("Erreur", " Erreur ", "warning"); 
									  }
							    }
                        });
			 
		}
	});
	$("#reportForm").validate({
			rules: {
				Report: "required",
				 
			 },
			messages: {
				Report: " selection required",
				 
			}
		});
</script>