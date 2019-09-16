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
          type="text"
          required
          placeholder="Enter title"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Post Contents:" label-for="input-2">
        <ckeditor :editor="editor" v-model="post.contents" :config="editorConfig"></ckeditor>
      </b-form-group>

      <b-form-group
        id="input-group-1"
        label="Tags:"
        label-for="input-1"
        description="Separate each tag with a comma (,)."
      >
        <b-form-input
          id="input-1"
          v-model="stringTags"
          type="text"
          required
          placeholder="Tags, comma separated"
        ></b-form-input>
      </b-form-group>

      <b-form-group
        id="input-group-1"
        label="Image URL:"
        label-for="input-1"
        description="Image to show on the Post"
      >
        <b-form-input
          id="input-1"
          v-model="post.image"
          type="text"
          required
          placeholder="Image URL"
        ></b-form-input>
      </b-form-group>

      <b-form-group
        id="input-group-1"
        label="Publishing Date:"
        label-for="input-1"
        description="Time on which your post will be published"
      >
      <div class="row">
        <div class="col-md-12">
            <date-picker v-model="post.published_date" :config="datepickerConfig"></date-picker>
            </div>
      </div>
      </b-form-group>

      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button variant="danger" @click='deletePost'>Delete</b-button>
    </b-form>
  </div>
</template>

<script>
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
  import Post from '../../models/Post.js';
  import datePicker from 'vue-bootstrap-datetimepicker';
  import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';
  import moment from 'moment'
  export default {
    data() {
      return {
        post: {},
        show: true,
        editor: ClassicEditor,
        stringTags: '',
        editorData: '<p></p>',
        editorConfig: {
            // The configuration of the rich-text editor.
        },
        datepickerConfig: {
          format: 'MM/DD/YYYY HH:mm',
          useCurrent: false,
        }
      }
    },
    async mounted()
    {
        if(this.$route.params.id){
            this.post = await Post.find(this.$route.params.id)
            let tags = JSON.parse(this.post.tags);
            this.stringTags = tags.join(', ')
        } else {
            this.post = new Post({})
        }
    },
    methods: {
      async onSubmit(evt) {
        evt.preventDefault()
        this.post.tags = this.stringTags
        if(!this.post.author){
            this.post.user_id = this.$auth.user().id;
        }
        this.post.published_date = moment(this.post.published_date,'MM/DD/YYYY HH:mm').format('YYYY/MM/DD HH:mm:ss')
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
      },
      async deletePost() {
        await this.post.delete()
        this.$router.replace('/');

      }
    },
    components: {
      datePicker
    }
  }
</script>
