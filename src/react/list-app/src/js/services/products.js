import BaseService from './base';

export default class ProductsService extends BaseService {
  search(query) {
    return this.query('/products-api/search?query=' + query);
  }

}

