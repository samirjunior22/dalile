<?php 

class Model_email extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}

    public function send_mail($email, $id ,$pack , $password, $code) {
  
   if ($pack == 1) {  $pac = 'Pack Starter' ;}elseif($pack == 2) {$pac = 'Pack Professionnel' ; }else {$pac = 'Pack entreprise' ;}
  
    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.googlemail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '7';
    $config['smtp_user']    = 'eldaliledz@gmail.com';
    $config['smtp_pass']    = 'biabboy2016';
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html';
   	$message = 	$this->html_content($email, $id ,$pac , $password, $code);
	 
	   $from_email = "No-repit@eldalile.com"; 
         
        $this->load->library('email' , $config);
	    $this->email->from($from_email, 'Identification');
        $this->email->to($email);
        $this->email->subject('Identification');
        $this->email->message($message);
        
        if($this->email->send())
          return true ; 
        else
            return false ; 
    } 
  	
	
    public function send_pass($email, $id ,$password, $code) {
  
    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.googlemail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '7';
    $config['smtp_user']    = 'eldaliledz@gmail.com';
    $config['smtp_pass']    = 'biabboy2016';
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html';
       
	   	$message = 	" <html>
						<head>
							<title>Changer Mote De pass </title>
						</head>
						<body>
							<h2>Changer Mote De pass </h2>
							<p>Votre compte:</p>
							<p>Email: ".$email."</p>
							<p>Mot de Pass: ".$password."</p>
							<p>Veuillez cliquer sur le lien ci-dessous pour activer votre compte.</p>
							<h4><a href='".base_url()."register/activate/".$id."/".$code."'>Changer</a></h4>
						 </body>
					 </html>
						";
	 
	   $from_email = "eldalile@eldalile.com"; 
         
        $this->load->library('email' , $config);
	    $this->email->from($from_email, 'Identification');
        $this->email->to($email);
        $this->email->subject(' Changer Mote de pass ');
        $this->email->message($message);
        
        if($this->email->send())
          return true ; 
        else
            return false ; 
    } 
  	
	
  public function send_mail_auth($email, $pack , $password) {
  
   if ($pack == 1) {  $pac = 'Pack Starter' ;}elseif($pack == 2) {$pac = 'Pack Professionnel' ; }else {$pac = 'Pack entreprise' ;}
  
    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.googlemail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '7';
    $config['smtp_user']    = 'eldaliledz@gmail.com';
    $config['smtp_pass']    = 'biabboy2016';
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html';
       
	   	$message = 	" <html>
						<head>
							<title> L'équipe El Dalile</title>
						</head>
						<body>
							<h2>Merci de votre inscription..</h2>
							<p>Votre compte:</p>
							<p>Email: ".$email."</p>
							<p>Mot de Pass: ".$password."</p>
							<p>Pack : ".$pac."</p>
						 </body>
					 </html>
						";
	 
	   $from_email = "eldaliledz@eldalile.com"; 
         
        $this->load->library('email' , $config);
	    $this->email->from($from_email, 'L\'équipe De El Dalile');
        $this->email->to($email);
        $this->email->subject('Inscription ');
        $this->email->message($message);
        
        if($this->email->send())
          return true ; 
        else
            return false ; 
    } 
	
 public function send_mail_pack($email, $name,$numero , $pack, $monton ,$date_add ,$date_fin) {
  
    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.googlemail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '7';
    $config['smtp_user']    = 'eldaliledz@gmail.com';
    $config['smtp_pass']    = 'biabboy2016';
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html';
       
	   	$message = 	" <html>
						<head>
							<title> L'équipe El Dalile</title>
						</head>
						<body>
							<h2>Bonjour ".$name.", </h2>
							<p>Une facture a été générée le ".$date_add."</p>
							<p>Ci-dessous les informations de la facture : </p>
							<p>Facture: ".$numero." </p>
							<p> Montant: ".$monton." Dzd</p>
                            <h3>Commande</h3>
                            <p>".$pack." -   (".date('Y-m-d' ,strtotime($date_add))." - ".date('Y-m-d' ,strtotime($date_fin)).") ".$monton." dzd</p>
							<br>
							<br>
							<p>Vous pouvez vous connecter à votre espace client pour consulter la facture https://eldalile.com/customer/facture/facture</p>
						 </body>
					 </html>
						";
	 
	   $from_email = "no-reply@eldalile.com"; 
         
        $this->load->library('email' , $config);
	    $this->email->from($from_email, 'L\'équipe De El Dalile');
        $this->email->to($email);
        $this->email->subject('Inscription ');
        $this->email->message($message);
        
        if($this->email->send())
          return true ; 
        else
            return false ; 
    }
	
	public function valid_mail($email)
	{
		 
	if($this->email->valid_email($email)){
		return true ;
		
	}else{
	   false	;
	}
		 
	}
	
 public function html_content($email, $id ,$pac ,$password, $code){
 $html ='<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> </title>
  <style type="text/css">
    #outlook a {padding:0;}
    body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;} 
    .ExternalClass {width:100%;}
    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div, .ExternalClass blockquote {line-height: 100%;}
    .ExternalClass p, .ExternalClass blockquote {margin-bottom: 0; margin: 0;}
    #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
    
    img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;} 
    a img {border:none;} 
    .image_fix {display:block;}

    p {margin: 1em 0;}

    h1, h2, h3, h4, h5, h6 {color: black !important;}
    h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: black;}
    h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {color: black;}
    h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {color: black;}

    table td {border-collapse: collapse;}
    table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }

    a {color: #3498db;}
    p.domain a{color: black;}

    hr {border: 0; background-color: #d8d8d8; margin: 0; margin-bottom: 0; height: 1px;}

    @media (max-device-width: 667px) {
      a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue;
        pointer-events: none;
        cursor: default;
      }

      .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
      }

      h1[class="profile-name"], h1[class="profile-name"] a {
        font-size: 32px !important;
        line-height: 38px !important;
        margin-bottom: 14px !important;
      }

      span[class="issue-date"], span[class="issue-date"] a {
        font-size: 14px !important;
        line-height: 22px !important;
      }

      td[class="description-before"] {
        padding-bottom: 28px !important;
      }
      td[class="description"] {
        padding-bottom: 14px !important;
      }
      td[class="description"] span, span[class="item-text"], span[class="item-text"] span {
        font-size: 16px !important;
        line-height: 24px !important;
      }

      span[class="item-link-title"] {
        font-size: 18px !important;
        line-height: 24px !important;
      }

      span[class="item-header"] {
        font-size: 22px !important;
      }

      span[class="item-link-description"], span[class="item-link-description"] span {
        font-size: 14px !important;
        line-height: 22px !important;
      }

      .link-image {
        width: 84px !important;
        height: 84px !important;
      }

      .link-image img {
        max-width: 100% !important;
        max-height: 100% !important;
      }
    }

    @media (max-width: 500px) {
      .column {
        display: block !important;
        width: 100% !important;
        padding-bottom: 8px !important;
      }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
      a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue;
        pointer-events: none;
        cursor: default;
      }

      .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
      }
    }

  </style>
 
