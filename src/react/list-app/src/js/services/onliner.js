import BaseService from './base';

export default class OnlinerService extends BaseService {
  sections() {
    return this.query('/plugin/onliner/sections');
  }

  manufactures(section) {
    return this.query('/plugin/onliner/manufactures?section=' + section);
  }

  products(section, manufacture) {
    return this.query('/plugin/onliner/products?section=' + section + '&manufacture=' + manufacture);
  }
}

