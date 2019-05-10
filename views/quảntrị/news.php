<div class="col-sm-9 col-lg-10" id="main">
            <h1>Danh sách bài viết</h1>
            <div class="row">
                <a href="index.php?controller=addbaiviet"><button class="btn-primary" style="width:auto;">Thêm Bài Viết</button></a>
                <table class="table table-hover" style="margin-top:2%">
                      <thead>
                          <tr class="bg-primary">
                              <th>ID</th>
                              <th>Tiêu đề</th>
                              <th>Ảnh</th>
                              <th>Nội dung</th>
                              <th>Loại bài viết</th>
                              <th>Ngày đăng</th>
                              <th>Tùy chọn</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($hienthi as $key) { 
                              ?>
                          <tr>
                              <td><div id="idbv"><?php echo $key->idbv ?></div></td>
                              <td>
                                  <p><?php echo $key->tiêu_đề ?></p>
                              </td>
                              <td>
                                <img src="../../assets/images/<?php echo $key->ảnh ?>" alt="ip" width="100px"
                                class="thumbnail">
                              </td>
                              <td>
                                  <p><?php echo $key->nội_dung?></p>
                              </td>
                              <td>
                                  <p><?php echo $key->tên ?></p>
                              </td>
                              <td>
                                  <p><?php echo $key->thời_gian ?></p>
                              </td>
                              <td>
                                <a type="button" class="btn btn-warning">sửa</a>
                                <a type="button" class="btn btn-danger delete">xóa</a>
                              </td>
                          </tr>
                          <?php } ?>
                      </tbody>
                </table>
            </div>
        </div>
<script>
    $(document).ready(function(){
        $(".delete").click(function(){
            var row = $(this).closest("tr"),
                idbv = row.find("#idbv").text();
            $.post("../../controllers/xoabv.php",{idbv:idbv},function(html){
                $("#result").html(html);
                row.remove();
            });
        })
    })
</script>