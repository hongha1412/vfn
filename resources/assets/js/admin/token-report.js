Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({
    
        el: '#token-report',
        data: {
            fillItem: {'tokens': '', 'token_die':'', 'token_live':''},
            totalTokenDie: 0,
            totalTokenLive: 0,
            formErrors: {},
            loading: false
        },
        computed: {
        },
        ready : function(){
            this.report();
        },
        methods : {
            report: function() {
                this.loading = true;
                this.$http.get('/api/token/count').then((response) => {
                    if (response && response.data) {
                        var $response = JSON.parse(response.data);
                        this.totalTokenLive = $response;
                    }
                    this.loading = false;
                }, (response) => {
                    if (response && response.data) {
                        var $response = JSON.parse(response.data);
                        this.formErrors = $response;
                    }
                    this.loading = false;
                });
            }
        }
});