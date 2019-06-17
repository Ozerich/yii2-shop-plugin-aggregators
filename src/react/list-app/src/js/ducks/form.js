import OnlinerService from '../services/onliner';

const service = new OnlinerService;

const _REQUEST = '_REQUEST';
const _SUCCESS = '_SUCCESS';
const _FAILURE = '_FAILURE';

const LOAD_SECTIONS = 'LOAD_SECTIONS';

const initialState = {
  loading: false,
  sections: [],
  error: null
};

export default function reducer(state = initialState, action = {}) {
  switch (action.type) {

    case LOAD_SECTIONS + _REQUEST:
      return { ...state, loading: true };
    case LOAD_SECTIONS + _SUCCESS:
      return { ...state, loading: false, sections: action.payload };
    case LOAD_SECTIONS + _FAILURE:
      return { ...state, loading: false, error: action.error };

    default:
      return state;
  }
}

export function init() {
  return dispatch => {
    dispatch({
      type: LOAD_SECTIONS + _REQUEST
    });

    service.sections().then(data => {
      dispatch({
        type: LOAD_SECTIONS + _SUCCESS,
        payload: data
      });
    }).catch(error => {
      dispatch({
        type: LOAD_SECTIONS + _FAILURE,
        error
      });
    });
  };
}