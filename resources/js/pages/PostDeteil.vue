<template>
  <section class="conteiner">
	  <div v-if="post">
		  <h1>{{post.title}}</h1>
		  <p>{{post.content}}</p>
			<h2>Categorie: {{post.categorie.name}}</h2>

	  </div>
	  <div v-else> 
		  LOAD...
	  </div>
  </section>
</template>

<script>
import axios from 'axios'
export default {
name:'PostDeteil',
data(){
	return{
		post: null,
	}
},
created(){
	this.getPostDetail();
},
methods:{
	getPostDetail(){
		axios.get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
				.then(res=>{
					this.post = res.data;
				})
				.catch(err=>log.error(err));
	}
}
}
</script>

<style>

</style>