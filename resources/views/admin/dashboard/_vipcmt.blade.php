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
    </div>
</div>