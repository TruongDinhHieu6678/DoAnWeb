@extends('admin_layout')
@section('admin_content') 
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                        Thông Kê Theo Quý
                        </header> 
                       
                        <div class="row w3-res-tb">
                            
                            <div class="col-sm-3">
                              <div class="input-group">
                                <input type="text" id="Search_Year" class="input-sm form-control" placeholder="Search">
                                <span class="input-group-btn">
                                  <button class="btn btn-sm btn-default" onclick="Load()" type="button">Load</button>
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
                          var total_money_quy=0;
                          var sum_total_money=0;
                          const Year_input = document.getElementById('Search_Year').value;
                          var start_day_order=new Date();
                          var dk_quy =1;
                          for(var index = 0; index < data.length ; index++)
                          {
                            start_day_order= new Date(data[index].NgayLap);
                            if(parseInt(Year_input) == parseInt(start_day_order.getFullYear())
                            && parseInt(start_day_order.getMonth()+1) <=3)
                            {
                              total_money_quy = total_money_quy + data[index].TongThanhTien;
                              sum_total_money = sum_total_money+ data[index].TongThanhTien;
                            }
                            else if(dk_quy == 1)
                            {
                              
                              arr_header.push("Quý 1");
                              arr_total_money.push(total_money_quy);
                              total_money_quy = 0;
                              dk_quy =2;
                              index--;
                            }
                            else if(parseInt(Year_input) == parseInt(start_day_order.getFullYear())
                            && parseInt(start_day_order.getMonth()+1) <=6)
                            {
                              total_money_quy = total_money_quy + data[index].TongThanhTien;
                              sum_total_money = sum_total_money+ data[index].TongThanhTien;
                            }
                            else if(dk_quy == 2)
                            {
                              
                              arr_header.push("Quý 2");
                              arr_total_money.push(total_money_quy);
                              total_money_quy = 0;
                              dk_quy =3;
                              index--;
                              
                            }
                            else if(parseInt(Year_input) == parseInt(start_day_order.getFullYear())
                            && parseInt(start_day_order.getMonth()+1) <=9)
                            {
                              total_money_quy = total_money_quy + data[index].TongThanhTien;
                              sum_total_money = sum_total_money+ data[index].TongThanhTien;
                            }
                            else if(dk_quy == 3)
                            {
                              
                              arr_header.push("Quý 3");
                              arr_total_money.push(total_money_quy);
                              total_money_quy = 0;
                              dk_quy =4;
                              index--;
                              
                            }
                            else if(parseInt(Year_input) == parseInt(start_day_order.getFullYear())
                            && parseInt(start_day_order.getMonth()+1) <=12)
                            {
                              total_money_quy = total_money_quy + data[index].TongThanhTien;
                              sum_total_money = sum_total_money+ data[index].TongThanhTien;
                            }
                            
                            
                          }
                          arr_header.push("Quý 4");
                          arr_total_money.push(total_money_quy);
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
                        
                        }


                        
                        
                        document.getElementById('total_money').innerHTML= "hehe";
                    </script>
            </div>
            @endsection
        