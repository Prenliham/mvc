<?php

class Home extends Controller{

    public function index(){
        $data['nama'] = $this->model('User_model')->getUser();
        $data['title'] = "Home";

        $this->view('components/headers', $data);
        $this->view('home/index', $data);
        $this->view('components/footer');
    }

}