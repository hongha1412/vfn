<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">

            <img class="img-circle" alt="User Image" src="https://i.imgur.com/oLlDtlx.jpg">
        </div>
        <div class="pull-left info">
            <p>
                <span class="badge bg-teal">Đỗ Duy Thịnh</span></p>
            <p>
                <i class="text-danger">
                    <b>Sáng Lập Viên</b>
                </i>
            </p>
        </div>

    </div>
    <ul class="sidebar-menu">
        <li class="active Home"><a href="{{ url('') }}"><i class="fa fa-home"
                                                                                   style="color: #00a65a;"></i>
                <span>TRANG CHỦ</span></a></li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Menu Systems</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li><a href="kichhoat.php"><i class="fa fa-plus-square"></i> Kích Hoạt</a></li>
                <li><a href="scanmembers.php"><i class="fa fa-plus-square"></i> Quét Members </a></li>
                <li><a href="scanvip.php"><i class="fa fa-plus-square"></i> Quét ALL VIP </a></li>
                <li><a href="scangift.php"><i class="fa fa-plus-square"></i> Quét GiftCode </a></li>

            </ul>
        </li>

        <!-- Quản lý token  -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                <span>Quản Lý Token</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li><a href="them_token"><i class="fa fa-plus-square"></i> Thêm Token</a></li>
                <li><a href="kiemtra_token.php"><i class="fa fa-plus-square"></i> Kiểm Tra Token </a></li>
                <li><a href="tong_token.php"><i class="fa fa-plus-square"></i> Tổng Token </a></li>
            </ul>
        </li>


        <li><a href="{{ url('giftcode') }}"><i class="fa fa-gift" aria-hidden="true"></i>
                <span>Quản Lý GiftCode</span></a></li>
        <li><a href="{{ url('package') }}"><i class="fa fa-gift" aria-hidden="true"></i>
                <span>Quản Lý Package</span></a></li>
        <li><a href="{{ url('notice') }}"><i class="fa fa-usd" aria-hidden="true"></i> <span>Thông Báo</span></a></li>

        <li><a href="logout.php"><i class="fa fa-share"></i> <span>Đăng Xuất</span></a></li>
    </ul>


    <!-- /.sidebar-menu -->
</section>