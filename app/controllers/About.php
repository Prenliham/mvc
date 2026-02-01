<?php

class About extends Controller{

    public function index($nama = "ilham", $pekerjaan = "programmer")
    {
        $data['pekerjaan'] = $pekerjaan;
        $data['title'] = "Halaman About";
        $data['nama'] = $this->model('User_model')->getUser();

        $this->view('components/headers', $data);
        $this->view('about/index', $data);
        $this->view('components/footer');
    }

    public function page()
    {
        $this->view('components/headers', ['title' => 'about | page']);
        $this->view('about/page');
        $this->view('components/footer');
    }

}