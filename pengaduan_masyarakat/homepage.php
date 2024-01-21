<?php
if (basename($_SERVER['PHP_SELF']) == 'homepage.php') {
    // Redirect to index.php or display an error message
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo_aspirasi.jpeg">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- BOOTSTRAP -->
    <!-- LINK CSS -->
    <link rel="stylesheet" href="./css/homepage.css">
    <!-- LINK CSS -->
    <!-- PARALLAX JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../parallax.js-1.5.0/parallax.js-1.5.0/parallax.js"></script>
    <!-- PARALLAX JS -->
    <title>LAPOR ! Jaring Aspirasi Masyarakat</title>
</head>

<body>
    <!-- HEADER -->
    <header class="parallax-window" data-parallax="scroll" data-image-src="surabaya.webp">
        <!-- <nav class="d-flex align-items-center justify-content-between pt-3">
            <h3 class="fw-bold">
                <a href="">LAPORCAK!</a>
            </h3>
            <ul class="d-flex align-items-center">
                <li><a href="#home" style="color: white;">BERANDA</a></li>
                <li><a href="#kriteria" style="color: white;">KRITERIA PENGADUAN</a></li>
                <li><a href="#tatacara" style="color: white;">TATA CARA PENGADUAN</a></li>
                <a href="index.php?p=login"><button type="button" class="btn btn-danger btn-login">Login</button></a>
                <a href="index.php?p=registrasi"><button type="button" class="btn btn-outline-light">SignUp</button></a>
            </ul>
        </nav> -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#about">LAPORCAK!</a>
                <button class="navbar-toggler" type="button"      data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#">BERANDA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kriteria">KRITERIA PENGADUAN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tatacara">TATA CARA PENGADUAN</a>
                        </li>
                    </ul>
                    <a href="index.php?p=login"><button type="button" class="btn btn-danger ms-3 btn-login">LOGIN</button></a>
                    <a href="index.php?p=registrasi"><button type="button" class="btn btn-outline-danger ms-2 btn-signup">SIGNUP</button></a>
                </div>
            </div>
        </nav>
        <div class="header-title">
            <p>Website Pengaduan <br> Pemerintah Kota Surabaya</p>
            <p>Mari bersama-sama menciptakan Pemerintahan yang maju dan kompeten. Laporkan pengaduanmu yang
                terjadi di lingkungan Kota Surabaya.
            </p>
            <div class="whistle">
                <span>
                    <img src="./img/redwhistle.png" alt="">
                </span>
            </div>
            <div class="login-signup">
                <a href="index.php?p=login"><button type="button" class="btn btn-danger ms-3 btn-login">LOGIN</button></a>
                <a href="index.php?p=registrasi"><button type="button" class="btn btn-outline-light ms-3 btn-signup">SIGNUP</button></a>
            </div>
        </div>
    </header>
    <!-- AKHIR HEADER -->

    <!-- ABOUT -->
    <section id="about">
        <svg id="mysvg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#fff" fill-opacity="1"
                d="M0,256L80,240C160,224,320,192,480,197.3C640,203,800,245,960,261.3C1120,277,1280,267,1360,261.3L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
            </path>
        </svg>
        <div class="about-container">
            <div class="welcome">
                <p>Selamat Datang di</p>
                <p class="laporcak">LAPORCAK!</p>
                <p>Surabaya</p>
            </div>
            <p class="desk-about" style="text-align: justify;">sebuah website pengaduan masyarakat yang ditujukan khusus untuk warga Surabaya. Website ini memberikan wadah bagi masyarakat untuk melaporkan berbagai permasalahan yang terjadi di sekitar mereka, seperti infrastruktur, kebersihan, transportasi, dan lainnya. Tujuan utama dari LaporCak! adalah untuk memberikan sarana komunikasi yang efektif antara masyarakat dan pemerintah daerah Surabaya, sehingga masalah-masalah tersebut dapat segera ditangani dan solusi dapat ditemukan.</p>
        </div>
    </section>
    <section id="kriteria">
        <h3>KRITERIA <span>PENGADUAN</span> </h3>
        <p>Syarat/Kriteria Laporan Agar Bisa Diproses Lebih Lanjut</p>
        <div class="container-box-kriteria">
            <div class="box-kriteria">
                <div class="deskripsi-box-kriteria">
                    <div class="judul">
                        <h4>WHAT</h4>
                        <h2 style="font-size: 50px; font-weight: bold; color: rgb(132, 132, 132);">1</h2>
                    </div>
                    <div class="deskripsi-judul">
                        <p>Aduan yang disampaikan dapat berupa kecelakaan, dana bantuan, beasiswa, dan yang ada pada
                            kategori pada website LAPORCAK!</p>
                    </div>
                </div>
            </div>
            <div class="box-kriteria">
                <div class="deskripsi-box-kriteria">
                    <div class="judul">
                        <h4>HOW</h4>
                        <h2 style="font-size: 50px; font-weight: bold; color: rgb(132, 132, 132);">2</h2>
                    </div>
                    <div class="deskripsi-judul">
                        <p>Uraikan pokok permasalahan secara jelas, lengkap, dan kronologis di wilayah Surabaya</p>
                    </div>
                </div>
            </div>
            <div class="box-kriteria">
                <div class="deskripsi-box-kriteria">
                    <div class="judul">
                        <h4>WHERE</h4>
                        <h2 style="font-size: 50px; font-weight: bold; color: rgb(132, 132, 132);">3</h2>
                    </div>
                    <div class="deskripsi-judul">
                        <p>Sampaikan laporan melalui situs LAPORCAK! atau melalui twitter</p>
                    </div>
                </div>
            </div>
            <div class="box-kriteria">
                <div class="deskripsi-box-kriteria">
                    <div class="judul">
                        <h4>WHEN</h4>
                        <h2 style="font-size: 50px; font-weight: bold; color: rgb(132, 132, 132);">4</h2>
                    </div>
                    <div class="deskripsi-judul">
                        <p>Sebutkan dimana tempat terjadinya perbuatan tersebut dilakukan</p>
                    </div>
                </div>
            </div>
            <div class="box-kriteria">
                <div class="deskripsi-box-kriteria">
                    <div class="judul">
                        <h4>WHO</h4>
                        <h2 style="font-size: 50px; font-weight: bold; color: rgb(132, 132, 132);">5</h2>
                    </div>
                    <div class="deskripsi-judul">
                        <p>Siapa saja dapat melaporkan pada website LAPORCAK!</p>
                    </div>
                </div>
            </div>
            <div class="box-kriteria">
                <div class="deskripsi-box-kriteria">
                    <div class="judul">
                        <h4>EVIDENCE</h4>
                        <h2 style="font-size: 50px; font-weight: bold; color: rgb(132, 132, 132);">6</h2>
                    </div>
                    <div class="deskripsi-judul">
                        <p>Dilengkapi bukti permulaan (dokumen / gambar / rekaman) yang mendukung</p>
                    </div>
                </div>
            </div>
            <p class="our-focus-kriteria">Fokus kami kepada materi informasi yang Anda Laporkan. Sebagai bentuk
                terimakasih kami terhadap laporan
                yang Anda kirim, kami berkomitmen untuk merespon laporan Anda selambat-lambatnya 15 (Lima Belas) hari
                kerja sejak laporan Anda dikirim.</p>
        </div>
    </section>
    <section id="tatacara">
        <div class="row">
            <div class="tatacara-title text-center">
                <h3 style="font-weight: bold;">TATA CARA <span style="color: rgb(225, 41, 41);">PENGADUAN</span></h3>
                <p style="margin-bottom: 50px;">Tata Cara Membuat Pengaduan Melalui LAPORCAK!</p>
            </div>
            <div class="col-md-6 laporcak">
            </div>
            <div class="col-md-6">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Periksa Kelengkapan Laporan Anda
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Sebelum melaporakan pengaduan Anda di LAPORCAK!, periksa kembali kelengkapan pengaduan
                                Anda apakah telah sesuai dengan kriteria pengaduan yang telah ditetapkan.

                                Pengaduan dengan data lengkap dan sesuai dengan kriteria pengaduan akan mempercepat
                                proses tindak lanjut atas aduan Anda.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Isi Formulir Pengaduan
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Masuk pada akun Anda terlebih dahulu, kemudian isi dan lengkapi formulir pengaduan yang
                                telah disediakan. Apabila isian pengaduan sudah lengkap, tekan tombol "kirim pengaduan"
                                untuk mengirim pengaduan Anda.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Pantau Pengaduan
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Melalui akun Anda tersebut, Anda dapat memantau pengaduan yang sudah Anda kirim dan
                                membuat pengaduan baru.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- AKHIR ABOUT -->
    <!-- FOOTER -->
    <footer style="margin-top: 100px; width: 99.2%;">
        <div class="row" style="padding-inline: 30px; background-color: rgb(244, 244, 244); padding-top: 20px; padding-bottom: 20px;">
            <div class="col-md-4">
                <div class="logo-footer d-flex flex-column">
                    <div class="logo-lapor" style="display: flex; align-items: center;">
                        <img src="./img/logo_aspirasi.jpeg" style="width: 100px; margin-right: 20px;" alt="">
                        <h2 style="font-weight: bold; color: rgb(225, 41, 41);">LAPORCAK!</h2>
                    </div>
                    <p style="text-align: justify; margin-top: 20px;">Aplikasi Whistleblowing System disediakan oleh
                        Pemerintah Kota
                        Surabaya bagi Anda yang memiliki
                        informasi dan ingin melaporkan suatu perbuatan berindikasi korupsi yang terjadi di lingkungan
                        Pemerintah Kota Surabaya.</p>
                </div>
            </div>
            <div class="col-md-4" style="text-align: center; margin-top: 100px;">
                <h4>BIG THANKS TO</h4>
                <p style="color: rgba(0, 0, 0, 0.364);">Kelompok 6 dan 12</p>
            </div>
            <div class="col-md-4" style="text-align: center; margin-top: 100px;">
                <h4>HUBUNGI KAMI</h4>
                <p style="color: rgba(0, 0, 0, 0.364);">Kelompok 6 dan 12</p>
            </div>
        </div>
    </footer>
    <!-- AKHIR FOOTER -->
    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- BOOTSTRAP JS -->
</body>

</html>