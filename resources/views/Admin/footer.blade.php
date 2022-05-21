@extends("layouts.admin_layout")


@section('content')
@if($footer_count<1 )
<button class="btn btn-primary float-right mr-5"  data-toggle="modal" data-target="#exampleModal">Add</button>
@endif
<center>
<table class="table" style="background-color:white;margin-top:40px;width:50%;border-radius:5px;">
  <thead>
    <tr>
      <th scope="col">footer text</th>
     

      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($footers as $footer)
    <tr>
      <th scope="row">{{ $footer->footer_text }}</th>
     
      <td>
          <a href="{{ route('admin_delete_footer',$footer->id) }}" class="btn btn-danger">Slett</a>
      </td>

    </tr>
  @endforeach

  </tbody>
</table>
</center>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Footer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin_add_footer') }}" method="post">
            @csrf
            <input type="text" name="footer_text" id="" placeholder="Footer Text" class="form-control">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection