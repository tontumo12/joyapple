<div class="col-sm-9 col-lg-10" id="main">
    <h1 class="page-header">Danh sách sản phẩm</h1>
    <div class="row">
        <div id="result"></div>
        <a href="index.php?controller=themsp" class="btn btn-primary">Thêm sản phẩm</a>
        <table class="table table-hover" style="margin-top:2%;">
            <thead>
                <tr class="bg-primary">
                    <th>ID</th>
                    <th>Thông tin sản phẩm</th>
                    <th>Giá</th>
                    <th>Danh mục</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($hienthi as $key) {
            ?>
                <tr>
                    <td><div id="idsp"><?php echo $key->idsp ?></div></td>
                    <td>
                        <div class="row">
                            <div class="col-md-3"><img src="../../assets/images/<?php echo $key->ảnh ?>" alt="ip" width="100%" class="thumbnail"></div>
                            <div class="col-md-9">
                                <p><strong>Mã sản phẩm : <?php echo $key->mã ?></strong></p>
                                <p>Tên sản phẩm :<?php echo $key->tên ?></p>
                                <?php $id = $key->mã;
                                $tt = quantri::hienthithuoctinh($id);
                                $c = array();
                                foreach ($tt as $row) {
                                $ten = $row->têntt;
                                $c[] = $ten;
                                }
                                $d = array_count_values($c);
                                foreach ($d as $row=>$val) {
                                ?>
                                <p><?php echo $row ?>:<?php $gt = quantri::hienthigiatri($id,$row); foreach ($gt as $k) {
                                    echo $k->giatri."  ||  ";
                                } ?></p>
                                <?php } ?>
                                <p><?php echo $key->mô_tả ?></p>
                            </div>
                        </div>
                    </td>
                    <td><?php echo $key->giá ?>đ</td>
                    <td><?php echo $key->tênmd ?></td>
                    <td><?php echo $key->thời_gian ?></td>
                    <td><?php if ($key->trạng_thái == 1) {echo "<button type='button' class='btn btn-success'>còn hàng</button></td>";} elseif ($key->trạng_thái == 0) {
                                    echo "<button type='button' class='btn btn-danger'>hết hàng</button></td>";    }?>
                        
                    <td>
                        <a type="button" class="btn btn-warning">sửa</a>
                        <a type="button" class="btn btn-danger xoa">xóa</a>
                    </td>
                </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".xoa").click(function(){
            var row = $(this).closest("tr"),
                idsp = row.find("#idsp").text();
            $.post("../../controllers/xoasp.php",{idsp:idsp},function(html){
                $("#result").html(html);
                row.remove();
            });
        })
    })
</script>