@if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="{{trans('views.general.popup_close_tooltip')}}">
            <span aria-hidden="true">×</span>
        </button>
        <strong>There were some problems with your request</strong> .
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif