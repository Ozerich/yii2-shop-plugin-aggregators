import React, { Component } from 'react';

class ListRowSearchDropdownItem extends Component {
  render() {
    const { model } = this.props;

    return (
        <div className="item-search__dropdown-item" onClick={this.onSelect.bind(this)}>
          {model.name}
        </div>
    );
  }

  onSelect() {
    this.props.onSelect();
  }
}

export default ListRowSearchDropdownItem;