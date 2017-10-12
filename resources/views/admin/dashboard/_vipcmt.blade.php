<div class="panel-body">
    <div class="table-responsive">
        <table id="vip-cmt" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID Vip</th>
                <th>Tên</th>
                <th>Gói</th>
                <th>Tốc độ</th>
                <th>Hạn sử dụng</th>
                <th>Hành Động</th>

            </tr>
            </thead>
            <tbody>
                <tr v-for="item in itemsVipCmt">
                    <td>@{{ item.idfb }}</td>
                    <td>@{{ item.name }}</td>
                    <td><a class="btn btn-xs btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> @{{ item.goi }} CMT</a></td>
                    <td><a class="btn btn-xs btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> @{{ item.socmt }} CMT</a></td>
                    <td><a class="btn btn-xs btn-success"><i class="fa fa-history" aria-hidden="true"></i> @{{ item.time }}</a></td>
                    <td>
                        <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-user-times" aria-hidden="true"></i> Xóa Tài Khoản</a>
                        <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh Sửa</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Pagination -->
        <nav class="pull-right">
            <ul class="pagination">
                <li v-if="paginationVipCmt.current_page > 1">
                    <a href="#" aria-label="Previous"
                       @click.prevent="changePageVipCmt(paginationVipCmt.current_page - 1)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumberVipCmt"
                    v-bind:class="[ page == isActivedVipCmt ? 'active' : '']">
                    <a href="#"
                       @click.prevent="changePageVipCmt(page)">@{{ page }}</a>
                </li>
                <li v-if="paginationVipCmt.current_page < paginationVipCmt.last_page">
                    <a href="#" aria-label="Next"
                       @click.prevent="changePageVipCmt(paginationVipCmt.current_page + 1)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>