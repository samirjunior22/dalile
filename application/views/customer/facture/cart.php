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
   <h4> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Shipping cart </h4>
	   <div class="row">
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
 
 <div class="pricing-box-container">
	<div class="pricing-box " id="print">
	
	<?php if($orders != null) { ?>
	
   <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
              
            </div>
            <div class="card-body">
			        <div class="row">
                         
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="<?php echo base_url($pack_detail['photo'])?>" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                         <h5 class="product-name"><strong><?php echo $pack_detail['pack']?></strong></h5>
                            <h5>
                                <small><?php echo $pack_detail['discription']?> </small>
                            </h5>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 2px">
                                <h6><strong><?php echo $pack_detail['total']?><span class="text-muted">Dzd</span></strong></h6>
                            </div>
                             
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                 <h6><strong><?php echo date('Y-m-d' ,strtotime($orders['date_add']))?><span class="text-muted"> </span></strong></h6>
                            </div>
                        </div>
                    </div> 
                    <hr>
      
                <div class="pull-right">
                 </div>
            </div>
            <div class="card-footer">
                
                <div class="pull-right" style="margin: 10px">
                    <a href="<?=base_url('/customer/facture/checkout?order='.$orders['id']); ?>" class="btn btn-success pull-right">Checkout</a>
                    <div class="pull-right" style="margin: 5px">
                       Montant total : <b><?php echo $orders['total'] ;?> dzd</b>
                    </div>
                </div>
            </div>
        </div> 
		
	<?php } else {?>
	
	   <h4>Cart Vide</h4>
	
	
	<?php } ?>
		
 	  </div> 
    </div>            
  </div> 