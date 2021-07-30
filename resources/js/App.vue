<template>
    <div>
      <Header />
      <main class="container">
        <div class="row">
          <Card v-for="post in posts" :key="post.id" :post="post" />
        </div>
        <Paginate
          :current="current_page"
          :last="last_page"
          :getPaginate="getPosts"
        />
      </main>
      <Footer />
    </div>      
</template>

<script>
import Header from "./components/Header";
import Card from "./components/Card";
import Paginate from "./components/Paginate";
import Footer from "./components/Footer";

export default {
  name: "App",
  components: {
    Header,
    Card,
    Paginate,
    Footer,
  },
  data() {
    return {
      posts: [],
      current_page: 1,
      last_page: 1,
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
        .get(`http://127.0.0.1:8000/api/posts?page=${page}`)
        .then((res) => {
          this.posts = res.data.data;

          this.current_page = res.data.current_page;
          this.last_page = res.data.last_page;

          this.posts.foreach((post) => {
            post.extract = this.truncateText(post.body, 150);
          });
          // console.log(this.current_page);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  created() {
    this.getPosts();
  },
};
</script>

<style lang="scss">
</style>