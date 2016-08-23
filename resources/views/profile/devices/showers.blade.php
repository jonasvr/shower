<div class="shower" v-if="length">
<div class="jumbotron row">
    <h2>Showers</h2>
    <hr>
    <div class="content">
    <div v-for="(key, item) in devices"> {{--foreach--}}
        <div v-if="item.state == 2">
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                <a href="/dashboard/calendar/@{{item.id}}">
                    <div class="panel panel-warning">

                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 col-md-3">
                                        <i class="fa fa-close fa-4x"></i>
                                </div>
                                <div class="hidden-xs col-md-9 text-right">
                                    <div class="font-40">
                                            Broken
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <span class="pull-right font-30">@{{item.name}}</span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/dashboard/calendar/@{{item.id}}"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i>reservate</a>
            </div>
        </div>
        <div v-else>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
            <a href="/dashboard/calendar/@{{item.id}}">
               <div v-bind:class="[item.state == 1 && item.res == 1 ? 'panel panel-success' : 'panel panel-danger']">

                  <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12 col-md-3">
                                <i v-bind:class="[item.state == 1 && item.res ==1 ? 'fa fa-unlock  fa-4x' : 'fa fa-lock  fa-4x']"></i>
                        </div>
                        <div class="hidden-xs col-md-9 text-right">
                            <div class="font-40">
                                <div v-if="item.state == 2">
                                    Broken
                                </div>
                                <div v-else>
                                    <div v-if="item.state==1 && item.res==1">
                                        Free
                                    </div>
                                    <div v-else>
                                        Taken
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <span class="pull-right font-30">@{{item.name}}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
                <a href="/dashboard/calendar/@{{item.id}}"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Reservate</a>
            </div>
        </div>

    </div>
    </div>
</div>
</div>