 
<section id="inner_pages">
	<div class="container">
		<div class="row">
        	<div class="col-md-8">
            	<article class="article_wrap single_post">    
                    <div class="post-thumbnail">
                        <img src="<?=base_url('assets/images/posts/'.$post['photo']); ?>" alt="image">
                    </div>
                    <div class="entry_meta">
                        <span class="meta_m"><i class="fa fa-eye"></i> <?php echo $post['vue'] ; if($post['vue'] > 1){echo ' Views';}else{ echo ' view';}?> </span>
                        <span class="meta_m"><i class="fa fa-heart-o"></i> <a href="#">4 Likes</a></span>
                    </div>
                    <div class="entry-desc">
                        <div class="entry-content">
                        <p> <?php  echo $post['content'] ;  ?></p>
						</div>
                    </div>
                    <div class="post_tag">
                        <span>Tags:</span> 
		    <?php 	   $tags = explode(',', $post['tags']);
                     foreach ($tags as $key => $tag ) {
						  ?>
                        <a href="#"><?php echo $tags[$key] ?></a>
					 <?php } ?>
                    </div>
                    
                </article>  
                     
                <!-- All-Comments 
                <div class="articale_comments">
                	<div id="comments">
	                	<h4 class="block-head">2 Comments</h4>
                        <ul class="commentlist">                           
                            <li class="comment">
                            	<div class="comment-body">
                                	<div class="comment-author">
                                    	<img class="avatar" src="<?=base_url(); ?>assets/images/users/1560789031.png" alt="image">
                                    	<span class="fn">John Smith</span>
                                    </div>
                                    <div class="comment-meta commentmetadata"> <a href="#">Feb 23, 2016 at 12:52 pm</a> </div>
                                    <div class="comment-content">
	                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                                        sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                                        Ut enim ad minima veniam, quis nostrum exercitationem</p>
                                    </div>
                                    <div class="reply">
                                    	<a href="#" class="btn-link"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                                    </div>
                                </div>
                                
                                <ul class="children">
                                	 <li class="comment">
		                            	<div class="comment-body">
                                	<div class="comment-author">
                                    	<img class="avatar" src="<?=base_url(); ?>assets/images/users/1560789031.png" alt="image">
                                    	<span class="fn">John Smith</span>
                                    </div>
                                    <div class="comment-meta commentmetadata"> <a href="#">Feb 23, 2016 at 12:52 pm</a> </div>
                                    <div class="comment-content">
	                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                                        sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                                        Ut enim ad minima veniam, quis nostrum exercitationem</p>
                                    </div>
                                    <div class="reply">
                                    	<a href="#" class="btn-link"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                                    </div>
                                </div>
                                	</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> -->
                
				<!-- Comment-Form 
                <div class="comment-respond">
                	<h4 class="block-head">Leave A Comment</h4>
                    <form method="get" class="comment-form">
                    	<div class="form-group">
                        	<input class="form-control" placeholder="Full Name" type="text">
                        </div>
                        
                        <div class="form-group">
                        	<input class="form-control" placeholder="Email Address" type="email">
                        </div>
                        
                        <div class="form-group">
                        	<textarea class="form-control" rows="4" placeholder="Comment"></textarea>
                        </div>
                        
                        <div class="form-group">
							<button class="btn" type="submit">Post Comment</button>
                        </div>
                    </form>
                </div>-->
            </div> 
            
            <aside class="col-md-4">
            	<div class="sidebar">
                	<div class="sidebar_widgets">
                    	<div class="widget_title">
	                    	<h4>Categories</h4>
                        </div>
                        <ul>
                        	<li><a href="#">fashion</a></li>
                            <li><a href="#">Soins de santé</a></li>
                            <li><a href="#">Inspiration</a></li>
                            <li><a href="#">Conception</a></li>
                            <li><a href="#">actualités</a></li>
                            <li><a href="#">Non classé</a></li>
                        </ul>
                    </div>
                    
                    <div class="sidebar_widgets">
                    	<div class="widget_title">
	                    	<h4>Postes en vedette</h4>
                        </div>
                       
                      <?php foreach($posts as $pos){ ?> 
                       <div class="featured_posts"> 
                       	  <div class="thubb_img">
                          	 <a href="#"><img src="<?=base_url('assets/images/posts/'.$pos['photo']); ?>" alt="image"></a>
                          </div>
                       	  <div class="info_m">
                         	 <h6><a href="#"><?php echo $pos['title'] ; ?></a></h6>
                             <p><span class="meta_m"><i class="fa fa-clock-o"></i> <?php echo date('Y-M-d',strtotime($pos['date_add'])) ; ?></span></p>
                           </div>
                       </div>
					  <?php } ?> 
                    </div>
                    
                </div>
            </aside>
        </div>
    </div>
</section>
<!-- /Blog -->