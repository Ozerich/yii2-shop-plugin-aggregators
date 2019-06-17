import BaseService from './base';

export default class CommonService extends BaseService {
  connect(onlinerSectionId, onlinerManufactureId, onlinerProductId, productId) {
    return this.post('/plugin/onliner/connect', {
      section_id: onlinerSectionId,
      manufacture_id: onlinerManufactureId,
      product_id: onlinerProductId,
      model_id: productId
    });
  }

  disconnect(onlinerProductId) {
    return this.post('/plugin/onliner/disconnect', { id: onlinerProductId });
  }

  connections(onlinerSectionId, onlinerManufactureId) {
    return this.query('/plugin/onliner/connections?section_id=' + onlinerSectionId + '&manufacture_id=' + onlinerManufactureId, {
      section_id: onlinerSectionId,
      manufacture_id: onlinerManufactureId
    });
  }

}

