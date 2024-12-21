 <div class="content-wrapper">
  <section class="content-header">
      <h1>
       tableau de bord
        <small>Panneau de contrôle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">tableau de bord</li>
      </ol>
    </section>
	
 <section class="content">
	<h1>Bienvenue sur le tableau de bord </h1>
    <div class="row">
        <div class="col-lg-12">
            <?php
            echo anchor('admin/dashboard/clear-cache','vider le cache','class="btn btn-primary"');
             
            ?>
        </div>
 </div>
	
 </section>	
</div>

  <script type="text/javascript">
  $(document).ready(function() {
  $("#mainDashboard").addClass('active');
    $("#manageDashboard").addClass('active'); 
	
	 });
  </script>