<div class="col-md-6">
    <h2>Your kot bathroom usage</h2>
    <hr>
    <div class="col-md-12">
        <div class="progress">
            <div class="progress-bar progress-bar-danger" style="width: {{$all_girl['perc']}}%" data-toggle="tooltip" data-placement="top" title="" data-original-title="Girls usage of the kot's bathroom">
                {{round($all_girl['perc'],2)}}%
            </div>
            <div class="progress-bar" style="width: {{$all_boy['perc']}}%" data-toggle="tooltip" data-placement="top" title="" data-original-title="Boys usage of the kot's bathroom">
                {{round($all_boy['perc'],2)}}%
            </div>
        </div>
    </div>
</div>