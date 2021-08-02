<template>
  <div class="text-center">
    <button 
      class="btn btn-info text-light"
      @click="$emit('firstPage')"
    >
      <i class="fas fa-angle-double-left"></i>
    </button>
    <button
      class="btn btn-info"
      @click="$emit('prev')"
      v-show="current > 1"
    >
      <i class="fas fa-caret-left text-light"></i>
    </button>
    <button
      class="btn shadow-none font-weight-bold"
      v-for="num in last"
      :key="num"
      :class="current == num ? 'text-info' : 'text-dark'"  
      @click="$emit('active', num)"
    >
      {{ num }}
    </button>
    <button 
      class="btn btn-info"
      @click="$emit('next')"  
      v-show="current < last"
    >
      <i class="fas fa-caret-right text-light"></i>
    </button>
    <button
    class="btn btn-info text-light"
    @click="$emit('lastPage')" 
    >
       <i class="fas fa-angle-double-right"></i>
    </button>   
  </div>      
</template>

<script>
export default {
  name: 'Paginate',
  props: {
      'current': Number,
      'last': Number
  }

};
</script>

<style>
</style>