@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.mercaderium.actions.edit', ['name' => $mercaderium->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <mercaderium-form
                :action="'{{ $mercaderium->resource_url }}'"
                :data="{{ $mercaderium->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.mercaderium.actions.edit', ['name' => $mercaderium->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.mercaderium.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </mercaderium-form>

        </div>
    
</div>

@endsection