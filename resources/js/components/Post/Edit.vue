<template>
  <div>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group
        id="input-group-1"
        label="Post Title:"
        label-for="input-1"
        description="Choose a nice title for your post."
      >
        <b-form-input
          id="input-1"
          v-model="post.title"
          type="title"
          required
          placeholder="Enter title"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Post Contents:" label-for="input-2">
        <ckeditor :editor="editor" v-model="post.contents" :config="editorConfig"></ckeditor>
      </b-form-group>

      <b-button type="submit" variant="primary" @click="savePost">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
    <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ post }}</pre>
    </b-card>
  </div>
</template>

<script>
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
  import Post from '../../models/Post.js';

  export default {
    data() {
      return {
        post: {},
        show: true,
        editor: ClassicEditor,
        editorData: '<p></p>',
        editorConfig: {
            // The configuration of the rich-text editor.
        }
      }
    },
    async mounted()
    {
        if(this.$route.params.id){
            console.log('is edit')
        } else {
            this.post = new Post({})
            console.log('is new')
        }
    },
    methods: {
      async savePost(evt) {
          console.log(this.post)
        await this.post.save();
      },
      async onSubmit(evt) {
        evt.preventDefault()
        await this.post.save();
      },
      onReset(evt) {
        evt.preventDefault()
        // Reset our form values
        this.post.email = ''
        this.post.name = ''
        this.post.food = null
        this.post.checked = []
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>
