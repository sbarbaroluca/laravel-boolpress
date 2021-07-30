<template>
  <header class="bg-dark text-light py-3">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h1>My<span class="text-info text-bold">Blog</span> </h1>
        <nav class="d-flex align-items-center">
          <ul class="d-flex text-uppercase list-unstyled m-0">
            <li>
              <a class="text-decoration-none text-light" href="#">Home</a>
            </li>  
            <li class="ml-5">
              <a class="text-decoration-none text-light" href="#">Blog</a>
            </li>  
            <li class="ml-5">
              <a class="text-decoration-none text-light" href="#">About</a>
            </li>  
          </ul>
        </nav>
      </div>
    </div>
  </header>          
</template>

<script>
export default {
  name: "Header",
};
</script>

<style>
</style>