@extends('layouts.crm')

@section('head')

@stop

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/base/vendor.bundle.base.css') }}">
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

  <style>
      table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #F6F3F3;
      }

      th, td {
        text-align: left;
        padding: 8px;
        vertical-align: center;
        border: 1px solid #F6F3F3;
      }

      /*tr:nth-child(even) {background-color: #f2f2f2;}*/
      /*tr:hover {background-color:#f5f5f5;}*/
  </style>

</head>

<body>

  <div class="container-scroller">                       
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">

 



  <form id="" action="{{ url('crm/exportcharts') }}/xlsx" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">

        {{ csrf_field() }}

  <div class="col-lg-12 col-sm-12 col-md-12">
  <div class="row">
  <div class="col-lg-3 col-sm-3 col-md-3" style="padding: 20px;">
      <h2>Sales Activity Overview</h2>
        <br>
  </div><br><br>

  <!-- <div class="col-lg-12 col-sm-12 col-md-12" style="padding: 10px;">
      <h4>Refine by:<span style="margin-left: 20px;color:red;" id="resError"></span></h4>
  </div><br><br> -->

<?php
 $date = date("Y-m-d", strtotime("-30 days")); 
?>

<div class="col-lg-9 col-sm-9 col-md-9" style="margin-top: 12px;">
<div class="row">
  <div class="form-group col-lg-2 col-sm-2 col-md-2">
  <input type="text" name="from_date" id="from_date" value="<?= date('d-m-Y', strtotime('-30 days'))?>" class="form-control"  placeholder="Date From">
  </div>
  <div class="form-group col-lg-2 col-sm-2 col-md-2">
  <input type="text" name="to_date" id="to_date" class="form-control" value="<?= date('d-m-Y')?>"  placeholder="Date To">
  </div>
  <div class="form-group col-lg-2 col-sm-2 col-md-2">
  <select name="task_type" id="task_type" class="form-control  js-example-basic-single w-100" >
      <option value="0"> -- Select Activity --</option>
      @foreach ($task_type as $key => $value)
          <option value="{{ $value->hl_mt_id }}">{{ $value->task_name }}</option>
      @endforeach 
  </select>
  </div>
  <div class="form-group col-lg-2 col-sm-2 col-md-2">

  <select name="user_id" id="user_id" class="form-control  js-example-basic-single w-100" >
      <option value="0"> -- Select Admin --</option>
      @foreach ($users as $key => $value)
          <option value="{{ $value->id }}">{{ $value->first_name }}</option>
      @endforeach 
  </select>
  </div>
  <div class="form-group col-lg-2 col-sm-2 col-md-2">
   <select name="region_id" id="region_id" class="form-control  js-example-basic-single w-100" >
      <option value="0" id="regionId"> -- Select Region --</option>
      @foreach ($regions as $key => $value)
          <option value="{{ $value->hl_ms_r_id }}">{{ $value->hl_regional_name }}</option>
      @endforeach
  </select>
  </div>
  <div class="form-group col-lg-2 col-sm-2 col-md-2">
  <button type="submit" class="btn btn-outline-inverse-info btn-lg" >Export
</button>
  </div>
  <!--<div class="form-group col-lg-1 col-sm-1 col-md-1">
  <a class="btn btn-outline-inverse-info" onclick="dataRefresh()" ><i class="fa fa-refresh" aria-hidden="true" style="color:#425CC7"></i> </a>
</button>
  </div>-->
</div>
  </div>
</div><hr>
<h4><span style="margin-left: 20px;color:red;" id="resError"></span></h4>
  </div><br><br>
</form>






                  <!-- <h4 class="card-title">Pie chart</h4> -->
                  <div class="row">
                  <div class="col-lg-6 col-sm-10 col-md-6">
                  <canvas id="pieCharts"></canvas>
                  </div>
                  
                  <div class="col-lg-6 col-sm-12 col-md-6" >
                    <div class="row" id="regChart"></div>
                  
                  </div>

                </div><br><br>

                
