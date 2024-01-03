<?php

namespace App\Controllers;

use App\Models\pasienModel;
use App\Models\daftarModel;
use App\Libraries\MY_TCPDF as TCPDF;

class DaftarController extends BaseController
{
    protected $pasienModel;
    protected $daftarModel;

    public function __construct()
    {
        $this->pasienModel = new pasienModel();
        $this->daftarModel = new daftarModel();
    }

    public function dataDaftar()
    {
        if ($keyword = $this->request->getVar('keyword')) {
            $daftar = $this->daftarModel->GetDaftar($keyword)->findAll();
            if (empty($daftar)) {
                $daftar = $this->daftarModel->GetAll();
            }
        } else {
            $daftar = $this->daftarModel->GetAll();
        }
        $data = [
            'title' => 'Laporan',
            'daftar' => $daftar,
        ];

        return view('stats/stats', $data);
    }

    public function hapus($id)
    {
        $this->daftarModel->where('id_daftar', $id)->delete();

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');

        return redirect()->to('/laporan');
    }

    public function edit($id)
    {
        $daftar = $this->daftarModel->cari($id)->first();
        $pasien = $this->daftarModel->GetPasien();
        $poli = $this->daftarModel->GetPoli();
        $dokter = $this->daftarModel->GetDokter();
        $data = [
            'title' => 'Ubah Laporan Pendaftaran',
            'daftar' => $daftar,
            'pasien' => $pasien,
            'dokter' => $dokter,
            'poli' => $poli
        ];

        return view('stats/update', $data);
    }

    public function update($id)
    {
        $this->daftarModel->save([
            'id_daftar' => $id,
            'tgl_daftar' => $this->request->getVar('tgl_daftar'),
            'id_pasien' => $this->request->getVar('id_pasien'),
            'id_poli' => $this->request->getVar('id_poli'),
            'id_dokter' => $this->request->getVar('id_dokter'),
            'kasus' => $this->request->getVar('kasus'),
            'biaya' => $this->request->getVar('biaya')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/laporan');
    }

    public function cetak($id)
    {
        $daftar = $this->daftarModel->GetDaftar($id)->first();

        // dd($daftar);

        $data = [
            'title' => 'Invoice',
            'daftar' => $daftar
        ];

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('RS PERMATA');
        $pdf->SetTitle('PDF RS PERMATA');
        $pdf->SetSubject('TCPDF PENDAFTARAN');
        $pdf->SetKeywords('TCPDF, PDF, example, PENDAFTARAN');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        //view mengarah ke invoice.php
        $html = view('stats/invoice', $data);

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------
        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('PENDAFTARAN.pdf', 'I');
    }
}
