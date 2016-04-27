<a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-success btn-xs"><i
            class="fa fa-link"></i></a>
<a href="{{ route('admin.users.edit', $user->id) }}"
   class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
<form method="POST"
      action="{{ route('admin.users.destroy', [$user->id]) }}"
      class="inline">
    {{ method_field('delete') }}

    {{ csrf_field() }}
    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
</form>