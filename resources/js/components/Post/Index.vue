<template>
  <div v-if="post">
    <b-card>
        <div class="image-container">
            <b-card-img :src="post.image"></b-card-img>
        </div>

        <b-card-body :title="post.title"
        :sub-title="post.publishedInfoText()">
            <b-card-text v-html="post.contents"></b-card-text>
        </b-card-body>
    </b-card>
  </div>
</template>
<script>
  import Post from '../../models/Post.js';
  export default {
    data() {
      return {
        post: {},
      }
    },
    async mounted()
    {
        if(this.$route.params.id){
            console.log('is edit')
            this.post = await Post.find(this.$route.params.id)
            console.log();
            let tags = JSON.parse(this.post.tags);
            this.stringTags = tags.join(', ')
        }
    }
  }
</script>
<style>
.image-container {
    max-height: 250px;
    overflow: hidden;
}
.image-container img {
    width: 100%;
}

</style>
