<template>
    <div v-if="posts">
        <b-card-group columns>
            <b-card
                :key="post.id"
                :post="post"
                v-for="post in posts"
                :title="post.title"
                :img-src="post.image"
                img-alt="Image"
                img-top
                tag="article"
                style="min-width: 20rem;"
                :footer="post.publishedInfoText()"
                footer-tag="footer"
            >
                <b-card-text v-html="post.contents">
                </b-card-text>

                <b-button :to="{ name: 'post.view', params: {id: post.id} }" variant="primary">Read</b-button>
                <b-button :to="{ name: 'post.edit', params: {id: post.id} }" variant="secondary">Edit</b-button>
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
      user: {}
    };
  },
  async mounted()
  {
    this.posts = await Post.get()
    this.user = this.$auth.user();
  },
  methods: {
  }
}
</script>
