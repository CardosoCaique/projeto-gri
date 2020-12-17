@extends('layouts.app')

@section('style')
    <style>
        .card {
            border-radius: 10px;
            margin-top: 2%;
        }
        .card-body {
            padding: 5%;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        @foreach($perguntas as $pergunta)
            <div class="card">
                <div class="card-body">
                    <h4>{{ $pergunta->pergunta }}</h4>
                    <h6>{{ count($base) }} Respostas</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="{{ $pergunta->nome }}" width="100" height="100"></canvas>
                        </div>
                        @if($pergunta->nome == 'perguntaTres')
                            <div class="col-md-4">
                                @foreach($base as $b)
                                    {{ $b->ptDois }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <br>
        <h2>Respostas</h2>
        <?php
            $id = 0;
        ?>
        @foreach($base as $b)
            <div class="card">
                <div class="card-body">
                    @foreach($perguntas as $pergunta)
                        <h5>{{ $pergunta->pergunta }}</h5>
                        <?php
                            if ($pergunta->nome=='perguntaUm') {
                                echo "<h6>" . $b->perguntaUm . "</h6>";
                            }
                            if ($pergunta->nome=='perguntaDois') {
                                echo "<h6>" . $b->perguntaDois . "</h6>";
                            }
                            if ($pergunta->nome=='perguntaTres') {
                                echo "<h6>" . $b->perguntaTres . "</h6>";
                            }
                            if ($pergunta->nome=='perguntaQuatro') {
                                echo "<h6>" . $b->perguntaQuatro . "</h6>";
                            }
                            if ($pergunta->nome=='perguntaCinco') {
                                echo "<h6>" . $b->perguntaCinco . "</h6>";
                            }
                            if ($pergunta->nome=='perguntaSeis') {
                                echo "<h6>" . $b->perguntaSeis . "</h6>";
                            }
                            if ($pergunta->nome=='perguntaSete') {
                                echo "<h6>" . $b->perguntaSete . "</h6>";
                            }
                            if ($pergunta->nome=='perguntaOito') {
                                echo "<h6>" . $b->perguntaOito . "</h6>";
                            }
                            if ($pergunta->nome=='perguntaNove') {
                                echo "<h6>" . $b->perguntaNove . "</h6>";
                            }
                            if ($pergunta->nome=='perguntaDez') {
                                echo "<h6>" . $b->perguntaDez . "</h6>";
                            }
                            if ($pergunta->nome=='ptDois') {
                                echo "<h6>" . $b->ptDois . "</h6>";
                            }
                        ?>
                    @endforeach
                    <a href="{{ route('editarjs', $id) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('apagarjs', $id) }}" class="btn btn-danger">Excluir</a>
                    <?php
                        $id++;
                    ?>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
<script>
    var ctx = document.getElementById('perguntaUm').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Não', 'Sim, tenho baixa visão', 'Sim, sou cega', 'Sim, sou surdo', 'Sim, sou pessoa com deficiência física'],
        datasets: [{
            label: '# of Votes',
            data: [
                <?php
                    $nao = 0;
                    $sim = 0;
                    $cega = 0;
                    $surdo = 0;
                    $df = 0;
                    foreach ($base as $b) {
                        if($b->perguntaUm == 'Não')
                            $nao++;
                        elseif($b->perguntaUm == 'Sim')
                            $sim++;
                        elseif (($b->perguntaUm == 'Sim, sou surdo'))
                            $surdo++;
                        elseif (($b->perguntaUm == 'Sim, sou cega'))
                            $cega++;
                        elseif (($b->perguntaUm == 'Sim, sou pessoa com deficiência física'))
                            $df++;
                    }
                    echo $nao.",";
                    echo $sim.",";
                    echo $cega.",";
                    echo $surdo.",";
                    echo $df.",";
                ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
    });
    var ctx = document.getElementById('perguntaDois').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Classroom', 'Google meet', 'Youtube', 'Bibliotecas virtuais', 'Ava'],
            datasets: [{
                label: '# of Votes',
                data: [
                    <?php
                        $class = 0;
                        $meet = 0;
                        $yt = 0;
                        $bv = 0;
                        $ava = 0;

                        foreach ($base as $b) {
                            if(strpos($b->perguntaDois, 'Classroom') !== false)
                                $class++;
                            if(strpos($b->perguntaDois, 'meet') !== false)
                                $meet++;
                            if(strpos($b->perguntaDois, 'Youtube') !== false)
                                $yt++;
                            if(strpos($b->perguntaDois, 'Bibliotecas') !== false)
                                $bv++;
                            if(strpos($b->perguntaDois, 'AVA') !== false)
                                $ava++;
                        }
                        echo $class.",";
                        echo $meet.",";
                        echo $yt.",";
                        echo $bv.",";
                        echo $ava.",";
                    ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById('perguntaTres').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Não', 'Sim'],
            datasets: [{
                label: '# of Votes',
                data: [
                    <?php
                        $sim = 0;
                        $nao = 0;

                        foreach ($base as $b) {
                            if($b->perguntaTres == 'Sim')
                                $sim++;
                            else
                                $nao++;
                        }
                        echo $sim.",";
                        echo $nao.",";
                    ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById('perguntaQuatro').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Frequentemente', 'Algumas vezes', 'Raramente', 'Nunca'],
            datasets: [{
                label: '# of Votes',
                data: [
                    <?php
                        $freq = 0;
                        $alv = 0;
                        $rar = 0;
                        $nunca = 0;

                        foreach ($base as $b) {
                            if($b->perguntaQuatro == 'Frequentemente')
                                $freq++;
                            elseif($b->perguntaQuatro == 'Algumas vezes')
                                $alv++;
                            elseif($b->perguntaQuatro == 'Raramente')
                                $rar++;
                            elseif($b->perguntaQuatro == 'Nunca')
                                $nunca++;
                        }
                        echo $freq.",";
                        echo $alv.",";
                        echo $rar.",";
                        echo $nunca.",";
                    ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 12, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 12, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById('perguntaCinco').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Sim', 'Não'],
            datasets: [{
                label: '# of Votes',
                data: [
                    <?php
                        $sim = 0;
                        $nao = 0;

                        foreach ($base as $b) {
                            if($b->perguntaCinco == 'Sim')
                                $sim++;
                            else
                                $nao++;
                        }
                        echo $sim.",";
                        echo $nao.",";
                    ?>
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById('perguntaSeis').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Concordo totalmente', 'Concordo parcialmente', 'Nem concordo, nem discordo', 'Discordo parcialmente', 'Discordo totalmente'],
            datasets: [{
                label: '# of Votes',
                data: [
                    <?php
                        $ct = 0;
                        $cp = 0;
                        $nc = 0;
                        $dp = 0;
                        $dt = 0;

                        foreach ($base as $b) {
                            if($b->perguntaSeis == 'Concordo totalmente')
                                $ct++;
                            if($b->perguntaSeis == 'Concordo parcialmente')
                                $cp++;
                            if($b->perguntaSeis == 'Nem concordo, nem discordo')
                                $nc++;
                            if($b->perguntaSeis == 'Discordo parcialmente')
                                $dp++;
                            if($b->perguntaSeis == 'Discordo totalmente')
                                $dt++;
                        }
                        echo $ct.",";
                        echo $cp.",";
                        echo $nc.",";
                        echo $dp.",";
                        echo $dt.",";
                    ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById('perguntaSete').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Sim', 'Não'],
            datasets: [{
                label: '# of Votes',
                data: [
                    <?php
                        $sim = 0;
                        $nao = 0;

                        foreach ($base as $b) {
                            if($b->perguntaSete== 'Sim')
                                $sim++;
                            else
                                $nao++;
                        }
                        echo $sim.",";
                        echo $nao.",";
                    ?>
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById('perguntaOito').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['1', '2', '3', '4', '5'],
            datasets: [{
                label: '# of Votes',
                data: [
                    <?php
                        $um = 0;
                        $dois = 0;
                        $tres = 0;
                        $quatro = 0;
                        $cinco = 0;

                        foreach ($base as $b) {
                            if($b->perguntaOito == 1)
                                $um++;
                            if($b->perguntaOito == 2)
                                $dois++;
                            if($b->perguntaOito == 3)
                                $tres++;
                            if($b->perguntaOito == 4)
                                $quatro++;
                            if($b->perguntaOito == 5)
                                $cinco++;
                        }
                        echo $um.",";
                        echo $dois.",";
                        echo $tres.",";
                        echo $quatro.",";
                        echo $cinco.",";
                    ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById('perguntaNove').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Aulas online e ao vivo', 'Videoaulas', 'Execícios e testes', 'Fóruns de discussão', 'Disponibilidade de e-books', 'Slide de aulas'],
            datasets: [{
                label: '# of Votes',
                data: [
                    <?php
                        $class = 0;
                        $meet = 0;
                        $yt = 0;
                        $bv = 0;
                        $ava = 0;
                        $sa = 0;

                        foreach ($base as $b) {
                            if(strpos($b->perguntaNove, 'online') !== false)
                                $class++;
                            if(strpos($b->perguntaNove, 'Videoaulas') !== false)
                                $meet++;
                            if(strpos($b->perguntaNove, 'testes') !== false)
                                $yt++;
                            if(strpos($b->perguntaNove, 'Fóruns') !== false)
                                $bv++;
                            if(strpos($b->perguntaNove, 'e-books') !== false)
                                $ava++;
                            if(strpos($b->perguntaNove, 'Slide') !== false)
                                $sa++;
                        }
                        echo $class.",";
                        echo $meet.",";
                        echo $yt.",";
                        echo $bv.",";
                        echo $ava.",";
                        echo $sa.",";
                    ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById('perguntaDez').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Concordo totalmente', 'Concordo parcialmente', 'Nem concordo, nem discordo', 'Discordo parcialmente', 'Discordo totalmente'],
            datasets: [{
                label: '# of Votes',
                data: [
                    <?php
                        $ct = 0;
                        $cp = 0;
                        $nc = 0;
                        $dp = 0;
                        $dt = 0;

                        foreach ($base as $b) {
                            if($b->perguntaDez == 'Concordo totalmente')
                                $ct++;
                            if($b->perguntaDez == 'Concordo parcialmente')
                                $cp++;
                            if($b->perguntaDez == 'Nem concordo, nem discordo')
                                $nc++;
                            if($b->perguntaDez == 'Discordo parcialmente')
                                $dp++;
                            if($b->perguntaDez == 'Discordo totalmente')
                                $dt++;
                        }
                        echo $ct.",";
                        echo $cp.",";
                        echo $nc.",";
                        echo $dp.",";
                        echo $dt.",";
                    ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
    })
</script>
@endsection
