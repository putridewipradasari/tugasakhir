<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/RESTController.php';
require APPPATH . '/libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Barangapi extends RestController {

    function __construct() {
        parent::__construct();
		$this->load->model('BarangModel', 'brg');

        $this->methods['index_get']['limit'] = 20;
    }
    //Menampilkan data kontak
    

    function index_get() {

        $id = $this->get('id');
        if ($id === null) {
            $barang = $this->brg->barang_list();
        } else {
            $barang = $this->brg->barangbyid($id);
        }
        if ($barang) {
            $this->response([
                'status' => true,
                'data' => $barang
            ], RESTController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'barang tidak ditemukan'
            ], 404);
        }
    }


    function getbasic()
    {

        $id = $this->get('id');
        $order_ascdesc = $this->get('order_ascdesc');
        if ($id === null ) {
            $barang = $this->brg->barang_list();
            
        } else {
            $barang = $this->brg->barangbyid($id);
        }

        if ($barang) {
            $this->response([
                'status' => true,
                'data' => $barang
            ], RESTController::HTTP_OK);
        }
         else {
            $this->response([
                'status' => false,
                'message' => 'barang tidak ditemukan'
            ], 404);
        }
    }
    public function index_delete(){
        $id = $this->delete('id');

        if ($id === null){
            $this->response([
                'status' => false,
                'data' => 'id kosong'
            ], RESTController::HTTP_BAD_REQUEST);
        } else {
            if ($this->brg->hapusbarang($id) > 0) {
                //berhasil
                    $this->response([
                        'status' => true,
                        'id' => $id,
                        'message' => 'barang berhasil dihapus'
                    ], RESTController::HTTP_OK); 
            } else {
                //gagal
                    $this->response([
                        'status' => false,
                        'message' => 'id tidak ditemukan'
                    ], RESTController::HTTP_BAD_REQUEST);
                    
                }
            }
        }public function index_post(){
            $data = [
                'barang' => $this->post('barang'),
                'merek' => $this->post('merek'),
                'jumlah' => $this->post('jumlah'),
                'hargasatuan' => $this->post('hargasatuan'),
                'totalharga' => $this->post('totalharga'),
                'keterangan' => $this->post('keterangan')
            ];

            if($this->brg->simpanbarang($data) > 0){
                $this->response([
                    'status' => true,
                    'message' => 'barang berhasil ditambah'
                ], RESTController::HTTP_CREATED); 
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'gagal menambah data'
                ], RESTController::HTTP_BAD_REQUEST);
            }
        }

        public function index_put(){
            $id = $this->put('id');
            $data = [
                'barang' => $this->put('barang'),
                'merek' => $this->put('merek'),
                'jumlah' => $this->put('jumlah'),
                'hargasatuan' => $this->put('hargasatuan'),
                'totalharga' => $this->put('totalharga'),
                'keterangan' => $this->put('keterangan')
            ];

            if($this->brg->updatebarang($data, $id) > 0){
                $this->response([
                    'status' => true,
                    'message' => 'barang berhasil diubah'
                ], RESTController::HTTP_OK); 
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'gagal mengubah data'
                ], RESTController::HTTP_BAD_REQUEST);
            }

        }
    function hapus_barang($id)
    {

        $response = $this->_client->request('DELETE', 'Barangapi', [
            'form_params' => [
                'id' => $id,
                'X-API-KEY' => 'why'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    //Masukan function selanjutnya disini
}
