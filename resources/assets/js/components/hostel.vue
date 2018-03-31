<template>
    <div class="bg-content"> 
        <div id="content">
            <div class="ic"></div>
            <div class="container">
                <div class="row" >
                    <article class="span3">
                        <h4 style="font: 20px italic trajan">Available Hostels</h4>
                    </article>
                    <article class="span5"  v-for="users in user">
                     <h4 style="font: 20px italic trajan"> You are currently logged in as : {{users.matric}}</h4>
                 </article>
                 <article class="span2">
                     <button class="btn btn-info btn-lg" style="margin-top:20px" data-toggle="modal" data-target="#myModal" > All allocated students</button>
                 </article>
                <article class="span2">
                    <div style="margin-top: 20px; padding: 10px; font: 20px trajan #ff3860">
                        <strong style="padding:10px" v-show="message" v-text="message" class="alert alert-success alert-dismissible" data-dismiss="alert"></strong>
                    </div>
                </article>
                 <div class="clear"></div>
                 <ul class="thumbnails thumbnails-1 list-services">
                    <li class="span3" v-for="availables in hostel.hostel">
                        <div class="thumbnail thumbnail-1"> 
                            <img width= "250" height="185" :src="'bisi/'+availables.upload" :alt="availables.upload">
                            <section> 
                                <form @submit.prevent="hostelUser" method="post" v-for="users in user">
                                    Student Name:
                                    <select class="form-control" v-model="room.student" name="student" v-for="users in user" style="width:200px; border-style:none" required>
                                        <option>{{users.fname}}</option>
                                    </select><hr> 
                                    Name of Hostel:
                                    <select class="form-control" v-model="room.hostel" name="hostel" style="width:200px; border-style:none" required>
                                        <option>{{availables.name}}</option>
                                    </select><hr>
                                    Hostel Location: {{availables.location}} <hr>
                                    Hostel Description : {{availables.description}} <hr>
                                    Price :<button type="button" class="btn btn-success" disabled>{{availables.price}} . 00</button>
                                    <button type="submit" class="btn btn-info">Apply</button>
                                </form>
                            </section>
                        </div>
                    </li>
                </ul>
                <div class="modal fade" id="myModal" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog"  >
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel" style="font:20px italic trajan; text-align:center">Hostel Allocation Confirmation</h4>
                            </div>
                            <div class="modal-body text-info">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name of student</th>
                                            <th>Allocated Hostel</th>
                                        </tr>
                                        <tr v-for="(students, index) in booking.booking" >
                                            <td>{{index +1}}</td>
                                            <td>{{students.student}}</td>
                                            <td>{{students.hostel}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info" @click="logout">Log Out</button>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>    
</template>
<script>
import axios from 'axios'
import swal from 'bootstrap-sweetalert'

export default {
    data(){
        return {  
            user: [],
            hostel:[],
            booking:[],
            message:false,
            room:{
                hostel:'',
                student:''
            }
        }
    },
    created(){
        let token = localStorage.getItem('token');
        axios.get('/hostel?token =' + token) 
        .then((response) =>{
          console.log(token);
      })
        .catch((error) => {
            console.log(error);
        }); 
    },
    mounted(){ 
        axios.get('/users')
        .then(response=>{
            this.user = response.data
        })
    },
    beforeCreate(){ 
        axios.get('/students')
        .then(response=>{
            this.booking = response.data
        })
    },
    created(){ 
        axios.get('/availables')
        .then(response=>{
            this.hostel = response.data
        })
    },
    methods:{
        logout(){
            let token = localStorage.getItem('token');
            axios.get('/hostel?token=' + token)
            .then(response=>{
                localStorage.removeItem('token');
                window.location = '/home';
            });
        },
        hostelUser(){
            let module = this;
            axios.post('/userHostel', this.room)
            .then(response=>{
            module.message = response.data.message;
                window.location = '/hostel';
            }).catch(error=>{
                swal(" ","You have already been allocated to an hostel", "error")
            })
        }
    }
}
</script>
