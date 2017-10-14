<div class="panel-body">
    <div class="form-inline" style="padding-bottom: 10px">
        <div class="form-group">
            <select v-model="paginationVipShare.per_page" v-on:change="changePageVipShare(paginationVipShare.current_page - 1, paginationVipShare.per_page)" class="form-control" style="width: 80px">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
        </div>
        <div class="form-group pull-right">
            <label for="search">Tìm kiếm:</label>
            <input type="search" class="form-control" id="search">
        </div>
    </div>
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
                        <a href="javascript:void(0);" @click.prevent="showConfirmDelete('vipshare', item.id)" class="btn btn-xs btn-danger"><i class="fa fa-user-times" aria-hidden="true"></i> Xóa Tài Khoản</a>
                        <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh Sửa</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Pagination -->
        <nav class="pull-right">
            <ul class="pagination">
                <li v-if="paginationVipShare.current_page > 1">
                    <a href="#" aria-label="Previous"
                       @click.prevent="changePageVipShare(pagination.current_page - 1, paginationVipShare.per_page)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumberVipShare"
                    v-bind:class="[ page == isActivedVipShare ? 'active' : '']">
                    <a href="#"
                       @click.prevent="changePageVipShare(page, paginationVipShare.per_page)">@{{ page }}</a>
                </li>
                <li v-if="paginationVipShare.current_page < paginationVipShare.last_page">
                    <a href="#" aria-label="Next"
                       @click.prevent="changePageVipShare(paginationVipShare.current_page + 1, paginationVipShare.per_page)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>