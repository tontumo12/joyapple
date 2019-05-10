<div class="col-sm-9 col-lg-10 main">
            <h1 class="page-header">Đơn hàng chờ duyệt</h1>
            <!--/.row-->
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">Danh sách đơn đặt hàng chưa xử lý</div>
                        <div class="panel-body">
                            <div class="bootstrap-table">
                                <div class="table-responsive">

                                    <a href="orderinfo.html" class="btn btn-success">Đơn đã xử lý</a>
                                    <table class="table table-bordered" style="margin-top:20px;">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th>ID</th>
                                                <th>Tên khách hàng</th>
                                                <th>Sđt</th>
                                                <th>Địa chỉ</th>
                                                <th>Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($info as $key) {
                                                ?>
                                            <tr>
                                                <td><?php echo $key->id; ?></td>
                                                <td><?php echo $key->họ_tên; ?></td>
                                                <td><?php echo $key->sdt ?></td>
                                                <td><?php echo $key->địa_chỉ;?></td>
                                                <td>
                                                    <a href="index.php?controller=donhang&id=<?php echo $key->id ?>" class="btn btn-warning"><i
                                                            class="fa fa-pencil" aria-hidden="true"></i>Xử lý</a>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row-->


        </div>