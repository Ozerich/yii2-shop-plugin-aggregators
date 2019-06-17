import { combineReducers } from 'redux';

import form from './ducks/form';

const rootReducer = combineReducers({
  form
});

export default rootReducer;