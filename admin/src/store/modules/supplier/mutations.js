export const RESET_SUPPLIER_FORM = (state) => {
    state.form.id                           = null;
    state.form.status                       = 'Active';
    state.form.legal_name                   = "";
    state.form.register_number              = "";
    state.form.email                        = "";
    state.form.phone                        = "";

    state.form.address.building_name        = "";
    state.form.address.floor                = "";
    state.form.address.street               = "";
    state.form.address.landmark             = "";
    state.form.address.city                 = "";
    state.form.address.state                = "";
    state.form.address.country              = "";
    state.form.address.zip                  = "";
    state.form.address.phone                = "";

    state.form.contact_person.job_title     = "";
    state.form.contact_person.prefix        = "";
    state.form.contact_person.first_name    = "";
    state.form.contact_person.middle_name   = "";
    state.form.contact_person.last_name     = "";
    state.form.contact_person.email         = "";
    state.form.contact_person.phone         = "";
    state.form.contact_person.gender        = "";
};

export const SUPPLIER_TABLE_LOADING = (state) => {
    state.loading = !state.loading;
};

export const SET_SUPPLIER = (state, data) => {
    state.data = data.data;
};

export const SET_SUPPLIER_TABLE_OPTIONS = (state, data) => {
    state.options.page = data.page;
    state.options.itemsPerPage = data.itemsPerPage;
  };

export const SET_SUPPLIER_FORM_DATA = (state, data) => {
    state.form.id                           = data.id;
    state.form.status                       = data.status;
    state.form.legal_name                   = data.legal_name;
    state.form.register_number              = data.register_number;
    state.form.email                        = data.email;
    state.form.phone                        = data.phone;

    state.form.address.building_name        = data.address[0].building_name;
    state.form.address.floor                = data.address[0].floor;
    state.form.address.street               = data.address[0].street;
    state.form.address.landmark             = data.address[0].landmark;
    state.form.address.city                 = data.address[0].city;
    state.form.address.state                = data.address[0].state;
    state.form.address.country              = data.address[0].country;
    state.form.address.zip                  = data.address[0].zip;
    state.form.address.phone                = data.address[0].phone;

    state.form.contact_person.job_title     = data.contact_person[0].job_title;
    state.form.contact_person.prefix        = data.contact_person[0].prefix;
    state.form.contact_person.first_name    = data.contact_person[0].first_name;
    state.form.contact_person.middle_name   = data.contact_person[0].middle_name;
    state.form.contact_person.last_name     = data.contact_person[0].last_name;
    state.form.contact_person.email         = data.contact_person[0].email;
    state.form.contact_person.phone         = data.contact_person[0].phone;
    state.form.contact_person.gender        = data.contact_person[0].gender;
};