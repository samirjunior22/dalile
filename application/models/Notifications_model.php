<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Notifications_model extends MY_Model {
 
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	 
	public function create_notification($user_id, $from, $content , $photo) {
		
		$data = array(
			'user_id'   => $user_id,
			'from'      => $from,
			'content'   => $content,
			'photo'   => $photo,
			'generated_on' => date('Y-m-j H:i:s'),
			'status' => 0
		);
		
		return $this->db->insert('notifications', $data);
	}	 
	public function delet_notification($not_id) {
		
		
		if($not_id) {
			$this->db->where('id', $not_id);
			$delete = $this->db->delete('notifications');
			return ($delete == true) ? true : false;
		}
	}public function delet_notification_all($user_id) {
		
		
		if($user_id) {
			$this->db->where('user_id', $user_id);
			$delete = $this->db->delete('notifications');
			return ($delete == true) ? true : false;
		}
	}
 
	public function get_unread_notifications($user_id) {

		$this->db->where('user_id', $user_id);
	    $this->db->order_by('id', 'desc');
		return $this->db->get('notifications', 5)->result();

	}
	public function get_all_notifications($user_id) {

		$this->db->where('user_id', $user_id);
	    $this->db->order_by('id', 'desc');
		return $this->db->get('notifications')->result();

	}
 
    public function get_unread_notifications_count($user_id) {

        $this->db->from('notifications');
        $this->db->where('user_id', $user_id);
        $this->db->where('status', 0);
        return $this->db->count_all_results();
    }

	 
	public function mark_notification_as_read($notification_id, $user_id) {

		$data = array(
			'status' => 1,
			'viewed_on' => date('Y-m-j H:i:s')
		);
		if($notification_id === 'all') {
			$this->db->where('user_id', $user_id);
			$this->db->where('status', 0);
		} else {
			$this->db->where('id', $notification_id);
		}
		return $this->db->update('notifications', $data);
	}
	
	/* ******  Admin notification *********** */
	
	public function create_notification_admin($from, $content ) {
		
		$data = array(
		    'from_id'      => $from,
			'content'   => $content,
			'generated_on' => date('Y-m-j H:i:s'),
			'status' => 0
		);
		
		return $this->db->insert('notifications_admin', $data);
	}
	
	public function get_unread_notif_admin() {

	 
	    $this->db->order_by('id', 'desc');
		return $this->db->get('notifications_admin', 5)->result();

	}
	public function notif_admin_count() {

        $this->db->from('notifications_admin');
        $this->db->where('status', 0);
        return $this->db->count_all_results();
    }

 
	
}
