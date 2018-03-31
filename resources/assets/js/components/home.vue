<template>
    <div class="bg-content" >
        <div class="container">
            <div class="row">
                <div class="span12"> 
                    <div class="flexslider">
                        <ul class="slides">
                            <li> <img src="img/14.jpg" alt="" > </li>
                            <li> <img src="img/16.jpg" alt="" > </li>
                            <li> <img src="img/18.jpg" alt="" > </li>
                            <li> <img src="img/19.jpg" alt="" > </li>
                            <li> <img src="img/23.jpg" alt="" > </li>
                        </ul>
                    </div>
                    <span id="responsiveFlag"></span>
                    <div class="block-slogan">
                        <h2>{{allocation}}</h2>
                        <div>
                            <p>{{software}}</p>
                            <p style="text-align:center; padding-top:20px;"><a href="register" class="btn btn-1">Click here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div id="content" class="content-extra"><div class="ic"></div>
        <div class="row-1">
            <div class="container" >
                <div class="row">
                    <article class="span12">
                        <h3> {{apply}}</h3>
                    </article>
                    <ul class="thumbnails thumbnails-1">
                        <li class="span3" v-for="availables in hostel.hostel">
                            <div class="thumbnail thumbnail-1">
                                <h4>{{availables.name}}</h4>
                                <img :src="'/bisi/'+availables.upload" width="250" height="185" :alt="availables">
                                <section> 
                                    <a href="#"><h3>Price : {{availables.price}}</h3></a>
                                    <div class="meta">
                                        <time datetime="2012-11-09" class="date-1"><i class="icon-calendar"></i> {{availables.created_at}}
                                        </time>
                                        <div class="name-author"><i class="icon-user"></i> <a href="#">Admin</a>
                                        </div>
                                    </div> 
                                    <div class="clear"></div>
                                    <p>{{availables.description}}</p>
                                    <a href="/register" class="btn btn-1">Read More</a>
                                </section>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <article class="span8">
                    <h3>{{us}}</h3>
                    <div class="wrapper">
                        <figure class="img-indent"><img src="img/logosss.jpg " alt="" /></figure>
                        <div class="inner-1 overflow extra">
                            <div class="txt-1">
                                {{tasued}}
                            </div>
                        </div>
                    </div>
                </article>
                <article class="span4">
                    <h3>About Software</h3>
                    <div class="wrapper">
                       {{wrapper}}
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>  
</template>


<script>
import axios from 'axios'
export default {
    data(){
        return{
            wrapper: 'Hostel is the place which is just like second home for the people who live outside from their home. They feel safe while living in a hostel. Hostel management system manages all the data related to people like name, parent’s name, contact number, email, and address. All these details are managed online very easily and can be accessed without any problem from anywhere or at anytime.',
            tasued:'Tai Solarin University of Education (TASUED, pronounced TARSUD), established on 29 January 2005 by the administration of His Excellency, Otunba Gbenga Daniel, is a unique tertiary institution in the country. Apart from being the first of its kind in Nigeria, she also shares a unique feature as the only institution in the country that offers both the bachelor\'s degree programmes in education (B.Ed.) and trains National Certificate of Education (NCE) graduates within the same academic environment.',
            software:'An electronic hostel system is simply a software used for managing most activities that takes place in the hostel with the help of a hostel administrator.',
            allocation:'Hostel Allocation software!',
            apply:'Apply for an hostel today',
            us:'Shortly about us',
            hostel:[]
        
        }
    },
    created(){ 
    axios.get('/availables')
    .then(response=>{
        this.hostel = response.data
        })
    }
}
</script>
