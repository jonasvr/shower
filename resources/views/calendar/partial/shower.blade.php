<div class="shower">
    <div v-if="device.state == 2">
    <div class="">
        <a href="/profile/calendar/@{{device.id}}">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <i class="fa fa-close fa-4x"></i>
                        </div>
                        <div class="hidden-xs col-sm-9 col-md-9 text-right">
                            <div class="font-40">
                                Broken
                            </div>
                        </div>
                        <div class="col-md-12">
                            <span class="pull-right font-30">@{{device.name}}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
        </div>
    <div v-else>
        <div class="">
            <a href="/profile/calendar/@{{device.id}}">
                <div v-bind:class="[device.state == 1 && device.res == 1 ? 'panel panel-success' : 'panel panel-danger']">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <i v-bind:class="[device.state == 1 && device.res ==1 ? 'fa fa-unlock  fa-4x' : 'fa fa-lock  fa-4x']"></i>
                            </div>
                            <div class="hidden-xs col-sm-9 col-md-9 text-right">
                                <div class="font-40">
                                    <div v-else>
                                        <div v-if="device.state==1 && device.res==1">
                                            Free
                                        </div>
                                        <div v-else>
                                            Taken
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <span class="pull-right font-30">@{{device.name}}</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>