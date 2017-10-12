<div class="panel-body">
    <div class="table-responsive">
        <table id="log-card" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Loại Thẻ</th>
                <th>Mã Seri</th>
                <th>Seri</th>
                <th>Nạp Lúc</th>
                <th>Mệnh Giá</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="item in items">
                    <td>@{{ item.idfb }}</td>
                    <td>@{{ item.name }}</td>
                    <td>@{{ item.goi }}</td>
                    <td>@{{ item.socmt }}</td>
                    <td>@{{ item.time }}</td>
                    <td>    
                        <button class="btn btn-primary" @click.prevent="editItem(item)">Edit</button>
                        <button class="btn btn-danger" @click.prevent="deleteItem(item)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li v-if="pagination.current_page > 1">
                    <a href="#" aria-label="Previous"
                       @click.prevent="changePageLogCard(pagination.current_page - 1)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumber"
                    v-bind:class="[ page == isActived ? 'active' : '']">
                    <a href="#"
                       @click.prevent="changePage(page)">@{{ page }}</a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page">
                    <a href="#" aria-label="Next"
                       @click.prevent="changePage(pagination.current_page + 1)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>