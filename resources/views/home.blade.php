<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranban Card</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
</head>
<script>

$(function() {

            $( ".to_do" ).sortable({
              connectWith: ".done",
              receive: function( event, ui ) {
                
              },

            }).disableSelection();


            $( ".in_progress" ).sortable({
              connectWith: ".to_do",
              receive: function( event, ui, input ) {

              },

            }).disableSelection();



           
            $( ".in_progress" ).sortable({
                connectWith: ".done",
                receive: function( event, ui, input) {

                  var text=ui.item.text();
                  status=2;        
             
                  $.ajax({
                    type:'POST',
                    url:"{{ route('kanbancard.update') }}",
                    data:{status:status,content:text},
                    success:function(data){
                        console.log(data)
                       
                    }
                  });
                   
                },

            }).disableSelection();

            $( ".done" ).sortable({
              connectWith: ".in_progress",
              receive: function( event, ui, input ) {
                var text=ui.item.text(); 
                let status=3;

                $.ajax({
                    type:'POST',
                    url:"{{ route('kanbancard.update') }}",
                    data:{status:status,content:text},
                    success:function(data){
                        console.log(data);                        
                    }
                });
             
              },

            }).disableSelection();


            

            $( ".to_do" ).sortable({
              connectWith: ".in_progress",
                receive: function( event, ui) {                
             },

            }).disableSelection();



            function card(text) {
                return (
                    `<li class="card content-bg card-border">
                      <div>
                            <div class="card-body">`
                            +text+
                            `</div>
                      </div>
                    </li>`
                );
            }

        // Add new Ranban card
        $("#btn_submit").click(function(event) {
            let text = $("#content").val();
            $.ajax({
                    type:'POST',
                    url:"{{ route('kanbancard.store') }}",
                    data:{content:text},
                    success:function(data){
                        console.log(data)
                    
                    }
                    
            });

            $('#content').val("");
            $('div.content_text').find('ul').append(card(text));

        });
  
  });

</script>

<body>
    <div class="container">
            <div class="wrapper">
                <div class="row" style="padding: 40px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-6"><input class="form-control" id="content" type="text"></div>
                    <div class="col-md-4">
                        <button class="btn btn-info" id="btn_submit">Submit</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-border ">
                            <div class="card-header">To Do</div>
                            <div class="card-body content_text">
                              <ul class="content-body to_do">
                                @foreach($kanbans as $key=>$kanban)
                                    @if($kanban->status==1)                                   
                                    
                                    <li class="card content-bg card-border" value="{{ $kanban->id }}">
                                      <div>
                                          <div class="card-body">
                                              {{ $kanban->content }}
                                          </div>
                                      </div>
                                    </li>
                                      
                                    @endif
                                @endforeach
                              </ul>  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"> 
                        <div class="card card-border">
                            <div class="card-header">In Progress</div>
                            <div class="card-body">
                              <ul class="content-body in_progress">
                                @foreach($kanbans as $kanban)
                                    @if($kanban->status==2)
                                      
                                      <li class="card content-bg card-border" value="{{ $kanban->id }}">
                                        <div>
                                              <div class="card-body">
                                                  {{ $kanban->content }}
                                              </div>
                                        </div>
                                      </li>
                                    @endif
                                  @endforeach
                              </ul>  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-border">
                            <div class="card-header border-bottom">Done</div>
                            <div class="card-body " id="">
                              <ul class="content-body done">
                                @foreach($kanbans as $kanban)
                                    @if($kanban->status==3)
                                     
                                      <li class="card content-bg card-border" value="{{ $kanban->id }}">
                                        <div>
                                              <div class="card-body">
                                                  {{ $kanban->content }}
                                              </div>
                                        </div>
                                      </li>
                                    @endif
                                  @endforeach
                              </ul>                            
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>

        </div>
    </div>
</body>
</html>

