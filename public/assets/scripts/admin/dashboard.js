Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

    el: '#manage-vue',

    data: {
        items: [],
        pagination: {
            total: 0, 
            per_page: 2,
            from: 1, 
            to: 0,
            current_page: 1
        },
        offset: 4,
        formErrors:{},
        formErrorsUpdate:{},
        newItem : {'name':'','price':'','content':''},
        fillItem : {'name':'','price':'','content':'','id':''}
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
    	this.getvueproduct(this.pagination.current_page);
    },

    methods : {

        getvueproduct: function(page){
            this.$http.get('/api/admin/account?page='+page).then((response) => {
                if ($response) {
                    var $response = JSON.parse(response.data);
                    this.$set('items', $response.data);
                    this.$set('pagination', $response.pagination);
                }
            });
        },

        createItem: function(){
            var input = this.newItem;
            this.$http.post('/vueproduct',input).then((response) => {
                this.changePage(this.pagination.current_page);
                this.newItem = {'name':'','price':'','content':''};
                $("#create-item").modal('hide');
                toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
            }, (response) => {
                this.formErrors = response.data;
            });
        },

        deleteItem: function(item){
            this.$http.delete('/vueproduct/'+item.id).then((response) => {
                this.changePage(this.pagination.current_page);
                toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
            });
        },

        editItem: function(item){
            this.fillItem.name = item.name;
            this.fillItem.id = item.id;
            this.fillItem.price = item.price;
            this.fillItem.content = item.content;
            $("#edit-item").modal('show');
        },

        updateItem: function(id){
            var input = this.fillItem;
            this.$http.put('/vueproduct/'+id,input).then((response) => {
                this.changePage(this.pagination.current_page);
                this.fillItem = {'name':'','price':'','content':'','id':''};
                $("#edit-item").modal('hide');
                toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
            }, (response) => {
                this.formErrorsUpdate = response.data;
            });
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.getvueproduct(page);
        },

        formatPrice: function (value) {
            let val = (value/1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }

    }
});