<div class="col-lg-12 col-sm-12 col-md-12" style="overflow-x:auto;">
<table class="table table-bordered">
  <thead>
    <tr bgcolor="#F6F3F3">
      <th>S.No</th>
      <th>Date</th>
      <th>Account Name</th>
        <th>Client Type</th>
        <th>Consortia</th>
      <th>Activity Type</th>
      <th>Region</th>
      <th>APLBC Sales Team</th>
      <th>Outcome</th>
      <th>Next Step</th>
        <th>Notes</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>
</div>


<div id="mySecondDiv" class="hidden">
<div class="row">               
<div class="col-md-12 text-left"><a href="#notes_model" class="" data-toggle="modal" data-target="#notes_model"><i class="fa fa-edit fa-lg"></i></i>
</a></div>

</div>
<div id="notes_model" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->

<div class="modal-content">
<form id="commentForm" action="{{url('crm/hotels/updated')}}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="modal-header">
<h4 class="modal-title">Notes History</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">

<div class="row">
<div class="alert alert-success alert-success-offer hidden" role="alert">
</div>
<input type="hidden" id="hotel_id" name="hotel_id" value="">

<div class="col-md-12">
<div class="panel-collapse" id="collapseOne">
<div class="panel-body">
<ul class="chat"></ul>
</div>
<div class="panel-footer">
<div class="input-group">
<div class="col-lg-12">
<h4 class="modal-title">Action</h4>
<br/>
<div  class="form-group">
<select name="action" id="action" class="form-control js-example-basic-multiple w-100" style="width: 100%" >
<option value="0" >New lead</option>
<option value="1" >Contacted</option>
<option value="2" >Proposal sent</option>
<option value="3" >Not interested</option>
</select>
<span class="error erroroffer"></span>
</div>
<br/>
<div  class="form-group"><label>Notes</label>
<textarea name="lead_notes" id="lead_notes" value="" class="form-control tinymce" ></textarea>
</div> 
</div>
</div>
</div>
</div>
</div>

</div>

</div>
<div class="modal-footer">
<input type="submit" value="Update" style="width:auto" class="btn btn-primary" id="addstatus" ></input>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</form>
</div>

</div>
</div>
</div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


 
  <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/js/chart.js') }}"></script>
  <script type="text/javascript">

    $(document).ready(function(){
        $("#from_date").change();

    });

    $("#from_date,#to_date,#task_type,#user_id,#region_id").change(function () {

        var from_date1 = $('#from_date').val();
        var from_date2 = from_date1.split("-");
        var from_date = from_date2[2] + '-' + from_date2[1] + '-' + from_date2[0];

        var to_date1 = $('#to_date').val();
        var to_date2 = to_date1.split("-");
        var to_date = to_date2[2] + '-' + to_date2[1] + '-' + to_date2[0];
        var task_type = $("#task_type option:selected").val();
        var user_id = $("#user_id option:selected").val();
        var region_id = $("#region_id option:selected").val();
        var CSRF_TOKEN = "{{ csrf_token() }}";
        var host="{{ url('crm/getcharts/') }}"; 
        //var host1="{{ url('crm/getcolors/') }}"; 
//alert(to_date);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
        type: 'POST',
        data:{'from_date': from_date,'to_date': to_date,'task_type': task_type,'user_id': user_id,'region_id': region_id,'_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response    
        success:rendergetcharts,
        error:function(){
          $('#resError').html('Refine data not found...');
        }

        })
    });
