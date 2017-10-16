<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-cogs"></i><b> Lịch Sử Nạp Thẻ</b>
        </div>
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
                    <tr v-for="item in itemsLogCard">
                        <td>@{{ item.id }}</td>
                        <td>@{{ item.receive_userid }}</td>
                        <td>@{{ item.telco }}</td>
                        <td>@{{ item.cardcode }}</td>
                        <td>@{{ item.serial }}</td>
                        <td>@{{ item.time }}</td>
                        <td>@{{ formatPrice(item.price) }} VNĐ</td>
                    </tr>
                    </tbody>
                </table>
                <!-- Pagination -->
                <nav>
                    <ul class="pagination">
                        <li v-if="paginationLogCard.current_page > 1">
                            <a href="#" aria-label="Previous"
                               @click.prevent="changePageLogCard(paginationLogCard.current_page - 1)">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>
                        <li v-for="page in pagesNumberLogCard"
                            v-bind:class="[ page == isActivedLogCard ? 'active' : '']">
                            <a href="#"
                               @click.prevent="changePageLogCard(page)">@{{ page }}</a>
                        </li>
                        <li v-if="paginationLogCard.current_page < paginationLogCard.last_page">
                            <a href="#" aria-label="Next"
                               @click.prevent="changePage(paginationLogCard.current_page + 1)">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>