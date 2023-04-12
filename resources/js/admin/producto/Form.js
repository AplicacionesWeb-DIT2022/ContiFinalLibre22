import AppForm from '../app-components/Form/AppForm';

Vue.component('producto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descripcion:  '' ,
                tipo:  '' ,
                precio:  '' ,
                cantidad:  '' ,
                
            },
            mediaCollections: ['gallery_producto']
        }
    }
});