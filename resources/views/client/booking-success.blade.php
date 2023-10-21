@extends('layouts.client.index')
@section('title', 'Đặt Tour thành công')
@section('content')
    <section class="ftco-section contact-section " style="padding-top: 170px;">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center text-center flex-column">
                <i class="fa-solid fa-circle-check text-success mb-3" style="font-size: 50px;"></i>
                <h2>Đặt Tour thành công !</h2>
                <p>Vui lòng chờ chúng tôi xác nhận. <span id="countdown">5</span>s</p>
            </div>

        </div>
    </section>

    <script>
        // Hàm đếm ngược từ 5 giây và cập nhật trang
        function countdown() {
            const countdownElement = document.getElementById("countdown");
            let count = 5;

            const interval = setInterval(function() {
                if (count === 0) {
                    countdownElement.innerHTML = "Chuyển hướng";
                    clearInterval(interval);
                    window.location.href = '/';
                } else {
                    countdownElement.innerHTML = count;
                    count--;
                }
            }, 1000); // Cập nhật mỗi giây
        }

        // Gọi hàm đếm ngược khi trang web được tải
        window.onload = countdown;
    </script>
@endsection
