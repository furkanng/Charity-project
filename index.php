<?php include 'header.php'; ?>


    <!-- Start Banner Hero -->
    <div class="banner-wrapper bg-light">
        <div id="index_banner" class="banner-vertical-center-index container-fluid pt-5">

            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-3 mx-0 px-0 light-300">
                                    Kurban Bağışı Yap
                                </h1>
                                <p class="banner-body text-muted py-3">
                                    Kurban kesmek ve dağıtmak için sizde kurbanlık bağışı yapın.
                                </p>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="bagisyap"
                                    role="button">Kurban Bağışı Yap</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">

                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-3 mx-0 px-0 light-300">
                                    Kurban Yardımı Al
                                </h1>
                                <p class="banner-body text-muted py-3">
                                    Başvuru yaparak kesilen kurban etlerinden sizde payınızı alabilirsiniz.
                                </p>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="bagisal"
                                    role="button">Kurban Yardımı Al</a>
                            </div>
                        </div>

                    </div>
                </div>
                <a class="carousel-control-prev text-decoration-none" href="#carouselExampleIndicators" role="button"
                    data-bs-slide="prev">
                    <i class='bx bx-chevron-left'></i>
                    <span class="visually-hidden">Önceki</span>
                </a>
                <a class="carousel-control-next text-decoration-none" href="#carouselExampleIndicators" role="button"
                    data-bs-slide="next">
                    <i class='bx bx-chevron-right'></i>
                    <span class="visually-hidden">Sonraki</span>
                </a>
            </div>
            <!-- End slider -->

        </div>
    </div>
    <!-- End Banner Hero -->







    <!-- Start View Work -->
    <section class="bg-secondary">
        <div class="container py-5">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-2 col-12 text-light align-items-center">
                    <i class='display-1 bx bxs-heart  bx-lg'></i>
                </div>
                <div class="col-lg-7 col-12 text-light pt-2">
                    <h3 class="h4 light-300">İyilik yapmanın en kolay yolu.</h3>
                    <p class="light-300">Kolayca bağış yapabilir, ödeme talimatı verebilir, hatırlatmalar ekleyebilirsiniz.</p>
                </div>
                <div class="col-lg-3 col-12 pt-4">
                    <a href="bagisyap" class="btn btn-primary rounded-pill btn-block shadow px-4 py-2">Bağış Yap</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End View Work -->

    <!-- Start Recent Work -->
    <section class="py-5 mb-5">
        <div class="container">
            <div class="recent-work-header row text-center pb-5">
                <h2 class="col-md-6 m-auto h2 semi-bold-600 py-5">Ne Yapabilirsiniz</h2>
            </div>
            <div class="row gy-5 g-lg-5 mb-4">

                <!-- Start Recent Work -->
                <div class="col-md-4 mb-3">
                    <a href="bagisal" class="recent-work card border-0 shadow-lg overflow-hidden">
                        <img class="recent-work-img card-img" src="./assets/images/work-2.png" alt="Card image">
                        <div class="recent-work-vertical card-img-overlay d-flex align-items-end">

                        </div>
                    </a>
                </div><!-- End Recent Work -->

                <!-- Start Recent Work -->
                <div class="col-md-4 mb-3">
                    <a href="bagisyap" class="recent-work card border-0 shadow-lg overflow-hidden">
                        <img class="recent-work-img card-img" src="./assets/images/work-1.png" alt="Card image">
                        <div class="recent-work-vertical card-img-overlay d-flex align-items-end">

                        </div>
                    </a>
                </div><!-- End Recent Work -->

                <!-- Start Recent Work -->
                <div class="col-md-4 mb-3">
                    <a href="teknisyen" class="recent-work card border-0 shadow-lg overflow-hidden">
                        <img class="recent-work-img card-img" src="./assets/images/work-3.png" alt="Card image">
                        <div class="recent-work-vertical card-img-overlay d-flex align-items-end">

                        </div>
                    </a>
                </div><!-- End Recent Work -->
            </div>
        </div>
    </section>
    <!-- End Recent Work -->



   <?php include 'footer.php'; ?>