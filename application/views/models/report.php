 <div id="report_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h3 class="modal-title">Signaler cette annonce</h3>
        <p>Veuillez indiquer quel problème a été trouvé!</p>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('report/addReport') ;?>" method="post" id="reportForm">
          <div class="form-group">
            <div class="radio">
                <input type="radio" name="Report" value="Dupliquer" id="RadioGroup1_0" checked>
                <label for="RadioGroup1_0">Dupliquer</label>
             </div>
             <div class="radio">
                <input type="radio" name="Report" value="Mauvaises informations de contact" id="RadioGroup1_1">
                <label for="RadioGroup1_1">Mauvaises informations de contact </label>
             </div>
             <div class="radio">
                <input type="radio" name="Report" value="Faux service" id="RadioGroup1_2">
                <label for="RadioGroup1_2">Faux service</label>
             </div>
             <div class="radio">
                <input type="radio" name="Report" value="Autre problème" id="RadioGroup1_3" >
              <label for="RadioGroup1_3">Autre problème</label>
             </div>
          </div>
          <div class="form-group">
            <textarea id="text" rows="4" name='text' class="form-control" placeholder="Problem Description" disabled></textarea>
          </div>
          <input type="hidden" name="listing_id" value="<?php echo $listings['id'] ?>">
          <div class="form-group">
            <input value="Submit" class="btn btn-block" type="submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>