<template>
  <div class="col-4 my-3 d-flex">
    <div class="card w-100">
      <div class="card-body">
        <h4 class="card-title">{{ post.title }}</h4>
        <p>{{ post.extract }}</p>
        <a href="#" class="card-link">Leggi</a>
      </div>
    </div>
  </div>      
</template>

<script>
export default {
  name: "Card",
  props: {
    post: Object,
  },
};
</script>

<style>
</style>