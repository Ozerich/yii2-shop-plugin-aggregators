import React, { Component } from 'react';
import { connect } from "react-redux";
import FormSelect from '../form/FormSelect';

class FilterFormView extends Component {
  render() {
    const { handleChange, values, sections } = this.props;

    return (
        <div className="row">
          <div className="col-xs-6">
            <FormSelect id="section_id" name="section_id" label="Категория" handleChange={handleChange}
                        placeholder="Выберите категорию"
                        items={sections} />
          </div>
        </div>
    );
  }
}

function mapStateToProps(state) {
  return {
    sections: state.form.sections
  }
}

export default connect(mapStateToProps)(FilterFormView);