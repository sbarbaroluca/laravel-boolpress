<template>
  <section class="post py-3" v-if="post && !loading">
    <div class="d-flex justify-content-between align-items-center">
      <h2>{{ post.title }}</h2>
      <div class="info d-flex align-items-center">
        <h4 :class="post.tags.lenght > 0 ? 'mr-5' : ''">
          <span class="badge badge-info text-light">{{
            post.category.name
          }}</span>
        </h4>
        <h6>
          <span
            v-for="tag in post.tags"
            :key="tag.id"
            class="badge badge-pill badge-warning text-light ml-2"
            >{{ tag.name }}</span
          >
        </h6>
      </div>
    </div>
    <img class="w-100 my-3" :src="post.img" :alt="post.title" />
    <p>{{ post.body }}</p>
    <div>
      <router-link class="btn btn-secondary" :to="{ name: 'blog' }">
        <i class="fas fa-arrow-left"></i>
      </router-link>
    </div>
  </section>
  <NotFound v-else-if="!post" />
  <Loader v-else />
</template>

<script>
import Loader from "../components/Loader";
import NotFound from "../pages/NotFound";

export default {
  name: "Post",
  data() {
    return {
      post: null,
      loading: true,
    };
  },
  components: {
    Loader,
    NotFound
  },
  methods: {
    getPost(slug) {
      axios
        .get("http://127.0.0.1:8000/api/posts/${slug}")
        .then((res) => {
          this.post = res.data;
          this.post.img =
            "https://images.unsplash.com/photo-1516321497487-e288fb19713f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80";
          this.loading = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  created() {
    this.getPost(this.$route.params.slug);
  },
};
</script>

<style lang="scss" scoped>

</style>