import React, { Component } from 'react';
import ListRowSearch from "./ListRowSearch";
import { connect } from "react-redux";
import ListRowSelected from "./ListRowSelected";

class ListRow extends Component {
  render() {
    const { model, selected } = this.props;

    return (
        <tr>
          <td>{model.label}</td>
          <td>
            {selected ? <ListRowSelected onlinerModel={model} model={selected} /> : <ListRowSearch model={model} />}
          </td>
        </tr>
    );
  }
}

function mapStateToProps(state, ownProps) {
  return {
    selected: ownProps.model.id in state.list.selected ? state.list.selected[ownProps.model.id] : null
  }
}

export default connect(mapStateToProps)(ListRow);