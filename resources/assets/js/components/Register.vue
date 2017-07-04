<template>
    <form class="js-validation-register form-horizontal push-50-t push-50">                   
        <div class="form-group":class="{'has-error': err.username}">
            <div class="col-xs-12">
                <div class="form-material form-material-primary">
                    <input class="form-control" type="text" id="register-username" v-model="username" placeholder="Please enter a username">
                    <label for="register-username">Username</label>
                    <span v-if="err != {} && err.username" class="help-block">
                        <strong>{{ err.username[0] }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group":class="{'has-error': err.email}">
            <div class="col-xs-12">
                <div class="form-material form-material-primary">
                    <input class="form-control" type="email" id="register-email" v-model="email" placeholder="Please provide your email">
                    <label for="register-email">Email</label>
                    <span v-if="err != {} && err.email" class="help-block">
                        <strong>{{ err.email[0] }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group":class="{'has-error': err.password}">
            <div class="col-xs-12">
                <div class="form-material form-material-primary">
                    <input class="form-control" type="password" id="register-password" v-model="password" placeholder="Choose a strong password..">
                    <label for="register-password">Password</label>
                    <span v-if="err != {} && err.password" class="help-block">
                        <strong>{{ err.password[0] }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group":class="{'has-error': err.password_confirmation}">
            <div class="col-xs-12">
                <div class="form-material form-material-primary">
                    <input class="form-control" type="password" id="register-password2" v-model="password_confirmation" placeholder="..and confirm it">
                    <label for="register-password2">Confirm Password</label>
                </div>
            </div>
        </div>
        <div class="form-group":class="{'has-error': err.tnc}">
            <div class="col-xs-7 col-sm-8">
                <label class="css-input switch switch-sm switch-primary">
                    <input type="checkbox" id="register-terms" v-model="tnc" name="register-terms"><span></span> I agree with terms &amp; conditions
                </label>
                <span v-if="err != {} && err.tnc" class="help-block">
                        <strong>{{ err.tnc[0] }}</strong>
                </span>
            </div>
            <div class="col-xs-5 col-sm-4">
                <div class="font-s13 text-right push-5-t">
                    <!-- <a href="#" data-toggle="modal" data-target="#modal-terms">View Terms</a>
 -->                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <button class="btn btn-sm btn-block btn-primary" @click.prevent="register" type="submit">Create Account <i :class="{'fa fa-spinner fa-spin': submitted}"></i></button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        mounted() {
        },

        props: ['token'],

        data(){
            return {
                username: '',
                email: '',
                password: '',
                tnc: '',
                password_confirmation: '',
                err: {},
                submitted: false
            }
        },

        methods: {
            register(){
                if(this.email != '' && this.password != '' && this.username != ''){
                    this.submitted = true
                    this.err = {}

                    let formdata = new FormData()

                    formdata.append('username', this.username)
                    formdata.append('email', this.email)
                    formdata.append('password', this.password)
                    formdata.append('password_confirmation', this.password_confirmation)
                    formdata.append('token', this.token)
                    formdata.append('tnc', this.tnc)

                    axios.post('register', formdata).then( (resp) => {
                        this.submitted = false

                        if(resp.data == 'registered'){
                            return location.href = '/next-step'
                        }

                        alert('Something went wrong. Please refresh and try again!')

                    }).catch( (error) => {
                        this.err = error.response.data

                        this.submitted = false
                    })
                }else
                    alert('Please fill in the forms correctly!')
                
            }
        }
    }
</script>
