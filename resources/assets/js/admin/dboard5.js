Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

    el: '#dashboard',

    data: {
        items: [],
        pagination: {
            total: 0, 
            per_page: 2,
            from: 1, 
            to: 0,
            current_page: 1
        },
        itemsAccount: [],
        paginationAccount: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search_key: ""
        },
        itemsVipLike: [],
        paginationVipLike: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search_key: ""
        },
        itemsVipCmt: [],
        paginationVipCmt: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search_key: ""
        },
        itemsVipShare: [],
        paginationVipShare: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search_key: ""
        },
        itemsCamXuc: [],
        paginationCamXuc: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search_key: ""
        },
        itemsLogCard: [],
        paginationLogCard: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1,
            search_key: ""
        },
        offset: 4,

        formDelete: {'action':'', 'id': ''},
        formErrors:{},
        itemAccount : {'vnd':'', 'toida': ''},
        fillItemAccount : {'vnd':'', 'toida': '', 'id':''},
        fillItemVipLike : {'idfb':'', 'fbname': '', 'package': '', 'time': '', 'id':''}
    },

    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActivedAccount: function () {
            return this.paginationAccount.current_page;
        },
        pagesNumberAccount: function () {
            if (!this.paginationAccount.to) {
                return [];
            }
            var from = this.paginationAccount.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.paginationAccount.last_page) {
                to = this.paginationAccount.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActivedVipLike: function () {
            return this.paginationVipLike.current_page;
        },
        pagesNumberVipLike: function () {
            if (!this.paginationVipLike.to) {
                return [];
            }
            var from = this.paginationVipLike.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.paginationVipLike.last_page) {
                to = this.paginationVipLike.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActivedVipCmt: function () {
            return this.paginationVipCmt.current_page;
        },
        pagesNumberVipCmt: function () {
            if (!this.paginationVipCmt.to) {
                return [];
            }
            var from = this.paginationVipCmt.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.paginationVipCmt.last_page) {
                to = this.paginationVipCmt.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActivedVipShare: function () {
            return this.paginationVipShare.current_page;
        },
        pagesNumberVipShare: function () {
            if (!this.paginationVipShare.to) {
                return [];
            }
            var from = this.paginationVipShare.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.paginationVipShare.last_page) {
                to = this.paginationVipShare.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActivedCamXuc: function () {
            return this.paginationCamXuc.current_page;
        },
        pagesNumberCamXuc: function () {
            if (!this.paginationCamXuc.to) {
                return [];
            }
            var from = this.paginationCamXuc.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.paginationCamXuc.last_page) {
                to = this.paginationCamXuc.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActivedLogCard: function () {
            return this.paginationLogCard.current_page;
        },
        pagesNumberLogCard: function () {
            if (!this.paginationLogCard.to) {
                return [];
            }
            var from = this.paginationLogCard.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.paginationLogCard.last_page) {
                to = this.paginationLogCard.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },
    },

    ready : function(){
    	this.getvueAccount(this.paginationAccount.current_page, this.paginationAccount.per_page, "");
        this.getvueviplike(this.paginationVipLike.current_page, this.paginationVipLike.per_page, "");
        this.getvueVipCmt(this.paginationVipCmt.current_page, this.paginationVipCmt.per_page, "");
        this.getvueVipShare(this.paginationVipShare.current_page, this.paginationVipShare.per_page, "");
        this.getvueCamXuc(this.paginationCamXuc.current_page, this.paginationCamXuc.per_page, "");
        this.getvueLogCard(this.paginationLogCard.current_page);
    },

    methods : {
        //////////////////////////////// Danh sach ////////////////////////////////////////
        getvueAccount: function(page, per_page, search_key){
            var path = search_key
                ? '/api/account?page='+page+ '&perPage=' + per_page + '&' + 'q=' + search_key
                : '/api/account?page='+page+ '&perPage=' + per_page;
            this.$http.get(path).then((response) => {
                if (response) {
                    var $response = JSON.parse(response.data);
                    this.$set('itemsAccount', $response.data.data);
                    this.$set('paginationAccount', $response.pagination);
                }
            });
        },

        changePageAccount: function (page, per_page) {
            this.paginationAccount.current_page = page;
            this.paginationAccount.per_page = per_page;
            this.getvueAccount(page, per_page, this.paginationAccount.search_key);
        },

        getvueviplike: function(page, per_page, search_key){
            var path = search_key
            ? '/api/viplike?page='+page+ '&perPage=' + per_page + '&' + 'q=' + search_key
            : '/api/viplike?page='+page+ '&perPage=' + per_page;
            this.$http.get(path).then((response) => {
                if (response) {
                    var $response = JSON.parse(response.data);
                    this.$set('itemsVipLike', $response.data.data);
                    this.$set('paginationVipLike', $response.pagination);
                }
            });
        },

        changePageVipLike: function (page, per_page) {
            this.paginationVipLike.current_page = page;
            this.paginationVipLike.per_page = per_page;
            this.getvueviplike(page,per_page,this.paginationVipLike.search_key);
        },

        searchVipLike: function() {
            var page = this.paginationVipLike.current_page - 1;
            var per_page = this.paginationVipLike.per_page;
            var search = this.paginationVipLike.search_key;
            this.getvueviplike(page, per_page, search);
        },
        //////////////////////////////
        getvueVipCmt: function(page, per_page, search_key){
            var path = search_key
            ? '/api/vipcmt?page='+page+ '&perPage=' + per_page + '&' + 'q=' + search_key
            : '/api/vipcmt?page='+page+ '&perPage=' + per_page;
            this.$http.get(path).then((response) => {
                if (response) {
                    var $response = JSON.parse(response.data);
                    this.$set('itemsVipCmt', $response.data.data);
                    this.$set('paginationVipCmt', $response.pagination);
                }
            });
        },

        changePageVipCmt: function (page, per_page) {
            this.paginationVipCmt.current_page = page;
            this.paginationVipCmt.per_page = per_page;
            this.getvueVipCmt(page, per_page, this.paginationVipCmt.search_key);
        },

        searchVipCmt: function() {
            var page = this.paginationVipCmt.current_page - 1;
            var per_page = this.paginationVipCmt.per_page;
            var search = this.paginationVipCmt.search_key;
            this.getvueVipCmt(page, per_page, search);
        },
        //////////////////////////////
        getvueVipShare: function(page, per_page, search_key){
            var path = search_key
            ? '/api/vipshare?page='+page+ '&perPage=' + per_page + '&' + 'q=' + search_key
            : '/api/vipshare?page='+page+ '&perPage=' + per_page;
            this.$http.get(path).then((response) => {
                if (response) {
                    var $response = JSON.parse(response.data);
                    this.$set('itemsVipShare', $response.data.data);
                    this.$set('paginationVipShare', $response.pagination);
                }
            });
        },

        changePageVipShare: function (page, per_page) {
            this.paginationVipShare.current_page = page;
            this.paginationVipShare.per_page = per_page;
            this.getvueVipShare(page, per_page, this.paginationVipShare.search_key);
        },

        searchVipShare: function() {
            var page = this.paginationVipShare.current_page - 1;
            var per_page = this.paginationVipShare.per_page;
            var search = this.paginationVipShare.search_key;
            this.getvueVipShare(page, per_page, search);
        },
        //////////////////////////////

        getvueCamXuc: function(page, per_page, search_key){
            var self = this;
            var path = search_key
                ? '/api/camxuc?page='+page+ '&perPage=' + per_page + '&' + 'q=' + search_key
                : '/api/camxuc?page='+page+ '&perPage=' + per_page;
            this.$http.get(path).then((response) => {
                if (response) {
                    var $response = JSON.parse(response.data);
                    self.$set('itemsCamXuc', $response.data);
                    self.$set('paginationCamXuc', $response.pagination);
                }
            });
        },

        changePageCamXuc: function (page, per_page) {
            this.paginationCamXuc.current_page = page;
            this.paginationCamXuc.per_page = per_page;
            this.getvueCamXuc(page, per_page, this.paginationCamXuc.search_key);
        },

        searchCamXuc: function() {
            var page = this.paginationCamXuc.current_page - 1;
            var per_page = this.paginationCamXuc.per_page;
            var search = this.paginationCamXuc.search_key;
            this.getvueCamXuc(page, per_page, search);
        },
        //////////////////////////////

        getvueLogCard: function(page){
            this.$http.get('/api/logcard?page='+page).then((response) => {
                if (response) {
                    var $response = JSON.parse(response.data);
                    this.$set('itemsLogCard', $response.data.data);
                    this.$set('paginationLogCard', $response.pagination);
                }
            });
        },

        changePageLogCard: function (page) {
            this.paginationLogCard.current_page = page;
            this.getvueLogCard(page);
        },

        //////////////////////////////// DELETE ////////////////////////////////////////
        showConfirmDelete: function(action, id) {
            this.formDelete.action = action;
            this.formDelete.id = id;
            $("#confirmDeleteModal").modal('show');
        },

        submitDelete: function(){
            switch (this.formDelete.action) {
                case "account":
                    this.deleteAccount(this.formDelete.id);
                    break;
                case "viplike":
                    this.deleteVipLike(this.formDelete.id);
                    break;
                case "vipcmt":
                    this.deleteVipCmt(this.formDelete.id);
                    break;
                case "vipshare":
                    this.deleteVipShare(this.formDelete.id);
                    break;
                case "camxuc":
                    this.deleteCamXuc(this.formDelete.id);
                    break;
            }

            $("#confirmDeleteModal").modal('hide');
        },

        deleteAccount: function(id){
            this.$http.delete('/api/account/'+ id).then((response) => {
                this.changePageAccount(this.paginationAccount.current_page, this.paginationAccount.per_page);
                toastr.success('Xóa Tài Khoản Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        deleteVipLike: function(id){
            this.$http.delete('/api/viplike/'+ id).then((response) => {
                this.changePageVipLike(this.paginationVipLike.current_page, this.paginationVipLike.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        deleteVipCmt: function(id){
            this.$http.delete('/api/vipcmt/'+ id).then((response) => {
                this.changePageVipCmt(this.paginationVipCmt.current_page, this.paginationVipCmt.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        deleteVipShare: function(id){
            this.$http.delete('/api/vipshare/'+ id).then((response) => {
                this.changePageVipShare(this.paginationVipShare.current_page, this.paginationVipShare.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        deleteCamXuc: function(id){
            this.$http.delete('/api/camxuc/'+ id).then((response) => {
                this.changePageCamXuc(this.paginationCamXuc.current_page, this.paginationCamXuc.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        //////////////////////////////// Edit ////////////////////////////////////////
        // Account
        congTien: function(item){
            this.fillItemAccount.id = item.id;
            $("#congtienModal").modal('show');
        },

        updateCongTien: function(id){
            var input = this.fillItemAccount;
            this.$http.put('/api/account/congtien/'+id, input).then((response) => {
                this.changePageAccount(this.paginationAccount.current_page, this.paginationAccount.per_page);
            this.fillItemAccount = {'vnd':'', 'toida': '','id':''};
            $("#congtienModal").modal('hide');
            toastr.success('Cộng tiền vào tài khoản thành công!', 'Success Alert', {timeOut: 5000});
        }, (response) => {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    this.formErrors = $response;
                }
            });
        },

        themId: function(item){
            this.fillItemAccount.id = item.id;
            $("#themIdModal").modal('show');
        },

        updateToiDa: function(id){
            var input = this.fillItemAccount;
            this.$http.put('/api/account/themid/'+id, input).then((response) => {
                this.changePageAccount(this.paginationAccount.current_page, this.paginationAccount.per_page);
            this.fillItemAccount = {'vnd':'', 'toida': '','id':''};
            $("#themIdModal").modal('hide');
            toastr.success('Thêm id vào Tài Khoản Thành Công!', 'Success Alert', {timeOut: 5000});
        }, (response) => {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    this.formErrors = $response;
                }
            });
        },

        // Vip like
        editVipLike: function (item) {
            this.fillItemVipLike.id = item.id;
            this.fillItemVipLike.idfb = item.idfb;
            this.fillItemVipLike.fbname = item.fbname;
            this.fillItemVipLike.package = item.package;
            this.fillItemVipLike.time = item.expiretime;
            $("#editVipLikeModal").modal('show');
        },
        updateVipLike: function (id) {
            var input = this.fillItemVipLike;
            this.$http.put('/api/viplike/'+id, input).then((response) => {
                this.changePageVipLike(this.paginationVipLike.current_page, this.paginationVipLike.per_page);
            this.fillItemVipLike = {'idfb':'', 'fbname': '', 'package': '', 'time': '', 'id':''};
            $("#editVipLikeModal").modal('hide');
            toastr.success('Chỉnh Sửa Cập Nhật Tài Khoản Thành Công!', 'Success Alert', {timeOut: 5000});
        }, (response) => {
                if (response && response.data) {
                    var $response = JSON.parse(response.data);
                    this.formErrors = $response;
                }
            });
        },
        // Vip cmt

        // Vip share

        // Cam xuc

        //////////////////////////////// Add /////////////////////////////////////////
    },

    filters: {
        formatPrice: function (value) {
            if (!value) {
                return "0";
            }
            var val = (value/1).toFixed(0).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },
        formatDate: function(value) {
            if (!value){
                return "";
            }
            var date = new Date(value);
            var curr_date = date.getDate();
            var curr_month = date.getMonth() + 1; //Months are zero based
            var curr_year = date.getFullYear();
            var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
            var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
            var second = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
            return curr_date + "/" + curr_month + "/" + curr_year + " " + hours + ":" + minutes + ":" + second;
        },
        formatTelco: function (value) {
            if (!value) {
                return "";
            }
            switch (value) {
                case "VTT":
                    return "Viettel";
                case "VNP":
                    return "Vinaphone";
                case "VMS":
                    return "Mobifone";
                case "VNM":
                    return "Vietnamobile";
                default:
                    return "";
            }
            return "";
        }
    }
});