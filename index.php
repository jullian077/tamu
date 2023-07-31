<?php
require 'functions.php';

// $tamu = query("SELECT * FROM laporan");
// $count = count($tamu);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/main.css" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4406ce97fd.js" crossorigin="anonymous"></script>

    <title>BukuTamu - Sentral Pangudi Luhur</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/images/BukuTamu.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12 copywriting">
                            <!-- <p class="story">
                                LEARN FROM EXPERT
                            </p> -->
                            <h1 class="header">
                                Welcome to Sentral 
                                <svg id="logo" width="299" height="48" viewBox="0 0 299 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.8059 13.2941C21.8059 15.7301 20.9659 17.7601 19.2859 19.3841C17.6339 20.9801 15.0999 21.7781 11.6839 21.7781H6.05589V34.0001H2.23389V4.72609H11.6839C14.9879 4.72609 17.4939 5.52409 19.2019 7.12009C20.9379 8.71609 21.8059 10.7741 21.8059 13.2941ZM11.6839 18.6281C13.8119 18.6281 15.3799 18.1661 16.3879 17.2421C17.3959 16.3181 17.8999 15.0021 17.8999 13.2941C17.8999 9.68209 15.8279 7.87609 11.6839 7.87609H6.05589V18.6281H11.6839Z" stroke="#45907F" stroke-width="2" mask="url(#path-1-outside-1_405_49)"/>
            <path d="M25.1282 22.4081C25.1282 20.0561 25.6042 17.9981 26.5562 16.2341C27.5082 14.4421 28.8102 13.0561 30.4622 12.0761C32.1422 11.0961 34.0042 10.6061 36.0482 10.6061C38.0642 10.6061 39.8142 11.0401 41.2982 11.9081C42.7822 12.7761 43.8882 13.8681 44.6162 15.1841V10.9841H48.4802V34.0001H44.6162V29.7161C43.8602 31.0601 42.7262 32.1801 41.2142 33.0761C39.7302 33.9441 37.9942 34.3781 36.0062 34.3781C33.9622 34.3781 32.1142 33.8741 30.4622 32.8661C28.8102 31.8581 27.5082 30.4441 26.5562 28.6241C25.6042 26.8041 25.1282 24.7321 25.1282 22.4081ZM44.6162 22.4501C44.6162 20.7141 44.2662 19.2021 43.5662 17.9141C42.8662 16.6261 41.9142 15.6461 40.7102 14.9741C39.5342 14.2741 38.2322 13.9241 36.8042 13.9241C35.3762 13.9241 34.0742 14.2601 32.8982 14.9321C31.7222 15.6041 30.7842 16.5841 30.0842 17.8721C29.3842 19.1601 29.0342 20.6721 29.0342 22.4081C29.0342 24.1721 29.3842 25.7121 30.0842 27.0281C30.7842 28.3161 31.7222 29.3101 32.8982 30.0101C34.0742 30.6821 35.3762 31.0181 36.8042 31.0181C38.2322 31.0181 39.5342 30.6821 40.7102 30.0101C41.9142 29.3101 42.8662 28.3161 43.5662 27.0281C44.2662 25.7121 44.6162 24.1861 44.6162 22.4501Z" stroke="#45907F" stroke-width="2" mask="url(#path-1-outside-1_405_49)"/>
            <path d="M66.153 10.5641C68.953 10.5641 71.221 11.4181 72.957 13.1261C74.693 14.8061 75.561 17.2421 75.561 20.4341V34.0001H71.781V20.9801C71.781 18.6841 71.207 16.9341 70.059 15.7301C68.911 14.4981 67.343 13.8821 65.355 13.8821C63.339 13.8821 61.729 14.5121 60.525 15.7721C59.349 17.0321 58.761 18.8661 58.761 21.2741V34.0001H54.939V10.9841H58.761V14.2601C59.517 13.0841 60.539 12.1741 61.827 11.5301C63.143 10.8861 64.585 10.5641 66.153 10.5641Z" stroke="#45907F" stroke-width="2" mask="url(#path-1-outside-1_405_49)"/>
            <path d="M91.2962 10.6061C93.2842 10.6061 95.0202 11.0401 96.5042 11.9081C98.0162 12.7761 99.1362 13.8681 99.8642 15.1841V10.9841H103.728V34.5041C103.728 36.6041 103.28 38.4661 102.384 40.0901C101.488 41.7421 100.2 43.0301 98.5202 43.9541C96.8682 44.8781 94.9362 45.3401 92.7242 45.3401C89.7002 45.3401 87.1802 44.6261 85.1642 43.1981C83.1482 41.7701 81.9582 39.8241 81.5942 37.3601H85.3742C85.7942 38.7601 86.6622 39.8801 87.9782 40.7201C89.2942 41.5881 90.8762 42.0221 92.7242 42.0221C94.8242 42.0221 96.5322 41.3641 97.8482 40.0481C99.1922 38.7321 99.8642 36.8841 99.8642 34.5041V29.6741C99.1082 31.0181 97.9882 32.1381 96.5042 33.0341C95.0202 33.9301 93.2842 34.3781 91.2962 34.3781C89.2522 34.3781 87.3902 33.8741 85.7102 32.8661C84.0582 31.8581 82.7562 30.4441 81.8042 28.6241C80.8522 26.8041 80.3762 24.7321 80.3762 22.4081C80.3762 20.0561 80.8522 17.9981 81.8042 16.2341C82.7562 14.4421 84.0582 13.0561 85.7102 12.0761C87.3902 11.0961 89.2522 10.6061 91.2962 10.6061ZM99.8642 22.4501C99.8642 20.7141 99.5142 19.2021 98.8142 17.9141C98.1142 16.6261 97.1622 15.6461 95.9582 14.9741C94.7822 14.2741 93.4802 13.9241 92.0522 13.9241C90.6242 13.9241 89.3222 14.2601 88.1462 14.9321C86.9702 15.6041 86.0322 16.5841 85.3322 17.8721C84.6322 19.1601 84.2822 20.6721 84.2822 22.4081C84.2822 24.1721 84.6322 25.7121 85.3322 27.0281C86.0322 28.3161 86.9702 29.3101 88.1462 30.0101C89.3222 30.6821 90.6242 31.0181 92.0522 31.0181C93.4802 31.0181 94.7822 30.6821 95.9582 30.0101C97.1622 29.3101 98.1142 28.3161 98.8142 27.0281C99.5142 25.7121 99.8642 24.1861 99.8642 22.4501Z" stroke="#45907F" stroke-width="2" mask="url(#path-1-outside-1_405_49)"/>
            <path d="M130.599 10.9841V34.0001H126.777V30.5981C126.049 31.7741 125.027 32.6981 123.711 33.3701C122.423 34.0141 120.995 34.3361 119.427 34.3361C117.635 34.3361 116.025 33.9721 114.597 33.2441C113.169 32.4881 112.035 31.3681 111.195 29.8841C110.383 28.4001 109.977 26.5941 109.977 24.4661V10.9841H113.757V23.9621C113.757 26.2301 114.331 27.9801 115.479 29.2121C116.627 30.4161 118.195 31.0181 120.183 31.0181C122.227 31.0181 123.837 30.3881 125.013 29.1281C126.189 27.8681 126.777 26.0341 126.777 23.6261V10.9841H130.599Z" stroke="#45907F" stroke-width="2" mask="url(#path-1-outside-1_405_49)"/>
            <path d="M135.624 22.4081C135.624 20.0561 136.1 17.9981 137.052 16.2341C138.004 14.4421 139.306 13.0561 140.958 12.0761C142.638 11.0961 144.514 10.6061 146.586 10.6061C148.378 10.6061 150.044 11.0261 151.584 11.8661C153.124 12.6781 154.3 13.7561 155.112 15.1001V2.92009H158.976V34.0001H155.112V29.6741C154.356 31.0461 153.236 32.1801 151.752 33.0761C150.268 33.9441 148.532 34.3781 146.544 34.3781C144.5 34.3781 142.638 33.8741 140.958 32.8661C139.306 31.8581 138.004 30.4441 137.052 28.6241C136.1 26.8041 135.624 24.7321 135.624 22.4081ZM155.112 22.4501C155.112 20.7141 154.762 19.2021 154.062 17.9141C153.362 16.6261 152.41 15.6461 151.206 14.9741C150.03 14.2741 148.728 13.9241 147.3 13.9241C145.872 13.9241 144.57 14.2601 143.394 14.9321C142.218 15.6041 141.28 16.5841 140.58 17.8721C139.88 19.1601 139.53 20.6721 139.53 22.4081C139.53 24.1721 139.88 25.7121 140.58 27.0281C141.28 28.3161 142.218 29.3101 143.394 30.0101C144.57 30.6821 145.872 31.0181 147.3 31.0181C148.728 31.0181 150.03 30.6821 151.206 30.0101C152.41 29.3101 153.362 28.3161 154.062 27.0281C154.762 25.7121 155.112 24.1861 155.112 22.4501Z" stroke="#45907F" stroke-width="2" mask="url(#path-1-outside-1_405_49)"/>
            <path d="M167.409 7.24609C166.681 7.24609 166.065 6.99409 165.561 6.49009C165.057 5.98609 164.805 5.37009 164.805 4.64209C164.805 3.91409 165.057 3.29809 165.561 2.79409C166.065 2.29009 166.681 2.03809 167.409 2.03809C168.109 2.03809 168.697 2.29009 169.173 2.79409C169.677 3.29809 169.929 3.91409 169.929 4.64209C169.929 5.37009 169.677 5.98609 169.173 6.49009C168.697 6.99409 168.109 7.24609 167.409 7.24609ZM169.257 10.9841V34.0001H165.435V10.9841H169.257Z" stroke="#45907F" stroke-width="2" mask="url(#path-1-outside-1_405_49)"/>
            <path d="M190.79 30.8921H201.038V34.0001H186.968V4.72609H190.79V30.8921Z" stroke="#45907F" stroke-width="2" mask="url(#path-1-outside-1_405_49)"/>
            <path d="M225.509 10.9841V34.0001H221.687V30.5981C220.959 31.7741 219.937 32.6981 218.621 33.3701C217.333 34.0141 215.905 34.3361 214.337 34.3361C212.545 34.3361 210.935 33.9721 209.507 33.2441C208.079 32.4881 206.945 31.3681 206.105 29.8841C205.293 28.4001 204.887 26.5941 204.887 24.4661V10.9841H208.667V23.9621C208.667 26.2301 209.241 27.9801 210.389 29.2121C211.537 30.4161 213.105 31.0181 215.093 31.0181C217.137 31.0181 218.747 30.3881 219.923 29.1281C221.099 27.8681 221.687 26.0341 221.687 23.6261V10.9841H225.509Z" stroke="#45907F" stroke-width="2" mask="url(#path-1-outside-1_405_49)"/>
            <path d="M243.386 10.5641C245.122 10.5641 246.69 10.9421 248.09 11.6981C249.49 12.4261 250.582 13.5321 251.366 15.0161C252.178 16.5001 252.584 18.3061 252.584 20.4341V34.0001H248.804V20.9801C248.804 18.6841 248.23 16.9341 247.082 15.7301C245.934 14.4981 244.366 13.8821 242.378 13.8821C240.362 13.8821 238.752 14.5121 237.548 15.7721C236.372 17.0321 235.784 18.8661 235.784 21.2741V34.0001H231.962V2.92009H235.784V14.2601C236.54 13.0841 237.576 12.1741 238.892 11.5301C240.236 10.8861 241.734 10.5641 243.386 10.5641Z" stroke="#45907F" stroke-width="2" mask="url(#path-1-outside-1_405_49)"/>
            <path d="M279.24 10.9841V34.0001H275.418V30.5981C274.69 31.7741 273.668 32.6981 272.352 33.3701C271.064 34.0141 269.636 34.3361 268.068 34.3361C266.276 34.3361 264.666 33.9721 263.238 33.2441C261.81 32.4881 260.676 31.3681 259.836 29.8841C259.024 28.4001 258.618 26.5941 258.618 24.4661V10.9841H262.398V23.9621C262.398 26.2301 262.972 27.9801 264.12 29.2121C265.268 30.4161 266.836 31.0181 268.824 31.0181C270.868 31.0181 272.478 30.3881 273.654 29.1281C274.83 27.8681 275.418 26.0341 275.418 23.6261V10.9841H279.24Z" stroke="#45907F" stroke-width="2" mask="url(#path-1-outside-1_405_49)"/>
            <path d="M289.515 14.7221C290.187 13.4061 291.139 12.3841 292.371 11.6561C293.631 10.9281 295.157 10.5641 296.949 10.5641V14.5121H295.941C291.657 14.5121 289.515 16.8361 289.515 21.4841V34.0001H285.693V10.9841H289.515V14.7221Z" stroke="#45907F" stroke-width="2" mask="url(#path-1-outside-1_405_49)"/>
            </svg>
                            </h1>
                            <p class="support">
                                We are here to make a difference to the environment <br> and help people live better lives.
                            </p>
                            <p class="cta">
                                <a href="form.php" class="btn btn-master btn-primary">
                                    Fill Form
                                </a>
                            </p>
                        </div>
                        <div class="col-lg-6 col-12 text-center pl-150">
                            <a href="#">
                                <img src="assets/images/banner.png" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row brands">
                <div class="col-lg-12 col-12 text-center">
                    <img src="/assets/images/brands.png" alt="">
                </div>
            </div> -->
        </div>
    </section>

    <section class="benefits">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 col-12 header-wrap">
                    <h2 class="primary-header">
                        Statistic Guest
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-12 mlr-20">
                    <div class="statistic1">
                        <img src="assets/images/Profile.png" alt="">
                        <p><span class="header"><?= $count; ?></span> <br> Total Guest </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12 mlr-20">
                    <div class="statistic2">
                        <img src="assets/images/Average.png" alt="">
                        <p><span class="header">20</span> <br> Average Guest/Month </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12 mlr-20">
                    <div class="statistic3">
                        <img src="assets/images/Statistic.png" alt="">
                        <p><span class="header">10</span> <br> Total Guest Today </p>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="/assets/images/ic_globe.png" class="icon" alt="">
                        <h3 class="title">
                            Diversity
                        </h3>
                        <p class="support">
                            Learn from anyone around the <br> world and get a new skills
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="/assets/images/ic_globe-1.png" class="icon" alt="">
                        <h3 class="title">
                            A.I Guideline
                        </h3>
                        <p class="support">
                            Lara will help you to choose <br> which path that suitable for you
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="/assets/images/ic_globe-2.png" class="icon" alt="">
                        <h3 class="title">
                            1-1 Mentoring
                        </h3>
                        <p class="support">
                            We will ensure that you will get <br> what you really do need
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="item-benefit">
                        <img src="/assets/images/ic_globe-3.png" class="icon" alt="">
                        <h3 class="title">
                            Future Job
                        </h3>
                        <p class="support">
                            Get your dream job in your dream <br> company together with us
                        </p>
                    </div>
                </div>
            </div> -->
        </div>
    </section>

    <section class="about">
        <div id="about"></div>
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 col-12 header-wrap">
                    <h2 class="primary-header">
                        About Our Company
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="about-image">
                        <img src="assets/images/image.png" alt="Photo About">
                    </div>
                </div>
                <div class="col">
                    <div class="about-header">
                        <p>Membantu orang lain sudah menjadi tanggung jawab kami</p>
                    </div>
                    <div class="about-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> ac at libero feugiat volutpat quis mi faucibus est. <br> Sem fringilla suspendisse facilisis purus gravida. </p>
                    </div>
                    <a href="about-us.html" class="btn btn-master btn-primary cta">
                        More Info
                        <i class="fa-solid fa-arrow-right" style="margin-left: 5px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="contact">
        <div id="contact"></div>
        <div class="container">
            <div class="row pl-80">
                <div class="col-lg-12 col-12 header-contact">
                    <h2 class="primary-header">
                        Contact Us
                    </h2>
                    <img src="assets/images/Vector 1.png" alt="">
                </div>
            </div>
            <div class="row pl-80">
                <div class="col section-left">
                    <div class="contact-info-location">
                        <img src="assets/images/Location.png" alt="">
                        <div class="location">
                            <p class="location-header">
                                Alamat
                            </p>
                            <p class="location-text">
                                Jl. HM. Joyo Martono No.19, RT.002/RW.021, Margahayu,<br> Kec. Bekasi Timur
                            </p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <img src="assets/images/Email.png" alt="">
                        <div class="email">
                            <p class="email-header">
                                Email
                            </p>
                            <p class="email-text">
                                tanmiyat@kemsos.go.id
                            </p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <img src="assets/images/Telephone.png" alt="">
                        <div class="telephone">
                            <p class="telephone-header">
                                Telp/Fax
                            </p>
                            <p class="telephone-text">
                                (021)8800478
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.075549206236!2d107.01894271471696!3d-6.253776795473329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698f3a721763d3%3A0xd1945c1ce5334258!2sBRSPDSN%20Tan%20Miyat%20Bekasi!5e0!3m2!1sid!2sid!4v1649770287241!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="test">
        <div class="container p-4">
          <div class="row">
            <div class="col-lg-4">
                <img src="assets/images/Atensi.png">
                <img src="assets/images/Kemensos.png">
            </div>
            <div class="col-lg-2">
                <h5 class="text-white">Profile</h5>
                <ul class="list-unstyled">
                  <li>
                    <a href="https://tanmiyat.kemsos.go.id/modules.php?name=Content&pa=showpage&pid=10" class="text-white">Sejarah</a>
                  </li>
                  <li>
                    <a href="https://tanmiyat.kemsos.go.id/modules.php?name=Content&pa=showpage&pid=12" class="text-white">Visi & Misi</a>
                  </li>
                  <li>
                    <a href="https://tanmiyat.kemsos.go.id/modules.php?name=Content&pa=showpage&pid=14" class="text-white">Struktur Organisasi</a>
                  </li>
                  <li>
                    <a href="https://tanmiyat.kemsos.go.id/modules.php?name=Content&pa=showpage&pid=18" class="text-white">Sarana & Prasarana</a>
                  </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="text-white">Kemensos RI</h5>
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="https://budhidharma.kemensos.go.id/" class="text-white">BRSLU Budhi Dharma</a>
                  </li>
                  <li>
                    <a href="https://tanmiyat.kemsos.go.id/" class="text-white">BRSPDSN Tan Miyat</a>
                  </li>
                  <li>
                    <a href="https://pangudiluhur.kemensos.go.id/" class="text-white">BRSEGP Pangudi Luhur</a>
                  </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="text-white">Follow Our Social Media</h5>
                <div class="image">
                    <a href="https://m.facebook.com/profile.php?id=537442506281669&refid">
                        <i class="fa-brands fa-facebook-square fa-2xl"></i>
                    </a>
                    <a href="https://www.instagram.com/balaitanmiyat/">
                        <i class="fa-brands fa-instagram fa-2xl"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCDP1pclaNzd4NrqXlYCISYg/videos">
                        <i class="fa-brands fa-youtube fa-2xl"></i>
                    </a>
                    <!-- <a href="https://m.facebook.com/profile.php?id=537442506281669&refid">
                        <img src="/assets/images/facebook.png" alt="">
                    </a>
                    <a href="https://www.instagram.com/balaitanmiyat/">
                        <img src="/assets/images/instagram.png" alt="">
                    </a> -->
                </div>
            </div>
          </div>
        </div>
    </footer>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>