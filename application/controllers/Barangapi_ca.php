<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/RESTController.php';
require APPPATH . '/libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Barangapi_ca extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel', 'brg');

        $this->methods['index_get']['limit'] = 20;
    }
    //Menampilkan data kontak


    function index_get()
    {

        $count_all = $this->brg->count_all();
        if ($count_all) {
            $this->response([
                'status' => true,
                'count_all' => $count_all
            ], RESTController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'barang tidak ditemukan'
            ], 404);
        }
    }
}
