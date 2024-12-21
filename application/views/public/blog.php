
<!-- Inner-Banner -->
<section id="inner_banner" class="parallex-bg howitwork_bg">
	<div class="container">
    	<div class="white-text text-center div_zindex">
        	<h1>derniers articles</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<!-- /Inner-Banner -->

<!-- Blog -->
<section id="inner_pages">
	<div class="container">
		<div class="row">
        	<div class="col-md-8">
            	<div class="row">
				
			  <?php foreach($posts as $pos){ ?> 
                    <article class="col-sm-6 article_wrap">
                        <div class="post-thumbnail">
                            <a href="<?=base_url('blog/detail/'.$pos['id']);?>"><img src="<?=base_url('assets/images/posts/'.$pos['photo']); ?>" alt="image"></a>
                        </div>
                        <div class="entry-desc">
                            <h3><a href="<?=base_url('blog/detail/'.$pos['id']);?>"><?php echo $pos['title']?></a></h3>
                            <div class="entry_meta">
                                <span class="meta_m"><i class="fa fa-eye"></i> <?php echo $pos['vue']; ?>  Views</span>
                                <span class="meta_m"><i class="fa fa-heart-o"></i> <a href="#">4 Likes</a></span>
                            </div>
                            <div class="entry-content">
                                <p><?php echo $pos['content']?></p>
                            </div>
                            <a href="<?=base_url('blog/detail/'.$pos['id']);?>" class="read_btn">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </article>
                    
			  <?php  } ?>
                   
                    
                </div>
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
	                    	<h4>Featured Posts</h4>
                        </div>
                       
                       
                       <div class="featured_posts"> 
                       	  <div class="thubb_img">
                          	 <a href="#"><img src="<?=base_url(); ?>assets/images/385x289.jpg" alt="image"></a>
                          </div>
                       	  <div class="info_m">
                         	 <h6><a href="#">At vero eos et accusamus</a></h6>
                             <p><span class="meta_m"><i class="fa fa-clock-o"></i> 20 May 2017</span></p>
                           </div>
                       </div>
                    </div>
                    
                </div>
            </aside>
        </div>
    </div>
</section>
<!-- /Blog -->