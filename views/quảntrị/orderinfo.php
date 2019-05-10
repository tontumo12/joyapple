<div class="col-sm-9 col-lg-10 main">			
            <h1>Chi tiết đặt hàng</h1>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div id="result"></div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Chi tiết đặt hàng</div>
                        <div class="panel-body">
                            <div class="bootstrap-table">
                                <div class="table-responsive">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <div class="panel panel-primary">
                                                            <div class="panel-heading dark-overlay">Thông tin khách hàng</div>
                                                            <div class="panel-body">
                                                                <?php foreach ($info as $key) {
                                                                 ?>
                                                                    <strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> :<?php echo $key->họ_tên ?></strong> <br>
                                                                    <strong><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> : Số điện thoại: <?php echo $key->sdt ?></strong> <br>
                                                                    <strong><span class="glyphicon glyphicon-send" aria-hidden="true"></span> : <?php echo $key->địa_chỉ ?></strong>
                                                            <?php } ?>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                    
                                        
                                    </div>
                                    <table class="table table-bordered" style="margin-top:20px;">				
                                        <thead>
                                            <tr class="bg-primary">
                                                <th>ID</th>
                                                <th >Thông tin Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá sản phẩm</th>
                                                <th>Thành tiền</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $gia = array();
                                            foreach ($order as $key) {
                                            ?>
                                            <tr>
                                                <td id="iddh"><?php echo $key->id ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                                <img width="100px" src="../../assets/images/<?php echo $key->ảnh?>" class="thumbnail">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <p>Mã sản phẩm: <?php echo $key->mã ?></p>
                                                                <p>Tên Sản phẩm: <strong><?php echo $key->tênsp ?></strong></p>
                                                                <p><?php echo $key->thuộc_tính?></p>
                                                        </div>
                                                    </div>
                                                    
                                                
                                                </td>
                                                <td><?php echo $key->số_lượng ?></td>
                                                <td><?php echo $key->đơn_giá ?></td>
                                                <td><?php echo $key->tổng_giá ?></td>
                                            </tr>
                                            
                                            <?php 
                                        $ep = (int) $key->tổng_giá;
                                        $gia[] = $ep;
                                        } ?>
                                        </tbody>
                                    
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width='70%'><h4 align='right'>Tổng Tiền :</h4></th>
                                                <th><h4 align='right' style="color: brown;"><?php $tt = array_sum($gia); echo $tt; ?></h4></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        
                                        </tbody>
                                    </table>
                                    <div class="alert alert-primary" role="alert" align='right'>
                                        <a id="check" class="btn btn-success" href="#" role="button">Đã xử lý</a>
                                    </div>						
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->          
        </div>
        <script>
               $(document).ready(function(){
                   $("#check").click(function(){
                    var row = $(this).closest("tr"),
                        iddh = row.find("#iddh").text();
                        $.post("../../controllers/check.php",{iddh:iddh},function(html){
                           $("#result").html(html);
                       })
                   })
               })
        </script>