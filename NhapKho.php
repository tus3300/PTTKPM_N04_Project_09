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
        <h1>Main Content</h1>
        <p><a href="PhieuNhap.php">Phiếu nhập</a></p>
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
                <td>Giá nhập</td>
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

                $sql = "SELECT * FROM phieunhap";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    
            ?>  
                <tr>
                    <td><?php echo $row['id']?> </td>
                    <td><?php echo $row['ngay_nhap']?> </td>
                    <td><a href="NhaCungcap.php"><?php echo $row['nha_cung_cap_sp']?></a> </td>
                    <td><a href="SanPham.php"><?php echo $row['ten_sp']?></a> </td>
                    <td> <img src="images/<?php echo $row['anh_sp']?>" alt=""> </td>
                    <td><?php echo $row['mota_sp']?> </td>
                    <td><?php echo $row['loai_sp']?> </td>
                    <td><?php echo $row['gia_nhap_sp']?> </td>
                    
                    <td><?php echo $row['so_luong']?> </td>

                    <td><?php echo $row['tong_tien_hang']?> </td>
                    <td><?php echo $row['nguoi_nhap']?> </td>
                    <td>
                        <span> <a href="SuaPhieuNhap.php?this_id=<?php echo $row['id'] ?>"> Sửa   </a></span>
                    </td>
                    <td>
                        <span> <a href="XoaPhieuNhap.php?this_id=<?php echo $row['id'] ?>"> Xóa </a></span>
                        
                    </td>
                    
                </tr>

            <?php } ?>
        </tbody>
    </table>
        
        
    </div>
</body>
</html>
