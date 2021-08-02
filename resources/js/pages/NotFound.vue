<template>
  <div class="not-found d-flex flex-column align-items-center justify-content-center">
      <h3 class="font-weight-bold">Error 404</h3>
      <img class="my-5" src="https://img-premium.flaticon.com/png/128/4196404.png?token=exp=1627915964~hmac=b9be935f09bff734370b37119a85e8b9" alt="">
      <p>Page not found.</p>
      <router-link class="btn btn-secondary" :to="{ name: 'blog' }">
        <i class="fas fa-arrow-left"></i>
      </router-link>  
  </div>    
</template>

<script>
export default {
    name: 'NotFound'
}
</script>

<style lang="scss" scoped>
.not-found {
  height: calc(100vh - 100px);

  p {
    font-size: 18px;
  }
}
</style>