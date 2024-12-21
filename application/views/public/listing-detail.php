 <style>
 .media-comment { margin-bottom: 20px; }
.media-replied { margin: 0 0 20px 50px; }
.media-replied .media-heading { padding-left: 6px; }
 .comment {
    list-style: outside none none;
    margin: 0 auto;
 }
 .img{
    width:60px;
    margin:5px;
    height:100%;
    float:left;
 }
 
.page-header { position: relative; }
.reviews {
    color: #555;    
    font-weight: bold;
    margin: 10px auto 20px;
}
 
.btn-circle {
    font-weight: bold;
    font-size: 12px;
    padding: 6px 15px;
    border-radius: 20px;
}
.btn-circle span { padding-right: 6px; }
 
.tab-content {
    padding: 50px 15px;
    border: 1px solid #ddd;
    border-top: 0;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
} 
input[type="file"]{
    z-index: 999;
    line-height: 0;
    font-size: 0;
    position: absolute;
    opacity: 0;
    filter: alpha(opacity = 0);-ms-filter: "alpha(opacity=0)";
    margin: 0;
    padding:0;
    left:0;
} 
 .load-more:hover{
    cursor: pointer;
}
.menu:hover{
    cursor: pointer;
}

/* more link */
.more{
    color: blue;
    text-decoration: none;
    letter-spacing: 1px;
    font-size: 16px;
}

.like {
color:#38ccff; }
.jaime  {
	 cursor: pointer;
}
.favoris  {
	 cursor: pointer;
}
.posLike{
    background: rgba(0,0,0,0.3) none repeat scroll 0 0;  
    border: 2px solid rgba(255,255,255,0.5);
    border-radius: 50%;
    color: #fff;
    height: 40px;
    font-size: 18px;
    line-height: 38px;
    padding: 0;
    position: absolute;
    right: 68px;  
    text-align: center;
     top: 15px;  
    width: 40px;
    z-index: 1;
   cursor: pointer; 
   }
 .posLike:hover{
	  background: #38ccff;
    fill: #38ccff;
 }
 
 .posLikefill{
    background: #38ccff;
    fill: #38ccff;
  }
 
 #button {
  display: inline-block;
  background-color: #38ccff;
  width: 50px;
  height: 50px;
  text-align: center;
  border-radius: 4px;
  position: fixed;
  bottom: 30px;
  right: 30px;
  transition: background-color .3s, 
    opacity .5s, visibility .5s;
  opacity: 0;
  visibility: hidden;
  z-index: 1000;
}
#button::after {
  content: "\f077";
  font-family: FontAwesome;
  font-weight: normal;
  font-style: normal;
  font-size: 2em;
  line-height: 50px;
  color: #fff;
}
#button:hover {
  cursor: pointer;
  background-color: #333;
}
#button:active {
  background-color: #555;
}
#button.show {
  opacity: 1;
  visibility: visible;
}

/* Styles for the content section */

.content {
  width: 77%;
  margin: 50px auto;
  font-family: 'Merriweather', serif;
  font-size: 17px;
  color: #6c767a;
  line-height: 1.9;
}
@media (min-width: 500px) {
  .content {
    width: 43%;
  }
  #button {
    margin: 30px;
  }
}
.content h1 {
  margin-bottom: -10px;
  color: #03a9f4;
  line-height: 1.5;
}
.content h3 {
  font-style: italic;
  color: #96a2a7;
}
@media (max-width: 768px) {
	.v3-list-ql-inn li span {
	 
	     display: none;
}
.v3-list-ql-inn ul li a {
	padding:0px 10px;
}
.v3-list-ql-inn ul   {
	    padding-inline-start: 10px;

} 
.lp-ur-all-right p span {
	font-size: 17px;
	font-weight: 200;
	padding: 2px;
}

.lp-ur-all-right p span i {

font-size: 10px;}
.lr-user-wr-con h6 {
    line-height: 17px;
    font-size: 10px;
}
#ajax_table{  padding:0px;}
.lr-user-wr-con {
    float: left;
    width: 80%;}
}



 </style>
 <link href="<?=base_url('assets/colorlib/') ; ?>css/style.css" rel="stylesheet" />
  <script src="<?=base_url('assets/colorlib/') ; ?>js/modernizr.js"></script>
<!-- Listing-detail-Header -->
<?php
if($this->session->userdata('v_user_id') != 0) {  
   $userid = $this->session->userdata('v_user_id') ; 
}else { 
	$userid = 0 ; 
}
 ?>
