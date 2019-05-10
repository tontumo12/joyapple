<?php
require_once "../../config/connect.php";
Database::connect();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Document</title>
    <script src="../../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/chart.min.js"></script>
    <script src="../../assets/js/chart-data.js"></script>
    <script src="../../assets/ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="container-fluid" id="pages">
        <header class="row">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Joy Apple</a>
                    </div>
                    <div class="nav navbar-nav navbar-right dropdown">
                        <a href="#" class="navbar-text dropdown-toggle" data-toggle="dropdown"
                            style="text-decoration: none;"><i class="glyphicon glyphicon-user"></i>admin<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="glyphicon glyphicon-user"></i>Thông tin</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>Cài đặt</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-cog"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <ul class="nav menu">
                <li class="active"><a class="" href="index.php"><i class="glyphicon glyphicon-signal"></i> Tổng
                        quan</a></li>
                <li><a href="index.php?controller=danhmucsp"><i class="glyphicon glyphicon-list-alt"></i> Danh Mục</a>
                </li>
                <li><a href="index.php?controller=danhsachsp"><i class="glyphicon glyphicon-phone"></i> Sản phẩm</a>
                </li>
                <li><a href="index.php?controller=danhsachbv"><i class="glyphicon glyphicon-pencil"></i> Bài viết</a></li>
                <li><a href="index.php?controller=order"><i class="glyphicon glyphicon-shopping-cart"></i> Đơn hàng</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-comment"></i> Bình luận</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-bookmark"></i> Banner QC</a></li>
                <li role="presentation" class="divider"></li>
                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Quản lý thành viên</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-off"></i> Log out</a></li>
            </ul>
        </div>
        <?php
        require_once "../../controllers/xulyquantri.php";
        ?>
    </div>

    <script>
        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function () {
            $('#avatar').click(function () {
                $('#img').click();
            });
        });
        $(document).ready(function(){
            $(".close").click(function(){
                
            })
        })
    </script>
</body>
</html>