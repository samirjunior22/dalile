<!-- Modal -->
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class=""><a href="#signin" data-toggle="tab">Connexion </a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
         <div class="tab-pane  fade active in" id="signin">
            
            <fieldset>
            <!-- Sign In Form -->
             <!-- Password input-->
            <div class="white_box">
                	<h3>  </h3>
 
			   <div id="error" class="   alert-danger " ></div>
			     <form id="formLogin" >
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password"  required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Connexion</button>
						    <p class="pull-right"><a href="<?=base_url('login/forgetpassword'); ?>">mote de pass oublié </a></p>
                        </div>
                  </form>
                  </div>
            </fieldset>
        
        </div>
        
    </div>
      </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div>