<header>
	<nav class="cd-stretchy-nav">
		<a class="cd-nav-trigger" href="#0">
		   <span aria-hidden="true"></span>
		</a>

		<ul style="list-style-type:none;">
			<li><a href="#accordion" class="js-target-scroll"><i class="fa fa-user"></i></a></li>
			<li><a href="#headingTwo" class="js-target-scroll"><i class="fa fa-cog"></i> </a></li>
			<li><a data-toggle="modal" data-target="#basicExampleModal"  href=""><i class="fa fa-photo"></i> </a></li>
			<li><a href="#ld-vie" class="js-target-scroll"><i class="fa fa-street-view"></i> </a></li>
			<li><a href="#writereview" class="js-target-scroll"><i class="fa fa-edit"></i> </a></li>
			<li><a class="menu" data-toggle="modal" data-target="#report_modal"><i class="fa fa-exclamation-triangle"></i> </a></li>
		</ul>

		<span aria-hidden="true" class="stretchy-nav-bg"></span>
	</nav>
</header>
<section class="listing_detail_header style2_header parallex-bg"  style="<?php echo 'background-image: url('.base_url('assets/images/listings/'.$listings["photo"].') ;' ); ?>">
	<div class="container">
    	<div class="div_zindex white-text">
        	<div class="row">
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
                </div>
                <div class="col-md-6">
                	<div class="pricing_info">
                       <p class="listing_price"><span>DZD </span><?php echo $listings['Min_Price'] ; ?> - <span>DZD </span><?php echo $listings['Max_Price'] ; ?></p>
                        <div class="listing_message"><a class="btn" data-toggle="modal" data-target="#message_modal"><i class="fa fa-envelope-o"></i> Envoyer message</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<!-- /Listing-detail-Header -->

<!-- Listings -->
<section class="listing_info_wrap listing_detail_2">
	<div class="container">
         
            <div class="image_slider_wrap  ">
                <div id="listing_img_slider" >
				 
                    <div class="owl-carousel owl-theme photos">
					<?php foreach ($Images as $image) {?>
	            <div class="item"><a href=""  data-toggle="modal" data-target="#basicExampleModal"><img  src="<?php echo base_url('/assets/images/product_image/'.$image['photo']) ; ?>"></a></div>
         
				   <?php } ?>
				  </div>  
	         	 </div>
                <div class="view_map">
                    <a href="#single_map" class="js-target-scroll"><i class="fa fa-map-marker"></i></a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="ElemoListing_detail">
					 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#description" aria-expanded="true" aria-controls="collapseOne">
                                     <i class="fa  fa-file-text-o"></i> A propos</a>
                                    </a>
                                  </h4>
                                </div>
                                <div id="description" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body">
                                    <p><?php echo $listings['Description']?>.</p>
                                  </div>
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
                                    <ul>
								 <?php if($Amenities){ foreach ($Amenities as $Amenitie) {?> 
                                        <li><a href="#"><i class="fa fa-<?php echo $Amenitie['icon']?>"></i> <?php echo $Amenitie['Amenities']?></a></li>
								 <?php } } ?>
										
                                    </ul>
                                  </div>
                                </div>
                              </div>
                               
                        </div>
                     <!-- Listing-Map -->
                        <div id="single_map">
                            <div class="widget_title">
                                 <h4> CARTE </h4>
                            </div>
                             <div id="map" style="height:450px;">
                               <div id="map" >
                               </div>
							  </div> 
                        </div>
					 
	                    <!-- /Listing-Map -->
                        <div class="reviews_list" id="ld-vie">
							<div class="widget_title">
								<h3><span>360 </span> Vue</h3> </div>
							<div class="vue">
 <iframe src="<?php echo $listings['vue_360'] ; ?>" width="100%" height="450" class="lozad" frameborder="0" allowfullscreen data-index="1" style="border:0" allowfullscreen></iframe>
						</div>
						</div>
                        <!-- Review-List -->
                        <div class="reviews_list">
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
</div>
                
                <!-- Sidebar -->
           <div class="col-md-4">
                    <div class="ElemoListing_sidebar">
                        <div class="sidebar_wrap listing_contact_info">
                            <div class="widget_title">
                                <h6>Contact Info</h6>
                            </div>
                            <ul> <li><i class="fa fa-map-marker"></i> <?php echo $info['Address'] ; ?></li>
                                <li><i class="fa fa-phone"></i> <a href="tel:+61-1234-5678-09"> <?php echo $info['Phone'] ; ?></a></li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:contcat@example.com"> <?php echo $info['Email'] ; ?></a></li>
                                <li><i class="fa fa-link"></i> <a href="www.example.html"> </a></li>
                            </ul>
							 
							
                            <div class="social_links">
              <?php if($info['Facebook'] != null ) { ?> <a href="#" class="facebook_link"><i class="fa fa-facebook-f"></i></a> <?php } ?>
              <?php if($info['Linkdin'] != null ) { ?> <a href="#" class="linkedin_link"><i class="fa fa-linkedin"></i></a><?php } ?>
              <?php if($info['Twitter'] != null ) { ?> <a href="#" class="twitter_link"><i class="fa fa-twitter"></i></a><?php } ?>
              <?php if($info['Google'] != null ) { ?> <a href="#" class="google_plus_link"><i class="fa fa-google-plus"></i></a><?php } ?>
                            </div>
							
                    <div>
                        </div>
                       
                        <div class="sidebar_wrap">
                            <div class="widget_title">
                                <h4>Watch Video</h4>
                            </div>
                            
				 <div class="listing_video">
	                <iframe width="420" height="315" src="https://www.youtube.com/embed/<?php echo $listings['Video_URL'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			    </div>
                         
                        </div>
                    </div>
                </div>
                <!-- /Sidebar -->
            </div>
    </div>
