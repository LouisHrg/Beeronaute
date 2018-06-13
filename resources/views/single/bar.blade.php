@extends('layouts.layout')

@section('content')
@include('layouts.navbar')
<div class="container feed">
	<div class="row ">
		<div class="mx-auto col-md-10">
			<div class="card text-white bg-dark">
				<div class="img-bar-home">
					{{ $bar->getFirstMedia('featured-bar') }}
				</div>
				<div class="block-body">
					<div class="row text-center">
						<div class="mx-auto col-md-4">
							<h1 class="text-center">{{ $bar->name }}</h1>
							<p class="text-center sub">{!! $bar->description !!}</p>
						</div>
					</div>
					<div class="row text-center">
						<div class="col-md-4">
							<p> {{ $bar->location }}</p>
							<p><span class="icon icon-pushpin"></span> {{ $bar->city->name }}</p>
						</div>
						<div class="col-md-4">
							{!! $bar->printSchedule() !!}
							<br>
							@if($bar->instantScheduleInfo() == 1)
							<strong>Actuellement ouvert</strong>
							@else
							<strong>Actuellement fermé</strong>
							@endif

						</div>
						<div class="col-md-4">
							<p><span class="icon icon-phone"></span> {{ $bar->phone }}</p>
							@isset($bar->email)
							<p><span class="icon icon-mail"></span> {{ $bar->email }}</p>
							@endisset
						</div>
					</div>
					@role('manager')
					<div class="row">
						<div class="text-center mx-auto col-md-12 actions-bar">
							<button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#newPostModal">Ajouter un post</button>
							<a href="{{route('manage-event-create')}}" class="btn btn-primary btn-sm" >Créer un évenement</a>
						</div>
					</div>
					@endrole
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">

					@if($events->isNotEmpty())
					<div class="card feed-element block-feed block-home">
						<div class="card-header">Evenements</div>
						<div class="card-body">
							@foreach($events as $event)
							<div class="row">
								<div class="col-md-4">
									<div class="img-bar-home-event">
										{{ $event->getFirstMedia('featured-event') }}
									</div>
								</div>
								<div class="col-md-8">
									<h5 class="card-title">{{ $event->name }}</h5>
									<h6 class="card-subtitle mb-2 text-muted">{{ $event->published->diffForHumans() }}</h6>
									<p class="text-muted">Du {{ date('d/m/Y H:i',strtotime($event->startDate)).' au '.date('d/m/Y H:i',strtotime($event->endDate)) }}</p>
									<div class="row">
										<div class="col-md-8">
											<div class="progress">
												<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $event->subscriptions()->count() }}" aria-valuemin="0" aria-valuemax="{{ $event->slot }}" style="width: {{ $event->subscriptions()->count()/ $event->slot*100 }}%"></div>
											</div>
											<p class="text-muted">Il reste {{$event->slot-$event->subscriptions()->count()}} places </p> 
											<br>			
										</div>
										<div class="col-md-4">
											<a href="{{ route('event-single',$event->id) }}" class="btn btn-primary btn-sm btn-block"> Voir plus </a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endif
					<h3> Messages : </h3>
					@foreach($posts as $post)

					<div id="post{{$post->id}}" class="card feed-element block-feed block-home">
						<div class="card-body">
							<h4 class="card-title">{{ $post->title }}</h4>
							<p class="card-text">{{ $post->body }}</p>
							<h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at->diffForHumans() }}</h6>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>

	</div>
</div>

@role('manager')
<div class="modal fade" id="newPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nouveau post</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['action' => ['PostsController@savePost',$bar->id], 'method' => 'POST','files'=>false ]) !!}
				{{ Form::token() }}
				

				{{ Form::bsTextLong('body','Message',"", old('description'),[],"Saisissez votre message") }}           

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
				<button type="submit" class="btn btn-primary">Ajouter !</button>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endrole

@endsection