import React from 'react';
import ReactDOM from 'react-dom';

import App from './js/App';
import './scss/index.scss';

const nodeElement = document.getElementById('react-app-tab-onliner');

const productId = nodeElement.dataset['productId'];

ReactDOM.render(<App productId={productId} />, nodeElement);
