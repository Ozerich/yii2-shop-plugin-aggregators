import { combineReducers } from 'redux';

import list from './ducks/list';
import form from './ducks/form';

const rootReducer = combineReducers({
  list,
  form,
});

export default rootReducer;