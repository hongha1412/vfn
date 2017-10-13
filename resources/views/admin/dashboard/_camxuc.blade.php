<div class="panel-body">
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
                    <td><?php
                        $token = item.access_token;
                        $me = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token), true);
                        $live = '';										
                        if(!$me['id']){
                            $live = "<button class='btn btn-rounded btn-xs btn-danger'><i class='fa fa-times'></i> <b>Token Die</b></button>";
                        }else{											
                            $live = "<button class='btn btn-rounded btn-xs btn-success'><i class='fa fa-check'></i> <b>Hoạt Động</b></button>";
                        }
                        echo $live;
                        ?>
                    </td>
                    <td>@{{ date("d-m-20y", item.time) }}</td>
                    <td>
                        <a v-bind:href="?xoacx=item.access_token" data-toggle="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Xóa"><i style="font-size:15px;" class="fa fa-trash-o"></i></a>              
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
                       @click.prevent="changePageCamXuc(paginationCamXuc.current_page - 1)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumberCamXuc"
                    v-bind:class="[ page == isActivedCamXuc ? 'active' : '']">
                    <a href="#"
                       @click.prevent="changePageCamXuc(page)">@{{ page }}</a>
                </li>
                <li v-if="paginationCamXuc.current_page < paginationCamXuc.last_page">
                    <a href="#" aria-label="Next"
                       @click.prevent="changePageCamXuc(paginationCamXuc.current_page + 1)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>