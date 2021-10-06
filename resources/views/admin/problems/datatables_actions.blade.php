{!! Form::open(['route' => ['admin.problems.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
   <a href="{{ route('admin.problems.show', $id) }}"title="Show" class='btn btn-primary  btn-xs'>
        <i class="mdi mdi-note-outline"></i>
    </a>
    <a href="{{ route('admin.problems.edit', $id) }}" title="Edit" class='btn btn-warning btn-xs'>
        <i class="mdi mdi-border-color"></i>
    </a>
    {!! Form::button('<i class="mdi mdi-close"></i>', [
        'title' => 'Delete',
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure to Delete?')"
    ]) !!}
</div>
{!! Form::close() !!}
