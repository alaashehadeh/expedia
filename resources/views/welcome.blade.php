<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Expedia assignment</title>

    <!-- css -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <link href="bower_components/bootstrap-star-rating/css/star-rating.min.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="bower_components/jquery_cityAutocomplete/city-autocomplete.min.css">
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet"
          href="bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
    <link href="css/web.css" type="text/css" rel="stylesheet"/>


</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"></a><img src="images/logo.png"/>
        </div>
    </div>
</nav>

<div class="container">
    <form method="post">
        <!-- csrf token -->
        {{csrf_field()}}

        <!-- city -->
        <div class="form-group">
            <input class="form-control" type="text" id="city" name="city" autocomplete="off" placeholder="City name">
        </div>

        <!-- duration date -->
        <div class="row">
            <div class="col-md-2 hidden-sm hidden-xs">Trip Date</div>
            <div class="col-md-10 form-group">
                <div class="row">
                    <div class="col-md-1">From</div>
                    <div class="col-md-5">
                        <div class='input-group date' id='datetimepicker6'>
                            <input type='text' class="form-control"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                        </div>
                    </div>
                    <div class="col-md-1">To</div>
                    <div class='col-md-5'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker7'>
                                <input type='text' class="form-control"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hotel stars -->
        <div class="row form-group">
            <div class="col-md-2 hidden-sm hidden-xs">Hotel Stars</div>
            <div class="col-md-10">
                <div class="col-md-1">Min <span class="hidden-lg hidden-md">Trip date</span></div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <input id="input-1" name="star_from" class="rating rating-loading" data-min="1" data-max="5"
                           data-step="1" data-size="xs" data-show-clear="false" data-show-caption="false">
                </div>
                <div class="col-md-1">Max <span class="hidden-lg hidden-md">Trip date</span></div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <input id="input-2" name="star_to" class="rating rating-loading" data-min="1" data-max="5"
                           data-step="1" data-size="xs" data-show-clear="false" data-show-caption="false">
                </div>
            </div>
        </div>

        <!-- Hotel Rating -->
        <div class="row form-group">
            <div class="col-md-2 hidden-sm hidden-xs">Hotel Rating</div>
            <div class="col-md-10">
                <div class="col-md-1">Min <span class="hidden-lg hidden-md">Hotel Rating</span> </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <input id="input-1" name="rate_from" class="rating rating-loading" data-min="1" data-max="5"
                           data-step="1" data-size="xs" data-show-clear="false" data-show-caption="false">
                </div>
                <div class="col-md-1">Max <span class="hidden-lg hidden-md">Hotel Rating</span></div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <input id="input-2" name="rate_to" class="rating rating-loading" data-min="1" data-max="5"
                           data-step="1" data-size="xs" data-show-clear="false" data-show-caption="false">
                </div>
            </div>
        </div>

        <!-- Gust Rating -->
        <div class="row form-group">
            <div class="col-md-2 hidden-sm hidden-xs">Guest Rating</div>
            <div class="col-md-10">
                <div class="col-md-1">Min <span class="hidden-lg hidden-md">Guest Rating</span></div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <input id="input-1" name="guest_from" class="rating rating-loading" data-min="1" data-max="5"
                           data-step="1" data-size="xs" data-show-clear="false" data-show-caption="false">
                </div>
                <div class="col-md-1">Max <span class="hidden-lg hidden-md">Guest Rating</span></div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <input id="input-2" name="guest_to" class="rating rating-loading" data-min="1" data-max="5"
                           data-step="1" data-size="xs" data-show-clear="false" data-show-caption="false">
                </div>
            </div>
        </div>

        <!-- length of stay -->
        <div class="row form-group">
            <div  class="col-md-12">
                <input type="number" name="stay" class="form-control"  min="1" placeholder="Length of stay" />
            </div>
        </div>

        <!-- submit -->
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Search</button>
            </div>
        </div>
    </form>

    @yield('content')
</div>
<!-- js -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&language=en"></script>
<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/bootstrap-star-rating/js/star-rating.min.js"></script>
<script src="bower_components/jquery_cityAutocomplete/jquery.city-autocomplete.js"></script>
<script type="text/javascript" src="bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript"
        src="bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $('input#city').cityAutocomplete();

    $(function () {
        $('#datetimepicker6').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            format: 'YYYY-MM-DD',
            minDate: new Date()
        });
        $('#datetimepicker7').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            format: 'YYYY-MM-DD',
            minDate: new Date()
        });
    });
</script>
</body>
</html>
