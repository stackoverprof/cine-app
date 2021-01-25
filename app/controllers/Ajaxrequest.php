<?php

class Ajaxrequest extends Controller {
    public function index()
    {
        $data['judul'] = $_POST['judul'];

        $data['nowshowingchosen'] = $this->model('NowShowing_model')->getOneShow();

        $data['sevendays'] = $this->model('NowShowing_model')->get7Days();

        $this->view('templates/header', $data);

    }
  }
