@extends('layout.app')
@section('content')
<!DOCTYPE html>
  <div class="card">
    <h1> create new task</h1>
  <div>
    <a style="margin: 19px;" class="btn btn-primary" href="/task/create">Create New Task</a>
  </div> 
  </div> 
  <div class="card mt-5 pt-5">
    <div class="container"> 
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>Name</th>
                  <th>Priority</th>
                  <th width=20% colspan = 2>Actions</th>
                  <th width="25%">timestamps</th>
                </tr>
              </thead>
              <tbody id="tablecontents">
                @foreach($posts as $post)
    	            <tr class="row1" data-id="{{ $post->id }}">                  
                    <td><a href="/task/{{$post->id}}">{{$post->name}}</a></td>
                    <td>{{$post->priority}}</td>
                    <td><a href="/task/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                    <td>
                      <a>  
                      {!!Form::open(['action' => ['TasksController@destroy', $post->id], 'method' => 'POST'])!!} 
                      {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                      {{Form::hidden('_method', 'DELETE')}}    
                      {!!Form::close()!!}
                      </a>
                    </td>
                    <td><strong>created on{{ $post->created_at}}<strong></td>
                  </tr>
                @endforeach
              </tbody>                  
            </table>
            </div>
            <hr>
    	</div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <script type="text/javascript">
      $(function () {
        $( "#tablecontents" ).sortable({
          connectWith: ".connectedSortable",
       
          update: function() {
              sendOrderToServer();
          }
        });

        function sendOrderToServer() {
          var order = [];
          var token = $('meta[name="csrf-token"]').attr('content');
          $('tr.row1').each(function(index,element) {
            order.push({
              id: $(this).attr('data-id'),
              position: index+1
            });
          });

          $.ajax({
            type: "POST", 
            dataType: "json", 
            url: "{{ url('post-sortable') }}",
                data: {
              order: order,
              _token: token
            },
            success: function(response) {
                if (response.status == "success") {
                  console.log(response);
                } else {
                  console.log(response);
                }
            }
          });
        }
      });
    </script>
@endsection