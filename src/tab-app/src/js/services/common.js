import BaseService from './base';

export default class FieldService extends BaseService {
  test() {
    return this.query('/admin/plugin/?action=aggregators/test');
  }
}

