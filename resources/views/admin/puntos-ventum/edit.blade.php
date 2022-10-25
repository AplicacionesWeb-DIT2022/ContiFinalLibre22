@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.puntos-ventum.actions.edit', ['name' => $puntosVentum->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <puntos-ventum-form
                :action="'{{ $puntosVentum->resource_url }}'"
                :data="{{ $puntosVentum->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.puntos-ventum.actions.edit', ['name' => $puntosVentum->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.puntos-ventum.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </puntos-ventum-form>

        </div>
    
</div>

@endsection