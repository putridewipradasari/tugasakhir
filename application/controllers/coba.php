<?php
defined('BASEPATH') or exit('No direct script access allowed');

class coba extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('url', 'download'));
    }

    public function index()
    {
        $this->load->view('v_do');
    }

    public function lakukan_download()
    {
        force_download('assets/uploads/id-card/idcard-2.png', NULL);
    }
}
