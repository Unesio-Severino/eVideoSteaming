@extends('layouts.base')

@section('content')
<!-- /.content-wrapper -->
<div id="content-wrapper">
    <div class="container-fluid pb-0">
            <div class="top-mobile-search">
                  <div class="row">
                     <div class="col-md-12">
                        <form class="mobile-search">
                           <div class="input-group">
                             <input type="text" placeholder="Search for..." class="form-control">
                               <div class="input-group-append">
                                 <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                               </div>
                           </div>
                        </form>
                     </div>
                  </div>
            </div>

            @if (session('message'))
                        @include('alerts.success-message')
             @endif

              <div class="video-block section-padding" style="min-height: 485px">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <a href="/courses/create" class="right-action-link text-gray mr-3">
                                Adicionar <i class="fa fa-plus" aria-hidden="true"></i>
                              </a>

                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> Top Rated</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> Viewed</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> Close</a>
                              </div>
                           </div>
                           <h6>Featured Videos</h6>
                        </div>
                     </div>

                    @foreach ( $courses as $course )
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                              <a href="#"><img class="img-fluid" src="{{ asset('assets/img/v1.png') }}" alt=""></a>
                              <div class="time">{{ $course->total_videos }} Videos</div>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#" style="color: rgba(0,0,0, .5) !important;">
                                     {{ $course->title }}
                                 </a>
                                 <a class="float-right" href="/courses/{{ $course->id }}/edit"><i class="fas fa-edit"></i></a>
                              </div>

                              <div class="video-title">
                                <a href="#">
                                    {{ $course->price }} MT
                                </a>
                             </div>

                              <div class="video-view">
                                {{ $course->duration }}
                             </div>
                              <div class="video-page text-success">
                                 Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                              <div class="video-view">
                                 10 visualizacoes &nbsp;<i class="fas fa-calendar-alt"></i> 11 dias atras
                              </div>

                           </div>
                        </div>
                     </div>
                    @endforeach



                  </div>
               </div>

    </div>

        <!-- Sticky Footer -->
        @include('layouts.Footer')
</div>
<!-- /.content-wrapper -->
@endsection




