import React, { Component } from 'react';
import { connect } from 'react-redux';

import BlockOrLoader from "../components/ui/BlockOrLoader";
import ListRow from "../components/list/ListRow";

class List extends Component {
  render() {
    const { visible, loading, items } = this.props;

    if (!visible) {
      return null;
    }

    return (
        <div className="box box-primary">
          <div className="box-body">
            <BlockOrLoader loading={loading}>
              <table className="table-list">
                <thead>
                <tr>
                  <th className="cell-onliner">Onliner.Каталог</th>
                  <th className="cell-catalog">Товар</th>
                </tr>
                </thead>
                <tbody>
                {items.map(model => <ListRow model={model} key={model.id} />)}
                </tbody>
              </table>
            </BlockOrLoader>
          </div>
        </div>
    );
  }
}

function mapStateToProps(state) {
  return {
    visible: state.list.visible,
    items: state.list.items,
    loading: state.list.loading,
  }
}

export default connect(mapStateToProps, {})(List);