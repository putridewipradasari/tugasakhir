<?php
class M_user extends CI_Model
{

    public function login($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('username', $user);
        $this->db->where('password', md5($pass));

        $data = $this->db->get();

        if ($data->num_rows() == 1) {

            return $data->row();
        } else {
            return false;
        }

        // $query = $this->db->query("SELECT * FROM user WHERE username='$user' AND password=MD5('$pass') LIMIT 1");
        // return $query;
    }
    public function filter($search, $limit, $start, $order_field, $order_ascdesc)
    {
        $this->db->like('nama', $search); // Untuk menambahkan query where LIKE
        $this->db->or_like('username', $search); // Untuk menambahkan query where OR LIKE
        $this->db->or_like('role', $search); // Untuk menambahkan query where OR LIKE
        $this->db->or_like('email', $search); // Untuk menambahkan query where OR LIKE
        $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
        $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

        return $this->db->get('tb_user')->result_array(); // Eksekusi query sql sesuai kondisi diatas
    }

    public function count_all()
    {
        return $this->db->count_all('tb_user'); // Untuk menghitung semua data siswa
    }

    public function count_filter($search)
    {
        $this->db->like('nama', $search); // Untuk menambahkan query where LIKE
        $this->db->or_like('username', $search); // Untuk menambahkan query where OR LIKE
        $this->db->or_like('role', $search); // Untuk menambahkan query where OR LIKE
        $this->db->or_like('email', $search); // Untuk menambahkan query where OR LIKE
        return $this->db->get('tb_user')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
    }

    function get_user_by_id($id)
    {
        $hsl = $this->db->query("SELECT * FROM tb_user WHERE u_id='$id'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id' => $data->u_id,
                    'nama' => $data->nama,
                    'username' => $data->username,
                    // 'password' => md5($data->password),
                    'role' => $data->role,
                    'email' => $data->email,
                );
            }
        }
        return $hasil;
    }

    function simpan_user($nama, $username, $password, $role, $email)
    {
        $pass = md5($password);
        $hasil = $this->db->query("INSERT INTO tb_user (nama,username,password,role,email)VALUES('$nama', '$username', '$pass', '$role', '$email')");
        return $hasil;
    }

    public function update_user($id, $nama, $username, $role, $email)
    {
        // $pass = md5($password);
        $hasil = $this->db->query("UPDATE tb_user SET nama='$nama', username='$username',  role='$role', email='$email' WHERE u_id = '$id' ");
        return $hasil;
    }

    public function hapus_user($id)
    {
        $hasil = $this->db->query("DELETE FROM tb_user WHERE u_id='$id'");
        return $hasil;
    }



    /*function cek_login($table,$where){		
            return $this->db->get_where($table,$where);
        }
        */
}
