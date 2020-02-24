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
                  <div class="col-lg-12 col-sm-12 col-md-12">
                  <div class="row">
                  <div class="col-lg-12 col-sm-12 col-md-12" style="padding: 20px;">
                      <h2>Sales Activity Overview
                       <a href="{{ url('crm/exportcharts') }}/xlsx"  class="btn btn-outline-inverse-info btn-lg" style="float: right;">Export</a></h2>
                        <br><hr>
                  </div><br><br>

                  <div class="col-lg-12 col-sm-12 col-md-12" style="padding: 10px;">
                      <h4>Refine by:</h4>
                  </div><br><br>
                  <div class="form-group col-lg-2 col-sm-2 col-md-2">
                  <input type="text" name="from_date" id="from_date" class="form-control"  placeholder="Date From">
                  </div>
                  <div class="form-group col-lg-2 col-sm-2 col-md-2">
                  <input type="text" name="to_date" id="to_date" class="form-control"  placeholder="Date To">
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
                      <option value="0"> -- Select Region --</option>
                      @foreach ($regions as $key => $value)
                          <option value="{{ $value->hl_ms_r_id }}">{{ $value->hl_regional_name }}</option>
                      @endforeach 
                  </select>
                  </div>
                  </div>
                  </div><br><br>
                  <!-- <h4 class="card-title">Pie chart</h4> -->
                  <div class="col-lg-6 col-sm-6 col-md-6">
                  <canvas id="pieChart1"></canvas>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6">


                  </div><br><br>
<div class="col-lg-12 col-sm-12 col-md-12" style="overflow-x:auto;">
<table class="table table-bordered">
  <thead>
    <tr bgcolor="#F6F3F3">
      <th>S.No</th>
      <th>Date</th>
      <th>Account Name</th>
      <th>Activity Type</th>
      <th>Region</th>
      <th>APLBC Sales Team</th>
      <th>Out Come</th>
      <th>Next Steps</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>
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

        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var task_type = $("#task_type option:selected").val();
        var user_id = $("#user_id option:selected").val();
        var region_id = $("#region_id option:selected").val();
        var CSRF_TOKEN = "{{ csrf_token() }}";
        var host="{{ url('crm/getcharts/') }}"; 

        $.ajax({
        type: 'POST',
        data:{'from_date': from_date,'to_date': to_date,'task_type': task_type,'user_id': user_id,'region_id': region_id,'_token':CSRF_TOKEN},
        url: host,
        dataType: "json", // data type of response    
        success:rendergetcharts,
        error:function(){
         // alert('Data not set...');
        }

        })
    });
var pieChart;

    function rendergetcharts(res){
        var dataarray = res.data;
        var labelsarray = res.labels;
        var chart_data = res.chart_all_data;
console.log(chart_data);
var res='';
            $.each (chart_data, function (key, value) {
              var sno = key+1;
            res +=
            '<tr>'+
                '<td>'+sno+'</td>'+
                '<td>'+value.created_at+'</td>'+
                '<td>'+value.accountName+'</td>'+
                '<td>'+value.task_name+'</td>'+
                '<td>'+value.region+'</td>'+
                '<td>'+value.sales_team+'</td>'+
                '<td>'+value.out_come+'</td>'+
                '<td>'+value.next_steps+'</td>'+
           '</tr>';

   });
$('tbody').html(res);

  
        var doughnutPieData1 = {
            datasets: [{
              data: dataarray,
              backgroundColor: [
                'rgba(0, 255, 255, 0.5)',
                'rgba(0, 0, 255, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(128, 0, 128, 0.5)',
                'rgba(128, 0, 0, 0.5)',
                'rgba(128, 128, 0, 0.5)'
              ],
              borderColor: [
                'rgba(0, 255, 255, 0.1)',
                'rgba(0, 0, 255, 0.1)',
                'rgba(0, 128, 0, 0.1)',
                'rgba(128, 0, 128, 0.1)',
                'rgba(128, 0, 0, 0.1)',
                'rgba(128, 128, 0, 0.1)'
              ],
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: labelsarray,
          };

          var doughnutPieOptions1 = {
            responsive: true,
            animation: {
              animateScale: true,
              animateRotate: true,
            }
          };


          if ($("#pieChart1").length) {
            if(pieChart){
                pieChart.destroy();
            }
              var pieChartCanvas = $("#pieChart1").get(0).getContext("2d");
              pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: doughnutPieData1,
                options: doughnutPieOptions1
              });
          }
    }  


        $( function() {
            $( "#from_date" ).datepicker({
              dateFormat: 'yy-mm-dd',
              
            });
            $( "#to_date" ).datepicker({
              dateFormat: 'yy-mm-dd',
              
            });
        });

//         $('body').on('click',"#navbarDropdown", function(){
//         var menu=$(this).attr('aria-expanded')
// if(menu=='false'){ $(".dropdown-menu").css("display", "block");}else{
//   $(".dropdown-menu").css("display", "none");
// }
        
//       });

   
  </script>
</body>

</html>
@stop