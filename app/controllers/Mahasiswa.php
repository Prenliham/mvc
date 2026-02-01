<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['title'] = 'Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswa();

        $this->view('components/headers', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('components/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail | Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        $this->view('components/headers', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('components/footer');
    }

    public function tambah()
    {
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0)
        {
            Flasher::setFlash('Berhasil','ditambahkan', 'success' );
            header('Location:' . BASEURL .'/mahasiswa' );
            exit;
        }
        else{
            Flasher::setFlash('Gagal','ditambahkan', 'danger' );
            header('Location:' . BASEURL .'/mahasiswa' );
            exit;
        }
    }

    public function delete($id)
    {
        if($this->model('Mahasiswa_model')->deleteDataMahasiswa($id) > 0)
        {
            Flasher::setFlash('Berhasil','dihapus', 'success' );
            header('Location:' . BASEURL .'/mahasiswa' );
            exit;
        }
        else{
            Flasher::setFlash('Gagal','dihapus', 'danger' );
            header('Location:' . BASEURL .'/mahasiswa' );
            exit;
        }
    }

    public function getUbah(){
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if($this->model('Mahasiswa_model')->updateDataMahasiswa($_POST) > 0)
        {
            Flasher::setFlash('Berhasil','diubah', 'success' );
            header('Location:' . BASEURL .'/mahasiswa' );
            exit;
        }
        else{
            Flasher::setFlash('Gagal','diubah', 'danger' );
            header('Location:' . BASEURL .'/mahasiswa' );
            exit;
        }
    }
}