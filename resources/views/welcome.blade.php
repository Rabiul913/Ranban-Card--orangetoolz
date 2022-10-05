<!doctype html>
<html lang="en">
<head>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
  <style>
  body {font-family:Arial;}
  h2 {margin:5px;}
  input[type=text] {margin:10px}
  input[type=button] {margin:10px}  
  .container {width: 20%; float:left;clear: right;margin:10px; border-radius: 5px;}
  .sortable { list-style-type: none; margin:0; padding:2px; min-height:30px; border-radius: 5px;}
  .sortable li { margin: 3px 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px;}
  .sortable li span { position: absolute; margin-left: -1.3em; }
 
  .card{background-color:white;border-radius:3px;}
  </style>
  <script>
  $(function() {
    $( ".sortable" ).sortable({
      connectWith: ".connectedSortable",
      receive: function( event, ui ) {
        $(this).css({"background-color":"blue"});
      }
    }).disableSelection();
    function card(text) {
        return (

            `<li class="card"><div class="card content-bg card-border mt-3">
                <div class="card-body">`
                    +text +
                `</div>
            </div></li>`
        );
    }
    $('.add-button').click(function() {
        var txtNewItem = $('#new_text').val();
        alert(txtNewItem);
        $('div.connectedSortable1').find('ul').append(card(txtNewItem));
    });    
  });
  </script>      
</head>
<body>
</body>
<div>
  <div class="row">
    <div class="link-div">
      <input type="text" id="new_text" value=""/>
      <input type="button" name="btnAddNew" value="Add" class="add-button"/>
    </div>
  </div>
<div class="container connectedSortable1" style="background-color:pink;">
<h2>TODO</h2>
<ul class="sortable connectedSortable">
  <li class="card">Activity A1</li>
  <li class="card">Activity A2</li>
  <li class="card">Activity A3</li>
</ul>

</div>
<div class="container" style="background-color:orange;">
<h2>In Progress</h2>
<ul class="sortable connectedSortable" >
  <li class="card">Activity B1</li>
  <li class="card">Activity B2</li>
</ul>
</div>
<div class="container" style="background-color:yellow;">
<h2>Verification</h2>
<ul class="sortable connectedSortable" >
  <li class="card">Activity C1</li>
  <li class="card">Activity C2</li>
</ul>
</div>
<div class="container" style="background-color:green;">
<h2>Done</h2>
<ul class="sortable connectedSortable" >
</ul>
</div>
</div>
</html>