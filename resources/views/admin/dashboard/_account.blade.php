<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tài Khoản</th>
                <th>Tên Hiển Thị</th>
                <th>Trạng Thái</th>
                <th>Tiền + ID</th>
                <th>Email</th>
                <th>Hành Động</th>

            </tr>
            </thead>
            <tbody>
                <tr v-for="item in itemsAccount">
                    <td>@{{ item.id }}</td>
                    <td>@{{ item.username }}</td>
                    <td>@{{ item.fullname }}</td>
                    <td>@{{ item.kichhoat }}</td>
                    <td>@{{ item.vnd }}</td>
                    <td>@{{ item.mail }}</td>
                    <td>    
                        
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