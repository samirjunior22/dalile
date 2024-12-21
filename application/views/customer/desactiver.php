 <style>
 
 
 @import url('https://fonts.googleapis.com/css?family=Open+Sans');

 

.text-center {
	text-align: center;
}

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
	min-width: 250px;
	max-width: 350px;
}

.pricing-box h5 {
	text-transform: uppercase;
}

.price {
	margin: 24px 0;
	font-size: 36px;
	font-weight: 900;
}

.price sub, .price sup {
	font-size: 16px;
	font-weight: 100;
}

.features-list {
	padding: 0;
	list-style-type: none;
}

.features-list li {
	font-weight: 100;
	padding: 12px 0;
	font-weight: 100;
}

.features-list li:not(:last-of-type) {
	border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.btn-primary {
	border-radius: 25px;
	border: none;
	background-color: #EC1362;
	color: #ffffff;
	cursor: pointer;
	padding: 10px 15px;
	margin-top: 20px;
	text-transform: uppercase;
	transition: all 0.1s ease-in-out;
}

.btn-primary:hover {
	box-shadow: 0px 2px 15px 0px rgba(0,0,0,0.5);
	transform: translateY(-3px);
}

.pricing-box-bg-image {
	background-image: url('https://images.unsplash.com/photo-1550029402-226115b7c579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=701&q=80');
	background-size: cover;
	background-position: center center;
	color: #ffffff;
}

.pricing-box-bg-image .features-list li {
	border-bottom-color: rgba(255, 255, 255, 1);
}

.pricing-box-bg-image .btn-primary {
	background-color: #ffffff;
	color: #000;
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
							<li>Offre de service</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
 
		<div class="row">
			<div class="col-md-12">
            	<div class="notification alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <p>Ce compte <strong>n'est pas actif </strong> vous ne pouvez pas le gérer.! </p>
                </div>
			</div>
		</div>
 
       <h4>Choisissez le meilleur plan pour vous  </h4>
	   <div class="row">
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box">
				 
				  
				  
<div class="pricing-box-container">
	<div class="pricing-box text-center">
		<h5>Professionnel</h5>
		<p class="price"><sup>Dzd</sup>500<sub>/mo</sub></p>
		<ul class="features-list">
			<li><strong>5</strong> OFFRE,</li>
			<li><strong>12 mois</strong>  Disponibilité</li>
			<li><strong>Apparaissez </strong>dans les dépliants</li>
			<li><strong>24/7</strong> Support</li> 
		</ul>
		<form action="<?=base_url('customer/facture/add_cart'); ?>" method="post">
		<input type="hidden" value="2" name="pack"/>
		<button type="submit"class="btn-primary">Commencer</button>
		</form>
	</div>

	<div class="pricing-box text-center">
		<h5>Prime</h5>
		<p class="price"><sup>Dzd</sup>1200<sub>/mo</sub></p>
		<ul class="features-list">
			<li><strong>20</strong> OFFRE,</li>
			<li><strong>12 mois </strong>Disponibilité</li>
			<li><strong>classée avec</strong> offre plus populaires</li>
			<li><strong>24/7</strong> Support</li> 
		</ul>
		<form action="<?=base_url('customer/facture/add_cart'); ?>" method="post">
		<input type="hidden" value="3" name="pack"/>
		<button type="submit"class="btn-primary">Commencer</button>
		</form>
	</div>

	<div class="pricing-box text-center">
		<h5>entreprise</h5>
		<p class="price"><sup>Dzd</sup>1600<sub>/mo</sub></p>
		<ul class="features-list">
			<li><strong>50</strong> OFFRE</li>
			<li><strong>IlLimité </strong> Disponibilité</li>
			<li><strong>Marker</strong> personnalisée</li>
			<li><strong> Top </strong> au page de recherche</li>
			<li><strong> Annonces </strong>  exclusives</li>
		</ul>
		<form action="<?=base_url('customer/facture/add_cart'); ?>" method="post">
		<input type="hidden" value="4" name="pack" />
		<button type="submit"class="btn-primary">Commencer</button>
		</form>
	</div>
</div>
 
             
				</div>
			</div>
			
			 
		</div>
        
	</div>
	<!-- Content / End -->
</div>
</div>

  <script type="text/javascript">
	  $("#add-listing").addClass('active');
 </script>