<form method="POST"
      action="{{ route('categories.makeChildrenOf', [$category->id]) }}"
>
    {{ method_field('patch') }}

    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8">
            {!! app('App\Utilities\NestedSelect')->name('parent_id')->categories($categories_list)->selected($category)->render($firstEmptyNode = true) !!}
        </div>
        <div class="col-md-4">
            <button class="btn btn-default btn-xs" type="submit"><i
                        class="fa fa-save"></i>
            </button>
        </div>
    </div>
</form>