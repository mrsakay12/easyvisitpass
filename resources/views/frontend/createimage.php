@extends('frontend\frontbar')

@section('content')

    <!-- HERO SECTION -->

   <!-- Main Content -->
   <!-- Main Content -->
   <div class="main" data-mobile-height="">
        <!-- Default Page -->
<section id="pm-banner-1" class="custom-css-step">
    <div class="container camera-container">
        <div class="card border-0 bg-body" style="margin-top:20px;">
            <div class="card-header border-0 bg-body" id="Details" align="center">
                            </div>
            <form action="https://demo.quickpass.xyz/check-in/create-step-two" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="lLBRIEGKBNxV3kZ2KHDC2Mc6OfcDjgGJ5f9tGji9">            <div class="card-body custom-camera">
                <div class="row">
                                        <div class="col-md-6 left-div">
                        <div class="card border-0 ">
                            <h4 style="color: #111570;font-weight: bold" class="text-center">Take Visitor Photo</h4>

                            <div class="card-body">
                                <div class="video-options mb-4">
                                    <select name="" id="" class="custom-select">
                                        <option value="">Select camera</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <video width="100%" height="200px" id="videos" autoplay></video>
                                        <canvas class="d-none" style="border:5px solid #d3d3d3; display: none"></canvas>
                                        <input type="hidden" id="image" name="photo" value="">
                                    </div>
                                    <div class="col-3">
                                        <button type="button" id="screenshot" title="ScreenShot" class='retakephoto'>
                                            <img class="img" src="https://demo.quickpass.xyz/images/capture.png" style="height: 80px">
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <span class="text-center"></span>
                    </div>

                    <div class="col-md-6">
                        <div class="img-cards" id="printidcard">
                            <div class="id-card-holder">
                                <div class="id-card custom-id-card">
                                    <div class="id-card-photo">
                                        <img id="card-img" style="width: 120px;height: 120px;" class="screenshot-image" alt="">
                                    </div>
                                    <h2 class="name mt-4">Juan DC</h2>
                                    <h2 class="info"> Phone : 09264720494</h2>
                                                                        <h2 class="info">Email : admin@easyvisitpass.com</h2>
                                    
                                    <h2 class="visit mt-4">VISITED TO</h2>
                                                                        <h3 class="email">Host: Gemma Houston</h3>
                                                                        <hr class="bar">
                                    <p class="company">Visitor Pass </p>
                                    <p class="company">Dhaka, Bangladesh. </p>
                                    <p class="email">E-mail :info@inilabs.xyz </p>
                                </div>
                            </div>
                        </div>
                    </div>
                                    </div>
            </div>
            <div class="card-footer custom-footer">
                <div class="row">
                    <div class="col-md-6">
                        <a href="https://demo.quickpass.xyz/check-in/create-step-one" class="btn btn-primary float-left text-white cancel px-5 py-2">
                           Back
                        </a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn  float-right continue text-light px-5 py-2 btn-submit-two" id="hide">
                        Continue
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Terms &amp; condition</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Terms condition
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-line">
    <div class="d-flex justify-content-center footer-text pb-3">
        <span> @ All Rights Reserved</span>
    </div>
</section>
    </div>

     <!-- Scripts -->
<!-- JS library -->
<script src="https://demo.quickpass.xyz/frontend/frontend/js/jquery.js"></script>
<script src="https://demo.quickpass.xyz/frontend/frontend/js/appear.js"></script>
<script src="https://demo.quickpass.xyz/assets/modules/popper.js/dist/popper.min.js"></script>
<script src="https://demo.quickpass.xyz/assets/modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://demo.quickpass.xyz/frontend/frontend/js/aos.js"></script>
<script src="https://demo.quickpass.xyz/frontend/frontend/js/owl.js"></script>
<script src="https://demo.quickpass.xyz/frontend/frontend/js/wow.min.js"></script>
<script src="https://demo.quickpass.xyz/frontend/frontend/js/pagenav.js"></script>
<script src="https://demo.quickpass.xyz/frontend/frontend/js/parallax-scroll.js"></script>
<script src="https://demo.quickpass.xyz/frontend/frontend/js/jquery.paroller.min.js"></script>
<script src="https://demo.quickpass.xyz/frontend/frontend/js/jquery.barfiller.js"></script>
<script src="https://demo.quickpass.xyz/frontend/frontend/js/slick.js"></script>
<script src="https://demo.quickpass.xyz/frontend/frontend/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://demo.quickpass.xyz/frontend/frontend/js/script.js"></script>
<script src="https://demo.quickpass.xyz/assets/modules/select2/dist/js/select2.full.min.js"></script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.1/tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script src="https://demo.quickpass.xyz/assets/modules/izitoast/dist/js/iziToast.min.js"></script>

<!-- Scripts -->
<script src="https://demo.quickpass.xyz/js/photo.js"></script>
    <!-- Main Content -->
    @endsection