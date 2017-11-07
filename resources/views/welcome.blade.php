<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        /*color: #636b6f;*/
        /*font-family: 'Raleway', sans-serif;*/
        /*font-weight: 100;*/
        height: 100vh;
        margin: 0;
    }
    .barcode-container {
        margin: 20px;
        /*font-size: 18px;*/
    }
    p {
        margin-top: 0;
        margin-bottom: 0; 
        font-size: 12px;
    }
    p strong { 
        font-size: 12px;
    }
    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
</head>
<body>
    <div class="flex-center position-ref full-height hidden-print">
        @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Optimizador de Imagenes
            </div>

            <form method="GET" action="{{ URL::to('/optimizar') }}">
                <div class="help-block">Ubicar las imagenes en __DIR__</div>
                <button type="submit">Optimizar</button>
            </form>
            {{  isset($directorio)?$directorio:'' }}
            <br>
            <form action="{{ route('getcodebar') }}" method="GET" class="row">
                <div class="col-md-6">
                    <h4>Label 1</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="descripcion1" placeholder="Descripcion 1" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="code1" class="form-control" name="code1" placeholder="Codigo 1" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="code2" class="form-control" name="code2" placeholder="Codigo 2" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Label 2</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="descripcion2" placeholder="Descripcion 2" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="code3" placeholder="Codigo 3" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="code4" placeholder="Codigo 4" required>
                    </div>
                    <input type="submit" value="Generar Codigo" class="btn btn-default">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                      Ver codigo de barra
                  </button>
              </div>
          </form>
      </div>
  </div>
  <div class="modal hidden-print" tabindex="-1" id="modal" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header hidden-print">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body" style="font-size:15px; border: none;">
        @if (session()->has('var1'))
        <div class="barcode">
            <p>TechReuse - {{ session('desc1')  }}</p>
            <img src="data:image/svg+xml;utf8,{{DNS1D::getBarcodeSVG(session('var1'), 'C128',2,20,true)}} " alt="barcode"/>
            <p><strong>{{ session('var1') }}</strong></p>
        </div>
        @endif
        @if (session()->has('var2'))
        <div class="barcode">
            <img src="data:image/svg+xml;utf8,{{DNS1D::getBarcodeSVG(session('var2'), 'C128',2,20,true)}} " alt="barcode"/>
            <p><strong>{{ session('var2') }}</strong></p>
        </div>
        @endif

        @if (session()->has('var3'))
        <div class="barcode">
            <p>TechReuse - {{ session('desc2')  }}</p>
            <img src="data:image/svg+xml;utf8,{{DNS1D::getBarcodeSVG(session('var3'), 'C128',2,20,true)}} " alt="barcode"/>
            <p><strong>{{ session('var3') }}</strong></p>
        </div>
        @endif
        @if (session()->has('var4'))
        <div class="barcode">
            <img src="data:image/svg+xml;utf8,{{DNS1D::getBarcodeSVG(session('var4'), 'C128',2,20,true)}} " alt="barcode"/>
            <p><strong>{{ session('var4') }}</strong></p>
        </div>
        @endif
    </div>
    <div class="modal-footer hidden-print">
        <button type="button" class="btn btn-primary" onclick="printBarcode()">Imprimir</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
</div>

<div id="print" class="barcode-container modal">
    @if (session()->has('var1'))
    <div class="barcode">
        <p>TechReuse - {{ session('desc1')  }}</p>
        <img src="data:image/svg+xml;utf8,{{DNS1D::getBarcodeSVG(session('var1'), 'C128',2,20,true)}} " alt="barcode"/>
        <p><strong>{{ session('var1') }}</strong></p>
    </div>
    @endif
    @if (session()->has('var2'))
    <div class="barcode">
        <img src="data:image/svg+xml;utf8,{{DNS1D::getBarcodeSVG(session('var2'), 'C128',2,20,true)}} " alt="barcode"/>
        <p><strong>{{ session('var2') }}</strong></p>
    </div>
    @endif
    
    @if (session()->has('var3'))
    <div class="barcode">
        <p>TechReuse - {{ session('desc2')  }}</p>
        <img src="data:image/svg+xml;utf8,{{DNS1D::getBarcodeSVG(session('var3'), 'C128',2,20,true)}} " alt="barcode"/>
        <p><strong>{{ session('var3') }}</strong></p>
    </div>
    @endif
    @if (session()->has('var4'))
    <div class="barcode">
        <img src="data:image/svg+xml;utf8,{{DNS1D::getBarcodeSVG(session('var4'), 'C128',2,20,true)}} " alt="barcode"/>
        <p><strong>{{ session('var4') }}</strong></p>
    </div>
@endif</div>
</body>
<script  type="text/javascript">
    function printBarcode() {
        $('#print').show();
        window.print();
        $('#print').hide();
    }
</script>
</html>
