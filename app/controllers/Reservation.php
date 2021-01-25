<?php

class Reservation extends Controller {
    public function index($judul)
    {
        $data['judul'] = str_replace('_', ' ', $judul);

        $data['subjudul'] = $this->model('NowShowing_model')->takeColumn('subjudul', $data['judul']);

        $data['coverimg'] = $this->model('NowShowing_model')->takeColumn('coverimg', $data['judul']);

        $data['umur'] = $this->model('NowShowing_model')->takeColumn('umur', $data['judul']);

        $data['takelokasi'] = $this->model('NowShowing_model')->takeLokasi($data['judul']);

        $data['nowshowingchosen'] = $this->model('NowShowing_model')->getOneShow($data['judul']);

        $data['sevendays'] = $this->model('NowShowing_model')->get7Days($data['judul']);


        $this->view('templates/header', $data);
        $this->view('reservation/index', $data);
        $this->view('templates/footer');


    }
    public function payment()
    {
      $data = $_POST;

      $this->view('templates/header', $data);
      $this->view('reservation/payment', $data);
      $this->view('templates/footer');
    }
    public function order()
    {
      $data = $_POST;
      $bkcdhash = crc32( time() . $_SESSION['username'] );
      $data['bkcdhash'] = $bkcdhash;
      $this->model('NowShowing_model')->tambahreservasi($data,$bkcdhash);
      $this->view('templates/header', $data);
      $this->view('reservation/ticketbarcode', $data);
      $this->view('templates/footer');
    }
  }






























  //   public function revajax()
  //   {
  //       $data['judul'] = $_POST['judul'];
  //
  //       $data['nowshowingchosen'] = $this->model('NowShowing_model')->getOneShow();
  //
  //       $data['sevendays'] = $this->model('NowShowing_model')->get7Days();
  //
  //       $this->view('templates/header', $data);
  //       $this->view('reservation/index', $data);
  //       $this->view('templates/footer');
  //
  //
  //   }
  //]
