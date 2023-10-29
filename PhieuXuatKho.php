<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    
    <script src="https://kit.fontawesome.com/a5308e13e8.js" crossorigin="anonymous"></script>
    <title>Quản Lý Kho PJ09</title>
</head>
<style>
    form {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content:center;
        align-items: center;
    }

    label, input {
        flex: 0 1 calc(50% - 10px);
        margin-bottom: 10px;
        padding:3px;
    }
</style>



<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3><a href="TrangChu.php">Quản Lý Kho PJ09</a></h3>
        </div>
        <div class="sidebar-content">
            <ul>
                <li><a href="TrangChu.php"><i class="fa-solid fa-gauge"></i> Trang Chủ</a></li>
                <li><a href="NhapKho.php"><i class="fa-solid fa-right-to-bracket"></i> Nhập Kho</a></li>
                <li><a href="XuatKho.php"><i class="fa-solid fa-right-from-bracket"></i> Xuất Kho</a></li>
                <li><a href="NhaCungCap.php"><i class="fa-solid fa-tags"></i> Nhà cung cấp</a></li>
                <li><a href="LoaiSanPham.php"><i class="fa-solid fa-list"></i> Loại Sản Phẩm</a></li>
                <li><a href="SanPham.php"><i class="fa-solid fa-copy"></i> Sản Phẩm</a></li>
                <li><a href="KhachHang.php"><i class="fa-solid fa-address-card"></i> Khách Hàng</a></li>
                <li><a href="BaoCao.php"><i class="fa-solid fa-chart-simple"></i> Báo Cáo</a></li>
                <li><a href="TaiKhoan.php"><i class="fa-solid fa-user"></i> Tài Khoản</a></li>
                <li><a href="DangNhap.php"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <!-- Main content goes here -->
        <h1>Phiếu xuất Kho</h1>
        <p>This is the main content area.</p>


        <?php
            include("connect.php");
            
            if( isset($_POST['btn']) ){
                $ngay_xuat = $_POST['NgayXuat'];

                $nha_cung_cap_sp = $_POST['NhaCungCap'];

                $ten_sp = $_POST['TenSP'];

                // chỉ lấy tên hình ảnh
                $anh_sp = $_FILES['HinhAnh']['name'];
                // lấy đường dẫn ảnh
                $anh_tmp_name = $_FILES['HinhAnh']['tmp_name'];

                $mota_sp = $_POST['MoTa'];

                $loai_sp = $_POST['LoaiSP'];

                $gia_ban_sp = $_POST['GiaBan'];

                $so_luong = $_POST['SoLuong'];
                
                $tong_tien_hang = $_POST['TienXuatHang'];

                $nguoi_xuat = $_POST['NguoiXuat'];

                

                if (empty($ten_sp) || empty($anh_sp) || empty($mota_sp) || empty($loai_sp) || empty($ngay_xuat) || empty($gia_ban_sp) || empty($nha_cung_cap_sp) || empty($so_luong) || empty($tong_tien_hang) || empty($ngay_xuat)) {
                    echo "Vui lòng điền đầy đủ thông tin vào tất cả các trường.";
                } else {
                    // Nếu tất cả các trường đã được điền, thực hiện thêm dữ liệu vào cơ sở dữ liệu
                    $sql = "INSERT INTO phieuxuat (ten_sp, anh_sp, mota_sp, loai_sp, ngay_xuat, gia_ban_sp, nha_cung_cap_sp, so_luong_xuat, tong_tien_hang_xuat, nguoi_xuat)
                        VALUES ('$ten_sp', '$anh_sp', '$mota_sp', '$loai_sp', '$ngay_xuat', '$gia_ban_sp', '$nha_cung_cap_sp', '$so_luong', '$tong_tien_hang', '$nguoi_xuat')";
            
                    mysqli_query($conn, $sql);
                    move_uploaded_file($anh_tmp_name, 'images/' . $anh_sp);
                    
                    header('location:XuatKho.php');
                    // Sau khi thêm dữ liệu thành công, bạn có thể thực hiện chuyển hướng hoặc hiển thị thông báo thành công tại đây
                }

            }
        ?>

        <form action="PhieuXuatKho.php" method="post" enctype="multipart/form-data">
            <label>Ngày xuất</label>
            <input type="date" name="NgayXuat">

            <label>Nhà Cung Cấp</label>
            <input type="text" name="NhaCungCap">

            <label>Tên sản phẩm</label>
            <input type="text" name="TenSP">

            <label>Ảnh</label>
            <input type="file" name="HinhAnh">

            <label>Mô Tả</label>
            <input type="text" name="MoTa">

            <label>Loại sản phẩm</label>
            <input type="text" name="LoaiSP">

            <label>Giá bán</label>
            <input type="number" name="GiaBan">

            <label>Số lượng</label>
            <input type="number" name="SoLuong">

            <label>Tổng tiền xuất hàng</label>
            <input type="number" name="TienXuatHang">
            
            <label>Người xuất</label>
            <input type="text" name="NguoiXuat">

            <div class="Nhap">
                <button id=submit name="btn">Xuất</button>                   
            </div>
        </form>
        
    </div>
</body>
</html>