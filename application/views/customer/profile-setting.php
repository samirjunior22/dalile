<style>
.pic-container{
  cursor: pointer;
  overflow: hidden;
}

.pic{
  width: 100%;
  height: 100%;
  display: block;
}

.pic-container.pic-xs{
  width: 50px;
  height: 50px;
}

.pic-container.pic-small{
  width: 70px;
  height: 70px;
}

.pic-container.pic-medium{
  width: 150px;
  height: 150px;
}

.pic-container.pic-large{
  width: 250px;
  height: 250px;
}


.pic-container.pic-xl{
  width: 350px;
  height: 350px;
}

.pic-container.pic-circle{
  border-radius: 50%;
}

.pic-overlay{
  background-color: #ccc;
  opacity: 0.5;
  width: 100%;
  height: 100%;
  margin: 0;
  position: relative;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;

}

.pic-container:hover .pic-overlay{
  top: -100%;
}

.pic-overlay a{
  display: block;
  padding: 10px;
}

.pic-xs .pic-overlay a{
  padding: 5px;
}

.pic-overlay .fa-window-close-o{
  color: red;
}

.pic-overlay .fa-pencil-square-o{
  color: blue;
}

.pic-medium .pic-overlay a i{
  font-size: 20px;
}

.pic-large .pic-overlay a i{
  font-size: 35px;
}

.pic-xl .pic-overlay a i{
  font-size: 45px;
}



