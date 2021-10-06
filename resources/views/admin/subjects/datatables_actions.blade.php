{!! Form::open(['route' => ['admin.subjects.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
   <a href="{{ route('admin.subjects.show', $id) }}"title="Show" class='btn btn-primary  btn-xs'>
        <i class="mdi mdi-note-outline"></i>
    </a>
    <a href="{{ route('admin.subjects.edit', $id) }}" title="Edit" class='btn btn-warning btn-xs'>
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
