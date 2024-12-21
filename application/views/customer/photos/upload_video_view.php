<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
 <style>
 .button {
  border-style: solid;
  border-width: 0px;
  cursor: pointer;
  font-family: "museo-sans-fontspring", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
  font-weight: normal;
  line-height: normal;
  margin: 0 0 1.25rem;
  position: relative;
  text-decoration: none;
  text-align: center;
  -webkit-appearance: none;
  -webkit-border-radius: 0;
  display: inline-block;
  padding-top: 1rem;
  padding-right: 2rem;
  padding-bottom: 1.0625rem;
  padding-left: 2rem;
  font-size: 1rem;
  background-color: #00c7e4;
  border-color: #009fb6;
  color: #FFFFFF;
  border-radius: 3px;
  border-bottom: 1px solid #008194;
  text-transform: uppercase;
  font-weight: 500;
  transition: background-color 300ms ease-out;
}

h1 {
  font-weight: 500;
  font-size: 1.5rem;
  text-transform: uppercase;
  font-family: "museo-sans-fontspring", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
  color: #565656;
}

#upload-input {
  height: 0px;
  width: 0px;
  overflow: hidden
}

textarea {
  background-color: #DDDDDD;
  color: grey;
}

#loader {
  display: none;
}

p {
  font-family: "museo-sans-fontspring", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
  color: #525252;
}

a {
  color: #00c7e4;
  text-decoration: none;
}
 </style>
 <div class="content-wrapper">
  <section class="content"> 
      <div class="box">
	      <h3>Ajouter video</h3>
		  <div class="box-body pad">  
		  
            <button href="#" class="btn btn-primary" id="upload_widget_opener">Upload video</button>
  

<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>  
 


<script type="text/javascript">  
  var myUploadWidget;
    var  Widget;
  document.getElementById("upload_widget_opener").addEventListener("click", function() {
    myUploadWidget = cloudinary.openUploadWidget({ 
      cloudName: 'dwh7zh4uc', uploadPreset: 'pway13ll'}, (error, result) => { });
  }, false);
  
 

</script>
		  </div> 
		</div>
	 </section>
 </div>
 

<script type="text/javascript">
 
 
</script>