</head>
<body style="width:100% !important;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="margin:0; padding:0; width:100% !important; line-height: 100% !important; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;background-color: #F9FAFB;" width="100%">
  <tbody><tr>
    <td width="10" valign="top">&nbsp;</td>
    <td valign="top" align="center">
 
      <table cellpadding="0" cellspacing="0" border="0" align="center" style="width: 100%; max-width: 600px; background-color: #FFF; border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;" id="contentTable">
        <tbody><tr>
          <td width="600" valign="top" align="center" style="border-collapse:collapse;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="background: #F9FAFB;" width="100%">
<tbody><tr>
<td align="center" valign="top">
<div style="font-family: &quot;lato&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 28px;">&nbsp;</div>
</td>
</tr>
</tbody></table>
<table align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #E0E4E8;" width="100%">
<tbody><tr>
<td align="center" style="padding: 56px 56px 28px 56px;" valign="top">
<a style="color: #3498DB; text-decoration: none;" href="https://www.getrevue.co/profile/brightonsmith?utm_campaign=Subscription+confirmation&amp;utm_content=profile-image&amp;utm_medium=email&amp;utm_source=confirmation" target="_blank">
<img style="width: 56px;  border: 0;" alt=" Welcome to Eldalile" src="https://eldalile.com/assets/images/logo-facture.png">
</a></td>
</tr>
<tr>
<td align="center" style="padding: 0 56px 28px 56px;" valign="top">
<div style="font-family: &quot;lato&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 28px;font-size: 20px; color: #333;">
Vous devez procéder à une vérification simple avant de créer votre compte<strong> Eldalile:</strong> </div>
</td>
</tr>
<tr>
<td align="center" style="padding: 0 56px; padding-bottom: 56px;" valign="top">
<div> 
 
 <a href="'.base_url()."register/activate/".$id."/".$code.'" style="background-color:#38ccff;border-radius:50px;color:#ffffff;display:inline-block;font-family: "lato", "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:18px;font-weight: bold;line-height:40px;text-align:center;text-decoration:none;width:270px;-webkit-text-size-adjust:none;" target="_blank">Activer mon compte</a>
 </div> 
 
</td>
</tr>
<tr>
<td align="center" bgcolor="#F9FAFB" style="padding: 28px 56px;" valign="top">
<div style="font-family: &quot;lato&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 28px;font-size: 16px; color: #666666; font-weight: 900;"> Vos informations de connexion sont les suivants :</div>
<div style="font-family: &quot;lato&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 28px;font-size: 16px; color: #000;">
Email :<a style="color: #55ACEE;" target="_blank" href="#">'.$email.'</a>
&nbsp;&nbsp;<br>
 Mote de pass : ******
 <br>
 Plan : '.$pac.'
</div>
</td>
</tr>
</tbody></table>
<table align="center" border="0" cellpadding="0" cellspacing="0" style="background: #F9FAFB;" width="100%">
<tbody><tr>
<td align="center" style="padding: 28px 56px;" valign="top">
<div style="font-family: &quot;lato&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 28px;font-size: 16px; line-height: 24px; color: #A7ADB5;">Vous pouvez se connecter à votre espace client afin de visualiser et de payer la facture
  </div>
</td>
</tr>
<tr>
<td align="center" style="padding: 0 56px 28px 56px;" valign="top">
<div style="font-family: &quot;lato&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 28px;font-size: 16px; color: #A7ADB5;">
 
</div>
</td>
</tr>
<tr>
<td align="center" style="padding: 0 56px 28px 56px;" valign="middle">
<span style="font-family: &quot;lato&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 28px;font-size: 16px; color: #A7ADB5; vertical-align: middle;">Powered by</span>
&nbsp;
<a style="border: 0;" href="https://eldalile.com" target="_blank">Eldalile.com
</a></td>
</tr>
</tbody></table>

          </td>
        </tr>
      </tbody></table>
   
    </td>
    <td width="10" valign="top">&nbsp;</td>
  </tr>
</tbody></table>   
</body>';
return $html;
	 
 }

}