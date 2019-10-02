@extends('includes/layout', ['class'=>'hero-banner project-bg'])
@section('main_content')
    <div class="container">
      <h2 class="section-intro__subtitle">Our Projects</h2>
      <div class="btn-group breadcrumb">
        <a href="#/" class="btn">Home</a>
        <span class="btn btn--rightBorder">Projects</span>
      </div>
    </div>
  </header>

@component('components/projects',['projects' => $projects ?? [],'next' => $next ?? 7])
@endcomponent

@endsection
