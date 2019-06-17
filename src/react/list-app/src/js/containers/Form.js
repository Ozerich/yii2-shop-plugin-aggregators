import React, { Component } from 'react';
import { connect } from 'react-redux';

import BlockOrLoader from "../components/ui/BlockOrLoader";
import { Formik } from "formik";
import FilterFormView from "../components/filter/FilterFormView";

import { init } from "../ducks/form";
import { loadProducts } from "../ducks/list";

class Form extends Component {
  componentWillMount() {
    const { init } = this.props;

    init();
  }

  render() {
    const { section, manufacture } = this.props;

    return (
        <div className="box box-primary">
          <div className="box-body">
            <BlockOrLoader loading={this.props.loading}>
              <Formik>
                {({ values, handleChange, handleSubmit }) => (
                    <form onSubmit={handleSubmit}>
                      <FilterFormView values={values} handleChange={handleChange} />
                    </form>
                )}
              </Formik>
            </BlockOrLoader>
          </div>
          {section && manufacture ? <div className="box-footer">
            <button className="btn btn-success" onClick={this.onSubmit.bind(this)}>Показать</button>
          </div> : null}
        </div>
    );
  }

  onSubmit(values) {
    this.props.loadProducts(this.props.section, this.props.manufacture);
  }
}

function mapStateToProps(state) {
  return {
    loading: state.form.loading,
    section: state.form.section,
    manufacture: state.form.manufacture,
  }
}

export default connect(mapStateToProps, { init, loadProducts })(Form);