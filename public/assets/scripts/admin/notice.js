Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({
    
        el: '#notice',
        data: {
            itemNotice: {'id': '', 'text': ''},
            formErrors: {}
        },
        computed: {},
        methods : {
            getNotice: function() {
                this.$http.get('/api/admin/notice').then((response) => {
                    if (response) {
                        var $response = JSON.parse(response.data);
                        this.$set('itemNotice', $response.data.data);
                    }
                });
            },
            updateNotice: function(id) {
                var input = this.itemNotice;
                this.$http.put('/api/admin/notice/'+id, input).then((response) => {
                    this.getNotice();
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