var pieChart;
var pieChartReg;

    function rendergetcharts(res){
      console.log(res);
      $("#regChart").empty();
      $('#resError').html('');
        var dataarray = res.data;
        var colorsarray = res.task_color;
        var labelsarray = res.labels;
        var chart_data = res.chart_all_data;
        var colors = res.colors.task_color;
        var reg_data = res.reg_data;
        var reg_labels = res.reg_labels;
        var regionFullName = res.regionName;

       color_code = [];
      $.each(colorsarray, function(i, colour) {
            if(colour=='info'){
              // colors.push(colour);
              color_code.push('rgb(10, 215, 247)');
            }else if(colour=='danger'){
              color_code.push('rgb(245, 118, 118)');
            }else if(colour=='primary'){
              color_code.push('rgb(70, 77, 238)');
            }else if(colour=='success'){
              color_code.push('rgb(13, 219, 185)');
            }else if(colour=='warning'){
        color_code.push('rgb(252, 213, 59)');
      }else if(colour=='dark'){
        color_code.push('rgb(0, 23, 55)');
      }else if(colour=='pink'){
        color_code.push('rgb(255, 0, 128)');
      }else if(colour=='darkblue'){
        color_code.push('rgb(64, 64, 115)');
      }else if(colour=='orange'){
        color_code.push('rgb(255, 153, 0)');
      }else if(colour=='rose'){
        color_code.push('rgb(255, 128, 255)');
      }else if(colour=='gray'){
        color_code.push('rgb(92, 92, 61)');
      }else if(colour=='choco'){
        color_code.push('rgb(172, 96, 57)');
      }else if(colour=='violet'){
        color_code.push('rgb(102, 0, 53)');
      }else if(colour=='lightgreen'){
        color_code.push('rgb(128, 255, 170)');
      }else if(colour=='pair'){
        color_code.push('rgb(153, 153, 77)');
      }else if(colour=='agenta'){
        color_code.push('rgb(0, 77, 77)');
      }else if(colour=='red'){
        color_code.push('rgb(255, 0, 0)');
      }else if(colour=='lighty'){
        color_code.push('rgb(179, 179, 0)');
      }else if(colour=='sandal'){
        color_code.push('rgb(250, 243, 177)');
      }else if(colour=='light'){
        color_code.push('rgb(216, 216, 216)');
      }else if(colour=='darkagenta'){
        color_code.push('rgb(173, 14, 75)');
      }else if(colour=='lightvio'){
        color_code.push('rgb(164, 138, 230)');
      }else if(colour=='greenn'){
        color_code.push('rgb(43, 135, 80)');
      }else if(colour=='yellow'){
        color_code.push('rgb(235, 255, 10)');
      }else if(colour=='copy'){
        color_code.push('rgb(194, 162, 110)');
      }else if(colour=='greenq'){
        color_code.push('rgb(158, 255, 198)');
      }else if(colour=='grey'){
        color_code.push('rgb(125, 122, 123)');
      }else if(colour=='brinj'){
        color_code.push('rgb(130, 60, 105)');
      }else if(colour=='kili'){
        color_code.push('rgb(37, 250, 0)');
      }
           
          });
       
var res='';
            $.each (chart_data, function (key, value) {
              var sno = key+1;

if(typeof(value.accountName) != "undefined" && value.accountName !== null) {
  var accountName = value.accountName;
}else{
  var accountName = "";
}
var formDa = $('#mySecondDiv').html();
var urlData = "{{url('crm/hotels/salesUpdated')}}";
var countData = value.notes.length;
var i;
var text = '';
for (i = 0; i < countData; i++) {
  text += "<input type='textarea' value='"+value.notes[i]+"' readonly><br>";
}

var formData = '<div id="mySecondDiv" class=""><div class="row"><div class="col-md-12 text-left"><a href="#notes_model'+value.hle_id+'" class="" data-toggle="modal" data-target="#notes_model'+value.hle_id+'"><i class="fa fa-edit fa-lg"></i></i></a></div></div><div id="notes_model'+value.hle_id+'" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><form id="commentForm" action="'+urlData+'" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}"><div class="modal-header"><h4 class="modal-title">Notes History</h4><button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body"><div class="row"><div class="alert alert-success alert-success-offer hidden" role="alert"></div><input type="hidden" id="hotel_id" name="hotel_id" value="'+value.hle_id+'"><div class="col-md-12"><div class="panel-collapse" id="collapseOne"><div class="panel-body"><ul class="chat"></ul></div>'+text+'<div class="panel-footer"><div class="input-group"><div class="col-lg-12"><br/><div  class="form-group"><span class="error erroroffer"></span></div><br/><div  class="form-group"><label>Notes</label><textarea name="lead_notes" id="lead_notes" value="" class="form-control tinymce" ></textarea></div> </div></div></div></div></div></div></div><div class="modal-footer"><input type="submit" value="Update" style="width:auto" class="btn btn-primary" id="addstatus" ></input><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></form></div></div></div></div>';



            res +=
            '<tr>'+
                '<td>'+sno+'</td>'+
                '<td>'+value.created_at+'</td>'+
                '<td>'+accountName+'</td>'+
                    '<td>'+value.clientName+'</td>'+
                    '<td>'+value.consortiaName+'</td>'+
                '<td>'+value.task_name+'</td>'+
                '<td>'+value.region+'</td>'+
                '<td>'+value.sales_team+'</td>'+
                '<td>'+value.out_come+'</td>'+
                '<td>'+value.next_steps+'</td>'+
                '<td>'+formData+'</td>'+
           '</tr>';


   });
$('tbody').html(res);


$.each(reg_data, function(key,valueObj){

  var regionNames = regionFullName[key];
  var regName = '<div class="col-lg-6"><h3 class="text-center">'+regionNames+'</h3><canvas style="float:left;padding:20px" id="pieChart'+key+'"></canvas></div>';
  $("#regChart").append(regName);
  var chaData = reg_data[key];
  var chaLables = reg_labels[key];

  var doughnutPieDataReg = {
    datasets: [{
      data: chaData,
      backgroundColor: color_code,
      borderColor: color_code,
      }],
      labels:chaLables ,
  };

  var doughnutPieOptionsReg = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true,
    }
  };

  if ($("#pieChart"+key).length) {
    // if(pieChart){
    //     pieChart.destroy();
    // }
      var pieChartCanvasReg = $("#pieChart"+key).get(0).getContext("2d");
      pieChartReg = new Chart(pieChartCanvasReg, {
        type: 'pie',
        data: doughnutPieDataReg,
        options: doughnutPieOptionsReg
      });
  }
});



        
        var doughnutPieData1 = {
            datasets: [{
              data: dataarray,
              backgroundColor: color_code,
              borderColor: color_code,
            }],

            labels: labelsarray,
          };

          var doughnutPieOptions1 = {
            responsive: true,
            animation: {
              animateScale: true,
              animateRotate: true,
            }
          };


          if ($("#pieCharts").length) {
            if(pieChart){
                pieChart.destroy();
            }
              var pieChartCanvas = $("#pieCharts").get(0).getContext("2d");
              pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: doughnutPieData1,
                options: doughnutPieOptions1
              });
          }
    }  


        $( function() {
            $( "#from_date" ).datepicker({
              dateFormat: 'dd-mm-yy',
              
            });
            $( "#to_date" ).datepicker({
              dateFormat: 'dd-mm-yy',
              
            });
        });

   
  </script>

<script type="text/javascript">

    $('.select-change').click(function(){
    var regionId =  $(this).val();
    $('#regionId').val(regionId).trigger('change');

})
    function dataRefresh(){
      $('#from_date').val('');
      $('#to_date').val('');
      $('#task_type option').prop('selected', function() {
        return this.defaultSelected;
      });
      $('#user_id option').prop('selected', function() {
        return this.defaultSelected;
      });
      $('#region_id option').prop('selected', function() {
        return this.defaultSelected;
      });
      $("#from_date").change();
    }
</script>

</body>

</html>
@stop