</style> 
			<div class="tz-2">
				<div class="tz-2-com tz-2-main">
					<h4>Manage Booking</h4>
					<div class="tz-2-main-com">
						<div class="tz-2-main-1">
							<div class="tz-2-main-2"> <img src="<?php echo base_url();?>assets/images/icon/d1.png" alt="" /><span>All Listings</span>
								<p>Total no of listings</p>
								<h2>04</h2> </div>
						</div>
						<div class="tz-2-main-1">
							<div class="tz-2-main-2"> <img src="<?php echo base_url();?>assets/images/icon/d2.png" alt="" /><span>Review</span>
								<p>Total no of reviews</p>
								<h2>69</h2> </div>
						</div>
						<div class="tz-2-main-1">
							<div class="tz-2-main-2"> <img src="<?php echo base_url();?>assets/images/icon/d3.png" alt="" /><span>Messages</span>
								<p>Total no of messages</p>
								<h2>53</h2> </div>
						</div>
					</div>
					<div class="db-list-com tz-db-table">
						<div class="ds-boar-title">
							<h2>Listings</h2>
							<p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>
						</div>
						<table class="responsive-table bordered">
							<thead>
								<tr>
									<th>Listing Name</th>
									<th>Date</th>
									<th>Rating</th>
									<th>Views</th>
									<th>Status</th>
									<th>Edit</th>
									<th>Delete</th>
									<th>Preview</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Taj Luxury Hotel</td>
									<td>12 Jan 2019</td>
									<td><span class="db-list-rat">4.2</span></td>
									<td><span class="db-list-rat">76</span></td>
									<td><span class="db-list-ststus">Active</span></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
									<td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
								</tr>
								<tr>
									<td>National Auto Care</td>
									<td>28 Feb 2019</td>
									<td><span class="db-list-rat">4.2</span></td>
									<td><span class="db-list-rat">12</span></td>
									<td><span class="db-list-ststus">Active</span></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
									<td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
								</tr>
								<tr>
									<td>Pearl Perfumes</td>
									<td>04 Mar 2019</td>
									<td><span class="db-list-rat">4.2</span></td>
									<td><span class="db-list-rat">232</span></td>
									<td><span class="db-list-ststus-na">Inactive</span></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
									<td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
								</tr>
								<tr>
									<td>Goman Travels</td>
									<td>16 Mar 2019</td>
									<td><span class="db-list-rat">4.2</span></td>
									<td><span class="db-list-rat">432</span></td>
									<td><span class="db-list-ststus">Active</span></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
									<td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
								</tr>
								<tr>
									<td>William Watt Electricals</td>
									<td>05 Apr 2019</td>
									<td><span class="db-list-rat">4.2</span></td>
									<td><span class="db-list-rat">116</span></td>
									<td><span class="db-list-ststus">Active</span></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
									<td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
								</tr>
								<tr>
									<td>Jb Montesari School</td>
									<td>14 Apr 2019</td>
									<td><span class="db-list-rat">4.2</span></td>
									<td><span class="db-list-rat">553</span></td>
									<td><span class="db-list-ststus-na">Inactive</span></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
									<td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
								</tr>
								<tr>
									<td>Ramsey Wine Corner</td>
									<td>18 Apr 2019</td>
									<td><span class="db-list-rat">4.2</span></td>
									<td><span class="db-list-rat">324</span></td>
									<td><span class="db-list-ststus">Active</span></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
									<td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
								</tr>
								<tr>
									<td>Royal Real Estates</td>
									<td>02 May 2019</td>
									<td><span class="db-list-rat">4.2</span></td>
									<td><span class="db-list-rat">876</span></td>
									<td><span class="db-list-ststus">Active</span></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
									<td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
								</tr>
								<tr>
									<td>Colors Car Services</td>
									<td>07 May 2019</td>
									<td><span class="db-list-rat">4.2</span></td>
									<td><span class="db-list-rat">65</span></td>
									<td><span class="db-list-ststus">Active</span></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Edit</a></td>
									<td><a href="db-listing-edit.html" class="db-list-edit">Delete</a></td>
									<td><a href="listing-details.html" class="db-list-edit" target="_blank"><i class="fa fa-eye"></i></a></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="db-list-com tz-db-table">
						<div class="ds-boar-title">
							<h2>Payment & analytics</h2>
							<p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>
						</div>
						<table class="responsive-table bordered">
							<thead>
								<tr>
									<th>Listing Name</th>
									<th>Views(week)</th>
									<th>Payment</th>
									<th>Listing Type</th>
									<th>Make Payment</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Taj Luxury Hotel & Resorts</td>
									<td>142</td>
									<td><span class="db-list-rat">Done</span>
									</td>
									<td><span class="db-list-ststus">Premium</span>
									</td>
									<td><a href="db-payment.html" class="db-list-edit">Payment</a>
									</td>
								</tr>
								<tr>
									<td>Joney Health and Fitness</td>
									<td>53</td>
									<td><span class="db-list-rat">Done</span>
									</td>
									<td><span class="db-list-ststus-na">Free</span>
									</td>
									<td><a href="db-payment.html" class="db-list-edit">Payment</a>
									</td>
								</tr>
								<tr>
									<td>Effi Furniture Dealers</td>
									<td>76</td>
									<td><span class="db-list-ststus-na">No</span>
									</td>
									<td><span class="db-list-ststus-na">Free</span>
									</td>
									<td><a href="db-payment.html" class="db-list-edit">Payment</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="db-list-com tz-db-table">
						<div class="ds-boar-title">
							<h2>Messages</h2>
							<p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>
						</div>
						<div class="tz-mess">
							<ul>
								<li class="view-msg">
									<h5><img src="<?php echo base_url();?>assets/images/users/1.png" alt="" />Listing Enquiry <span class="tz-msg-un-read">unread</span></h5>
									<p>Nulla egestas leo elit, eu sollicitudin diam suscipit non. Nunc imperdiet hendrerit mi, mollis sagittis risus accumsan ac.</p>
									<div class="hid-msg"><a href="#"><i class="fa fa-eye" title="view"></i></a><a href="#"><i class="fa fa-trash" title="delete"></i></a>
									</div>
								</li>
								<li class="view-msg">
									<h5><img src="<?php echo base_url();?>assets/images/users/4.png" alt="" />Request for meet <span class="tz-msg-read">unread</span></h5>
									<p>Duis nulla ligula, interdum porta nulla sed, efficitur tempus lacus. Quisque facilisis, sapien tempor mollis sollicitudin, urna ligula vulputate nulla, rhoncus faucibus justo mauris eget elit.Pellentesque eget pellentesque dolor.</p>
									<div class="hid-msg"><a href="#"><i class="fa fa-eye" title="view"></i></a><a href="#"><i class="fa fa-trash" title="delete"></i></a>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="db-list-com tz-db-table">
						<div class="ds-boar-title">
							<h2>Reviews</h2>
							<p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>
						</div>
						<div class="tz-mess">
							<ul>
								<li class="view-msg">
									<h5><img src="<?php echo base_url();?>assets/images/users/1.png" alt="" />Jessica <span class="tz-revi-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></span></h5>
									<p>Cras viverra ligula ut sem tincidunt, et volutpat dui facilisis. Nulla congue arcu vitae lectus cursus finibus. Pellentesque consequat ante eu elit tincidunt pharetra.</p>
									<div class="hid-msg"><a href="#!"><i class="fa fa-check" title="approve this review"></i></a><a href="#!"><i class="fa fa-edit" title="edit"></i></a><a href="#!"><i class="fa fa-trash" title="delete"></i></a><a href="#!"><i class="fa fa-reply edit-replay" title="replay"></i></a>
										<form class="col s12 hide-box">
											<div class="">
												<div class="input-field col s12">
													<textarea class="materialize-textarea"></textarea>
													<label>Write your replay</label>
												</div>
												<div class="input-field col s12">
													<input type="submit" value="Submit" class="waves-effect waves-light btn-large"> </div>
											</div>
										</form>
									</div>
								</li>
								<li class="view-msg">
									<h5><img src="<?php echo base_url();?>assets/images/users/1.png" alt="" />	Christopher <span class="tz-revi-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></span></h5>
									<p>Duis nulla ligula, interdum porta nulla sed, efficitur tempus lacus. Quisque facilisis, sapien tempor mollis sollicitudin, urna ligula vulputate nulla, rhoncus faucibus justo mauris eget elit.Pellentesque eget pellentesque dolor.</p>
									<div class="hid-msg"><a href="#!"><i class="fa fa-check" title="approve this review"></i></a><a href="#!"><i class="fa fa-edit" title="edit"></i></a><a href="#!"><i class="fa fa-trash" title="delete"></i></a><a href="#!"><i class="fa fa-reply edit-replay" title="replay"></i></a>
										<form class="col s12 hide-box">
											<div class="">
												<div class="input-field col s12">
													<textarea class="materialize-textarea"></textarea>
													<label>Write your replay</label>
												</div>
												<div class="input-field col s12">
													<input type="submit" value="Submit" class="waves-effect waves-light btn-large"> </div>
											</div>
										</form>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
			<div class="tz-3">
				<h4>Notifications(18)</h4>
				<ul>
					<li>
						<a href="#!"> <img src="<?php echo base_url();?>assets/images/icon/dbr1.jpg" alt="" />
							<h5>Joseph, write a review</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="<?php echo base_url();?>assets/images/icon/dbr2.jpg" alt="" />
							<h5>14 New Messages</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="<?php echo base_url();?>assets/images/icon/dbr3.jpg" alt="" />
							<h5>Ads expairy soon</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="<?php echo base_url();?>assets/images/icon/dbr4.jpg" alt="" />
							<h5>Post free ads - today only</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="<?php echo base_url();?>assets/images/icon/dbr5.jpg" alt="" />
							<h5>listing limit increase</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="<?php echo base_url();?>assets/images/icon/dbr6.jpg" alt="" />
							<h5>mobile app launch</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="<?php echo base_url();?>assets/images/icon/dbr7.jpg" alt="" />
							<h5>Setting Updated</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="<?php echo base_url();?>assets/images/icon/dbr8.jpg" alt="" />
							<h5>Increase listing viewers</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<!--END DASHBOARD-->
	<!--MOBILE APP-->
	<section class="web-app com-padd">
		<div class="container">
			<div class="row">
				<div class="col-md-6 web-app-img"> <img src="<?php echo base_url();?>assets/images/mobile.png" alt="" /> </div>
				<div class="col-md-6 web-app-con">
					<h2>Looking for the Best Service Provider? <span>Get the App!</span></h2>
					<ul>
						<li><i class="fa fa-check" aria-hidden="true"></i> Find nearby listings</li>
						<li><i class="fa fa-check" aria-hidden="true"></i> Easy service enquiry</li>
						<li><i class="fa fa-check" aria-hidden="true"></i> Listing reviews and ratings</li>
						<li><i class="fa fa-check" aria-hidden="true"></i> Manage your listing, enquiry and reviews</li>
					</ul> <span>We'll send you a link, open it on your phone to download the app</span>
					<form>
						<ul>
							<li>
								<input type="text" placeholder="+01" /> </li>
							<li>
								<input type="number" placeholder="Enter mobile number" /> </li>
							<li>
								<input type="submit" value="Get App Link" /> </li>
						</ul>
					</form>
					<a href="#"><img src="<?php echo base_url();?>assets/images/android.png" alt="" /> </a>
					<a href="#"><img src="<?php echo base_url();?>assets/images/apple.png" alt="" /> </a>
				</div>
			</div>
		</div>
	</section> 
	<script type="text/javascript">
	  $("#Dashboard").addClass('tz-lma');
   </script>
	