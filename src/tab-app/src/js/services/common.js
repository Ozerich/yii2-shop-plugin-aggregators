import BaseService from './base';

export default class FieldService extends BaseService {
  sections() {
    return this.query('/sections');
  }
}

