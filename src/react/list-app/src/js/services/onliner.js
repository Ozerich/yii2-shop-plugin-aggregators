import BaseService from './base';

export default class OnlinerService extends BaseService {
  sections() {
    return this.query('/sections');
  }

  manufactures(section) {
    return this.query('/manufactures?section=' + section);
  }

  products(section, manufacture) {
    return this.query('/products?section=' + section + '&manufacture=' + manufacture);
  }
}

