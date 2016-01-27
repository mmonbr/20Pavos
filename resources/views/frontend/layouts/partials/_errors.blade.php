@if ($errors->has())
    <div class="ui icon negative message">
        <i class="warning circle icon"></i>
        <i class="close icon"></i>

        <div class="content">
            <div class="header">
                Error!
            </div>
            <ul class="list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif