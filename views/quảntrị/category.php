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
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tên Danh mục</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Tên danh mục mới">
                        </div>
                        <div id="result">
                        </div>
                        <button type="submit" id='add' class="btn btn-primary">Thêm danh
                            mục</button>
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
        $("#add").click(function () {
            var a = $("#a").val();
            var name = $("#name").val();
            if (name == '') {
                alert("Bạn chưa nhập tên danh mục");
                $("#name").focus();
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "../../controllers/themdm.php",
                    data: {
                        a: a,
                        name: name
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