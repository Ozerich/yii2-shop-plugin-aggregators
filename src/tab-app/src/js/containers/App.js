import React, { Component } from 'react';
import { connect } from 'react-redux';

import BlockOrLoader from '../components/ui/BlockOrLoader';

import { init } from "../ducks/common";


class App extends Component {
  componentWillMount() {
    const { init, productId } = this.props;

    init();
  }

  render() {
    console.log(this.props.sections);

    return (
        <BlockOrLoader loading={this.props.loading}>

        </BlockOrLoader>
    );
  }
}

function mapStateToProps(state) {
  return {
    loading: state.common.loading,
    sections: state.common.sections
  }
}

export default connect(mapStateToProps, { init })(App);