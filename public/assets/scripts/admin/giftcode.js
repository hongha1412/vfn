Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({
    
        el: '#giftcode',
        data: {
            itemGiftcode: {'id': '', 'text': ''},
            formErrors: {}
        },
        computed: {},
        methods : {
            getGiftcodeList: function() {
                this.$http.get('/api/admin/giftcode?page='+page).then((response) => {
                    if (response) {
                        var $response = JSON.parse(response.data);
                        this.$set('itemsGiftcode', $response.data.data);
                        this.$set('paginationGiftcode', $response.pagination);
                    }
                });
            },
            updateGiftcode: function(id) {
                var input = this.itemGiftcode;
                this.$http.put('/api/admin/giftcode/'+id, input).then((response) => {
                    this.getNoticeList();
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