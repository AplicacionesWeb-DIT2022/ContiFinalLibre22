import AppForm from '../app-components/Form/AppForm';

Vue.component('producto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descripcion:  '' ,
                tipo:  '' ,
                urlimagen: '' ,
                precio:  '' ,
                cantidad:  '' ,
                title:  this.getLocalizedFormDefaults(),
                perex:  this.getLocalizedFormDefaults()
            },
            mediaCollections: ['gallery']
        }
    }
}); 