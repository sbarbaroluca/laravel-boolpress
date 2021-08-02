<template>
  <section v-if="posts.lenght > 0" class="blog pt-3">
    <h2>Blog</h2>
    <div class="row">
      <Card 
        v-for="post in posts"
        :key="post.id"
        :post="post"
        :categories="categories"
      />
    </div>
    <Paginate 
        :current="current_page"
        :last="last_page"
        @active="activePosts"
        @prev="getPosts(current_page - 1)"  
        @next="getPosts(current_page + 1)"  
        @firstPage="getPosts(1)"
        @lastPage="getPosts(last_page)"
     />
  </section>
  <Loader v-else />   
</template>

<script>
import Card from '../components/Card';
import Paginate from '../components/Paginate';
import Loader from '../components/Loader';

export default {
  name: "Blog",
  components: {
      Paginate,
      Card,
      Loader
  },
  data() {
    return {
      posts: [],
      categories: [],
      current_page: 1,
      last_page: 1,
      num: 0,
    };
  },
  methods: {
    truncateText(string, charsNumber) {
      if (string.lenght > charsNumber) {
        return string.substr(0, charsNumber) + "...";
      } else {
        return string;
      }
    },
    getPosts(page = 1) {
      axios
        .get("http://127.0.0.1:8000/api/posts?page=${page}")
        .then((res) => {
          this.posts = res.data.data;

          this.current_page = res.data.current_page;
          this.last_page= res.data.last_page;

          this.posts.forEach((post) => {
            post.extract = this.truncateText(post.body, 150);
            post.img = 
            "https://images.unsplash.com/photo-1516321497487-e288fb19713f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80";
          });
        })
        .cath((err) => {
          console.log(err);
        });
    },
    getCategories() {
      axios 
      .get("http://127.0.0.1:8000/api/categories")
      .then((res) => {
        this.categories = res.data;
      })
      .catch((err) => {
        console.log(err);
      });
    },
    activePosts(n) {
      this.num = n;
      this.getPosts(this.num);
    },
  },
  created() {
    this.getPosts();
    this.getCategories();
    //this.getTags()
  },
};
</script>

<style lang="scss" scoped>
.blog {
  height: calc(100vh - 100px);
}
</style>