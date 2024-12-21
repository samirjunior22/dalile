
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
	min-width: 80%;
	max-width: 80%;
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
  
 
       <h4>Facture </h4>
	   <div class="row">
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box">
				 
				  
				  
<div class="pricing-box-container">
	<div class="pricing-box ">
		
      <div class="row pad-top-botm ">
         <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="<?php echo base_url();?>/assets/images/logo-facture.png" style="padding-bottom:20px;max-width: 50%;" /> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <strong>   El Dalile  LLC.</strong>
              <br />
                  <i>Address :</i> 12 ,  rue Kabir Kadour ,
              <br />
                  Tighalimet, Sidi Bel abbes,
              <br />
                 Algérie.
              
         </div>
     </div>
     <div  class="row text-center contact-info">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             
            
             <hr />
         </div>
     </div>
     <div  class="row pad-top-botm client-info">
         <div class="col-lg-6 col-md-6 col-sm-6">
         <h4>  <strong> Facturé à </strong></h4>
           <strong>  Jhon Deo Chuixae</strong>
             <br />
                  <b>Address :</b> 145/908 , New York Lane,
              <br />
                 United States.
             <br />
             <b>Call :</b> +90-908-567-0987
              <br />
             <b>E-mail :</b> info@clientdomain.com
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
         <h4>  <strong>Détails de paiement </strong></h4>
            <b>Bill Amount :  990 USD </b>
              <br />
               Bill Date :  01th August 2014
              <br />
               <b>Payment Status :  Paid </b>
               <br />
               Delivery Date :  10th August 2014
              <br />
               Purchase Date :  30th July 2014
         </div>
     </div>
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Les détails</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Website Design</td>
                                     <td>300 USD</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Plugin Dev.</td>
                                     <td>400 USD</td>
                                </tr>
                                <tr>
                                     <td>3</td>
                                     <td>Hosting Domains</td>
                                     <td>200 USD</td>
                                </tr>
                                
                            </tbody>
                        </table>
               </div>
             <hr />
             <div class="ttl-amts">
               <h5> Montant de la facture : 900 USD </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h5>  Tax : 90 USD ( by 10 % on bill ) </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h4> <strong>Bill Amount : 990 USD</strong> </h4>
             </div>
         </div>
     </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong>
             <ol>
                  <li>
               Il s’agit d’une facture générée électroniquement, elle n’exige donc pas de signature.

                 </li>
                 <li>
                      Veuillez lire toutes les conditions et politiques sur eldalile.com pour les retours, les remplacements et autres problèmes.

                 </li>
             </ol>
             </div>
         </div>
      <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <a href="#" class="btn btn-primary btn-lg" >Print Invoice</a>
             &nbsp;&nbsp;&nbsp;
              <a href="#" class="btn btn-success btn-lg" >Download In Pdf</a>

             </div>
         </div> 
		



		
	</div>
 
 
</div>
 
             
				</div>
			</div>
	 

  <script type="text/javascript">
	  $("#add-listing").addClass('active');
 </script>