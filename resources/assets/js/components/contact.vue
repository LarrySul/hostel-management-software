<template>
	<div class="bg-content"> 
    	<div id="content">
    		<div class="ic"></div>
	    	<div class="container">
	        	<div class="row">
	        		<article class="span8">
	              		<h3>Contact us</h3>
	              		<div class="inner-1">
				            <form id="contact-form">
				                <div class="success"> Your message has been sent succesfuly!<strong> We will be in touch soon.</strong> 
				                </div>
				                <fieldset>
					                <div>
					                    <label class="name">
						                    <input type="text" value="Your name">
					                	</label>
					                </div>
					                <div>
					                    <label class="phone">
					                    	<input type="tel" value="Telephone">
					                    </label>
					                </div>
					                <div>
					                    <label class="email">
					                    	<input type="email" value="Email">
					                    </label>
					                </div>
					                <div class="buttons-wrapper">
					                	<a class="btn btn-1" data-type="reset">Clear</a> <a class="btn btn-1" data-type="submit">Send
					                	</a>
					                </div>
				            	</fieldset>
				            </form>
	          			</div>
	            	</article>
			        <article class="span4">
			            <h3>Contact info</h3>
		            	<div class="map">
		            		<a href="http://dribbble.com/shots/624850-Presentaion-image-1" target="_blank"><img src="img/map.jpg" alt="Location on Map" /></a>
		          		</div>
		              	<address class="address-1">
		          			<strong>Inbetwin Networks,<br>
				              Paud Phata, Road,<br>
				              Kothrud, Pune-38.
				          	</strong>
		          			<div class="overflow"> 
		          				<span>Mobile:</span>+91 12345 67890<br>
				                <span>Telephone:</span>+91 12345 67890<br>
				                <span>FAX:</span>+91 12345 67890 <br>
				                <span>E-mail:</span> <a href="#" class="mail-1">you@domain.com</a><br>
				                <span>Skype:</span> <a href="#" class="mail-1">@woohooo</a>
				            </div>
		          		</address>
			        </article>
	      		</div>
	        </div>
  		</div>
  	</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component contact.')
        }
    }
</script>