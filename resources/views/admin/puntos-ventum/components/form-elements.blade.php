<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.puntos-ventum.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.puntos-ventum.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('direccion'), 'has-success': fields.direccion && fields.direccion.valid }">
    <label for="direccion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.puntos-ventum.columns.direccion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.direccion" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('direccion'), 'form-control-success': fields.direccion && fields.direccion.valid}" id="direccion" name="direccion" placeholder="{{ trans('admin.puntos-ventum.columns.direccion') }}">
        <div v-if="errors.has('direccion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('direccion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descripcion'), 'has-success': fields.descripcion && fields.descripcion.valid }">
    <label for="descripcion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.puntos-ventum.columns.descripcion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descripcion" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descripcion'), 'form-control-success': fields.descripcion && fields.descripcion.valid}" id="descripcion" name="descripcion" placeholder="{{ trans('admin.puntos-ventum.columns.descripcion') }}">
        <div v-if="errors.has('descripcion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descripcion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('codigo postal'), 'has-success': fields.codigo postal && fields.codigo postal.valid }">
    <label for="codigo postal" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.puntos-ventum.columns.codigo postal') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.codigo postal" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('codigo postal'), 'form-control-success': fields.codigo postal && fields.codigo postal.valid}" id="codigo postal" name="codigo postal" placeholder="{{ trans('admin.puntos-ventum.columns.codigo postal') }}">
        <div v-if="errors.has('codigo postal')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('codigo postal') }}</div>
    </div>
</div>


