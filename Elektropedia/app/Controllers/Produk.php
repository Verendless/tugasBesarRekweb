<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{


    protected $produkModel;
    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Produk',
            'produk' => $this->produkModel->getProduk()

        ];
        return view('produk/index', $data);
    }
    // public function detail($idBarang = 0)
    // {

    //     $data = [
    //         'title' => 'Produk',
    //         'produk' => $this->produkModel->getProduk($idBarang)

    //     ];
    //     if (empty($data['produk'])) {

    //         return redirect()->to('/produk');
    //     }
    //     return view('produk/detail', $data);
    // }

    public function create()
    {
        // $komik =  $this->komikModel->findAll();
        $data = [
            'title' => 'Form Tambah Produk',
            'validation' => \Config\Services::validation()
        ];
        return view('produk/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            // 'judul' => 'required|is_unique[komik.judul]'
            'nama' => [
                'rules' => 'required|is_unique[produk.nama]',
                'errors' => [
                    'required' => '{field} Produk harus diisi',
                    'is_unique' => '{field} Produk sudah terdaftar'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => "Ukuran gambar terlalu besar",
                    'is_image' => 'Anda Tidak memilih gambar',
                    'mime_in' => 'Anda Tidak memilih gambar'
                ]
            ],
            'berat' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} Berat harus diisi',
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} Harga harus diisi',
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} Stok harus diisi',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} Kategori harus diisi',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} Deskripsi harus diisi',
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);]
            return redirect()->to('/produk/create')->withInput();
        }
        //ambil gambar
        $fileSampul = $this->request->getFile('gambar');
        //apakah ada gambar?
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {

            //generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }

        // //ambil nama file sampul
        // $namaSampul = $fileSampul->getName();

        $this->produkModel->save([
            'nama' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'berat' => $this->request->getVar('berat'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'kategori' => $this->request->getVar('kategori'),

            'gambar' => $namaSampul

        ]);

        session()->setFlashData('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('/produk');
    }

    public function delete($idProduk)
    {
        // cari gambar berdasarkan id
        $produk = $this->produkModel->find(($idProduk));

        if ($produk['gambar'] != 'default.jpg') {
            // hapus gambar
            unlink('img/' . $produk['gambar']);
        }


        $this->produkModel->delete($idProduk);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/produk');
    }

    public function edit($idProduk)
    {
        $data = [
            'title' => 'Form Ubah Data',
            'validation' => \Config\Services::validation(),
            'produk' => $this->produkModel->getProduk($idProduk)
        ];
        return view('produk/edit', $data);
    }

    public function update($idProduk)
    {
        //validasi input
        if (!$this->validate([
            // 'judul' => 'required|is_unique[komik.judul]'
            'nama' => [
                'rules' => 'required|is_unique[produk.nama]',
                'errors' => [
                    'required' => '{field} Produk harus diisi',
                    'is_unique' => '{field} Produk sudah terdaftar'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => "Ukuran gambar terlalu besar",
                    'is_image' => 'Anda Tidak memilih gambar',
                    'mime_in' => 'Anda Tidak memilih gambar'
                ]
            ],
            'berat' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} Berat harus diisi',
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} Harga harus diisi',
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} Stok harus diisi',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} Kategori harus diisi',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} Deskripsi harus diisi',
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);]
            return redirect()->to('/produk/edit/' . $this->request->getVar($idProduk))->withInput();
        }
        //ambil gambar
        $fileSampul = $this->request->getFile('gambar');
        //apakah ada gambar?
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {

            //generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }

        // //ambil nama file sampul
        // $namaSampul = $fileSampul->getName();

        $this->produkModel->save([
            'idProduk' => $idProduk,
            'nama' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'berat' => $this->request->getVar('berat'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'kategori' => $this->request->getVar('kategori'),

            'gambar' => $namaSampul

        ]);

        session()->setFlashData('pesan', 'Data Berhasil Diupdate.');
        return redirect()->to('/produk');
    }


    // --------------------------------------------------------------------

}
