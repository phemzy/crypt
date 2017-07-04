<template>
	<div class="block block-themed">
        <div class="block-header bg-danger">
            <ul class="block-options">
                <li>
                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                </li>
            </ul>
            <h3 class="block-title">Converter</h3>
        </div>
        <div class="block-header">
        	Enter an amount in naira and get its {{crypto}} value
        </div>
        <div class="block-content">
            <form class="form-horizontal push-10-t push-10" action="base_forms_premade.html" method="post" onsubmit="return false;">
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material">
                            <input class="form-control" type="text" id="naira_value" v-model="naira">
                            <label for="crypto_value">Amount in Naira</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material">
                            <input class="form-control" type="text" id="login2-password" v-model="cryp" disabled="">
                            <label for="crypto_value">Amount in {{crypto}}</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
	export default{
		mounted(){

		},

		props: ['crypto', 'naira_value'],

		data(){
			return {
				naira: this.naira_value,
				cryp: 1
			}
		},

		methods: {

		},

		watch: {
			// cryp(){
			// 	if(this.naira == 0){
			// 		this.naira = this.naira_value

			// 		this.naira = this.naira * this.cryp
			// 	}else if(this.naira == 1){
			// 		this.naira = this.naira_value
			// 		this.naira = this.naira * this.cryp
			// 	}else
			// 		this.naira = this.naira_value * this.cryp
				
			// },

			naira(){
				if(this.cryp == 0){
					this.cryp = 1

					this.cryp = this.naira / this.naira_value
				}else if(this.cryp == 1){
					this.cryp = 1
					this.cryp = this.naira / this.naira_value
				}else
					this.cryp = this.naira / this.naira_value
				
			}
		}
	}
</script>