</section>
<!-- /Listings --> 

<!-- Similar-Listings -->
<section id="similar_listings" class="section-padding gray_bg">
	<div class="container">
		<div class="section-header text-center">
            <h2>Services similaires </h2>
        </div>
        <div class="row">
		<?php if($listingSimilarArray) { ?>
		       <?php   foreach($listingSimilarArray as $list) { ?>
            <div class="col-md-4 show_listing grid_col">
                <div class="listing_wrap">
                    <div class="listing_img">
                        
						 
  <?php if($userid != 0) { 
  
 if(Checking_like($list['id'] , $userid , 'Favoris') == 1 ){  
  echo '<span onclick="favor('.$list['id'].')" id="spf_'.$list['id'].'" value="0" class="like_post posLikefill"><i class="fa fa-bookmark-o"></i></span>'; }else {
  echo '<span onclick="favor('.$list['id'].')" id="spf_'.$list['id'].'" value="1" class="like_post"><i class="fa fa-bookmark-o"></i></span>'; }
	 
  
  
  if(Checking_like($list['id'] , $userid, 'type') == 1 ){  
 echo '<span onclick="like('.$list['id'].')" id="sp_'.$list['id'].'" lis="'.$list['id'].'" value="0" class="posLike  posLikefill"><i class="fa fa-heart-o"></i></span>'; }else {
 echo '<span onclick="like('.$list['id'].')" id="sp_'.$list['id'].'" lis="'.$list['id'].'" value="1" class="posLike "><i class="fa fa-heart-o"></i></span>'; }
		 } else {

  echo '   <span onclick="al()" value="1" class="posLike"><i class="fa fa-heart-o"></i></span>'; 
  echo '   <span onclick="al()" class="like_post "><i class="fa fa-bookmark-o"></i></span>';
  
  }?>
		 
 
                         
						 <div class="listing_cate"  >
                            <span class="cate_icon"><a href="#"><img src="<?php echo base_url('assets/images/'.$list['icon']) ; ?>" alt="icon-img"></a></span> 
                         </div>
          <a href="<?=base_url('/Listing_detail/index/'.$list['id']) ?>"><img src="<?php echo base_url('assets/images/listings/'.$list['photo']) ?>" alt="image"></a>
                    </div>
                    <div class="listing_info">
                        <div class="post_category">
                   <a href="<?=base_url('/listing_map/index?cat='.$list['Category_id']) ?>"><?php echo $list['Category'] ?></a>
                            
                        </div>
                        <h4><a href="<?=base_url('/Listing_detail/index/'.$list['id']) ?>"><?php echo $list['Title'] ?></a></h4>
                        <p><?php echo $list['Tag_Line'] ?></p>
                        
                        <div class="listing_review_info">
                           <p><span class="review_score"><?php echo number_format($list['rating'], 2) ?> /5</span> 
                               <?php	for($i = 1; $i <= 5; $i++){
									  if($i <= $list['rating']){ ?>
							           <i class="fa fa-star active"></i>
									<?php } else { ?>
						                <i class="fa fa-star"></i> 
						             <?php } } ?>
                               (<?php echo $list['totals'] ?>. Reviews) </p>
                            <p class="listing_map_m"><i class="fa fa-map-marker"></i>  <?php echo $list['wilaya'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
			
		<?php } } ?>
        </div>
    </div>
</section>
<!-- /Similar-Listings -->
<a id="button"></a>
<!-- Share-Listing --> 
<?php $this->load->view('models/shar_listing');    ?>
<!-- /Share-Listing --> 
<!-- Email-to-Friends -->
 <?php $this->load->view('models/email_friends_modal');    ?>
<!-- /Email-to-Friends --> 
<!-- Report -->
<?php $this->load->view('models/report');    ?>
<!-- /Report --> 
<!-- Send-Message -->
<?php $this->load->view('models/message_modal');    ?>

<?php $this->load->view('models/singin');    ?>

<?php $this->load->view('models/galery');    ?>

<?php $this->load->view('models/mdb');    ?>
<!-- Full Height Modal Right -->
 
<!-- Full Height Modal Right -->

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
          zoom: 10,
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
 