import AppForm from '../app-components/Form/AppForm';

Vue.component('productox-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});