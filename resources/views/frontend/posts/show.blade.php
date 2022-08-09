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
    <section class="blog__area pt-120 pb-120">
       <div class="container">
          <div class="row">
             <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="blog__wrapper">
                  
                </div>
             </div>
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-8 mt-5">
                <div class="blog__sidebar pl-30">
                   <div class="sidebar__widget mb-60 wow fadeInUp" data-wow-delay=".5s">
                      <div class="sidebar__widget-head">
                        <div class="sidebar__search my-3">
                            <form action="#">
                               <input type="text" placeholder="Search">
                               <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                         </div>
                         <h3 class="sidebar__widget-title">Categories</h3>
                      </div>
                      <div class="sidebar__widget-body">
                         <div class="sidebar__category">
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="blog-details.html">{{ $category->category }} <span>(05)</span></a></li>
                                @endforeach
                            </ul>
                         </div>
                      </div>
                   </div>
                   <div class="sidebar__widget mb-60 wow fadeInUp" data-wow-delay=".7s">
                      <div class="sidebar__widget-head">
                         <h3 class="sidebar__widget-title">Recent Post</h3>
                      </div>
                      <div class="sidebar__widget-body">
                         <div class="rc__post">
                            <ul>
                                @foreach ($posts as $post)
                                <li class="d-flex align-items-center mb-30">
                                    <div class="rc__thumb mr-30">
                                       <a href="{{ $post->slug }}">
                                          <img class="lazyload" data-src="{{ asset('assets/images/artikel/' . $post->img ) }}" alt="">
                                       </a>
                                    </div>
                                    <div class="rc__content">
                                       <div class="rc__meta">
                                          <span>{{ $post->created_at }}</span>
                                       </div>
                                       <h3 class="rc__title"><a href="{{ $post->slug }}">{{ $post->title  }}</a></h3>
                                    </div>
                                 </li>
                                @endforeach
                            </ul>
                         </div>
                      </div>
                   </div>
                   <div class="sidebar__widget mb-60 wow fadeInUp" data-wow-delay="1.2s">
                      <div class="sidebar__widget-head">
                         <h3 class="sidebar__widget-title">Tags</h3>
                      </div>
                      <div class="sidebar__widget-body">
                          <div class="sidebar__tags">
                             @foreach ($tags as $tag)
                             <a href="#">{{ $tag->tag_name }}</a>
                             @endforeach
                          </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- blog area end -->
     
  </main>
@endsection