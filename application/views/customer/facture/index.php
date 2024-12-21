
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
.notify-badge{
    position: absolute;
    right: 0px;
    top: 0px;
    background:red;
    text-align: center;
    border-radius: 30px 30px 30px 30px;
    color:white;
    padding:5px 10px;
    font-size:20px;
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
	<div class="pricing-box " id="print">

      <div class="row pad-top-botm ">
	   		
         <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="<?php echo base_url();?>/assets/images/logo-facture.png" style="padding-bottom:20px;max-width: 50%;" /> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <span class="notify-badge">No Payée</span>
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
           <strong> <?php echo $customer->firstname.' '.$customer->lastname ;?></strong>
             <br />
                  <b>Address :</b>  <?php echo $customer->address  ;?>
              <br />
                 Algérie.
             <br />
             <b>tel :</b> <?php echo $customer->phone  ;?>
              <br />
             <b>E-mail :</b><?php echo $customer->email  ;?>
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
         <h4>  <strong> Payer à </strong></h4>
            <b>Samir Hamzaoui ( El dalile )</b>
              <br />
               address :   12 Rue Kabir Kadour Tighalimet <br> Sidi Bel Abbes
              <br />
               <b>Payment Status :   No Payée </b>
               <br />
                mode de paiement :  Virement 
              <br />
               ccp : 001185 cle 28
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
                                    <td><?php echo $pack_detail['pack'] ; ?></td>
                                     <td><?php echo $pack_detail['total'] ; ?></td>
                                </tr>
                             </tbody>
                        </table>
               </div>
             <hr />
             <div class="ttl-amts">
               <h5> Montant de la facture :<?php echo $devis['total'] ; ?></h5>
             </div>
             <hr />
              
             <hr />
              <div class="ttl-amts">
                  <h4> <strong>Bill Amount : <?php echo $devis['total'] ; ?></strong> </h4>
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
       
	  </div>
	  <div id="editor"></div>
	 <!-- <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <a href="#" class="btn btn-primary btn-lg" >Print Invoice</a>
             &nbsp;&nbsp;&nbsp;
              <button  class="btn btn-success btn-lg" id="cmd" >Download In Pdf</button>

             </div>
         </div> -->
   </div>
  </div> 