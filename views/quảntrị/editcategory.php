<div class="col-sm-9 col-lg-10">
    <h1 class="page-header">Danh mục</h1>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-5">

                    <div>
                        <div class="form-group">
                            <label for="">Danh mục cha:</label>
                            <select class="form-control" name="a" id="a">
                                <?php quantri::hienthidm() ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tên Danh mục</label>
                            <?php foreach ($ht as $key) {?>
                            <div id="id" style="hidden:"><?php echo $key->id ?></div>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="<?php echo $key->tênmd ?>">
                            <?php } ?>
                        </div>
                        <button type="submit" id='edit' class="btn btn-warning" >sửa danh mục</button>
                        <div id="result"></div>
                    </div>
                </div>
                <div class="col-md-7" id="list">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#edit").click(function () {
            var a = $("#a").val();
            var id = $("#id").text();
            var name = $("#name").val();
            if (name == '') {
                alert("Bạn chưa nhập tên danh mục");
                $("#name").focus();
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "../../controllers/suadm.php",
                    data: {
                        a: a,
                        name: name,
                        id:id
                    },
                    cache: false,
                    success: function (html) {
                        $("#result").html(html);
                        load_ajax();
                        load_dm();
                    }
                });
                // $.post("../../controllers/themdm.php",{a:a,name:name},function(html){
                //     $("result").html(html);
                //     load_ajax();
                //     load_dm();
                // })
            }
            return false;
        });
        load_ajax();
        load_dm();
    });

    function load_ajax() {
        $.get("../../controllers/hienthidm.php",function(list){
            $('#list').html(list);
        })
    }
    function load_dm(){
        $.get("../../controllers/chondm.php",function(a){
            $('#a').html(a);
        })
    }
    
</script>