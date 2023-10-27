@extends('layouts.admin')

@section('header', 'Dashboard')

@section('content')
<div class="col-lg">
    <div class="row">
    <!-- Sales Card -->
    <div class="col-xxl-4 col-md-6">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Sales</h5>
                
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ count($transactions) }}</h6>
                        <span class="text-success small pt-1 fw-bold">{{ count($transactions) }}%</span> 
                        <span class="text-muted small pt-2 ps-1">increase</span>
                    </div>
                </div>
            </div>
            
        </div>
  </div><!-- End Sales Card -->
  
  <!-- Revenue Card -->
  <div class="col-xxl-4 col-md-6">
      <div class="card info-card revenue-card">
            
            <div class="card-body">
                <h5 class="card-title">Revenue</h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ count($transactions) * 100}}</h6>
                        <span class="text-success small pt-1 fw-bold">{{ count($transactions) }}%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div><!-- End Revenue Card -->
    
    <!-- Customers Card -->
    <div class="col-xxl-4 col-xl-12">
        
    <div class="card info-card customers-card">
        
        <div class="card-body">
            <h5 class="card-title">Customers</h5>
            
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ count($members) }}</h6>
                    <span class="text-success small pt-1 fw-bold">{{ count($members) }}%</span> <span class="text-muted small pt-2 ps-1">increase</span>    
                </div>
            </div>
            
        </div>
    </div>
    </div>
    </div>
</div>
<div class="col-lg" >
     <div class="card">
        <div class="card-body pb-0">
          <h5 class="card-title">Data</h5>

          <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#trafficChart")).setOption({
                tooltip: {
                  trigger: 'item'
                },
                legend: {
                  top: '5%',
                  left: 'center'
                },
                series: [{
                  name: 'Access From',
                  type: 'pie',
                  radius: ['40%', '70%'],
                  avoidLabelOverlap: false,
                  label: {
                    show: false,
                    position: 'center'
                  },
                  emphasis: {
                    label: {
                      show: true,
                      fontSize: '18',
                      fontWeight: 'bold'
                    }
                  },
                  labelLine: {
                    show: false
                  },
                  data: [{
                      value: {{ count($members) }},
                      name: 'Members'
                    },
                    {
                      value: {{ count($mentors) }},
                      name: 'Mentors'
                    },
                    {
                      value: {{ count($transactions) }},
                      name: 'Transactions'
                    },
                    {
                      value: {{ count($class) }},
                      name: 'Class'
                    },
                    {
                      value: {{ count($users) }},
                      name: 'Users'
                    }
                  ]
                }]
              });
            });
          </script>
        </div>
      </div><!-- End Website Traffic -->
</div>
@endsection
