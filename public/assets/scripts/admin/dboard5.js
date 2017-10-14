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
        offset: 4
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

        deleteAccount: function(item){
            this.$http.delete('/api/admin/account/'+item.id).then((response) => {
                this.changePageAccount(this.paginationAccount.current_page, this.paginationAccount.per_page);
                toastr.success('Xóa Tài Khoản Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        deleteVipLike: function(item){
            this.$http.delete('/api/admin/viplike/'+item.id).then((response) => {
                this.changePageVipLike(this.paginationVipLike.current_page, this.paginationVipLike.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        deleteVipCmt: function(item){
            this.$http.delete('/api/admin/vipcmt/'+item.id).then((response) => {
                this.changePageVipCmt(this.paginationVipCmt.current_page, this.paginationVipCmt.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        deleteVipShare: function(item){
            this.$http.delete('/api/admin/vipshare/'+item.id).then((response) => {
                this.changePageVipShare(this.paginationVipShare.current_page, this.paginationVipShare.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },

        deleteCamXuc: function(item){
            this.$http.delete('/api/admin/camxuc/'+item.id).then((response) => {
                this.changePageCamXuc(this.paginationCamXuc.current_page, this.paginationCamXuc.per_page);
                toastr.success('Xóa ID Thành Công!', 'Success Alert', {timeOut: 5000});
            });
        },
    }
});