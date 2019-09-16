<template>
    <div v-if="posts">
        <b-card
            :key="post.id" :post="post"
            v-for="post in posts"
            :title="post.title"
            img-src="https://picsum.photos/600/300/?image=25"
            img-alt="Image"
            img-top
            tag="article"
            style="max-width: 20rem;"
            class="mb-2"
        >
            <b-card-text>
            {{post.contents}}
            </b-card-text>

            <b-button href="#" variant="primary">Read</b-button>
        </b-card>
        This is the index page foo
        {{posts}}
    </div>
</template>
<script>
import Post from '../../models/Post.js';
import _ from 'lodash';

export default {
  data: function() {
    return {
      posts: null,
      search: '',
      searched: [],
    };
  },
  async mounted()
  {
      console.log('=====================')
    this.posts = await Post.get()
    console.log(this.posts)
  },
  methods: {
  }
}
</script>
