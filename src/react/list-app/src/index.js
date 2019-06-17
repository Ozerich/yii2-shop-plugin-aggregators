import React from 'react';
import ReactDOM from 'react-dom';

import App from './js/App';
import './scss/index.scss';

const nodeElement = document.getElementById('react-app-list');
ReactDOM.render(<App />, nodeElement);
