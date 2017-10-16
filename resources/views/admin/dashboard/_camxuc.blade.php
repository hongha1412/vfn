<div class="panel-body">
    <div class="form-inline" style="padding-bottom: 10px">
        <div class="form-group">
            <select v-model="paginationCamXuc.per_page" v-on:change="changePageCamXuc(paginationCamXuc.current_page - 1, paginationCamXuc.per_page)" class="form-control" style="width: 80px">
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
        <table id="vip-cmt" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>TÊN</th>
                <th>CẢM XÚC</th>
                <th>TÌNH TRẠNG</th>              
                <th>Hạn Sử Dụng</th>                        
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="item in itemsCamXuc">
                    <td>@{{ item.name }}</td>
                    <td><a class="btn btn-xs btn-primary">@{{ item.camxuc }}</a></td>
                    <td v-html="item.live">
                    </td>
                    <td>@{{ item.time }}</td>
                    <td>
                        <a href="javascript:void(0);" @click.prevent="showConfirmDelete('camxuc', item.id)" data-toggle="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Xóa"><i style="font-size:15px;" class="fa fa-trash-o"></i></a>
                        <a v-bind:href="chinhsua.php?edit=item.access_token" data-toggle="tooltip" title="Cập Nhật" class="btn btn-success btn-simple btn-xs"><i style="font-size:15px;" class="fa fa-cog"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Pagination -->
        <nav class="pull-right">
            <ul class="pagination">
                <li v-if="paginationCamXuc.current_page > 1">
                    <a href="#" aria-label="Previous"
                       @click.prevent="changePageCamXuc(paginationCamXuc.current_page - 1, paginationCamXuc.per_page)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumberCamXuc"
                    v-bind:class="[ page == isActivedCamXuc ? 'active' : '']">
                    <a href="#"
                       @click.prevent="changePageCamXuc(page, paginationCamXuc.per_page)">@{{ page }}</a>
                </li>
                <li v-if="paginationCamXuc.current_page < paginationCamXuc.last_page">
                    <a href="#" aria-label="Next"
                       @click.prevent="changePageCamXuc(paginationCamXuc.current_page + 1, paginationCamXuc.per_page)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>