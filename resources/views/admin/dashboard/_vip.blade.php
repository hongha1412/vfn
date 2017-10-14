<div class="panel-body">
    <div class="form-inline" style="padding-bottom: 10px">
        <div class="form-group">
            <select v-model="paginationVipLike.per_page" v-on:change="changePageVipLike(paginationVipLike.current_page - 1, paginationVipLike.per_page)" class="form-control" style="width: 80px">
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
        <table id="vip" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>ID Vip</th>
                <th>Tên</th>
                <th>Gói</th>
                <th>Tốc độ</th>
                <th>Hạn sử dụng</th>
                <th>Hành Động</th>

            </tr>
            </thead>
            <tbody>
                <tr v-for="item in itemsVipLike">
                    <td><b>#</b>@{{ item.id }}</td>
                    <td>@{{ item.idfb }}</td>
                    <td>@{{ item.fbname }}</td>
                    <td><a class="btn btn-xs btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> @{{ item.package }} Like</a></td>
                    <td><a class="btn btn-xs btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> @{{ item.likespeed }} Like</a></td>
                    <td><a class="btn btn-xs btn-success"><i class="fa fa-history" aria-hidden="true"></i> @{{ date("d-m-20y",item.expiretime) }}</a></td>
                    <td>
                        <a href="javascript:void(0);" @click.prevent="showConfirmDelete('viplike', item.id)" class="btn btn-xs btn-danger"><i class="fa fa-user-times" aria-hidden="true"></i> Xóa Tài Khoản</a>
                        <a href="javascript:void(0);" @click.prevent="editVipLike(item)" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh Sửa</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Pagination -->
        <nav class="pull-right">
            <ul class="pagination">
                <li v-if="paginationVipLike.current_page > 1">
                    <a href="#" aria-label="Previous"
                       @click.prevent="changePageVipLike(paginationVipLike.current_page - 1, paginationVipLike.per_page)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumberVipLike"
                    v-bind:class="[ page == isActivedVipLike ? 'active' : '']">
                    <a href="#"
                       @click.prevent="changePageVipLike(page, paginationVipLike.per_page)">@{{ page }}</a>
                </li>
                <li v-if="paginationVipLike.current_page < paginationVipLike.last_page">
                    <a href="#" aria-label="Next"
                       @click.prevent="changePageVipLike(paginationVipLike.current_page + 1, paginationVipLike.per_page)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@component("admin.viplike._edit")
@endcomponent
@component("admin.viplike._detail")
@endcomponent