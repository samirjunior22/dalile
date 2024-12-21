<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
 
class Articles extends \Restserver\Libraries\REST_Controller
{
    public function __construct() {
        parent::__construct();
       $this->load->model('model_category');
       $this->load->model("Model_ser_category");
       $this->load->model("Model_commune");
           } 


    public function servicesCat_get(){
	  $item_array=array();
       $ser = $this->Model_ser_category->getCategoryData();
      foreach($ser as $count){   
		  
			     $nested_data['id'] =  $count['id'] ;
			      $nested_data['name'] =  $count['name'] ;
			     
			      
		           $item_array []= $nested_data;
		       } 
		  $rateData =  $item_array;
	  $this->response($rateData, REST_Controller::HTTP_OK);
  }


    public function servicesSouCat_get(){
	    $item_array=array();
	    $cat = $this->input->get('category') ;
	 
	  	$sou = $this->Model_ser_category->getSouCategoryByCat($cat); 
     foreach($sou as $count){   
	  
			      $nested_data['id'] =  $count['id'] ;
			      $nested_data['name'] =  $count['name'] ;
			     $item_array []= $nested_data;
		       } 
		  $rateData =  $item_array;
	  $this->response($rateData, REST_Controller::HTTP_OK);
   }
 
    public function placesCat_get(){
	  $item_array=array();
      $ser = $this->model_category->getCategoryData(); 
       $this->load->library('Authorization_Token');
 
	    foreach($ser as $count){   
		 
			       $nested_data['id'] =  $count['id'] ;
			        $nested_data['name'] =  $count['name'] ;
			        $item_array []= $nested_data;
		          
		 
		      } 
		  $rateData =  $item_array;
		 
			
	   $this->response($rateData, REST_Controller::HTTP_OK);
  }
  
    public function placesSouCat_get(){
		$cat = $this->input->get('category') ;
	    $item_array=array();
		$sou =   $this->model_category->getSouCategoryDataById($cat); 
		  foreach($sou as $count){   
		    
			      $nested_data['id'] =  $count['id'] ;
			      $nested_data['name'] =  $count['name'] ;
			       $item_array []= $nested_data;
		         } 
		  $rateData =  $item_array;
				
	   $this->response($rateData, REST_Controller::HTTP_OK);
	}   

	public function wilaya_get(){
	  $item_array=array();
       $ser = $this->Model_commune->getWilayaData();
      foreach($ser as $count){   
		  
			     $nested_data['id'] =  $count['id'] ;
			      $nested_data['name'] =  $count['name'] ;
			     
			      
		           $item_array []= $nested_data;
		       } 
		  $rateData =  $item_array;
	  $this->response($rateData, REST_Controller::HTTP_OK);
  }
   
  
    public function updateArticle_put()
    {
        header("Access-Control-Allow-Origin: *");
    
        // Load Authorization Token Library
        $this->load->library('Authorization_Token');

        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE)
        {
            # Update a User Article


            # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
            $_POST = json_decode($this->security->xss_clean(file_get_contents("php://input")), true);
            
            $this->form_validation->set_data([
                'id' => $this->input->post('id', TRUE),
                'title' => $this->input->post('title', TRUE),
                'description' => $this->input->post('description', TRUE),
            ]);
            
            # Form Validation
            $this->form_validation->set_rules('id', 'Article ID', 'trim|required|numeric');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|max_length[200]');
            if ($this->form_validation->run() == FALSE)
            {
                // Form Validation Errors
                $message = array(
                    'status' => false,
                    'error' => $this->form_validation->error_array(),
                    'message' => validation_errors()
                );

                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
            else
            {
                // Load Article Model
                $this->load->model('article_model', 'ArticleModel');

                $update_data = [
                    'user_id' => $is_valid_token['data']->id,
                    'id' => $this->input->post('id', TRUE),
                    'title' => $this->input->post('title', TRUE),
                    'description' => $this->input->post('description', TRUE),
                ];

                // Update an Article
                $output = $this->ArticleModel->update_article($update_data);

                if ($output > 0 AND !empty($output))
                {
                    // Success
                    $message = [
                        'status' => true,
                        'message' => "Article Updated"
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                } else
                {
                    // Error
                    $message = [
                        'status' => FALSE,
                        'message' => "Article not update"
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            }

        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}