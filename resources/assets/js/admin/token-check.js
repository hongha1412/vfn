Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({
    
        el: '#token-check',
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
        },
        methods : {
            checktoken: function() {
                this.loading = true;
                var $tokens = this.fillItem.tokens ? this.fillItem.tokens.split(/\n/) : null;
                var dataRequest = {
                    "tokens": $tokens
                };
                this.$http.post('/api/token/check', dataRequest).then((response) => {
                    if (response && response.data) {
                        var $response = JSON.parse(response.data);
                        this.totalTokenDie = $response.token_die.length;
                        this.totalTokenLive = $response.token_live.length;
                        this.fillItem.token_die = $response.token_die && $response.token_die.length > 0 ? $response.token_die.join( '\n' ) : "";
                        this.fillItem.token_live = $response.token_live && $response.token_live.length > 0 ? $response.token_live.join( '\n' ) : "";
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