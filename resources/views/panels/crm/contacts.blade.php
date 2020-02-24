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
  <h4 class="card-title">Contacts</h4>
  <div class="row mt-30 "></div>
  <div class="col-sm-12 col-md-12 col-lg-12">

<div id="inbox" class="panel panel-default">
  <div class="panel-body" style="margin-bottom: 10px;">
 Here are your first 10 contacts.
   </div>
  <div class="list-group">
    <?php if (isset($contacts)) {
      foreach($contacts as $contact) { ?>
    <div class="list-group-item">
      <h3 class="list-group-item-heading"><?php echo $contact->getGivenName().' '.$contact->getSurname() ?></h3>
      <p class="list-group-item-heading text-muted"><?php echo $contact->getEmailAddresses()[0]['address']?></p>
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