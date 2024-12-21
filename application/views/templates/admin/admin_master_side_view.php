<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo  base_url($user->photo) ;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user->first_name.' '. $user->last_name ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PRINCIPALE </li>
        <li id="manageDashboard" class=" treeview">
          <a href="<?php echo site_url('admin/');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="manageDashboard"><a href="<?php echo site_url('admin/');?>"><i class="fa fa-circle-o"></i> Dashboard  </a></li> 
          </ul>
        </li>
       <li id="manageCategory" class=" treeview">
          <a href="">
            <i class="fa fa-dashboard"></i> <span>Place Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="mainCategory"><a href="<?php echo site_url('admin/category');?>"><i class="fa fa-circle-o"></i>Category  </a></li> 
            <li id="mainSouCategory"><a href="<?php echo site_url('admin/sou_category');?>"><i class="fa fa-circle-o"></i> sou Category  </a></li> 
          </ul>
	   </li>  
	    <li id="manageSerCategory" class=" treeview">
		  <a href="">
            <i class="fa fa-dashboard"></i> <span>Services Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="mainSeCategory"><a href="<?php echo site_url('admin/Category_ser');?>"><i class="fa fa-circle-o"></i>Category  </a></li> 
            <li id="mainSeSouCategory"><a href="<?php echo site_url('admin/sou_category_ser');?>"><i class="fa fa-circle-o"></i> sou Category  </a></li> 
          </ul>
        </li>
	    <li class="header">Clients </li>
		<li id="manageClients" class=" treeview">
          <a href="">
            <i class="fa fa-users"></i> <span>client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="mainClient"><a href="<?php echo site_url('admin/customer');?>"><i class="fa fa-circle-o"></i>all clients  </a></li> 
            <li id="maindevis"><a href="<?php echo site_url('admin/customer/Devis');?>"><i class="fa fa-circle-o"></i>Devis  </a></li> 
           </ul>
        </li>
	   <li class="header">Services </li>
		<li id="manageLiting" class=" treeview">
          <a href="">
            <i class="fa fa-dashboard"></i> <span>Listing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="mainListing"><a href="<?php echo site_url('admin/listings');?>"><i class="fa fa-circle-o"></i>all listings  </a></li> 
            <li id="addListing"><a href="<?php echo site_url('admin/Listings/places');?>"><i class="fa fa-circle-o"></i>ajouter place </a></li> 
            <li id="mainReport"><a href="<?php echo site_url('admin/report');?>"><i class="fa fa-circle-o"></i>Report  </a></li> 
           </ul>
        </li>
		<li id="manageServices" class=" treeview">
          <a href="">
            <i class="fa fa-dashboard"></i> <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="mainServices"><a href="<?php echo site_url('admin/Services');?>"><i class="fa fa-circle-o"></i>all Services  </a></li> 
            <li id="addServices"><a href="<?php echo site_url('admin/Services/places');?>"><i class="fa fa-circle-o"></i>ajouter Services </a></li> 
            <li id="mainReport"><a href="<?php echo site_url('admin/report');?>"><i class="fa fa-circle-o"></i>Report  </a></li> 
           </ul>
        </li>
		<li id="manageEtablissement" class=" treeview">
          <a href="">
            <i class="fa fa-institution"></i> <span>établissement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="categoryE"><a href="<?php echo site_url('admin/etablissement/');?>"><i class="fa fa-circle-o"></i>category établissement  </a></li> 
            <li id="souCategoryE"><a href="<?php echo site_url('admin/etablissement/souCategory');?>"><i class="fa fa-circle-o"></i>sou category </a></li> 
            <li id="Etablissement"><a href="<?php echo site_url('admin/etablissement/etablissement');?>"><i class="fa fa-circle-o"></i>tous établissement  </a></li> 
            <li id="creatEtablissement"><a href="<?php echo site_url('admin/etablissement/create_eta');?>"><i class="fa fa-circle-o"></i>Ajouter</a></li> 
           </ul>
        </li>
		<li id="manageEntreprises" class=" treeview">
          <a href="">
            <i class="fa fa-institution"></i> <span>Entreprises</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="categoryEntreprises"><a href="<?php echo site_url('admin/entreprises/');?>"><i class="fa fa-circle-o"></i>category entreprises  </a></li> 
            <li id="Entreprises"><a href="<?php echo site_url('admin/entreprises/entreprises');?>"><i class="fa fa-circle-o"></i>tous les entreprises  </a></li> 
            <li id="creatEntreprises"><a href="<?php echo site_url('admin/entreprises/create_ent');?>"><i class="fa fa-circle-o"></i>Ajouter</a></li> 
           </ul>
        </li>
       
	 
		 <?php if($this->ion_auth->in_group('admin'))
        {	?>	
	   <li class="header">rôles d'administrateur</li>
	   
	   <li  id="mainGroups"  class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Groups</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="Groups"><a href="<?php echo site_url('admin/groups');?>"><i class="fa fa-circle-o"></i> Gérer Groupes</a></li>
            <li id="manageGroups"><a href="<?php echo site_url('admin/groups/create');?>"><i class="fa fa-circle-o"></i> crée Groupe</a></li> 
          </ul>
        </li>
		
		<li  id="mainUsers"  class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>admins</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="users"><a href="<?php echo site_url('/admin/users/');?>"><i class="fa fa-circle-o"></i> Gérer admins</a></li>
            <li id="manageUsers"><a href="<?php echo site_url('/admin/users/create');?>"><i class="fa fa-circle-o"></i> crée admins</a></li> 
          </ul>
        </li>
		
	 	<?php } ?>  
	   <li class="header">Gestion de Profil</li>
        <li id="manageProfil"><a href="<?php echo site_url('admin/user/profile');?>"><i class="fa fa-cog text-red"></i> <span>Profile</span></a></li>
        <li><a href="<?php echo site_url('admin/user/logout');?>"><i class="fa fa-sign-out text-yellow"></i> <span>sign out</span></a></li>
        <li><a href="#"><i class="fa fa-info-circle text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>