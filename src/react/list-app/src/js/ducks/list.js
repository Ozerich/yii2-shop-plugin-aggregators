import OnlinerService from '../services/onliner';
import ProductsService from '../services/products';
import CommonService from '../services/common';

const service = new OnlinerService;
const productsService = new ProductsService;
const commonService = new CommonService;

const _REQUEST = '_REQUEST';
const _SUCCESS = '_SUCCESS';
const _FAILURE = '_FAILURE';

const INIT = 'list:INIT';
const LOAD_PRODUCTS = 'list:LOAD_PRODUCTS';
const SET_ACTIVE_ID = 'list:SET_ACTIVE_ID';
const SET_ACTIVE_QUERY = 'list:SET_ACTIVE_QUERY';
const SEARCH = 'list:SEARCH';
const SELECT = 'list:SELECT';
const DISCONNECT = 'list:DISCONNECT';

const initialState = {
  visible: false,

  sectionId: null,
  manufactureId: null,

  loading: false,
  error: null,
  items: [],

  activeItemId: null,
  activeSearchQuery: '',

  selected: {},

  searchLoading: false,
  searchResults: null,
};

export default function reducer(state = initialState, action = {}) {
  switch (action.type) {

    case INIT:
      return { ...state, manufactureId: action.payload.manufactureId, sectionId: action.payload.sectionId };

    case LOAD_PRODUCTS + _REQUEST:
      return { ...state, loading: true, visible: true };
    case LOAD_PRODUCTS + _SUCCESS:
      const selected = {};
      action.payload.connections.forEach(item => selected[item.onliner_id] = item.model);
      return { ...state, loading: false, items: action.payload.products, selected: selected };
    case LOAD_PRODUCTS + _FAILURE:
      return { ...state, loading: false, error: action.error };

    case SET_ACTIVE_QUERY:
      return { ...state, activeSearchQuery: action.payload.value };
    case SET_ACTIVE_ID:
      return {
        ...state,
        activeItemId: action.payload.value,
        activeSearchQuery: '',
        searchLoading: false,
        searchResults: []
      };

    case DISCONNECT:
      const newSelected = {};
      Object.keys(state.selected).forEach(id => {
        if (+id !== action.payload.id) {
          newSelected[id] = state.selected[id];
        }
      });

      return { ...state, selected: newSelected };

    case SEARCH + _REQUEST:
      return { ...state, searchLoading: true, searchResults: [] };
    case SEARCH + _SUCCESS:
      return { ...state, searchLoading: false, searchResults: action.payload };

    case SELECT:
      return {
        ...state,
        activeSearchQuery: '',
        searchLoading: false,
        searchResults: [],
        selected: {
          ...state.selected, [action.payload.id]:
          action.payload.model
        }
      };

    default:
      return state;
  }
}

export function loadProducts(sectionId, manufactureId) {
  return dispatch => {

    dispatch({
      type: LOAD_PRODUCTS + _REQUEST,
    });

    dispatch({
      type: INIT,
      payload: {
        sectionId, manufactureId
      }
    });

    service.products(sectionId, manufactureId).then(data => {
      commonService.connections(sectionId, manufactureId).then(connectionsData => {
        dispatch({
          type: LOAD_PRODUCTS + _SUCCESS,
          payload: {
            products: data,
            connections: connectionsData
          }
        });
      });

    }).catch(error => {
      dispatch({
        type: LOAD_PRODUCTS + _FAILURE,
        error
      });
    });
  };
}

export function setActiveId(value) {
  return {
    type: SET_ACTIVE_ID,
    payload: {
      value
    }
  }
}

export function setActiveQuery(value) {
  return {
    type: SET_ACTIVE_QUERY,
    payload: {
      value
    }
  }
}

export function search(itemId, query) {
  return (dispatch, getState) => {
    if (getState().list.activeItemId !== itemId) {
      return;
    }

    dispatch({
      type: SEARCH + _REQUEST,
    });

    productsService.search(query).then(data => {
      dispatch({
        type: SEARCH + _SUCCESS,
        payload: data
      });
    });
  };
}

export function select(id, model) {
  return (dispatch, getState) => {
    dispatch({
      type: SELECT,
      payload: {
        id, model
      }
    });

    commonService.connect(getState().list.sectionId, getState().list.manufactureId, id, model.id);
  };
}

export function disconnect(id) {
  return dispatch => {
    dispatch({
      type: DISCONNECT,
      payload: { id }
    });

    commonService.disconnect(id);
  };
}