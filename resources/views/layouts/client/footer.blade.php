   <!-- Modal -->
   <div class="modal fade" id="modalNotice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
           <div class="modal-body d-flex justify-content-between align-items-center flex-column text-center">
               <img src="/images/yes.png" alt="" class="mb-4 icon-notice" id="icon-yes">
               <img src="/images/no.png" alt="" class="mb-4 icon-notice" id="icon-no">
               <h5><strong id="content-notice"></strong></h5>
           </div>

       </div>
   </div>
</div>
<button class="chatbot-toggler">
    <span class="material-symbols-rounded">mode_comment</span>
    <span class="material-symbols-outlined">close</span>
</button>
<div class="chatbot">
    <header>
        <h2>Tư vấn viên</h2>
        <span class="close-btn material-symbols-outlined">close</span>
    </header>
    <ul class="chatbox">
        <li class="chat incoming">
            <img src="/images/tuvanvien.png" width="50" height="50"
                style="    object-fit: cover;
        border-radius: 50%;
        margin-right: 5px;" alt="">
            <p>Xin chào 👋<br>Tôi có thể giúp gì được cho bạn?</p>
        </li>
    </ul>
    <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
    </div>
</div>
<footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url({{ asset('client') }}/images/bg_3.jpg);">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md pt-5">
                <div class="ftco-footer-widget pt-md-5 mb-4">
                    <h2 class="ftco-heading-2">About</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                        <li class="ftco-animate"><a href="#"><span class="fa-brands fa-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fa-brands fa-facebook"></span></a>
                        </li>
                        <li class="ftco-animate"><a href="#"><span class="fa-brands fa-instagram"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md pt-5 border-left">
                <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Infromation</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Online Enquiry</a></li>
                        <li><a href="#" class="py-2 d-block">General Enquiries</a></li>
                        <li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
                        <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                        <li><a href="#" class="py-2 d-block">Refund Policy</a></li>
                        <li><a href="#" class="py-2 d-block">Call Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md pt-5 border-left">
                <div class="ftco-footer-widget pt-md-5 mb-4">
                    <h2 class="ftco-heading-2">Experience</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Adventure</a></li>
                        <li><a href="#" class="py-2 d-block">Hotel and Restaurant</a></li>
                        <li><a href="#" class="py-2 d-block">Beach</a></li>
                        <li><a href="#" class="py-2 d-block">Nature</a></li>
                        <li><a href="#" class="py-2 d-block">Camping</a></li>
                        <li><a href="#" class="py-2 d-block">Party</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md pt-5 border-left">
                <div class="ftco-footer-widget pt-md-5 mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon fa-solid fa-location-dot"></span><span class="text">203 Fake St.
                                    Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2
                                        392 3929 210</span></a></li>
                            <li><a href="#"><span class="icon fa fa-paper-plane"></span><span
                                        class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#1ca0e2" />
    </svg></div>


<script src="{{ asset('client') }}/js/jquery.min.js"></script>
<script src="{{ asset('client') }}/js/jquery-migrate-3.0.1.min.js"></script>
<script src="{{ asset('client') }}/js/popper.min.js"></script>
<script src="{{ asset('client') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('client') }}/js/jquery.easing.1.3.js"></script>
<script src="{{ asset('client') }}/js/jquery.waypoints.min.js"></script>
<script src="{{ asset('client') }}/js/jquery.stellar.min.js"></script>
<script src="{{ asset('client') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('client') }}/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('client') }}/js/jquery.animateNumber.min.js"></script>
<script src="{{ asset('client') }}/js/bootstrap-datepicker.js"></script>
<script src="{{ asset('client') }}/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('client') }}/js/google-map.js"></script>
<script src="{{ asset('client') }}/js/main.js"></script>
<script src="{{ asset('client') }}/js/chatbot.js"></script>
<script>
    function addToFavourite(slug) {
        $.ajax({
            url: 'add-favourite',
            method: 'post',
            data: {
                slug,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {

                let content = $('#content-notice')
                if (data) {
                    $('#icon-yes').css('display', 'block');
                    $('#icon-no').css('display', 'none');
                    content.text('Thêm vào yêu thích thành công')
                    $('#modalNotice').modal('show')
                } else {
                    $('#icon-no').css('display', 'block');
                    $('#icon-yes').css('display', 'none');
                    content.text('Thêm vào yêu thích không thành công')
                    $('#modalNotice').modal('show')
                }
            },
            error: function(err) {
                if (err.status == 401) {
                    window.location.href = "login"
                }
            }
        })
    }
    function removeFavourite(slug) {
        $.ajax({
            url: 'remove-favourite',
            method: 'delete',
            data: {
                slug,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {

                let content = $('#content-notice')
                if (data) {
                    $('#icon-yes').css('display', 'block');
                    $('#icon-no').css('display', 'none');
                    content.text('Xoá thành công')
                    $('#modalNotice').modal('show')
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    $('#icon-no').css('display', 'block');
                    $('#icon-yes').css('display', 'none');
                    content.text('Xóa không thành công')
                    $('#modalNotice').modal('show')
                }
            },
            error: function(err) {
                if (err.status == 401) {
                    window.location.href = "login"
                }
            }
        })
    }
</script>
