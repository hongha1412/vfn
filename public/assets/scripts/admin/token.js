Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({
    
        el: '#fbtoken',
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
            fillItem: {'token': '', 'ten': '', 'idfb': '','id': ''},
            formErrors: {},
            formDelete: {'action':'', 'id': ''}
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
            this.gettokenList(this.pagination.current_page, this.pagination.per_page);
        },
        methods : {
            gettokenList: function(page, per_page) {
                this.$http.get('/api/admin/token?page='+page + '&perPage=' + per_page).then((response) => {
                    if (response) {
                        var $response = JSON.parse(response.data);
                        this.$set('items', $response.data.data);
                        this.$set('pagination', $response.pagination);
                    }
                });
            },
            changePage: function (page, per_page) {
                this.pagination.current_page = page;
                this.pagination.per_page = per_page;
                this.gettokenList(page, per_page);
            },
            submit: function(id) {
                if (!id) {
                    this.posttoken();
                } else {
                    this.update(id);
                }
            },
            posttoken: function() {
                var input = this.fillItem;
                this.$http.post('/api/admin/token', input).then((response) => {
                    this.gettokenList(this.pagination.current_page, this.pagination.per_page);
                    this.fillItem = {'token': '', 'ten': '', 'idfb': '','id': ''};
                    toastr.success('Tạo token thành công!', 'Success Alert', {timeOut: 5000});
                }, (response) => {
                    if (response && response.data) {
                        var $response = JSON.parse(response.data);
                        this.formErrors = $response;
                    }
                });
            },
            edit: function(item) {
                this.fillItem.id = item.id;
                this.fillItem.total = item.total;
                this.fillItem.type = item.type;
            },
            update: function (id) {
                var input = this.fillItem;
                this.$http.put('/api/admin/token/'+id, input).then((response) => {
                    this.gettokenList(this.pagination.current_page, this.pagination.per_page);
                    this.fillItem = {'token': '', 'ten': '', 'idfb': '','id': ''};
                    toastr.success('Chỉnh Sửa Thành Công!', 'Success Alert', {timeOut: 5000});
                }, (response) => {
                        if (response && response.data) {
                            var $response = JSON.parse(response.data);
                            this.formErrors = $response;
                        }
                    });
            },
            showConfirmDelete: function(id) {
                this.formDelete.id = id;
                $("#confirmDeleteModal").modal('show');
            },
            submitDelete: function(){
                this.remove(this.formDelete.id);
                $("#confirmDeleteModal").modal('hide');
            },
            remove: function($id) {
                this.$http.delete('/api/admin/token/'+$id).then((response) => {
                    this.gettokenList(this.pagination.current_page, this.pagination.per_page);
                    this.fillItem = {'token': '', 'ten': '', 'idfb': '','id': ''};
                    
                    if (response && response.data) {
                        var $response = JSON.parse(response.data);
                        if ($response.error) {
                            toastr.error($response.message, 'Faild Alert', {timeOut: 5000});
                        } else {
                            toastr.success($response.message, 'Success Alert', {timeOut: 5000});
                        }
                        
                    }
                });
            }
        }
});