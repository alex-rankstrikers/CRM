@extends('layouts.crm')

@section('head')

@stop

@section('content')
<style>

</style>

<form accept-charset="UTF-8" action="{{ route('crm.store') }}" method="post">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="container">
  <div class="ctrlable_div">
  <div class="steps" id="rootwizard">
  <div class="row mt-30 "></div>

  <div class="card mb-3">

  <div class="card-body">
  <h4 class="card-title">Inbox</h4>
  <div class="row mt-30 "></div>
  <div class="col-sm-12 col-md-12 col-lg-12">

  <div id="inbox" class="panel panel-default">

  <div class="panel-body" style="margin-bottom: 10px;">
    Here are the 10 most recent messages in your inbox.
  </div>

  <div class="list-group">
    <?php if (isset($messages)) {
      foreach($messages as $message) { ?>
    <div class="list-group-item">
      <h3 class="list-group-item-heading"><?php echo $message->getSubject() ?></h3>
      <h4 class="list-group-item-heading"><?php echo $message->getFrom()->getEmailAddress()->getName() ?></h4>
      <p class="list-group-item-heading text-muted"><em>Received: <?php echo $message->getReceivedDateTime()->format(DATE_RFC2822) ?></em></p>
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