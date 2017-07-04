<template>
    <form class="js-validation-login form-horizontal push-30-t" action="" method="post">
        <div class="form-group":class="{'has-error': err.email}">
            <div class="col-xs-12">
                <div class="form-material form-material-primary floating">
                    <input class="form-control" type="text" id="login-username" v-model="email" required="">
                    <label for="login-username">Email</label>
                    <span v-if="err != {} && err.email" class="help-block">
                        <strong>{{ err.email }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group":class="{'has-error': err.password}">
            <div class="col-xs-12">
                <div class="form-material form-material-primary floating">
                    <input class="form-control" type="password" id="login-password" v-model="password" required="">
                    <label for="login-password">Password</label>
                    <span v-if="err != {} && err.password" class="help-block">
                        <strong>{{ err.password[0] }}</strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
                <label class="css-input switch switch-sm switch-primary">
                    <input type="checkbox" id="login-remember-me" name="remember"><span></span> Remember Me?
                </label>
            </div>
            <div class="col-xs-6">
                <div class="font-s13 text-right push-5-t">
                    <a href="/password/reset">Forgot Password?</a>
                </div>
            </div>
        </div>
        <div class="form-group push-30-t">
            <div class="col-xs-12">
                <button class="btn btn-sm btn-block btn-primary" type="submit" @click.prevent="login">Log in <i class="fa fa-check"></i></button>
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
                email: '',
                password: '',
                err: {}
            }
        },

        methods: {
            login(){
                if(this.email != '' && this.password != ''){
                    let formdata = new FormData()

                    formdata.append('email', this.email)
                    formdata.append('password', this.password)
                    axios.post('login', formdata).then( (resp) => {
                        return location.href = '/home'
                    }).catch( (error) => {
                        this.err = error.response.data
                        console.log(this.err)
                    })
                }else
                    alert('Kindly fill the form correctly!')
                
            }
        }
    }
</script>
