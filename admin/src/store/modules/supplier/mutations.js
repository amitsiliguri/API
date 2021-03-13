export const RESET_SUPPLIER_FORM = (state) => {
    state.form.status                   = 'Active';
    state.form.legal_name               = "";
    state.form.register_number          = "";
    state.form.email                    = "";
    state.form.phone                    = "";

    state.form.address.building_name    = "";
    state.form.address.floor            = "";
    state.form.address.street           = "";
    state.form.address.landmark         = "";
    state.form.address.city             = "";
    state.form.address.state            = "";
    state.form.address.country          = "";
    state.form.address.zip              = "";
    state.form.address.phone            = "";

    state.form.contact_person.job_title     = "";
    state.form.contact_person.prefix        = "";
    state.form.contact_person.first_name    = "";
    state.form.contact_person.middle_name   = "";
    state.form.contact_person.last_name     = "";
    state.form.contact_person.email         = "";
    state.form.contact_person.phone         = "";
    state.form.contact_person.gender        = "";
};