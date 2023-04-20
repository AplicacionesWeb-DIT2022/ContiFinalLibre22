import AppForm from '../app-components/Form/AppForm';

Vue.component('mercaderium-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descripcion:  '' ,
                detalle:  '' ,
                urlimagen:  '' ,
                tipo:  '' ,
                precio:  '' ,
                cantidad:  '' ,
                
            }
        }
    }

});