<div class="col-sm-9 col-lg-10">
    <h1 class="page-header">Thêm Bài Viết</h1>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <div id="result"></div>
            <div class="panel panel-primary">
                <div class="panel-heading">Bài viết</div>
                <div class="panel-body" style="padding:5%;">
                    <div class="row" style="margin-bottom:40px">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Danh mục bài viết</label>
                                    <select id="category" class="form-control">
                                        <?php quantri::danhmucbv() ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tiêu đề bài viết</label>
                                    <input required type="text" id="tite" class="form-control" style="height:100px;">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Ảnh bài viết</label>
                                    <input id="img" type="file" class="form-control hidden"
                                        onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="100%" height="350px"
                                        src="../../assets/images/84.jpg">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label>Nội dung bài viết</label>
                                    <textarea required id="nd" name="nd" style="width: 100%;height: 200px;"></textarea>
                                </div>
                        </div>
                    </div>
                    <button type="button" id="add_bv" class="btn btn-primary">xác nhận</button>
                    <button type="button" class="btn btn-danger">hủy bỏ</button>
                </div>
            </div>
        </div>
    </div>
    <script>CKEDITOR.replace('nd');</script>
    <script>
         
        $(document).ready(function () {
            $("#add_bv").click(function () {
                var category = $("#category").val();
                var tite = $("#tite").val();
                var nd = CKEDITOR.instances.nd.getData();
                //Lấy ra files
                var file_data = $("#img").prop("files")[0];
                //lấy ra kiểu file
                var type = file_data.type;
                //Xét kiểu file được upload
                var match = ["image/gif", "image/png", "image/jpg", "image/jpeg", ];
                //kiểm tra kiểu file
                if (tite == '') {
                    alert("Bạn chưa nhập tiêu đề bài viết");
                    $("#tite").focus();
                } else if (nd == '') {
                    alert("Bạn chưa nhập nội dung bài viết");
                    $("#nd").focus();
                } else if (type != match[0] && type != match[1] && type != match[2] && type != match[
                    3]) {
                    alert("Chỉ được upload file ảnh");
                    return false;
                }
                else{
                    var form_data = new FormData();
                    form_data.append("file",file_data);
                    form_data.append("tite",tite);
                    form_data.append("category",category);
                    form_data.append("nd",nd);
                    $.ajax({
                                    type: "POST",
                                    url: "../../controllers/addbv.php",
                                    dataType: 'text',
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    cache: false,
                                    success: function (html) {
                                       $("#result").html(html);
                                       // location.href = "index.php?controller=danhsachsp";
                                    }
                });
                }
                return false;
            })
        })
    </script>