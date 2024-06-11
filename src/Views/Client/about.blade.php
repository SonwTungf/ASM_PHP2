<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
        }

        .nav-link {
            margin-right: 15px;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #cce5ff !important;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .navbar-toggler-icon {
            color: #fff;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            margin: 0 10px;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .welcome-text {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .introduction-text {
            text-align: center;
            margin: 20px 0;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .introduction-text h2 {
            color: #007bff;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-title {
            color: #007bff;
        }

        .card-body {
            text-align: center;
        }

        .card img {
            object-fit: cover;
            height: 200px;
        }

        .btn-submit {
            margin-top: 10px;
        }

        .banner {
            text-align: center;
            margin: 20px 0;
        }

        .banner img {
            max-width: 100%;
            height: auto;
        }
    </style>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DYNAMITENESS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url() }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('products/') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('about/') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact/') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        @if (!isset($_SESSION['user']))
                            <a class="btn btn-primary" href="{{ url('login') }}">Login</a>
                        @endif
                        @if (isset($_SESSION['user']))
                            <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->


    <div class="container">
        <div class="row">
            <h1 class="welcome-text mt-5">Welcome {{ $name }} to my website introduction!</h1>
        </div>

        <!-- Introduction Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="introduction-text">
                    <h2>Giới thiệu về DYNAMITENESS</h2>
                    <p>DYNAMITENESS là trang web hàng đầu về các sản phẩm điện tử. Chúng tôi cung cấp đa dạng các mặt
                        hàng như điện thoại thông minh, máy tính bảng, laptop, và các thiết bị gia dụng hiện đại. Với
                        cam kết mang lại chất lượng và giá cả hợp lý, chúng tôi luôn sẵn sàng phục vụ và hỗ trợ khách
                        hàng một cách tận tâm.</p>
                    <p>Hãy khám phá những sản phẩm tốt nhất và nhận được những ưu đãi hấp dẫn từ DYNAMITENESS!</p>
                    <p>Trang web của chúng tôi được thiết kế để mang đến cho bạn trải nghiệm mua sắm trực tuyến tuyệt
                        vời. Chúng tôi tự hào về việc cung cấp dịch vụ khách hàng xuất sắc, với đội ngũ nhân viên chuyên
                        nghiệp và thân thiện, luôn sẵn sàng giải đáp mọi thắc mắc của bạn. Bạn có thể tìm thấy thông tin
                        chi tiết về sản phẩm, so sánh giá cả, đọc nhận xét của người dùng khác, và chọn mua những sản
                        phẩm phù hợp nhất với nhu cầu của mình.</p>
                    <p>Chúng tôi hiểu rằng sự hài lòng của khách hàng là yếu tố then chốt để thành công, vì vậy chúng
                        tôi không ngừng cải thiện và mở rộng danh mục sản phẩm của mình. Ngoài ra, chúng tôi thường
                        xuyên cập nhật các chương trình khuyến mãi, giảm giá đặc biệt, và các sự kiện bán hàng để bạn có
                        thể mua sắm tiết kiệm và hiệu quả hơn.</p>
                    <p>Tại DYNAMITENESS, bạn sẽ tìm thấy những sản phẩm công nghệ mới nhất, từ các thương hiệu nổi tiếng
                        trên thế giới. Chúng tôi cam kết cung cấp sản phẩm chính hãng, đảm bảo về chất lượng và độ bền.
                        Dù bạn đang tìm kiếm một chiếc điện thoại thông minh với hiệu năng cao, một chiếc laptop mạnh mẽ
                        để làm việc và giải trí, hay các thiết bị gia dụng thông minh để làm cho cuộc sống của bạn dễ
                        dàng hơn, chúng tôi đều có thể đáp ứng nhu cầu của bạn.</p>
                    <p>Chúng tôi cũng luôn chú trọng đến việc xây dựng mối quan hệ lâu dài với khách hàng. Chúng tôi tin
                        rằng sự trung thực và minh bạch là nền tảng để tạo dựng niềm tin, do đó, bạn sẽ luôn được thông
                        báo đầy đủ về các chính sách bảo hành, đổi trả, và hỗ trợ kỹ thuật khi mua hàng tại
                        DYNAMITENESS.</p>
                    <p>Không chỉ tập trung vào việc cung cấp sản phẩm chất lượng, DYNAMITENESS còn chú trọng đến việc
                        mang đến cho khách hàng những trải nghiệm mua sắm tiện lợi và an toàn. Chúng tôi liên tục cải
                        tiến giao diện trang web để giúp bạn dễ dàng tìm kiếm sản phẩm, đặt hàng, và theo dõi đơn hàng
                        của mình một cách nhanh chóng và thuận tiện.</p>
                    <p>Để mang lại giá trị tối đa cho khách hàng, chúng tôi cũng tổ chức nhiều chương trình khuyến mãi
                        độc quyền và các sự kiện bán hàng đặc biệt. Bạn sẽ có cơ hội sở hữu những sản phẩm công nghệ
                        tiên tiến với mức giá ưu đãi chưa từng có. Hãy đăng ký nhận thông tin từ chúng tôi để không bỏ
                        lỡ bất kỳ ưu đãi hấp dẫn nào.</p>
                    <p>DYNAMITENESS còn đặc biệt chú trọng đến dịch vụ hậu mãi, đảm bảo bạn luôn hài lòng với những gì
                        mình nhận được. Đội ngũ kỹ thuật viên giàu kinh nghiệm của chúng tôi luôn sẵn sàng hỗ trợ bạn
                        giải quyết mọi vấn đề kỹ thuật, từ cài đặt, bảo trì cho đến sửa chữa các thiết bị điện tử. Bạn
                        hoàn toàn có thể yên tâm về chất lượng dịch vụ và sự hỗ trợ tận tình từ chúng tôi.</p>
                    <p>Chúng tôi hiểu rằng trong thế giới số hóa ngày nay, việc bảo mật thông tin cá nhân là vô cùng
                        quan trọng. Vì vậy, DYNAMITENESS cam kết bảo vệ thông tin cá nhân của khách hàng bằng các biện
                        pháp bảo mật tiên tiến nhất. Mọi giao dịch trên trang web của chúng tôi đều được mã hóa để đảm
                        bảo an toàn tuyệt đối.</p>
                    <p>Cuối cùng, chúng tôi muốn gửi lời cảm ơn chân thành đến tất cả khách hàng đã và đang tin tưởng,
                        ủng hộ DYNAMITENESS. Chúng tôi sẽ không ngừng nỗ lực để mang lại cho bạn những sản phẩm và dịch
                        vụ tốt nhất, góp phần nâng cao chất lượng cuộc sống của bạn. Hãy bắt đầu hành trình mua sắm
                        tuyệt vời cùng DYNAMITENESS ngay hôm nay!</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
