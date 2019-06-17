import React, { Component } from 'react';
import { connect } from 'react-redux';

import { search, setActiveId, setActiveQuery } from "../../ducks/list";
import ListRowSearchDropdown from "./ListRowSearchDropdown";

class ListRowSearch extends Component {
  constructor(props) {
    super(props);

    this.timer = null;
  }

  render() {
    const { model } = this.props;

    return (
        <div className="item-search">
          <input type="text" className="item-search__input" value={this.props.isActive ? this.props.activeQuery : null}
                 placeholder="Поиск товара..."
                 onChange={this.onChange.bind(this)} onFocus={this.onFocus.bind(this)} />
          {this.props.isActive && this.props.activeQuery.length > 0 ? <ListRowSearchDropdown model={model} /> : null}
        </div>
    );
  }

  onChange(e) {
    if (this.timer) {
      clearTimeout(this.timer);
    }

    const query = e.target.value.trim();
    this.props.setActiveQuery(query);

    this.timer = setTimeout(() => {
      this.props.search(this.props.model.id, query);
    }, 200);
  }

  onFocus() {
    if (this.props.isActive === false) {
      this.props.setActiveId(this.props.model.id);
    }
  }
}

function mapStateToProps(state, ownProps) {
  return {
    isActive: state.list.activeItemId === ownProps.model.id,
    activeQuery: state.list.activeSearchQuery
  }
}

export default connect(mapStateToProps, { search, setActiveId, setActiveQuery })(ListRowSearch);