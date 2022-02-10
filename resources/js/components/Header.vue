<template>
  <header class="p-4">
	  <span class="mr-2">
		  <router-link :to="{name: 'home'}">Home</router-link>
	  </span>

	   <span class="mr-2">
			<router-link :to="{name: 'about'}">About</router-link>
	  </span>

	   <span class="mr-2">
			<router-link :to="{name: 'blog'}">Blog</router-link>
	  </span>
	    <span class="mr-2">
		  <a href=""></a>
	  </span>
  </header>
</template>

<script>
export default {
name:'Header'
}
</script>

<style>
.active{
	background: rebeccapurple;
	padding: 10px 20px;
}
</style>