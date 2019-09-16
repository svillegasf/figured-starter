import Model from './Model'
import User from './User'

export default class Post extends Model {
  resource()
  {
    return 'posts'
  }
}
