import React, { Component } from 'react';
import { connect } from 'react-redux';
import BlockOrLoader from "../ui/BlockOrLoader";
import ListRowSearchDropdownItem from "./ListRowSearchDropdownItem";

import { select } from "../../ducks/list";

class ListRowSearchDropdown extends Component {
  render() {
    const { loading, results } = this.props;

    if (!loading && !results) {
      return null;
    }

    return (
        <div className="item-search__dropdown">
          <BlockOrLoader loading={this.props.loading}>
            {results.map(model => <ListRowSearchDropdownItem model={model} key={model.id}
                                                             onSelect={() => this.onSelect(model)} />)}
          </BlockOrLoader>
        </div>
    );
  }

  onSelect(model) {
    this.props.select(this.props.model.id, model);
  }
}

function mapStateToProps(state, ownProps) {
  return {
    loading: state.list.searchLoading,
    results: state.list.searchResults,
  }
}

export default connect(mapStateToProps, { select })(ListRowSearchDropdown);