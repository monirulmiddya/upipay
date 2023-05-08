<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller User
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Monirul Middya
 * @param     ...
 * @return    ...
 *
 */

class User extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		$this->load->model(['user_model']);
  }

  public function index()
  {
		// $this->load->view("layout/header", ['title' => $title]);

  }

	private function save_view()
  {
      view("user/register", null, "Portal | User Register");
  }
	
	private function generate_upi_id($phone)
	{
		$upi_id = "{$phone}@upipay";
		while(true){
			if(!$this->user_model->get_filter(null, null, $upi_id)){
				return $upi_id;
			}else{
				$rand = rand(1111, 9999);
				$upi_id = "{$phone}-{$rand}@upipay";
			}
		}
	}

	public function register($id = null)
  {
    try {
      if (is_post()) {
        $this->form_validation->set_rules(
          [
            [
              'field' => 'first_name',
              'label' => 'First Name',
              'rules' => 'trim|required',
            ],
            [
              'field' => 'last_name',
              'label' => 'Last Name',
              'rules' => 'trim|required',
            ],
            [
              'field' => 'email',
              'label' => 'Email',
              'rules' => 'trim|required|valid_email|is_unique[users.email]',
							'errors' => array(
                'is_unique' => '%s already taken',
              )
            ],
            [
              'field' => 'phone',
              'label' => 'phone',
              'rules' => 'trim|required|is_unique[users.phone]',
							'errors' => array(
                'is_unique' => '%s already taken',
              )
            ],
            [
              'field' => 'password',
              'label' => 'Password',
              'rules' => "trim|required",
            ]
          ]
        );

        if ($this->form_validation->run() == TRUE) {

					$ip = $_SERVER['REMOTE_ADDR'];

					$data = [
						"first_name" => $this->input->post("first_name"),
						"last_name" => $this->input->post("last_name"),
						"email" => $this->input->post("email"),
						"phone" => $this->input->post("phone"),
						"ip" => $ip,
						"upi_id" => $this->generate_upi_id($this->input->post("phone")),
						"status" => "inactive",
						"password" => password_hash($this->input->post("password"), PASSWORD_BCRYPT),
					];

					if($this->user_model->insert($data)){
              set_message("success", "User registred successfully");
          } else {
              set_message("danger", "User registration failed");
          }
          redirect(base_url("register"), 'refresh');
        } else {
          $this->save_view();
        }
      } else {
        $this->save_view();
      }
    } catch (\Throwable $th) {
			set_message("danger", "Server Internal error");
      redirect(base_url('register'), 'refresh');
    }
  }


}


/* End of file User.php */
/* Location: ./application/controllers/User.php */
