@extends('includes/layout', ['class'=>'hero-banner project-bg'])
@section('main_content')

    <div class="container">
      <h2 class="section-intro__subtitle">About Us</h2>
      <div class="btn-group breadcrumb">
        <a href="#/" class="btn">Home</a>
        <span class="btn btn--rightBorder">About</span>
      </div>
    </div>
  </header>

@component('components/introduction', ['page'=>'about'])
@endcomponent

@component('components/services')
@endcomponent
    
@component('components/teaser')
@endcomponent

@component('components/project_quote_callout')
@endcomponent

@endsection