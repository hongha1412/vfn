Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({
    
        el: '#speed',
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
            fillItem: {'type': '', 'value': '','id': ''},
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
            this.getSpeedList(this.pagination.current_page, this.pagination.per_page);
        },
        methods : {
            getSpeedList: function(page, per_page) {
                this.$http.get('/api/speed?page='+page + '&perPage=' + per_page).then((response) => {
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
                this.getSpeedList(page, per_page);
            },
            submit: function(id) {
                if (!id) {
                    this.postSpeed();
                } else {
                    this.update(id);
                }
            },
            postSpeed: function() {
                var input = this.fillItem;
                this.$http.post('/api/speed', input).then((response) => {
                    this.getSpeedList(this.pagination.current_page, this.pagination.per_page);
                    this.fillItem = {'value': '', 'type': '', 'id': ''};
                    toastr.success('Tạo package thành công!', 'Success Alert', {timeOut: 5000});
                }, (response) => {
                    if (response && response.data) {
                        var $response = JSON.parse(response.data);
                        this.formErrors = $response;
                    }
                });
            },
            edit: function(item) {
                this.fillItem.id = item.id;
                this.fillItem.value = item.value;
                this.fillItem.type = item.type;
            },
            update: function (id) {
                var input = this.fillItem;
                this.$http.put('/api/speed/'+id, input).then((response) => {
                    this.getSpeedList(this.pagination.current_page, this.pagination.per_page);
                    this.fillItem = {'value': '', 'type': '', 'id': ''};
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
                this.$http.delete('/api/speed/'+$id).then((response) => {
                    this.getSpeedList(this.pagination.current_page, this.pagination.per_page);
                    this.fillItem = {'value': '', 'type': '', 'id': ''};
                    
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
        },
        filters: {
            formatType: function (value) {
                var result = value;
                switch(value) {
                    case 0:
                        result = "LIKE";
                        break;
                    case 1:
                        result = "COMMENT";
                        break;
                    case 2:
                        result = "SHARE";
                        break;
                    case 3:
                        result = "REACT";
                    break;
                    default:
                        result = value;
                }
                return result;
            }
        }
});