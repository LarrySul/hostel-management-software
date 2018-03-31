<template>
	<div class="container">
		<div class="row">
			<article class="span8">
				<h3>Student Registeration Page</h3>
				<div class="inner-1">
					<form id="contact-form" class="register" autocomplete="off" @submit.prevent="registerUser" method="post">
						<div>
							<label class="name">
								<input name="fname" v-model="register.fname" v-validate="{required : true, regex: /^([A-Z a-z]+)$/, min:3}" :class="{'input': true, 'is-danger': errors.has('fname') }" type="text" placeholder="Full names">
								<span v-show="errors.has('fname')" class="help is-danger">{{ errors.first('fname') }}</span>			
							</label>
						</div>
						<div>
                        	<label class="gender">
                        		<select v-model="register.gender" name="gender" required>
                        			<option>--Student Gender--</option>
                        			<option>Male</option>
                        			<option>Female</option>
                        		</select>
                        	</label>
                        </div>
                        <div>
							<label class="matric">
								<input name="matric" v-model="register.matric" v-validate="{required : true, regex: /^([0-9]+)$/, min:11}" :class="{'input': true, 'is-danger': errors.has('matric') }" type="text" placeholder="Matriculation Number" maxlength="11">
								<span v-show="errors.has('matric')" class="help is-danger">{{ errors.first('matric') }}</span>			
							</label>
						</div>
                        <div>
                        	<label class="course">
                        		<input name="course" v-model="register.course" v-validate="{required : true, regex: /^([A-Z a-z]+)$/, min:3, max:20}" :class="{'input': true, 'is-danger': errors.has('course') }" type="text" placeholder="Course of study">
                        		<span v-show="errors.has('course')" class="help is-danger">{{ errors.first('course') }}</span>
                        	</label>
                        </div>
                        <div>
                        	<label class="college">
                        		<select  v-model="register.college" name="college" required>
                        			<option>--College of Study--</option>
                        			<option>Cosit</option>
                        			<option>Cosmas</option>
                        			<option>Cohum</option>
                        			<option>Coavot</option>
                        		</select>
                        	</label>
                        </div>
                        <div>
                        	<label class="email">
                        		<input name="email" v-model="register.email" v-validate="'required|email'" :class="{'input': true, 'is-danger': errors.has('email') }" type="text" placeholder="Email Address">
                        		<span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
                        	</label>
                        </div>
                        <div >
                        	<label class="password">
                        		<input name="password" v-model="register.password" v-validate="'required|min:5'" :class="{'input': true, 'is-danger': errors.has('password') }" type="password" placeholder="Password">
                        		<span v-show="errors.has('password')" class="help is-danger">{{ errors.first('password') }}</span>
                        	</label>
                        </div>
						<!-- <div >
							<label class="upload">
								<input name="upload" v-on:change="imageChanged" v-validate="'required'" :class="{'input': true, 'is-danger': errors.has('upload') }" type="file" accept="image/*">
								<span v-show="errors.has('upload')" class="help is-danger">{{ errors.first('upload') }}</span>
							</label>
						</div> -->
						<div>
							<h3> Next of Kin</h3>
							<div>
								<label class="name">
									<input name="kinName" v-model="register.kinName" v-validate="{required : true, regex: /^([A-Z a-z]+)$/, min:3}" :class="{'input': true, 'is-danger': errors.has('kinName') }" type="text" placeholder="Next of Kin full names">
									<span v-show="errors.has('kinName')" class="help is-danger glyphicon glyphicon-remove">{{ errors.first('kinName') }}</span>			
								</label>
							</div>
							<div>
								<label class="phone">
									<input name="phone" v-model="register.phone" v-validate="{required : true, regex: /^([0-9]+)$/, min:11}" :class="{'input': true, 'is-danger': errors.has('phone') }" type="text" placeholder="Phone Number" maxlength="11">
									<span v-show="errors.has('phone')" class="help is-danger">{{ errors.first('phone') }}</span>			
								</label>
							</div>
							<div>
	                        	<label class="relationship">
	                        		<select v-model="register.relationship" name="relationship" required>
	                        			<option>--Relationship--</option>
	                        			<option>Brother</option>
	                        			<option>Sister</option>
	                        			<option>Others</option>
	                        		</select>
	                        	</label>
                        	</div>
						</div>
						<div class="span6" style="margin-left: 170px">
							<button type="submit" class="btn-success btn-lg">
								Register
							</button>
						</div>
					</form>
				</div>
			</article>
			<article class="span4">
				<div style="margin-top: 50px; padding: 10px; font: 25px trajan #ff3860">
					<strong style="padding:20px" v-show="message" v-text="message" class="alert alert-success alert-dismissible" data-dismiss="alert"></strong>
				</div>
			</article>
		</div>
	</div>
</template>

<script>
import swal from 'bootstrap-sweetalert'
import axios from 'axios'
export default{
	data(){
		return{
			message:false,
			register:{
				fname:'',
				gender:'',
				matric:'',
				course:'',
				college:'',
				email:'',
				password:'', 
				// upload:'',
				kinName:'',
				phone:'',
				relationship:'',
				
			}
		}
	},
	methods: {
		imageChanged(e){
			var photo = new FileReader();
			photo.readAsDataURL(e.target.files[0])
			photo.onload = (e)=>{
				this.register.upload = e.target.result
			}
		},
		registerUser() {
			let module = this;
			this.$validator.validateAll().then(result => {
				if (result) {
					axios.post('auth/register', this.register)
					.then(response =>{
						module.message = response.data.message;
						this.$router.push('/login');
					})
					.catch(error => {
						swal(" ",
							"Invalid user credentials",
							"error")
					});
				}
			})  
		}
	}
} 
</script>

