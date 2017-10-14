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
            current_page: 1
        },
        itemsVipLike: [],
        paginationVipLike: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1
        },
        itemsVipCmt: [],
        paginationVipCmt: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1
        },
        itemsVipShare: [],
        paginationVipShare: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1
        },
        itemsCamXuc: [],
        paginationCamXuc: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1
        },
        itemsLogCard: [],
        paginationLogCard: {
            total: 0,
            per_page: 10,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,

        formDelete: {'action':'', 'id': ''},
        formErrors:{},
        itemAccount : {'vnd':'', 'toida': ''},
        fillItemAccount : {'vnd':'', 'toida': '', 'id':''}
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
    	this.getvueAccount(this.paginationAccount.current_page, this.paginationAccount.per_page);
        this.getvueviplike(this.paginationVipLike.current_page, this.paginationVipLike.per_page);
        this.getvueVipCmt(this.paginationVipCmt.current_page, this.paginationVipCmt.per_page);
        this.getvueVipShare(this.paginationVipShare.current_page, this.paginationVipShare.per_page);
        this.getvueCamXuc(this.paginationCamXuc.current_page, this.paginationCamXuc.per_page);
        this.getvueLogCard(this.paginationLogCard.current_page);
    },

    methods : {
        //////////////////////////////// Danh sach ////////////////////////////////////////
        getvueAccount: function(page, per_page){
            this.$http.get('/api/admin/account?page='+page + '&perPage=' + per_page).then((response) => {
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
            this.getvueAccount(page, per_page);
        },

        getvueviplike: function(page, per_page){
            this.$http.get('/api/admin/viplike?page='+page+ '&perPage=' + per_page).then((response) => {
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
            this.getvueviplike(page,per_page);
        },

        getvueVipCmt: function(page, per_page){
            this.$http.get('/api/admin/vipcmt?page='+page+ '&perPage=' + per_page).then((response) => {
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
            this.getvueVipCmt(page, per_page);
        },

        getvueVipShare: function(page, per_page){
            this.$http.get('/api/admin/vipshare?page='+page+ '&perPage=' + per_page).then((response) => {
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
            this.getvueVipShare(page, per_page);
        },

        getvueCamXuc: function(page, per_page){
            this.$http.get('/api/admin/camxuc?page='+page+ '&perPage=' + per_page).then((response) => {
                if (response) {
                    var $response = JSON.parse(response.data);
                    this.$set('itemsCamXuc', $response.data.data);
                    this.$set('paginationCamXuc', $response.pagination);
                }
            });
        },

        changePageCamXuc: function (page, per_page) {
            this.paginationCamXuc.current_page = page;
            this.paginationCamXuc.per_page = per_page;
            this.getvueCamXuc(page, per_page);
        },

        getvueLogCard: function(page){
            this.$http.get('/api/admin/logcard?page='+page).then((response) => {
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
            this.$http.delete('/api/admin/account/'+ id).then((response) => {
                this.changePageAccount(this.paginationAccount.current_page, this.paginationAccount.per_page);
                toastr.success('Xóa Tài Khoản Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        deleteVipLike: function(id){
            this.$http.delete('/api/admin/viplike/'+ id).then((response) => {
                this.changePageVipLike(this.paginationVipLike.current_page, this.paginationVipLike.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        deleteVipCmt: function(id){
            this.$http.delete('/api/admin/vipcmt/'+ id).then((response) => {
                this.changePageVipCmt(this.paginationVipCmt.current_page, this.paginationVipCmt.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        deleteVipShare: function(id){
            this.$http.delete('/api/admin/vipshare/'+ id).then((response) => {
                this.changePageVipShare(this.paginationVipShare.current_page, this.paginationVipShare.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        deleteCamXuc: function(id){
            this.$http.delete('/api/admin/camxuc/'+ id).then((response) => {
                this.changePageCamXuc(this.paginationCamXuc.current_page, this.paginationCamXuc.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        //////////////////////////////// Edit ////////////////////////////////////////
        congTien: function(item){
            this.fillItemAccount.id = item.id;
            $("#congtienModal").modal('show');
        },

        updateCongTien: function(id){
            var input = this.fillItemAccount;
            this.$http.put('/api/admin/account/congtien/'+id, input).then((response) => {
                this.changePageAccount(this.paginationAccount.current_page, this.paginationAccount.per_page);
            this.fillItemAccount = {'vnd':'','id':''};
            $("#edit-item").modal('hide');
            toastr.success('Cộng tiền vào tài khoản thành công!', 'Success Alert', {timeOut: 5000});
        }, (response) => {
                this.formErrorsUpdate = response.data;
            });
        },

        themId: function(item){
            this.fillItemAccount.id = item.id;
            $("#themIdModal").modal('show');
        },

        updateToiDa: function(id){
            var input = this.fillItemAccount;
            this.$http.put('/api/admin/account/themid/'+id, input).then((response) => {
                this.changePageAccount(this.paginationAccount.current_page, this.paginationAccount.per_page);
            this.fillItemAccount = {'vnd':'','id':''};
            $("#edit-item").modal('hide');
            toastr.success('Thêm id vào Tài Khoản Thành Công!', 'Success Alert', {timeOut: 5000});
        }, (response) => {
                this.formErrorsUpdate = response.data;
            });
        },

        //////////////////////////////// Add /////////////////////////////////////////
    }
});