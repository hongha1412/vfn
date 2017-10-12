<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên Hiển Thị</th>
                <th>Trạng Thái</th>
                <th>Tiền + ID</th>
                <th>Email</th>
                <th>Hành Động</th>

            </tr>
            </thead>
            <tbody>
                <tr v-for="item in itemsAccount">
                    <td><b>#</b>@{{ item.id }}</td>
                    <td><a class="btn btn-xs btn-primary"><i class="fa fa-address-card-o" aria-hidden="true"></i> @{{ item.fullname }}</a></td>
                    <td>
                        <button class='btn btn-rounded btn-xs ' v-bind:class="{'btn-danger': item.kichhoat <= 0, 'btn-success': item.kickhoat > 0}"><i class='fa fa-times'></i>
                            <b v-if="item.kichhoat <= 0">Chưa Kích Hoạt</b>
                            <b v-if="item.kichhoat > 0">Đã Kích Hoạt</b>
                        </button>
                    </td>
                    <td>
                        <a class="btn btn-xs btn-success"><i class="fa fa-money" aria-hidden="true"></i>@{{ item.vnd }} VNĐ</a>
                        <span class="label label-warning pull-right">@{{ item.toida }}</span>
                    </td>
                    <td>
                        <a class="btn btn-xs btn-default">
                            <b v-if="item.mail != null && item.mail != ''">@{{ item.mail }}</b>
                            <b v-if="item.mail == null || item.mail == ''">Không xác định</b>
                        </a>
                    </td>
                    <td>
                        <a href="#" data-toggle="tooltip" title="Cộng Tiền" class="btn btn-success btn-simple btn-xs"><i class="fa fa-cog"></i></a>
                        <a href="#" data-toggle="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Thêm ID"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Xóa Members"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
            <!-- Pagination -->
        <nav class="pull-right1">
            <ul class="pagination">
                <li v-if="paginationAccount.current_page > 1">
                    <a href="#" aria-label="Previous"
                    @click.prevent="changePageAccount(paginationAccount.current_page - 1)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumberAccount"
                    v-bind:class="[ page == isActivedAccount ? 'active' : '']">
                    <a href="#"
                    @click.prevent="changePageAccount(page)">@{{ page }}</a>
                </li>
                <li v-if="paginationAccount.current_page < paginationAccount.last_page">
                    <a href="#" aria-label="Next"
                    @click.prevent="changePageAccount(paginationAccount.current_page + 1)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>