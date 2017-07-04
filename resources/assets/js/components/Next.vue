<template>
	<form class="form-horizontal validation " action="next-step" method="post">                        	
        <!-- Steps Content -->
        <div class="block-content tab-content">
            <!-- Step 1 -->
            <div class="tab-pane fade fade-right in push-30-t push-50 active" id="simple-progress-step1">
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-material">
                            <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Please enter your firstname" v-model="firstname">
                            <label for="firstname">First Name</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-material">
                            <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Please enter your lastname" v-model="lastname">
                            <label for="lastname">Last Name</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-material">
                            <input class="form-control" type="text" id="city" name="city" placeholder="Where do you live?" v-model="city">
                            <label for="city">City</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-material">
                            <input class="form-control" type="text" id="city" name="mobile" placeholder="Mobile Number" v-model="mobile">
                            <label for="city">Mobile</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Step 1 -->

            <!-- Step 2 -->
            <div class="tab-pane fade fade-right push-30-t push-50" id="simple-progress-step2">
                <!-- <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-material">
                            <textarea class="form-control" id="simple-progress-details" name="simple-progress-details" rows="9" placeholder="Share something about yourself"></textarea>
                            <label for="simple-progress-details">Details</label>
                        </div>
                    </div>
                </div>  -->
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="form-material">
                            <select class="js-select2 form-control" id="example2-select2-multiple" name="cryptos[]" style="width: 100%;" data-placeholder="Choose many..." multiple>
                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                <option value="1">BTC</option>
                                <option value="2">TBC</option>
                                <option value="3">GRC</option>
                            </select>
                            <label for="example2-select2-multiple">Which crypto do you have? <small>(Leave blank if none)</small></label>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                    	<div class="col-xs-12">
                    		<label for=""> Join a market to trade.. <br><small>Preferrablly, join a market of which you already have its coin. E.g if you only have Bitcoin, then join Bitcoin Market only! Ignore if not interested!</small></label>
                    	</div> 
                    	<br><br>                                  	
                         <div v-for="market in markets" class="col-xs-6">
                            <a class="block block-link-hover2 text-center":class="{'selected': joined}" href="" @click.prevent="join()">
                                <div class="block-content block-content-full bg-primary">
                                    <i class="si si-shuffle fa-4x text-white"></i>
                                    <div class="font-w600 text-white-op push-15-t">Join {{market.abbr_name}}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- END Step 2 -->

            <!-- Step 3 -->
            <div class="tab-pane fade fade-right push-30-t push-50" id="simple-progress-step3">
        
                <h3 v-if="firstname != '' && lastname != '' && city != '' && mobile != ''" class="text-center lead">You're good to go <i class="fa fa-check-circle-o"></i>
				<br>
				Click the proceed button to get to your dashboard.
                </h3>

                <span v-else class="text-center text-danger">
            		<p>
            			All form fields are required! Kindly go back and fill them
            		</p>
            	</span>
            </div>
            <!-- END Step 3 -->
        </div>
        <!-- END Steps Content -->

        <!-- Steps Navigation -->
        <div class="block-content block-content-mini block-content-full border-t">
            <div class="row">
                <div class="col-xs-6">
                    <button class="wizard-prev btn btn-warning" type="button"><i class="fa fa-arrow-circle-o-left"></i> Previous</button>
                </div>
                <div class="col-xs-6 text-right">
                    <button class="wizard-next btn btn-primary" type="button">Next <i class="fa fa-arrow-circle-o-right"></i></button>
                    <button class="wizard-finish btn btn-primary" type="submit" @click.prevent="submit"><i class="fa fa-check-circle-o"></i> Proceed</button>
                </div>
            </div>
        </div>
        <!-- END Steps Navigation -->
    </form>
</template>

<script>
	export default {
		mounted(){
			this.getMarkets()
		},

		data(){
			return {
				'firstname': '',
				'lastname': '',
				'city': '',
				'mobile': '',
				'cryptos': [],
				'markets': {},
				'auth_user_markets': [],
				'joined': true
			}
		},

		props: [],

		methods: {
			getMarkets(){
				axios.get('/markets/all').then( (resp) => {
					this.markets = resp.data
				})
			},

			join(market){
				axios.post('/market/' + market.id + '/join').then( (resp) => {
					this.auth_user_markets.push(resp.data)
				})
			},

			submit(){
				if(this.firstname != '' && this.lastname != '' && this.city != '' && this.mobile != ''){
					let formdata = new FormData()

					formdata.append('firstname', this.firstname)
					formdata.append('lastname', this.lastname)
					formdata.append('city', this.city)
					formdata.append('mobile', this.mobile)

					axios.post('next-step', formdata).then( (resp) => {
						return location.href = '/markets/interest'
					}).catch( (resp) => {
						alert('Error. Kindly refresh and try again')
					})
				}
				else 
					alert('All form fields are required!')
			}
		},

		computed: {
			
		}
	}
</script>

<style scoped> 
	.selected{
		background: black;
	}
</style>