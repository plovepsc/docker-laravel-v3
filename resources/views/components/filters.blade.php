<div class="box box-primary" id="accordion">
  <div class="box-header with-border">
    <h3 class="box-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFilter">
        <i class="fa fa-filter" aria-hidden="true"></i> {{$title ?? ''}}
      </a>
    </h3>
  </div>
  <div id="collapseFilter" class="panel-collapse active collapse in" aria-expanded="true">
    <div class="box-body">
      {{$slot}}
    </div>
  </div>
</div>