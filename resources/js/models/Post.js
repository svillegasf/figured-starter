import Model from './Model'
import User from './User'
import moment from 'moment'

export default class Post extends Model {
  resource()
  {
    return 'posts'
  }

  publishedInfoText()
  {
      let authorinfo = (this.author) ? ' by '+this.author.name : '';
      let publishedDate = moment(this.published_date).format('ll')
      return (this.published_date) ? 'Published on '+publishedDate+authorinfo : ''
  }
}
