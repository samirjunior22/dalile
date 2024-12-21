 <style>
   @import url('https://fonts.googleapis.com/css?family=Open+Sans');
 .pricing-box-container {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
}
 .pricing-box {
	background-color: #ffffff;
	box-shadow: 0px 2px 15px 0px rgba(0,0,0,0.5);
	border-radius: 4px;
	flex: 1;
	padding: 0 30px 30px;
	margin: 2%;
 }

.pricing-box h5 {
	text-transform: uppercase;
}

.quantity {
    float: left;
    margin-right: 15px;
    background-color: #eee;
    position: relative;
    width: 80px;
    overflow: hidden
}

.quantity input {
    margin: 0;
    text-align: center;
    width: 15px;
    height: 15px;
    padding: 0;
    float: right;
    color: #000;
    font-size: 20px;
    border: 0;
    outline: 0;
    background-color: #F6F6F6
}

.quantity input.qty {
    position: relative;
    border: 0;
    width: 100%;
    height: 40px;
    padding: 10px 25px 10px 10px;
    text-align: center;
    font-weight: 400;
    font-size: 15px;
    border-radius: 0;
    background-clip: padding-box
}

.quantity .minus, .quantity .plus {
    line-height: 0;
    background-clip: padding-box;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    -webkit-background-size: 6px 30px;
    -moz-background-size: 6px 30px;
    color: #bbb;
    font-size: 20px;
    position: absolute;
    height: 50%;
    border: 0;
    right: 0;
    padding: 0;
    width: 25px;
    z-index: 3
}

.quantity .minus:hover, .quantity .plus:hover {
    background-color: #dad8da
}

.quantity .minus {
    bottom: 0
}
.shopping-cart {
    margin-top: 20px;
}
  .form-control {
    background: #fff;
    border: #ccc solid 1px;
}
 


 </style>
	<!-- Content -->
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					
					 <nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>cart</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
   <h4> <i class="fa fa-address-card " aria-hidden="true"></i>
               Checkout </h4>
	   <div class="row">
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
			<?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>
 
 <div class="pricing-box-container">
	<div class="pricing-box " id="print">
	
   <div class="card shopping-cart"> 
           <form action="<?=base_url('customer/facture/services/'.$order['id']) ?>" method="post" >
            <div class="card-body">
			        <div class="row">
                        <div class="row">
                                
                                 
                            </div>
                            <div class="row">
							   <?php  if($customer->phone == null) {?>
                            	    <div class="form-group col-sm-6">
                                    <label class="label-title">Téléphone </label>
                                     <input type="text"  value='' id="Phone" name="Phone" placeholder=' Votre Téléphone'class="form-control" required>
			                       </div>
								<?php } ?>
								<div class="form-group col-sm-6 select">
								 <label class="label-title">Wilaya </label>
                       <select id="wil" name="wilaya" class="form-control" required >
					   
			           <option value='' >Wilaya</option>
				   <?php foreach ($wilaya as $w) {?>
                 	    	 <option  value="<?php echo $w['id']?>"><?php echo $w['id'].' - '.$w['name']?></option>
                         <?php } ?>
	                    </select>
				              </div>
	                           
                            </div>
                            <div class="row">
            	                <div class="form-group col-sm-6">
                                    <label class="label-title">Address</label>
                                    <input type="text" id="Address" name="Address" value="<?php echo $customer->address ;?>"  class="form-control" placeholder="Address">
                                </div>
	                         </div>     
                    </div>
                    <hr> 
                <div class="pull-right">
                 </div>
            </div>
            <div class="card-footer">
                
                <div class="pull-right" style="margin: 10px">
                    <button type="submit" class="btn btn-success pull-right">Checkout</button>
                    <div class="pull-right" style="margin: 5px">
                       Montant total : <b> <?php echo $order['total']?> Dzd</b>
                    </div>
                </div>
            </div>
			</form>
        </div>
 	  </div> 
    </div>            
  </div> 
 </div> 
 </div>   
  
    <script type="text/javascript">  
 
   </script>
 