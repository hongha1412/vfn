Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({
    
        el: '#giftcode',
        data: {
            items: [],
            pagination: {
                total: 0, 
                per_page: 2,
                from: 1, 
                to: 0,
                current_page: 1
            },
            itemGiftcode: {'id': '', 'amount': ''},
            formErrors: {}
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
            }
        },
        ready : function(){
            this.getGiftcodeList(this.paginationAccount.current_page, this.paginationAccount.per_page);
        },
        methods : {
            getGiftcodeList: function(page, per_page) {
                this.$http.get('/api/admin/giftcode?page='+page + '&perPage=' + per_page).then((response) => {
                    if (response) {
                        var $response = JSON.parse(response.data);
                        this.$set('itemsGiftcode', $response.data.data);
                        this.$set('paginationGiftcode', $response.pagination);
                    }
                });
            },
            create: function(item){
                this.itemGiftcode.id = item.id;
                this.itemGiftcode.amount = item.amount;
            },
            postGiftcode: function(id) {
                var input = this.itemGiftcode;
                this.$http.post('/api/admin/giftcode', input).then((response) => {
                    this.getGiftcodeList();
                    toastr.success('Thay Đổi Thông Báo Thành Công!', 'Success Alert', {timeOut: 5000});
                }, (response) => {
                    if (response && response.data) {
                        var $response = JSON.parse(response.data);
                        this.formErrors = $response;
                    }
                });
            },
            updateGiftcode: function(id) {
                var input = this.itemGiftcode;
                this.$http.put('/api/admin/giftcode/'+id, input).then((response) => {
                    this.getGiftcodeList();
                    toastr.success('Thay Đổi Thông Báo Thành Công!', 'Success Alert', {timeOut: 5000});
                }, (response) => {
                    if (response && response.data) {
                        var $response = JSON.parse(response.data);
                        this.formErrors = $response;
                    }
                });
            }
        },
        filters: {}
});