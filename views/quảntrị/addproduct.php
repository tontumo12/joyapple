<div class="col-sm-9 col-lg-10">
    <h1 class="page-header">Thêm sản phẩm</h1>
    <div class="row" id="result">
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">

            <input type="hidden" name="_token" value="P2SCRqCXxG68UzWYKMxN3gQRZPhAg8sgWW0dvW8B">
            <div class="panel panel-primary">
                <div class="panel-heading">Thêm sản phẩm</div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom:40px">
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <select class="form-control" name="a" id="a">
                                            <?php quantri::hienthidm() ?>
                                        </select> </div>
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        <input required type="text" id="product_code" name="product_code"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input required type="text" id="product_name" name="product_name"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input required type="number" id="product_price" name="product_price"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select required id="product_state" name="product_state" class="form-control">
                                            <option value="1">Còn hàng</option>
                                            <option value="0">Hết hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="col-md-12">
                                        <label>Ảnh sản phẩm</label>
                                    </div>
                                    <div class="form-group col-md-12">

                                        <input id="img" type="file" name="product_img" class="form-control hidden"
                                            onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="100%" height:="auto"
                                            src="../../assets/images/84.jpg">
                                    </div>
                                    <!-- <div class="form-group">
                                            <label>ảnh sản phẩm</label>
                                            <input type="file" class="form-control" name="img" id="img" multiple>
                                        </div>
                                        <div class="form-group col-md-12" id="img-list">
                                        </div> -->
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-xs-4">
                            <div class="panel panel-default">
                                <div class="panel-body tabs">
                                    <label>Các thuộc Tính <a href="#"><span class="glyphicon glyphicon-cog"></span>
                                            Tuỳ chọn</a></label>
                                    <?php quantri::listtt(); ?>
                                    <div class="tab-content">
                                        <?php foreach ($tt as $key) {
                                            ?>
                                        <div class="tab-pane fade in" id="<?php echo $key->id ?>">
                                            <?php 
                                                    $id = $key->id;
                                                    quantri::hienthigt($id); 
                                                ?>
                                            <div class="form-group">
                                                <hr>
                                                <form action="../../controllers/themtt.php" method="post">
                                                    <label for="">Thêm biến thể cho thuộc tính</label>
                                                    <input type="hidden" name="id_pro" value="<?php echo $key->id ?>">
                                                    <input name="var_name" type="text" placeholder="">
                                                    <input name="add_val" type="submit" value="thêm">
                                                </form>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="tab-pane fade active " id="tab-add">
                                            <form action="../../controllers/themtt.php" method="post">
                                                <div class="form-group">
                                                    <label for="">Tên thuộc tính mới</label>
                                                    <input type="text" class="form-control" name="pro_name"
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                                <button type="submit" name="add_pro" class="btn btn-success"> <span
                                                        class="glyphicon glyphicon-plus"></span>
                                                    Thêm thuộc tính</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <p></p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                                <label>Thông tin</label>
                                <textarea required name="info" id="info" style="width: 100%;height: 100px;"></textarea>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-success" name="add_product" id="add_product" type="submit">Thêm sản phẩm</button>
                                <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>CKEDITOR.replace('info');</script>
                <script>
                    $(document).ready(function () {
                        $("#add_product").click(function () {
                            var a = $("#a").val();
                            var product_code = $("#product_code").val();
                            var product_name = $("#product_name").val();
                            var product_price = $("#product_price").val();
                            var product_state = $("#product_state").val();
                           // var giatri = $(".form-check-input").val();
                            var check = document.getElementsByName('giatri[]');
                            var giatri = new Array();
                            for (var i = 0;i < check.length;i++){
                                if (check[i].checked === true) {
                                    giatri.push(check[i].value);
                                } 
                            }
                            //var b = $.JSON.encode(giatri);
                            //Lấy ra files
                            var file_data = $("#img").prop("files")[0];
                            //lấy ra kiểu file
                            var type = file_data.type;
                            //Xét kiểu file được upload
                            var match = ["image/gif", "image/png", "image/jpg", "image/jpeg",];
                            //kiểm tra kiểu file
                            var info = CKEDITOR.instances.info.getData();
                            if (product_code == '') {
                                alert("Bạn chưa nhập mã sản phẩm");
                                $("#product_code").focus();
                                return false;
                            } else if (product_name == '') {
                                alert("Bạn chưa nhập tên sản phẩm");
                                $("#product_name").focus();
                                return false;
                            } else if (product_price == '') {
                                alert("Bạn chưa nhập giá sản phẩm");
                                $("#product_price").focus();
                                return false;
                            }
                            else if (type != match[0] && type != match[1] && type != match[2] && type!= match[3]) {
                                alert("Chỉ được upload file ảnh");
                                return false;
                            } 
                            else if (info == '') {
                                alert("Bạn chưa mô tả sản phẩm");
                                $("#info").focus();
                                return false;
                            } else {
                                //khởi tạo đối tượng form data
                                var form_data = new FormData();
                                //thêm files vào trong form data
                                form_data.append("file", file_data);
                                form_data.append("a",a);
                                form_data.append("product_code",product_code);
                                form_data.append("product_name",product_name);
                                form_data.append("product_price",product_price);
                                form_data.append("product_state",product_state);
                                form_data.append("info",info);
                                //form_data.append("giatri",giatri);// xem lại chỗ này
                                for (j = 0; j < giatri.length; j++) {
                                    form_data.append('giatri', giatri[j]); 
                                    $.ajax({
                                    traditional: true,
                                    type: "POST",
                                    url: "../../controllers/themgiatri.php",
                                    dataType: 'text',
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    cache: false,
                                    success: function (html) {
                                       $("#result").html(html);
                                        //location.href = "index.php?controller=danhsachsp";
                                    }
                                });
                                }
                               //form_data.append('giatri',JSON.stringify(giatri));
                                //form_data tach
                                
                            }
                            return false;
                        });
                    });
                    // $(document).ready(function () {
                    //  $("#add_product").click(function(){
                    //     var check = document.getElementsByName('giatri[]');
                    //         var giatri = "";
                    //         for (var i = 0;i < check.length;i++){
                    //             if (check[i].checked === true) {
                    //                 giatri += check[i].value;
                    //             } 
                    //         }
                    //         alert("Sở thích là: " + giatri);
                    // })
                    // })
                </script>