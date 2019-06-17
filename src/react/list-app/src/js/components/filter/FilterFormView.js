import React, { Component } from 'react';
import { connect } from "react-redux";
import FormSelect from '../form/FormSelect';

import { changeManufacture, changeSection } from "../../ducks/form";

class FilterFormView extends Component {
  render() {
    const { values, sections, manufactures, loadingManufactures } = this.props;

    return (
        <div className="row">
          <div className="col-xs-6">
            <FormSelect id="section_id" name="section_id" label="Категория" value={values.section_id}
                        handleChange={this.onSectionChange.bind(this)}
                        placeholder="Выберите категорию"
                        items={sections} />
          </div>
          {values.section_id && !loadingManufactures ? <div className="col-xs-6">
            <FormSelect id="manufacture_id" name="manufacture_id" label="Производитель"
                        handleChange={this.onManufactureChange.bind(this)}
                        placeholder="Выберите производителя"
                        items={manufactures} />
          </div> : null}
        </div>
    );
  }

  onSectionChange(e) {
    this.props.handleChange(e);
    this.props.changeSection(e.target.value);
  }

  onManufactureChange(e) {
    this.props.handleChange(e);
    this.props.changeManufacture(e.target.value);
  }
}

function mapStateToProps(state) {
  return {
    sections: state.form.sections,
    manufactures: state.form.manufactures,
    loadingManufactures: state.form.loadingManufactures
  }
}

export default connect(mapStateToProps, { changeManufacture, changeSection })(FilterFormView);