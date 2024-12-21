<script>
$(function(){
        <?php echo "var url='".base_url()."';";?>

        $('.read_message').on('click',function(){
            var id = $(this).data('id');
            read_message(id,url);
            
        });
    
        $('.read_admin_message').on('click',function(){
            var id = $(this).data('id');
            read_admin_message(id,url);
            
        });
    
        $('.read_sent_message').on('click',function(){
            var id = $(this).data('id');
            read_sent_message(id,url);
            
        });

});
    
function read_message(id,url){
    $.ajax({    
        url: url+'customer/messages/inbox/read_message', 
        type: 'POST',
        data: { id:id },
        success: function(dataJim) {                        
            data = jQuery.parseJSON(dataJim);
            console.log(data[0]);
            $('.date_here').html(data[0]['date']);
            $('.sender_here').html(data[0]['user_from']);
            $('.subject_here').html(data[0]['subject']);
            $('.message_here').html(data[0]['content']);
            $('.sender').html(data[0]['user_from']);
            $('.send_to').val(data[0]['user_from']);
            $('.reply_subject').val(data[0]['subject']);
        }
    });   
}
   
function read_sent_message(id,url){
    $.ajax({    
        url: url+'customer/messages/sentitems/read_message', 
        type: 'POST',
        data: { id:id },
        success: function(dataJim) {                        
            data = jQuery.parseJSON(dataJim);
            console.log(data[0]);
            $('.date_here').html(data[0]['date']);
            $('.receiver_here').html(data[0]['user_from']);
            $('.subject_here').html(data[0]['subject']);
            $('.message_here').html(data[0]['content']);
        }
    });   
}
    

</script>