<template>
  <div class="col-4 my-3 d-flex">
    <div class="card w-100 rounded">
      <div class="card-body">
        <h3 class="card-title">{{ post.title }}</h3>
        <div class="overflow-hidden">
          <img 
            class="post-img w-100 mb-2"
            :src="post.img"
            :alt="post.title"
            :title="post.title"
          />
        </div>
        <p>{{ post.extract }}</p>
        <div v-show="post.category_id">
          <span class="font-weight-bold">Category: </span>
          <span 
            class="badge badge-info text-light"
            v-for="(category, index) in categories"
            :key="index"
            >{{ post.category_id == category.id ? category.name : ""}}</span
          >
        </div>
        <router-link class="mt-3" :to="{ name: 'post', params: { slug: post.slug }}">Leggi</router-link>
      </div>
    </div>
  </div>      
</template>

<script>
export default {
  name: "Card",
  props: {
    post: Object,
    categories: Array,
  },
};
</script>

<style lang="scss" scoped>

.post-img {
  transition: transform 0.5s ease-in-out;
  &:hover {
    transform: scale(1.2);
  }
}
</style>