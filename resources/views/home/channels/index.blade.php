@extends('layouts.base')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid pb-0">
       <div class="video-block section-padding">
          <div class="row">
          <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">

                            <a href="/channels/create" class="" style="margin-right: 20px">
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

                   <h6>Channels</h6>

                   @if (session('message'))
                        @include('alerts.success-message')
                   @endif

                </div>
             </div>

             @foreach ($channels as $channel)

             <div class="col-xl-3 col-sm-6 mb-3">
                <div class="channels-card">

                     @if($channel->user_id === auth()->id())
                            <a href="/channels/{{ $channel->id }}/edit" style="position: absolute; right: 10px; top:5px">
                              <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                     @endif

                        <div class="channels-card-image">
                            <a href="/channels/{{ $channel->id }}">

                                @if($channel->logo !== 'assets/img/s4.png')
                                    <img class="img-fluid" src="{{ asset('storage'. $channel->logo) }}" alt="">
                                @else
                                    <img class="img-fluid" src="{{ asset('assets/img/s4.png') }}" alt="">
                                @endif

                            </a>
                            <div class="channels-card-image-btn">
                                    <button type="button" class="btn @if( $channel->user_id === auth()->id() ) btn-outline-secondary @else btn-outline-danger @endif btn-sm">
                                        Inscrito <strong>1.4M</strong>
                                    </button>
                            </div>
                        </div>

                   <div class="channels-card-body">
                      <div class="channels-title">
                      <a href="/channels/{{ $channel->id }}">
                         {{ $channel->name }}

                        @if($channel->user_id === auth()->id())
                           <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle"></i></span></a>
                        @endif
                      </div>
                      <div class="channels-view">
                         0 subscrições
                      </div>
                   </div>

                </div>
             </div>
             @endforeach

          </div>
          <nav aria-label="Page navigation example">
             <ul class="pagination justify-content-center pagination-sm mb-4">
                <li class="page-item disabled">
                   <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                   <a class="page-link" href="#">Next</a>
                </li>
             </ul>
          </nav>
       </div>
       <hr>
       <div class="video-block section-padding">
          <div class="row">
             <div class="col-md-12">
                <div class="main-title">
                   <div class="btn-group float-right right-action">
                      <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                         <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                         <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                         <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                      </div>
                   </div>
                   <h6>Featured Videos</h6>
                </div>
             </div>
             <div class="col-xl-3 col-sm-6 mb-3">
                <div class="video-card">
                   <div class="video-card-image">
                      <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                      <a href="#"><img class="img-fluid" src="{{ asset('assets/img/v5.png') }}" alt=""></a>
                      <div class="time">3:50</div>
                   </div>
                   <div class="video-card-body">
                      <div class="video-title">
                         <a href="#">There are many variations of passages of Lorem</a>
                      </div>
                      <div class="video-page text-success">
                         Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                      </div>
                      <div class="video-view">
                         1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-3 col-sm-6 mb-3">
                <div class="video-card">
                   <div class="video-card-image">
                      <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                      <a href="#"><img class="img-fluid" src="{{ asset('assets/img/v6.png') }}" alt=""></a>
                      <div class="time">3:50</div>
                   </div>
                   <div class="video-card-body">
                      <div class="video-title">
                         <a href="#">There are many variations of passages of Lorem</a>
                      </div>
                      <div class="video-page text-danger">
                         Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Unverified"><i class="fas fa-frown text-danger"></i></a>
                      </div>
                      <div class="video-view">
                         1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-3 col-sm-6 mb-3">
                <div class="video-card">
                   <div class="video-card-image">
                      <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                      <a href="#"><img class="img-fluid" src="{{ asset('assets/img/v7.png') }}" alt=""></a>
                      <div class="time">3:50</div>
                   </div>
                   <div class="video-card-body">
                      <div class="video-title">
                         <a href="#">There are many variations of passages of Lorem</a>
                      </div>
                      <div class="video-page text-success">
                         Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                      </div>
                      <div class="video-view">
                         1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-3 col-sm-6 mb-3">
                <div class="video-card">
                   <div class="video-card-image">
                      <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                      <a href="#"><img class="img-fluid" src="{{ asset('assets/img/v8.png') }}" alt=""></a>
                      <div class="time">3:50</div>
                   </div>
                   <div class="video-card-body">
                      <div class="video-title">
                         <a href="#">There are many variations of passages of Lorem</a>
                      </div>
                      <div class="video-page text-success">
                         Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                      </div>
                      <div class="video-view">
                         1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- /.container-fluid -->
    <!-- Sticky Footer -->
    @include('layouts.footer')
 </div>
 <!-- /.content-wrapper -->
 @endsection
