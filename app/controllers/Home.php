<?php

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['nowshowing'] = $this->model('NowShowing_model')->getAllShow();
        $data['nowshowingunique'] = $this->model('NowShowing_model')->getAllShowUnique();
        $this->view('templates/mainheader', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

}
