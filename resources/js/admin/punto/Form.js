import AppForm from '../app-components/Form/AppForm';

Vue.component('punto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});