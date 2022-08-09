@extends('layouts.frontend.app')
@section('content')
<main>

   @component('components.frontend.breadcrumb')
        @slot('breadcrumb')
        <div class="page__title-wrapper text-center">
         <h3> {{ __('Blog | Bidme Indonesia') }}</h3>
          <nav aria-label="breadcrumb">
             <ol class="breadcrumb justify-content-center">
               <li class="breadcrumb-item"><a href="/">{{ __('Beranda') }}</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{ __('Blog') }}</li>
             </ol>
          </nav>
      </div>
        @endslot
   @endcomponent

    <!-- blog area start -->
    <section class="blog__area pt-120 pb-60">
       <div class="container">
          <div class="row">
             
          </div>
       </div>
    </section>
    <!-- blog area end -->

 </main>
@endsection