<form method="POST" action="{{ route('categories.up', [$category->id]) }}"
      class="inline">
    {{ method_field('patch') }}

    {{ csrf_field() }}
    <button class="btn btn-default btn-xs" type="submit"><i
                class="fa fa-arrow-up"></i>
    </button>
</form>

<form method="POST" action="{{ route('categories.down', [$category->id]) }}"
      class="inline">
    {{ method_field('patch') }}

    {{ csrf_field() }}
    <button class="btn btn-default btn-xs" type="submit"><i
                class="fa fa-arrow-down"></i>
    </button>
</form>