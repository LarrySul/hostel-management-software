<template>
	<div class="container">
		<div class="row">
			<article class="span8">
				<h3> Student Login Page </h3>
				<div class="inner-1">
					<form id="contact-form" class="login" autocomplete="off" @submit.prevent="login" method="post">
						<div>
							<label class="matric">
								<input name="matric" v-model="matric" v-validate="{required : true, regex: /^([0-9]+)$/, min:11, max:11}" :class="{'input': true, 'is-danger': errors.has('matric') }" type="text" placeholder="Matriculation Number" maxlength="11" required>
								<span v-show="errors.has('matric')" class="help is-danger">{{ errors.first('matric') }}</span>
							</label>
						</div>
						<div >
							<label class="password">
								<input name="password" v-model="password" class="form-control" v-validate="'required|min:5'" :class="{'input': true, 'is-danger': errors.has('password') }" type="password" placeholder="Password" required>
								<span v-show="errors.has('password')" class="help is-danger">{{ errors.first('password') }}</span>
							</label>
						</div>
						<div class="span6" style="margin-left: 170px">
							<button type="submit" class="btn-primary">
							Login
							</button>
						</div>
					</form>
				</div>
			</article>
			<article class="span4">
				<div style="margin-top:50px; padding: 10px; font: 25px trajan #ff3860">
					<strong style="padding:20px" v-show="status" v-text="status" class="alert alert-danger alert-dismissible" data-dismiss="alert"></strong>
				</div>
			</article>
		</div>
	</div>
</template>

<script>
import axios from 'axios'
export default {
	data(){
		return {
			matric: null,
			password: null,
			status:false
		}
	},
	methods: {
		login() {
			let module = this;
			this.$validator.validateAll().then(result => {
				if (result) {
					axios.post('auth/login', {matric:this.matric,password:this.password})
					.then(response=>{
						let token = response.data.token;
						localStorage.setItem('token', token);
						window.location='/hostel';
					}).catch(error => {
						module.status = error.response.data.status;
						window.location='/login';
					})
				}
			})  
		}
	}
} 
</script>