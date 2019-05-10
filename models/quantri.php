<?php
class quantri extends Database{
    public function chondm($id_cha,$kytu){
       $dm = parent::findData('*','danhmuc','id_cha',$id_cha);
       foreach ($dm as $row) {
            echo "<option value='$row->id'>".$kytu.$row->tênmd."</option>";
            $id=$row->id;
            $lui = $kytu."--|";
            self::chondm($id,$lui);
       }
    }
    public function hienthidm(){
        echo "<option value = 0>----ROOT----</option>";
        self::chondm(0,"");
    }
    public function alldm($id_cha,$kytu){
        $dm = parent::findData('*','danhmuc','id_cha',$id_cha);
       foreach ($dm as $row) {
            echo "<li class='list-group-item' style='height:auto;' value='$row->id' id='$row->id_cha'>
                ".$kytu.$row->tênmd."<span class='badge' style='background-color: white; '>
                <a href='index.php?controller=suadanhmucsp&id_dm=".$row->id."'><button type='button' class='btn btn-info'><i class='glyphicon glyphicon-pencil'></i></button></a>
                <a href='index.php?controller=xoadm&id_dm=".$row->id."'><button type='button' class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i></button></a>
                </span>
            </li>";
            $id=$row->id;
            $lui = $kytu."--|";
            self::alldm($id,$lui);
    }
}
    public function bosung($id){
        parent::findData('*','danhmuc','id',$id);
    }
    public function themdm($ten,$id){
            $sql ="INSERT INTO danhmuc(tênmd,id_cha) VALUES ('{$ten}',$id)";
            parent::execute($sql);
    }
    public function suadm($ten,$id_cha,$id){
           $sql = "UPDATE danhmuc SET tênmd = '{$ten}', id_cha = $id_cha WHERE id=$id";
           parent::execute($sql);
    }
    public function xoadm($id){
        return parent::delete('danhmuc','id',$id);
    }
    public function showdm($id){
        return parent::findData('*','danhmuc','id',$id);
    }
    public function themsp($code,$ten,$anh,$gia,$trangthai,$chitiet,$id_dm){
        $sql ="INSERT INTO sanpham(mã,tên,ảnh,giá,trạng_thái,mô_tả,danhmuc_id) VALUES ($code,'{$ten}','{$anh}',$gia,$trangthai,'{$chitiet}',$id_dm)";
        parent::execute($sql);
    }
    public function themtt($ten){
        $sql = "INSERT INTO thuoctinh (têntt) VALUES ('{$ten}')";
        parent::execute($sql);
    }
    public function themgiatri($ten,$id){
        $sql = "INSERT INTO giatri(giatri,thuoctinh_id) VALUES ('{$ten}','{$id}')";
        parent::execute($sql);
    }
    public function hienthitt(){
        $tt = parent::getAllData('thuoctinh');
        foreach ($tt as $row) {
            echo "<li><a href='#".$row->id."' data-toggle='tab' value='".$row->id."'>".$row->têntt."</a></li>";
        }
    }
    public function listtt(){
        echo "<ul class='nav nav-tabs'>";
        self::hienthitt();
        echo "<li class='active'><a href='#tab-add' data-toggle='tab'>+</a></li>
        </ul>";
    }
    public function layidtt(){
        return parent::getAllData('thuoctinh');
    }
    public function hienthigt($id){
        $gt = parent::findData('*','giatri','thuoctinh_id',$id);
        echo "<table class='table'>
        <thead>
            <tr>";
        foreach ($gt as $key) {
            echo "<th>".$key->giatri."</th>";}
        echo  "</tr>
        </thead>
        <tbody>
            <tr>";
        foreach ($gt as $key) {
           echo "<td> <input class='form-check-input' name='giatri[]' type='checkbox'
                        value='".$key->id."'> </td>";}
            echo "</tr>
                </tbody>
                </table>";
    
    }
    public function themgt($ten,$id){
        $sql = "INSERT INTO giatri(giatri,thuoctinh_id) VALUES ('{$ten}','{$id}')";
        parent::execute($sql);
    }
    public function lienketspgt($id,$gt){
        $sql = "INSERT INTO sanpham_giatri(sanpham_id,giatri_id) VALUES ($id,$gt)";
        parent::execute($sql);
    }
    public function hienthisp(){
        $sql = parent::execute("SELECT *,sanpham.id AS idsp from sanpham inner join danhmuc on sanpham.danhmuc_id = danhmuc.id");
        if (mysqli_num_rows($sql)>0) {
            while($row = mysqli_fetch_object($sql)){
                 $data[]=$row;
            }
        } else {
            $data = [];
        }
        return $data;
    }
    public function hienthigiatri($id,$tt){
        $sql = parent::execute("SELECT * FROM giatri INNER JOIN thuoctinh on thuoctinh.id = giatri.thuoctinh_id INNER join sanpham_giatri on sanpham_giatri.giatri_id = giatri.id WHERE sanpham_id = $id and thuoctinh.têntt LIKE '{$tt}' ");
        if (mysqli_num_rows($sql)>0) {
            while($row = mysqli_fetch_object($sql)){
                 $data[]=$row;
            }
        } else {
            $data = [];
        }
        return $data;
    }
    public function hienthithuoctinh($id){
        $sql = parent::execute("SELECT têntt FROM thuoctinh INNER JOIN giatri on thuoctinh.id = giatri.thuoctinh_id INNER join sanpham_giatri on sanpham_giatri.giatri_id = giatri.id WHERE sanpham_id = $id");
        if (mysqli_num_rows($sql)>0) {
            while($row = mysqli_fetch_object($sql)){
                 $data[]=$row;
            }
        } else {
            $data = [];
        }
        return $data;
    }
    public function xoasp($id){
        return parent::delete('sanpham','id',$id);
    }
    public function danhmucbv(){
        $dm = parent::getAllData('danhmucbv');
        foreach ($dm as $key) {
            echo "<option value='".$key->id."'>".$key->tên."</option>";
        }
    }
    
    public function thembv($tite,$anh,$nd,$id){
        $sql = "INSERT INTO baiviet(tiêu_đề,ảnh,nội_dung,danhmuabv_id) VALUES ('{$tite}','{$anh}','{$nd}',$id)";
        return parent::execute($sql);
    }
    public function showlist(){
        $sql = parent::execute("SELECT *, baiviet.id as idbv from baiviet inner join danhmucbv where baiviet.danhmuabv_id = danhmucbv.id");
        if (mysqli_num_rows($sql)>0) {
            while($row = mysqli_fetch_object($sql)){
                 $data[]=$row;
            }
        } else {
            $data = [];
        }
        return $data;
    }
    public function xoabv($id){
        return parent::delete('baiviet','id',$id);
    }
    public function info(){
        return parent::findData('*','info','chờ',1);
    }
    public function order($id){
        return parent::findData('*','donhang','khachhang_id',$id);
    }
    public function chitiet($id){
        return parent::findData('*','info','id',$id);
    }
    public function updatedh($id){
        $sql = parent::execute("UPDATE donhang set tình_trạng = 2 WHERE id = $id");
        parent::execute($sql);
    }
}