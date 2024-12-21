 <style>
 
 .nonlu {
   background-color: #e6f6fd;
   } 
   .img{
	   border-radius: 50%;  width: 50px;
   }
 </style>
	<!-- Content -->
	<div class="dashboard-content">
		 
		 
        <div class="row">
			<div class="col-lg-12">
				<div class="dashboard-list-box with-icons margin-top-20">
					<h4>Recent Activities</h4> <a onclick="removeAll(<?php echo $customer->id ; ?>)"> remove all</a>
					<ul>
					  <?php if( $notifications  != null) {  
						  $count = 1;
						   foreach($notifications as $notification) { ?>
			 <a href="<?=base_url('customer/setting/notification') ?>" style=" color: black;  " role="button">
               <li class="alert <?php if($notification['status'] == 0) echo 'nonlu' ; ?>" id="<?php echo $notification['id']; ?>">
				<div class="row">
				   <div class="col-md-1 col-sm-1 col-xs-1 ">  	 
					 <img  class="img" src="<?php echo $notification['picture']; ?>" alt="">
				   </diV> 
				   <div class="col-md-8 col-sm-8 col-xs-8">  	 
					 <strong><?php echo $notification['from']; ?> </strong>
	                 <?php echo $notification['content']; ?><br>
                      <a><?php echo  timeAgo(strtotime($notification['generated_on'])) ; ?></a>					 
                  </diV> 
				
				 <div class="col-md-3 col-sm-3 col-xs-3 ">
				      <img class="content" width="50"src="<?=base_url($notification['photo']); ?>" alt="">
					  <a onclick="removeFunc(<?php echo $notification['id']; ?>)"  class="close-list-item"><i class="fa fa-close"></i></a>
	             </div>
					   
				 </div>	
			    </li>
			  </a>
						  <?php $count ++;
							   } ?>   
					  <?php } ?>
 
					</ul>
				</div>
			</div>
        </div>
		<div class="row">
		 
  <script type="text/javascript">
	  $("#Dashboard").addClass('active');
   </script>
   
    <script type="text/javascript">
 var url = '<?=base_url(); ?>';
$('.nonlu').click(function() {
    $(this).next().hide();
    $(this).hide();
    var notificationId      = $(this).attr('id');
    $.ajax({
        type: 'POST',
        url: url+'customer/notifications/read/'+notificationId,
        success: function(data, textStatus) {
            $('#notifications-liting').html(data);
        },
        error: function() {
            alert('Not OKay');
        }
    });
});
$('.rIcon').click(function() {
     
    var notificationId      = $(this).attr('id');
    $.ajax({
        type: 'POST',
        url: url+'customer/notifications/read/'+notificationId,
        success: function(data, textStatus) {
            $('#'+notificationId).removeClass('nonlu');
        },
        error: function() {
            alert('Not OKay');
        }
    });
});


// remove functions 
function removeFunc(id)
{
  if(id) {
     $.ajax({
        url: 'removeNot/'+id,
        type: 'POST',
        dataType: 'json',
        success:function(response) {

          if(response.success === true) {
         
              window.location.replace(location);

          } else {

            window.location.replace(location);
          }
        }
      }); 

      return false;
   
  }
}
function removeAll(id)
{
  if(id) {
     $.ajax({
        url: 'removeNotAll/'+id,
        type: 'POST',
        dataType: 'json',
        success:function(response) {

          if(response.success === true) {
         
              window.location.replace(location);

          } else {

            window.location.replace(location);
          }
        }
      }); 

      return false;
   
  }
}
</script>