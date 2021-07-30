<template>
  <div class="text-center my-5">
    <button 
      class="btn btn-info"
      @click="getPaginate(current - 1)"
      v-show="current > 1"
    >
      <i class="fas fa-caret-left text-light"></i>
    </button>
    <button
      class="btn mx-2"
      v-for="num in last"
      :key="num"
      :class="current == num ? 'btn-info' : 'btn-dark'"
      @click="getPaginate(num)"   
    >
      {{ num }}  
    </button>
    <button
      class="btn btn-info"
      @click="gatPaginate(current + 1)"  
      v-show="current < last"
    >
      <i class="fas fa-caret-right text-light"></i>
    </button>
  </div>      
</template>

<script>
export default {
  name: 'Paginate',
  props: {
      'current': Number,
      'last': Number,
      'getPaginate': Function
  }

};
</script>

<style>

</style>