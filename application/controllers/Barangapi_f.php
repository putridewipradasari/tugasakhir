<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/RESTController.php';
require APPPATH . '/libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Barangapi_f extends RestController
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
        $search = $this->get('search');
        $limit = $this->get('limit');
        $start = $this->get('start');
        $order_field = $this->get('order_field');
        $order_ascdesc = $this->get('order_ascdesc');

        if ($search !== null || $limit !== null || $start !== null || $order_field !== null || $order_ascdesc !== null ) {
            $filter = $this->brg->filter($search, $limit, $start, $order_field, $order_ascdesc);
        } 
        else{
            $filter = $this->brg->barang_list();
        }
        
        if ($filter) {
            $this->response([
                'status' => true,
                'data' => $filter
            ], RESTController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'barang tidak ditemukan'
            ], 404);
        }
    }
    function indexget()
    {

        $id = $this->get('id');
        $search = $this->get('search');
        $limit = $this->get('limit');
        $start = $this->get('start');
        $order_field = $this->get('order_field');
        $order_ascdesc = $this->get('order_ascdesc');
        if ($id === null) {
            $barang = $this->brg->barang_list();
        } elseif ($search !== null) {
            $filter = $this->brg->filter($search, $limit, $start, $order_field, $order_ascdesc);
        } else {
            $barang = $this->brg->barangbyid($id);
        }

        if ($barang) {
            $this->response([
                'status' => true,
                'data' => $barang
                /*'filter' => $filter,
                'count_all' => $count_all,
                'count_fillter' => $count_fillter,*/
            ], RESTController::HTTP_OK);
        }
        /*elseif ($filter) {
            $this->response([
                'status' => true,
                //'data' => $barang,
                'filter' => $filter,
                /*'count_all' => $count_all,
                'count_fillter' => $count_fillter,
            ], RESTController::HTTP_OK);
        } elseif ($count_all) {
            $this->response([
                'status' => true,
                'count_all' => $count_all,
            ], RESTController::HTTP_OK);
        } elseif ($count_fillter) {
            $this->response([
                'status' => true,
                'count_fillter' => $count_fillter,
            ], RESTController::HTTP_OK);
        }*/ else {
            $this->response([
                'status' => false,
                'message' => 'barang tidak ditemukan'
            ], 404);
        }
    }
}
