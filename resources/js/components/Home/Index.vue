<template>
    <div v-if="posts">
        <b-card-group>
            <b-card
                :key="post.id" :post="post"
                v-for="post in posts"
                :title="post.title"
                img-src="https://picsum.photos/600/300/?image=25"
                img-alt="Image"
                img-top
                tag="article"
                style="min-width: 20rem;"
            >
                <b-card-text>
                {{post.contents}}
                </b-card-text>

                <b-button :to="{ name: 'post.view', params: {id: post.id} }" variant="primary">Read</b-button>
            </b-card>
        </b-card-group>
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
    this.posts = await Post.get()
  },
  methods: {
  }
}
</script>
