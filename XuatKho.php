<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="SanPham.css">
    
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
        <h1>Phiếu xuất kho</h1>
        <p><a href="PhieuXuatKho.php">Thêm phiếu xuất</a></p>
        <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Ngày nhập hàng</td>
                <td>Nhà cung cấp</td>
                <td>Tên sản phẩm</td>
                <td>Ảnh</td>
                <td>Mô tả</td>
                <td>Loại sản phẩm</td>
                <td>Giá bán</td>
                <td>Số lượng</td>
                <td>Thành Tiền</td>
                <td>Người Nhập</td>
                <td>Sửa</td>
                <td>Xóa</td>
            </tr>
        </thead>

        <tbody>
            <?php
                include("connect.php");

                $sql = "SELECT * FROM phieuxuat";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    
            ?>  
                <tr>
                    <td><?php echo $row['id_phieu_xuat']?> </td>
                    <td><?php echo $row['ngay_xuat']?> </td>
                    <td><a href="NhaCungcap.php"><?php echo $row['nha_cung_cap_sp']?></a> </td>
                    <td><a href="SanPham.php"><?php echo $row['ten_sp']?></a> </td>
                    <td> <img src="images/<?php echo $row['anh_sp']?>" alt=""> </td>
                    <td><?php echo $row['mota_sp']?> </td>
                    <td><?php echo $row['loai_sp']?> </td>
                    <td><?php echo $row['gia_ban_sp']?> </td>                
                    <td><?php echo $row['so_luong_xuat']?> </td>
                    <td><?php echo $row['tong_tien_hang_xuat']?> </td>
                    <td><?php echo $row['nguoi_xuat']?> </td>
                    <td>
                        <span> <a href="SuaPhieuXuat.php?this_id=<?php echo $row['id_phieu_xuat'] ?>"> Sửa   </a></span>
                    </td>
                    <td>
                        <span> <a href="XoaPhieuXuat.php?this_id=<?php echo $row['id_phieu_xuat'] ?>"> Xóa </a></span>
                        
                    </td>
                    
                </tr>

            <?php } ?>
        </tbody>
    </table>
        
        
    </div>
</body>
</html>
