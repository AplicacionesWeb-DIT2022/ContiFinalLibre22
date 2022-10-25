import AppForm from '../app-components/Form/AppForm';

Vue.component('puntos-ventum-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                direccion:  '' ,
                descripcion:  '' ,
                codigo_postal:  '' ,
                
            }
        }
    }

});