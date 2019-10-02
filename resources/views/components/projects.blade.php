<section class="portfolio section-margin">
		<div class="container">
			<div class="section-intro">
				<h4 class="section-intro__title">OUR PORTFOLIO</h4>
				<h2 class="section-intro__subtitle bottom-border">Latest Completed Projects</h2>
			</div>
			@php 
				function format_date($date){
					return $date;
				}

			@endphp
			@php($i = 1)
			@foreach($projects as $project)
				@if(!($i % 2))
					<div class="row align-items-end pb-md-5 mb-4" id="number{{$i}}">
						<div class="col-md-7 mb-4 mb-md-0">
							<div class="portfolio__img">
								@if(count($project->pictures))
									<img class="img-fluid" src="{{Storage::disk('public')->url($project->pictures[0]->picture)}}" alt="">
								@else
									<img class="img-fluid" src="img/portfolio2_.png" alt="">
								@endif
							</div>
						</div>
						<div class="col-md-5 mb-5 pl-xl-5">
							<h4 class="section-intro__title left-border">{{format_date($project->project_from_date)}} to {{format_date($project->project_to_date)}}</h4>
							<h2 class="section-intro__subtitle small">{{$project->title}}</h2>
							<p>{{$project->description}}</p>

							<a class="btn btn--rightBorder mt-3" href="#/">Read More</a>
						</div>
					</div>																		
				@else
					<div class="row align-items-end pb-md-5 mb-4" id="number{{$i}}">
						<div class="col-md-5 mb-5 pr-xl-5 order-2 order-md-1">
							<h4 class="section-intro__title left-border">{{format_date($project->project_from_date)}} to {{format_date($project->project_to_date)}}</h4>
							<h2 class="section-intro__subtitle small">{{$project->title}}</h2>
							<p>{{$project->description}}</p>

							<a class="btn btn--rightBorder mt-3" href="#/">Read More</a>
						</div>
						<div class="col-md-7 mb-4 mb-md-0 order-1 order-md-2">
							<div class="portfolio__img">
								@if(count($project->pictures))
									<img class="img-fluid" src="{{Storage::disk('public')->url($project->pictures[0]->picture)}}" alt="">
								@else
									<img class="img-fluid" src="img/portfolio2_.png" alt="">
								@endif
							</div>
						</div>
					</div>
				@endif
				@php($i++)
			@endforeach

			@if($next != -1)
				<div class="text-center pt-2">
					<a href="?per_page={{$next}}#number{{$next-1}}">
						<button class="btn btn--rightBorder btn--leftBorder">Load More Projects</button>
					</a>
				</div>
			@endif
		</div>
	</section>