import React, { Component } from 'react';
import { connect } from 'react-redux';

import BlockOrLoader from '../components/ui/BlockOrLoader';

import Service from '../services/common';

const service = new Service;
service.test();

class App extends Component {
  componentWillMount() {
    const { init, categoryId } = this.props;
  }

  render() {
    return (
        <BlockOrLoader loading={this.props.loading}>

        </BlockOrLoader>
    );
  }
}

function mapStateToProps(state) {
  return { loading: true }
}

export default connect(mapStateToProps, {  })(App);