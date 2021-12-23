@extends('admin_layout')
@section('admin_content') 
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thông Kê Theo Ngày
                        </header> 
                        <div class="div-center">
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
                        
                        
                        var dk =0;
                        var myChart;
                        function Load()
                        {
                          var data = <?php echo json_encode($data_order) ?>;
                          var arr_header = [];
                          var arr_total_money=[];
                          var start_day_input = new Date( document.getElementById('start_day').value);
                          var end_day_input = new Date(document.getElementById('end_day').value);
                          start_day_input.setHours(0,0,0,0);
                          
                          end_day_input.setHours(0,0,0,0);
                          
                          var arrDay = [];
                          var sum_total_money = 0;
                          var start_time_order=new Date();
                          var nextDay = start_day_input;
                          while(nextDay <= end_day_input)
                          {
                            arrDay.push(nextDay);
                            var day = nextDay;
                            nextDay = new Date(day);
                            nextDay.setDate(day.getDate() + 1);
                          }
                          
                          
                          for(var index = 0; index < arrDay.length ; index++)
                          {
                            
                              arr_header.push(format_day(arrDay[index]));
                              arr_total_money.push(sum_money(arrDay[index],data));
                              sum_total_money+= sum_money(arrDay[index],data)
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
                          if(dk == 0)
                            {
                              myChart = new Chart(
                                document.getElementById('myChart'),
                                config
                              );
                              dk =1;
                            }
                            else{
                              myChart.destroy();
                              myChart = new Chart(
                                document.getElementById('myChart'),
                                config
                              );
                            }
                            document.getElementById('total_money').innerHTML= "Tổng Tiền:" + sum_total_money.toString();
                        }
                        function sum_money(day, arrdata)
                        {
                          var sum_money = 0;
                          var start_time_order= new Date();
                          for (let index = 0; index < arrdata.length; index++){
                            console.log(arrdata[index].NgayLap);
                          }

                          for (let index = 0; index < arrdata.length; index++) {
                            start_time_order= new Date(arrdata[index].NgayLap);
                            start_time_order.setHours(0,0,0,0);
                            if(day.getTime() === start_time_order.getTime())
                            {
                              sum_money += arrdata[index].TongThanhTien;
                           
                            }

                            
                          }
                          return sum_money;
                        }
                        function format_day(day)
                        {
                          return day.getFullYear().toString() + "-" + (day.getMonth()+1).toString()+ "-"+day.getDate().toString();
                        }
                        


                        
                        
                        
                    </script>
            </div>
            @endsection
        