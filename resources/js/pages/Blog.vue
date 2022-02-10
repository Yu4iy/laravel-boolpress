<template>
	<div v-if="posts">
		<div v-for="post in posts" :key="`post-${post.id}`" >
			<h1>{{post.title}}</h1>
			<p>{{getExcerpt(post.content, 100)}}</p>
			<p>{{ FormatData(post.created_at)}}</p>
			<router-link :to="{name: 'post-detail', params: {slug: post.slug}}">
				Read More
			</router-link>
			<hr>
		</div> 
		<button
		:disabled="pagination.current === 1"
		@click="getPosts(pagination.current - 1)"
		>Prev</button>
		<button
		:disabled="pagination.current === pagination.last"
		@click="getPosts(pagination.current + 1)"
		>Next</button>
	</div>
	<div v-else >
		no posts
	</div>
</template>

<script>
import Axios from 'axios';
export default {
name:'App',
components:{},
data() {
	return{
		posts: null,
		pagination: null,
	}
},
created(){
	this.getPosts();
},
methods:{
	getPosts(page = 1){
		Axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
				.then(res => {
					this.posts = res.data.data
					this.pagination = {
						current: res.data.current_page,
						last: res.data.last_page
					}
				})
	},
	getExcerpt(text, maxLenght){
		if(text.length > maxLenght){
			return text.substr(0, maxLenght) + '...';
		}
		return text;
	},

	FormatData(oldDate){
		const date = new Date(oldDate)
		const newDate = new Intl.DateTimeFormat('it-IT').format(date);
		return newDate;
	}
}
}
</script>

<style lang="scss">

</style>