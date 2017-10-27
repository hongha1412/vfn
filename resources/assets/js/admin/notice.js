Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({
    
        el: '#notice',
        data: {
            itemNotice: {'id': '', 'text': ''},
            formErrors: {}
        },
        computed: {},
        ready : function(){
            this.getNotice();
        },
        methods : {
            getNotice: function() {
                this.$http.get('/api/notice').then((response) => {
                    if (response && response.data) {
                        var $response = JSON.parse(response.data);
                        this.itemNotice.text = $response.text;
                        this.itemNotice.id = $response.id;
                    }
                });
            },
            submitNotice: function(id) {
                if (id) {
                    this.updateNotice(id);
                } else {
                    this.postNotice();
                }
            },
            updateNotice: function(id) {
                var input = this.itemNotice;
                this.$http.put('/api/notice/'+id, input).then((response) => {
                    this.getNotice();
                    toastr.success('Thay Đổi Thông Báo Thành Công!', 'Success Alert', {timeOut: 5000});
                }, (response) => {
                    if (response && response.data) {
                        var $response = JSON.parse(response.data);
                        this.formErrors = $response;
                    }
                });
            },
            postNotice: function() {
                var input = this.itemNotice;
                this.$http.post('/api/notice', input).then((response) => {
                    this.getNotice();
                    toastr.success('Thêm Thông Báo Thành Công!', 'Success Alert', {timeOut: 5000});
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