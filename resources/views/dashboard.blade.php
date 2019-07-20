@extends('layouts.app')

@section('content')





<div class="container-fluid">


      <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-'.$msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->




    <div class="row">


        <div class="col-sm-8">
            <div class="card">
                <div class="card-header teelbgExtra">
                 <h2> Dashboard </h2>
                </div>

                <div class="card-body">
                 
           <canvas id="canvas"></canvas>
           <progress id="animationProgress" max="1" value="0" style="width: 100%"></progress>


               </div>
            </div>

         <h2>Hi The Total Post of Article is : {{ $posts->count() }} </h2>
         
        

         

        </div>



         <div class="col-sm-4">
            <div class="card">
                <div class="card-header teelbgExtra">
                 <h2> Recent Posts </h2>
                </div>
                <div class="card-body fixedsize" data-simplebar>
                <div class="thumbnail">
                   @foreach($posts as $post)


                <form action="/delete/{{$post->id}}" method="post">

                  {{ csrf_field() }}

                 <a href="#" title="Header" data-toggle="popover" data-placement="top" data-content="Content">
                  <div class="badge">{{ $post->category_id}}</div>
                 <div> <img src="{{ asset("storage/".$post->image) }}" class="img-responsive" width="150px;"></div>
                 </a>
                 <div class="caption">{{ $post->post_titile }}</div>
                 
                 <div class="caption"><Button onClick="return confirm('are you sure?')" type="submit" class="btn btn-danger">Remove</Button>

                  <a class="btn btn-warning" href="/edit/{{$post->id}}">Edit</a></div>
                
                </form>


                 @endforeach
                </div>
               </div>
            </div>
        </div>


    </div>
</div>


   
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

<script src="https://www.chartjs.org/samples/latest/utils.js"></script>

<script src="{{ asset('js/chart.js') }}"></script>



<script>
    var progress = document.getElementById('animationProgress');
    var config = {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'March', 'April', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets: [{
          label: '{{ now()->year }}',
          fill: false,
          borderColor: window.chartColors.red,
          backgroundColor: window.chartColors.red,
          
          data: [

            {{ $july->where('month',1)->where('year',now()->year)->count() }},
            {{ $july->where('month',2)->where('year',now()->year)->count() }}, 
            {{ $july->where('month',3)->where('year',now()->year)->count() }}, 
            {{ $july->where('month',4)->where('year',now()->year)->count() }},
            {{ $july->where('month',5)->where('year',now()->year)->count() }}, 
            {{ $july->where('month',6)->where('year',now()->year)->count() }}, 
            {{ $july->where('month',7)->where('year',now()->year)->count() }}, 
            {{ $july->where('month',8)->where('year',now()->year)->count() }}, 
            {{ $july->where('month',9)->where('year',now()->year)->count() }}, 
            {{ $july->where('month',10)->where('year',now()->year)->count() }}, 
            {{ $july->where('month',11)->where('year',now()->year)->count() }}, 
            {{ $july->where('month',12)->where('year',now()->year)->count() }} 
            
          ]
        }]
      },
      options: {
        title: {
          display: true,
          text: 'E- Magazine | Current Status '
        },
        animation: {
          duration: 2000,
          onProgress: function(animation) {
            progress.value = animation.currentStep / animation.numSteps;
          },
          onComplete: function() {
            window.setTimeout(function() {
              progress.value = 0;
            }, 2000);
          }
        }
      }
    };

    window.onload = function() {
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myLine = new Chart(ctx, config);
    };

    document.getElementById('randomizeData').addEventListener('click', function() {
      config.data.datasets.forEach(function(dataset) {
        dataset.data = dataset.data.map(function() {
          return randomScalingFactor();
        });
      });

      window.myLine.update();
    });

</script>

  
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.js"></script>



 


@endsection
