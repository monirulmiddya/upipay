<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model User_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Monirul Middya
 * @param     ...
 * @return    ...
 *
 */

class User_model extends CI_Model {

  // ------------------------------------------------------------------------

	private $table = "users";

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function insert($data)
  {
    $this->db->insert($this->table, $data);
		return $this->db->insert_id();
  }

  public function update($id,$data)
  {
    $this->db->update($this->table, $data);
    $this->db->where("id", $id);
		return $this->db->affected_rows();
  }

  public function get($id)
  {
    $this->db->select("*");
		$this->db->from($this->table);
    $this->db->where("id", $id);
    $this->db->limit(1);
		return $this->db->get()->row();
  }

  public function get_filter($phone = null, $email = null, $upi_id = null)
  {
    $this->db->select("*");
		$this->db->from($this->table);
    if(!empty($phone)){
			$this->db->where("phone", $phone);
		}
    if(!empty($email)){
			$this->db->where("email", $email);
		}
    if(!empty($upi_id)){
			$this->db->where("upi_id", $upi_id);
		}
    $this->db->limit(1);
		return $this->db->get()->row();
  }

  public function get_all($status = null, $limit = null, $offset = null)
  {
    $this->db->select("*");
		$this->db->from($this->table);
		if(!empty($status)){
			$this->db->where("status", $status);
		}
		if(!empty($limit) && !empty($offset)){
			$this->db->limit($limit, $offset);
		}
		return $this->db->get()->result();
  }

  // ------------------------------------------------------------------------

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
