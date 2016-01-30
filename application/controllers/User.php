<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	/**
	 * 登陆
	 * @return [type] [description]
	 */
	public function login()
	{

		// 获取参数
		// username / password
		$username = $this->input->get_post('username');
		$password = $this->input->get_post('password');

		if ($username === "ming" && $password  === "juan") {
			$sessionArr = array(
				"sessionId" => 'minghaha'
			);
			json_return(1001, $sessionArr);
		} else {
			json_return(10004);
		}
	}

	/**
	 * 退出
	 * @return [type] [description]
	 */
	public function logout()
	{
		json_return(1001);
	}
}
