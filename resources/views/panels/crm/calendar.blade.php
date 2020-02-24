@extends('layouts.crm')

@section('head')

@stop

@section('content')
<form accept-charset="UTF-8" action="{{ route('crm.store') }}" method="post">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="container">
  <div class="ctrlable_div">
  <div class="steps" id="rootwizard">
  <div class="row mt-30 "></div>

  <div class="card mb-3">

  <div class="card-body">
  <h4 class="card-title">Calendar</h4>
  <div class="row mt-30 "></div>
  <div class="col-sm-12 col-md-12 col-lg-12">

    <div id="inbox" class="panel panel-default">

      <div class="panel-body" style="margin-bottom: 10px;">
        Here are the 10 oldest events in your calendar.
      </div>

      <div class="list-group">
        <?php if (isset($events)) {
          foreach($events as $event) { ?>
        <div class="list-group-item">
          <h3 class="list-group-item-heading"><?php echo $event->getSubject() ?></h3>
          <p class="list-group-item-heading text-muted">Start: <?php echo (new DateTime($event->getStart()->getDateTime()))->format(DATE_RFC2822) ?></p>
          <p class="list-group-item-heading text-muted">End: <?php echo (new DateTime($event->getEnd()->getDateTime()))->format(DATE_RFC822) ?></p>
        </div>
        <?php  }
        } ?>
      </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
@endsection
