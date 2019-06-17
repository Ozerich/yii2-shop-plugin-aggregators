import React, { Component } from 'react';
import { connect } from "react-redux";
import { disconnect } from "../../ducks/list";

class ListRowSelected extends Component {
  render() {
    const { model } = this.props;

    return (
        <div className="list-row__selected">
          <span className="list-row__selected-name"> {model.name}</span>
          <a href="#" onClick={this.onDisconnect.bind(this)}>X</a>
        </div>
    );
  }

  onDisconnect(e) {
    e.preventDefault();

    this.props.disconnect(this.props.onlinerModel.id);
  }
}

export default connect(null, { disconnect })(ListRowSelected);