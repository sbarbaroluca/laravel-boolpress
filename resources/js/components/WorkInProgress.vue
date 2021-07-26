<template>
  <div class="text-center my-5">
    <h1>{{ title }}</h1>
    <h2>{{ subtitle }}</h2>
    <a class="btn btn-primary" href="http://127.0.0.1:8000/admin">Admin</a>
  </div>  
</template>

<script>
export default {
    name: 'WorkInProgress',
    props: {
      title: String,
      subtitle: String
    }
}
</script>

<style lang="scss" scoped>
    h1 {
      color: #3490dc;
    }
</style>