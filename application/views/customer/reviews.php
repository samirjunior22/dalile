 <style>
 .load-more:hover{
    cursor: pointer;
}
/* more link */
.more{
    color: blue;
    text-decoration: none;
    letter-spacing: 1px;
    font-size: 16px;
}
</style>   
        <!-- Content -->
        <div class="dashboard-content">
            <!-- Titlebar -->
            <div id="titlebar">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Reviews</h2>
                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Dashboard</a></li>
                                <li>Reviews</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="row">			
                <!-- Review-List -->
                <div class="col-lg-12 col-md-12">
                    <div class="dashboard-list-box">
					       
                           <ul id="ajax_table">
						    <?=$comments ; ?>	
						   </ul>
					 <?php if( $tolals > 0) { ?>	
                          <a class="load-more">Voir plus de commentaires</a> 
                          <input type="hidden" id="row" value="0">
                          <input type="hidden" id="allrating" value="<?php echo $tolals ?>	"> 
					 <?php }else { ?>
					 <a> Vide </a>
					 <?php } ?>
                    </div>
                </div>
    
           
   <script type="text/javascript">
	  $("#reviews").addClass('active');
	  
	   
     $(document).ready(function(){
  
    
       var rowperpage = 3;  
    // Load more COMMENTAIRES
    $('.load-more').click(function(){ 
	    var row = Number($('#row').val());
        var allcount =  $('#allrating').val() ;
        row = row + rowperpage; 
		loadMoreComment (row ,allcount) ;
		
    });
	
 function loadMoreComment (row ,allcount) {
	if(row <= allcount){
            $("#row").val(row); 
            $.ajax({
                url: '<?=base_url('customer/Reviews/loadReview'); ?>',
                type: 'post',
                data: {row:row},
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
 });
 
 
function Reply(id) {
 
var formc = $('#formReply'+id);
     $.ajax({
         type: 'post',
         url: '<?=base_url('Listing_detail/addRating'); ?>',
         data: formc.serialize(),
		 dataType : "JSON",
	     success:function(response){
		 if (response.success == true) {
			  
              formc[0].reset();
			  scrolltop();
			  
			  return true; 
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
	  return true;
  }
 
 </script>