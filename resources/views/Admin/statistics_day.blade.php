@extends('admin_layout')
@section('admin_content') 
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thông Kê Theo Ngày
                        </header> 
                        <div class="row w3-res-tb">
                        <div class="col-sm-3">
                            
                          <label for="birthday">Ngày bắt đầu:</label>
                            <input type="date" id="start_day" >
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group">
                              
                              <label for="birthday">Ngày kết thúc:</label>
                              <input type="date" id="end_day" >
                              <span class="input-group-btn">
                                <button class="btn btn-sm btn-default margin-top" onclick="Load()" type="button">Load</button>
                              </span>
                            </div>
                          </div>
                        </div>
    
                        <div class="panel-body">
                            <div class="position-center">
                                <canvas id="myChart"></canvas>
                            </div>  
                            <div class="position-center">
                                <label for="exampleInputEmail1" id="total_money"></a>
                                
                            </div>  
                            
                        </div>
                        

                    </section>
                    <?php
                        $data_order= array();
                        foreach($data as $key => $value)
                        {
                            array_push($data_order,$value);
                        }
                    ?>
                    <script>
                        // === include 'setup' then 'config' above ===
                        
                        
                        function Load()
                        {
                          var data = <?php echo json_encode($data_order) ?>;
                          var arr_header = [];
                          var arr_total_money=[];
                          const start_day_input = new Date( document.getElementById('start_day').value);
                          const end_day_input = new Date(document.getElementById('end_day').value);
                          
                          var sum_total_money = 0;
                          var start_time_order=new Date();
                          var time_Loop_for = start_day_input;
                          console.log("1");
                          console.log(time_Loop_for);
                          for(var index = 0; index < data.length ; index++)
                          {
                            start_time_order = new Date(format_day(new Date(data[index].NgayLap)));
                            console.log("2");
                            console.log(start_time_order);
                            console.log("3");
                            console.log(start_day_input);
                            console.log("4");
                            console.log(end_day_input);
                            if(start_day_input <= start_time_order && end_day_input >= start_time_order && time_Loop_for == start_time_order)
                            {
                              arr_header.push(start_time_order);
                              arr_total_money.push(sum_money(start_time_order,data));
                              
                              var nextDay = new Date(format_day(new Date(data[index].NgayLap)));
                              time_Loop_for= nextDay.setDate(day.getDate() + 1);
                              
                              sum_total_money+= sum_money(start_time_order,data)
                            }


                            
                          }
                          var labels = arr_header;
                          var data = {
                            labels: labels,
                            datasets: [{
                              label: 'Tổng Thành Tiền',   
                              backgroundColor: 'rgb(255, 99, 132)',
                              borderColor: 'rgb(255, 99, 132)',
                              data: arr_total_money,
                            }]
                          };

                          var config = {
                            type: 'bar',
                            data: data,
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                              }
                            },
                          };
                          var myChart = new Chart(
                              document.getElementById('myChart'),
                              config
                          );
                          document.getElementById('total_money').innerHTML= "Tổng Tiền:" + sum_total_money.toString();
                        }
                        function sum_money(day, arrdata)
                        {
                          var sum_money = 0;
                          var start_time_order= new Date();
                          for (let index = 0; index < arrdata.length; index++) {
                            start_time_order= new Date(format_day( new Date(arrdata[index].NgayLap)));
 
                            if(day == start_time_order)
                            {
                              sum_money += arrdata[index].TongThanhTien;
                            }
                            else
                              break;
                            
                          }
                          return sum_money;
                        }
                        function format_day(day)
                        {
                          return day.getFullYear().toString()+"-"+(day.getMonth()+1).toString()+"-"+day.getDate().toString();
                        }


                        
                        
                        
                    </script>
            </div>
            @endsection
        