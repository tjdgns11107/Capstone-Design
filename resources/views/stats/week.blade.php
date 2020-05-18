<div class="container">
    <div class="row">
        <div class="col-3 top-div-box-1">
            <div class="card border-success mb-3" style="max-width: 18rem;">
                <div class="card-header">하루 평균 착석시간</div>
                <div class="card-body text-success">
                    <h5 class="card-title">7시간 10분</h5>
                    <p class="card-text">프로그레스 바</p>
                </div>
            </div>
        </div>

        <div class="col-3 top-div-box-2">
            <div class="card border-success mb-3" style="max-width: 18rem;">
                <div class="card-header">하루 평균 바른자세 시간</div>
                <div class="card-body text-success">
                    <h5 class="card-title">2시간 30분</h5>
                    <p class="card-text">프로그레스 바</p>
                </div>
            </div>
        </div>

        <div class="col-3 top-div-box-3">
            <div class="card border-success mb-3" style="max-width: 18rem;">
                <div class="card-header">일주일동안 가장 많이 취한 자세</div>
                <div class="card-body text-success">
                <h5 class="card-title">뒤로 기댄 자세</h5>
                <p class="card-text">프로그레스바</p>
                </div>
            </div>
        </div>

        <div class="col-3 top-div-box-4">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">애니메이션</div>
                <div class="card-body text-primary">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        
        <div class="col-9 main-div-box">
            {{--{!! json_encode($data) !!}--}}
            <?php $msg = $data; ?>
            <h2>일주일 동안의 자세 추이</h2>
            <canvas id="lineChart"></canvas>
        </div>

        <div class="col-3 right-banner-box">
            <div class="card border-success mb-3" style="max-width: 18rem;">
                <div class="card-header">5월 3째주 허리 리포트</div>
                <div class="card-body text-success">
                    <h5 class="card-title">1) 챌린지를 시작했어요!</h5>
                    <p class="card-text">현재 달성율 : 37%</p>
                    <h5 class="card-title">2) 스트레칭게임 최고 점수 : 850점</h5>
                    <p class="card-text">랭킹 45위 입니다!</p>
                </div>
            </div>
        </div>

        <div class="col-6 main-div-box" style="margin-top:30px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">일주일동안 어떤 자세로 앉았을까?</h5>
                    <canvas id="labelChart1"></canvas>
                </div>
            </div>   
        </div>

        <div class="col-6 main-div-box" style="margin-top:30px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">바른자세 / 나쁜자세로 앉은 비율</h5>
                    <canvas id="labelChart2"></canvas>
                </div>
            </div> 
        </div>

        <div class="col-9 main-div-box" style="margin-top:30px;">
            <h2>요일별 자세 추이</h2>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    자세 선택
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" id="good">바른자세</a>
                    <a class="dropdown-item" id="cross-left-leg">왼쪽다리 꼰 자세</a>
                    <a class="dropdown-item" id="cross-right-leg">오른쪽다리 꼰 자세</a>
                    <a class="dropdown-item" id="edge-lean">뒤로 기댄 자세</a>
                    <a class="dropdown-item" id="lean-toward">앞으로 구부정한 자세</a>
                    <a class="dropdown-item" id="lean-left">왼쪽으로 구부정한 자세</a>
                    <a class="dropdown-item" id="lean-right">오른쪽으로 구부정한 자세</a>

                </div>
            </div>
            <div id="myChart-div">
                <canvas class="myChart"></canvas>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    var msg = <?php echo $msg ?>;

    console.log(msg);

    var colors = {
        'green': '#00e36a',
        'red': '#F7464A',
        'yellow': '#FDB45C',
        'pink': '#ffacb7',
        'blue': '#0d8aff',
        'purple': '#a6b1e1',// #9399ff
        'negativeBlue': '#4f98ca',
        'grey': '#c4c4c4',
        'blueGreen': '#46BFBD',
        'hoverBlue': '#309bff',
        'hoverBlueGreen': '#5AD3D1',
        'hoverRed': '#FF5A5E',
    };
    
    //line
    var ctxL1 = document.getElementById("lineChart").getContext('2d');
    
    var myLineChart1 = new Chart(ctxL1, {
        type: 'line',
        data: {
        labels: ["월", "화", "수", "목", "금", "토", "일"],
        datasets: [
            {
            label: "바른자세 추이",
            data: [30, 50, 35, 45, 60, 20, 30],
            backgroundColor: [
                'rgba(0, 227, 106, .2)',
            ],
            borderColor: [
                'rgba(0, 227, 106, .7)',
            ],
            borderWidth: 2
            },
            {
            label: "나쁜자세 추이",
            data: [70, 50, 65, 55, 40, 80, 70],
            backgroundColor: [
                'rgba(255, 59, 59, .2)',
            ],
            borderColor: [
                'rgba(255, 59, 59, .7)',
            ],
            borderWidth: 2
            }
        ]
        },
        options: {
        responsive: true
        }
    });
    
    var ctxP1 = document.getElementById("labelChart1").getContext('2d');
    
    var allPosPieChart = new Chart(ctxP1, {
        plugins: [ChartDataLabels],
        type: 'pie',
        data: {
        labels: [
            "바른자세", 
            "왼쪽다리 꼰 자세", 
            "오른쪽다리 꼰 자세", 
            "뒤로 기댄 자세", 
            "앞으로 구부정한 자세", 
            "왼쪽으로 구부정한 자세", 
            "오른쪽으로 구부정한 자세"
        ],
        datasets: [{
            data: [35, 55, 20, 70, 60, 20, 10],
            backgroundColor: [
            colors.green,
            colors.red,
            colors.yellow,
            colors.pink,
            colors.purple,
            colors.negativeBlue,
            colors.grey,
            ],
            hoverBackgroundColor: [
            colors.green,
            colors.red,
            colors.yellow,
            colors.pink,
            colors.purple,
            colors.negativeBlue,
            colors.grey
            ]
        }]
        },
        options: {
        responsive: true,
        legend: {
            position: 'right',
            labels: {
            padding: 20,
            boxWidth: 10
            }
        },
        plugins: {
            datalabels: {
            formatter: (value, ctx) => {
                let sum = 0;
                let dataArr = ctx.chart.data.datasets[0].data;
                dataArr.map(data => {
                sum += data;
                });
                let percentage = (value * 100 / sum).toFixed(2) + "%";
                return percentage;
            },
            color: 'white',
            labels: {
                title: {
                font: {
                    size: '16'
                }
                }
            }
            }
        }
        }
    });
    
    var ctxP2 = document.getElementById("labelChart2").getContext('2d');
    
    var twoPosPieChart = new Chart(ctxP2, {
        plugins: [ChartDataLabels],
        type: 'pie',
        data: {
        labels: ["바른자세", "나쁜자세"],
        datasets: [{
            data: [58, 42],
            backgroundColor: [colors.blue, colors.red],
            hoverBackgroundColor: [colors.hoverBlue, colors.hoverRed]
        }]
        },
        options: {
        responsive: true,
        legend: {
            position: 'right',
            labels: {
            padding: 20,
            boxWidth: 10
            }
        },
        plugins: {
            datalabels: {
            formatter: (value, ctx) => {
                let sum = 0;
                let dataArr = ctx.chart.data.datasets[0].data;
                dataArr.map(data => {
                sum += data;
                });
                let percentage = (value * 100 / sum).toFixed(2) + "%";
                return percentage;
            },
            color: 'white',
            labels: {
                title: {
                font: {
                    size: '16'
                }
                }
            }
            }
        }
        }
    });
    // 자세별 추이 그래프 <canvas> 태그 가져오기
    
    var ctxL_myChart = document.getElementsByClassName("myChart");
    
    var myChart_data = {
        type: 'line',
        data: {
        labels: ["1", "2", "3", "4", "5", "6", "7"],
        datasets: [
            {
            label: "바른자세 추이",
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: [
                'rgba(14, 237, 115, .2)',
            ],
            borderColor: [
                'rgba(14, 237, 115, .7)',
            ],
            borderWidth: 2
            },
        ]
        },
        options: {
        responsive: true
        }
    };
    
    //자세별 추이 그래프 그리기
    // 정자세 추이
    var myChart = new Chart(ctxL_myChart, myChart_data);
    
    //자세별 추이 보기
    $('#good').click(function(e){
        console.log('cross left leg click');
        myChart_data.data.datasets[0].label = '바른 자세 추이';
        myChart_data.data.datasets[0].data = [65, 59, 80, 81, 56, 55, 40];
        myChart_data.data.datasets[0].backgroundColor = ['rgba(14, 237, 115, .2)'];
        myChart_data.data.datasets[0].borderColor = ['rgba(14, 237, 115, .7)'];
        myChart.update();
    });
    
    $('#cross-left-leg').click(function(e){
        console.log('cross left leg click');
        myChart_data.data.datasets[0].label = '왼쪽다리 꼰 자세 추이';
        myChart_data.data.datasets[0].data = [20, 10, 0, 40, 10, 50, 20];
        myChart_data.data.datasets[0].backgroundColor = ['rgba(255, 65, 51, .2)'];
        myChart_data.data.datasets[0].borderColor = ['rgba(255, 65, 51, .7)'];
        myChart.update();
    });
    
    $('#cross-right-leg').click(function(e){
        console.log('cross left leg click');
        myChart_data.data.datasets[0].data = [10, 40, 20, 60, 40, 25, 35];
        myChart_data.data.datasets[0].label = '오른쪽다리 꼰 자세 추이';
        myChart_data.data.datasets[0].backgroundColor = ['rgba(255, 168, 64, .2)'];
        myChart_data.data.datasets[0].borderColor = ['rgba(255, 168, 64, .7)'];
        myChart.update();
    });
    
    $('#edge-lean').click(function(e){
        console.log('cross left leg click');
        myChart_data.data.datasets[0].label = '뒤로 기댄 자세 추이';
        myChart_data.data.datasets[0].data = [10, 20, 45, 35, 25, 55, 40];
        myChart_data.data.datasets[0].backgroundColor = ['rgba(255, 128, 144, .2)'];
        myChart_data.data.datasets[0].borderColor = ['rgba(255, 128, 144, .7)'];
        myChart.update();
    });
    
    $('#lean-toward').click(function(e){
        console.log('cross left leg click');
        myChart_data.data.datasets[0].label = '앞으로 구부정한 자세 추이';
        myChart_data.data.datasets[0].data = [5, 25, 15, 45, 60, 25, 30];
        myChart_data.data.datasets[0].backgroundColor = ['rgba(139, 111, 237, .2)'];
        myChart_data.data.datasets[0].borderColor = ['rgba(139, 111, 237, .7)'];
        myChart.update();
    });
    
    $('#lean-left').click(function(e){
        console.log('cross left leg click');
        myChart_data.data.datasets[0].label = '왼쪽으로 구부정한 자세 추이';
        myChart_data.data.datasets[0].data = [5, 35, 60, 50, 20, 45, 65];
        myChart_data.data.datasets[0].backgroundColor = ['rgba(47, 108, 150, .2)'];
        myChart_data.data.datasets[0].borderColor = ['rgba(47, 108, 150, .7)'];
        myChart.update();
    });
    
    $('#lean-right').click(function(e){
        console.log('cross left leg click');
        myChart_data.data.datasets[0].label = '오른쪽으로 구부정한 자세 추이';
        myChart_data.data.datasets[0].data = [35, 20, 5, 50, 65, 35, 20];
        myChart_data.data.datasets[0].backgroundColor = ['rgba(122, 122, 122, .2)'];
        myChart_data.data.datasets[0].borderColor = ['rgba(122, 122, 122, .7)'];
        myChart.update();
    });
</script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<script src="{{ asset('js/app.js') }}"></script>