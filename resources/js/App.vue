<template>
    <div>
      <Header />
      <main class="container">
        <router-view></router-view>
      </main>
      <Footer />
    </div>      
</template>

<script>
import Header from "./components/Header";
import Footer from "./components/Footer";

export default {
  name: "App",
  components: {
    Header,
    Footer,
  },
  data() {
    return {
      posts: [],
      categories: [],
      current_page: 1,
      last_page: 1,
      num: 0
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
            post.img = "https://images.unsplash.com/photo-1516321497487-e288fb19713f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80";
          });
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getCategories() {
      axios.get("http://127.0.0.1:8000/api/categories")
      .then(res => {
        this.categories = res.data;
      })
      .catch(err => {
        console.log(err);
      })
    },
    activePosts(n) {
      this.num = n
      this.getPosts(this.num);
    }
  },
  created() {
    this.getPosts();
    this.getCategories();
  },
};
</script>

<style lang="scss">
</style>