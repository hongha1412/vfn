<div class="panel-body">
    <div class="table-responsive">
        <table id="vip-share" class="table table-bordered table-striped">
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
                <tr v-for="item in itemsVipShare">
                    <td>@{{ item.idfb }}</td>
                    <td>@{{ item.name }}</td>
                    <td><a class="btn btn-xs btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> @{{ item.goi }} Share</a></td>
                    <td><a class="btn btn-xs btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> @{{ item.soshare }} Share</a></td>
                    <td><a class="btn btn-xs btn-success"><i class="fa fa-history" aria-hidden="true"></i> @{{ item.time }} </a></td>
                    <td>
                        <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-user-times" aria-hidden="true"></i> Xóa Tài Khoản</a>
                        <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh Sửa</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li v-if="paginationVipShare.current_page > 1">
                    <a href="#" aria-label="Previous"
                       @click.prevent="changePageVipShare(pagination.current_page - 1)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumberVipShare"
                    v-bind:class="[ page == isActivedVipShare ? 'active' : '']">
                    <a href="#"
                       @click.prevent="changePageVipShare(page)">@{{ page }}</a>
                </li>
                <li v-if="paginationVipShare.current_page < paginationVipShare.last_page">
                    <a href="#" aria-label="Next"
                       @click.prevent="changePageVipShare(paginationVipShare.current_page + 1)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>