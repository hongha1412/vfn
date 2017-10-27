Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({
    
        el: '#giftcode',
        data: {
            items: [],
            pagination: {
                total: 0, 
                per_page: 10,
                from: 1, 
                to: 0,
                current_page: 1
            },
            offset: 4,
            fillItem: {'amount': '', 'quality': '','time': '', 'id': ''},
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
            this.getGiftcodeList(this.pagination.current_page, this.pagination.per_page);
        },
        methods : {
            getGiftcodeList: function(page, per_page) {
                this.$http.get('/api/giftcode?page='+page + '&perPage=' + per_page).then((response) => {
                    if (response) {
                        var $response = JSON.parse(response.data);
                        this.$set('itemsGiftcode', $response.data.data);
                        this.$set('pagination', $response.pagination);
                    }
                });
            },
            changePage: function (page, per_page) {
                this.pagination.current_page = page;
                this.pagination.per_page = per_page;
                this.getGiftcodeList(page, per_page);
            },
            postGiftcode: function() {
                var input = this.fillItem;
                this.$http.post('/api/giftcode', input).then((response) => {
                    this.getGiftcodeList(this.pagination.current_page, this.pagination.per_page);
                    this.fillItem = {'amount': '', 'quality': '','time': '', 'id': ''};
                    toastr.success('Tạo mã gift thành công!', 'Success Alert', {timeOut: 5000});
                }, (response) => {
                    if (response && response.data) {
                        var $response = JSON.parse(response.data);
                        this.formErrors = $response;
                    }
                });
            }
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
            }
        }
});