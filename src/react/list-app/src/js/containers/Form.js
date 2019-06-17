import React, { Component } from 'react';
import { connect } from 'react-redux';

import { init } from "../ducks/form";
import BlockOrLoader from "../components/ui/BlockOrLoader";
import { Formik } from "formik";
import FilterFormView from "../components/filter/FilterFormView";

class Form extends Component {
  componentWillMount() {
    const { init } = this.props;

    init();
  }

  render() {
    return (
        <div className="box box-primary">
          <div className="box-body">
            <BlockOrLoader loading={this.props.loading}>
              <Formik onSubmit={this.onSubmit.bind(this)}>
                {({ values, handleChange, handleSubmit }) => (
                    <form onSubmit={handleSubmit}>
                      <FilterFormView values={values} handleChange={handleChange} />
                    </form>
                )}
              </Formik>
            </BlockOrLoader>
          </div>
        </div>
    );
  }

  onSubmit(values) {
    console.log(values)
  }
}

function mapStateToProps(state) {
  return {
    loading: state.form.loading
  }
}

export default connect(mapStateToProps, { init })(Form);