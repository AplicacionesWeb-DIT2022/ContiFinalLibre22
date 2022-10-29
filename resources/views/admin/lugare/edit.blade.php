@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.lugare.actions.edit', ['name' => $lugare->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <lugare-form
                :action="'{{ $lugare->resource_url }}'"
                :data="{{ $lugare->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.lugare.actions.edit', ['name' => $lugare->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.lugare.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </lugare-form>

        </div>
    
</div>

@endsection