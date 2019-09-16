import Model from './Model'

export default class Post extends Model {
  resource()
  {
    return 'posts'
  }

  posts () {
    return this.hasMany(Post)
  }
}
