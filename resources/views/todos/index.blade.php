@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="col-10"></div>
    <div class="card">

        <div class="card-header bg-dark text-white d-flex align-items-center justify-content-between">
            <div class="col-11">
                Things to do
            </div>
            <div class="col-1">

                <a href="/todos/create">
                    <button type="button" class="btn btn-primary d-flex align-items-center">
                        <i class="fas fa-plus text-white mr-1"></i>
                        Add</button></a>
            </div>
        </div>

        @if(count($todos)>0)
        <table id="deadline" class="table table-sm mb-0 penultimate-column-right">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Time Left in Minutes/Deadline</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="append">
                <tr>
                  
                   
                </tr>
               
                
            </tbody>
        </table>
        @endif

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>
    <script type="text/javascript">
        var tz = moment.tz.guess();
        var date = {!! json_encode($date, JSON_HEX_TAG) !!}
        var title = {!! json_encode($title, JSON_HEX_TAG) !!}
        var desc = {!! json_encode($desc, JSON_HEX_TAG) !!}
        var id = {!! json_encode($id, JSON_HEX_TAG) !!}
        var complete = {!! json_encode($complete, JSON_HEX_TAG) !!}
        console.log(tz);
        
        var value = new Array () ;
        //var date1 = new Date('2022-03-29T00:05');
        //console.log(date1.toUTCString());
        
        for (let i = 0; i < date.length; i++) {
            
           if(complete[i]=="1"){
            var status = "Completed"
           }else{
               status = "Not Completed"
           }
            //console.log(date[i]);
            var current = new Date(date[i]); 
            $("#append").append("<tr><td>"+title[i]+"</td><td>"+desc[i]+"</td><td>"+current.toTimeString()+"</td><td>"+status+"</td>   <td> <a href='/todoss/"+id[i]+"/edit' class='btn btn-success'><i class='far fa-edit text-white'>Edit</a></i></td><td> <a href='/todoss/"+id[i]+"' class='btn btn-danger'><i class='far fa-edit text-white'>Delete</a></i></td></tr>    ")

            
               
               
    }
  
   // var tbody = $("#deadline tbody"),
    //props = ['value'];
    //$.each(value,function(i,dead){
     //   var tr = $('<tr>');
        //$.each(props,function(i,prop){
        //   $('<td>').html(value[prop]).appendTo(tr);
        //});
        //tbody.append(tr);
    //});
   </script>

@endsection