import OnlinerService from '../services/onliner';

const service = new OnlinerService;

const _REQUEST = '_REQUEST';
const _SUCCESS = '_SUCCESS';
const _FAILURE = '_FAILURE';

const LOAD_SECTIONS = 'LOAD_SECTIONS';
const LOAD_MANUFACTURES = 'LOAD_MANUFACTURES';

const CHANGE_SECTION = 'CHANGE_SECTION';
const CHANGE_MANUFACTURE = 'CHANGE_MANUFACTURE';

const initialState = {
  loading: false,
  sections: [],
  error: null,

  loadingManufactures: false,
  manufactures: [],

  section: null,
  manufacture: null
};

export default function reducer(state = initialState, action = {}) {
  switch (action.type) {

    case LOAD_SECTIONS + _REQUEST:
      return { ...state, loading: true };
    case LOAD_SECTIONS + _SUCCESS:
      return { ...state, loading: false, sections: action.payload };
    case LOAD_SECTIONS + _FAILURE:
      return { ...state, loading: false, error: action.error };

    case LOAD_MANUFACTURES + _REQUEST:
      return { ...state, loadingManufactures: true };
    case LOAD_MANUFACTURES + _SUCCESS:
      return { ...state, loadingManufactures: false, manufactures: action.payload };
    case LOAD_MANUFACTURES + _FAILURE:
      return { ...state, loadingManufactures: false, error: action.error };

    case CHANGE_SECTION:
      return { ...state, section: action.payload.value };

    case CHANGE_MANUFACTURE:
      return { ...state, manufacture: action.payload.value };

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

export function loadManufactures(sectionId) {
  return dispatch => {
    dispatch({
      type: LOAD_MANUFACTURES + _REQUEST
    });

    service.manufactures(sectionId).then(data => {
      dispatch({
        type: LOAD_MANUFACTURES + _SUCCESS,
        payload: data
      });
    }).catch(error => {
      dispatch({
        type: LOAD_MANUFACTURES + _FAILURE,
        error
      });
    });
  };
}

export function changeSection(value) {
  return dispatch => {
    dispatch({
      type: CHANGE_SECTION,
      payload: {
        value
      }
    });

    dispatch(loadManufactures(value));
  }
}

export function changeManufacture(value) {
  return {
    type: CHANGE_MANUFACTURE,
    payload: {
      value
    }
  }
}