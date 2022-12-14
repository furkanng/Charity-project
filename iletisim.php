<?php include 'header.php'; ?>

   <!-- Start Contact -->
   <section class="container py-5">
<h1 class="h2 text-left text-primary pt-3 d-flex justify-content-center">Bizimle İletişim Kurabilirsiniz.</h1>
<h2 class="h4 text-left regular-400 d-flex justify-content-center mb-4">Formu doldurun ve iletişime geçelim</h2>
<div class="row pb-4">
   <div class="col-2"></div>


    <!-- Start Contact Form -->
    <div class="col-lg-8 ">
        <form class="contact-form row" method="post" action="#" role="form">

            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-lg light-300" id="floatingname" name="inputname" placeholder="Name">
                    <label for="floatingname light-300">İsim</label>
                </div>
            </div><!-- End Input Name -->

            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-lg light-300" id="floatingemail" name="inputemail" placeholder="Email">
                    <label for="floatingemail light-300">E-mail</label>
                </div>
            </div><!-- End Input Email -->

            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-lg light-300" id="floatingphone" name="inputphone" placeholder="Phone">
                    <label for="floatingphone light-300">Telefon</label>
                </div>
            </div><!-- End Input Phone -->

            <div class="col-lg-6 mb-4">
                <div class="form-floating">
                    <input type="text" class="form-control form-control-lg light-300" id="floatingcompany" name="inputcompany" placeholder="Company Name">
                    <label for="floatingcompany light-300">Kurum Adı</label>
                </div>
            </div><!-- End Input Company Name -->

            <div class="col-12">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control form-control-lg light-300" id="floatingsubject" name="inputsubject" placeholder="Subject">
                    <label for="floatingsubject light-300">Konu</label>
                </div>
            </div><!-- End Input Subject -->

            <div class="col-12">
                <div class="form-floating mb-3">
                    <textarea class="form-control light-300" rows="8" placeholder="Message" id="floatingtextarea"></textarea>
                    <label for="floatingtextarea light-300">Mesajınız</label>
                </div>
            </div><!-- End Textarea Message -->

            <div class="col-md-12 col-12 m-auto text-end">
                <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Gönder</button>
            </div>

        </form>
    </div>
    <!-- End Contact Form -->


    <div class="col-2"></div>


</div>
</section>
<!-- End Contact -->

<?php include 'footer.php'; ?>