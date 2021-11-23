@extends('layouts.base')

@section('content')
<div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-8">


                     @if (session('message'))
                      @include('alerts.success-message')
                     @endif

                     <div class="single-video-left">
                           <div class="single-video">

                            <form action="{{ route('videos.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                   <div class="col-md-8 mx-auto text-center pt-5 pb-5">
                                      <h3><i class="fas fa-file-upload text-primary" style="font-size: 50px"></i></h3>
                                      <h4 class="mt-5">Selecione os arquivos de vídeo para fazer upload</h4>
                                      <p class="land">ou arraste e solte arquivos de vídeo</p>
                                      <p>
                                         <input type="file" name="videos[]" multiple value="{{ old('videos') ? old('videos') : '' }}" class="form-control @error('videos') is-invalid @enderror"  >
                                      </p>

                                      @error('videos')
                                         <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                         </span>
                                      @enderror

                                      <input type="hidden" name="course_id" value=" {{ $course->id }}" >

                                      <div class="mt-4">
                                         <button class="btn btn-outline-primary" type="submit">Gravar os videos</button>
                                      </div>

                                   </div>
                                </div>
                             </form>

                           </div>
                           <div class="single-video-title box mb-3">
                              <h2>
                              <a href="#"> {{ $course->title }} </a></h2>
                              <p class="mb-0"><i class="fas fa-eye"></i> 0 visualizações
                            </p>
                           </div>
                           <div class="single-video-author box mb-3">
                              <div class="float-right">
                                 <button class="btn btn-danger" type="button">Subscribe <strong>1.4M</strong></button>
                                 <button class="btn btn btn-outline-danger" type="button"><i class="fas fa-bell"></i></button>
                              </div>

                              @if(auth()->user()->avatar)
                                <img alt="" class="img-fluid" src="{{ asset('storage'. auth()->user()->avatar) }}">
                                    @else
                                <img class="img-fluid" src="{{ asset('assets/img/User3.png') }}" alt="">
                              @endif

                              <p>
                                 <a href="#">
                                     <strong> {{ auth()->user()->name }}</strong>
                                 </a>
                                 <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified">
                                    <i class="fas fa-check-circle text-success"></i>
                                </span>
                              </p>
                              <small> Publicado em 17 de Agosto de 2020 </small>
                           </div>
                           <div class="single-video-info-content box mb-3">

                           <div class="row d-flex justify-content-center mt-100 mb-100">
                        <div class="col-lg-12">
                            <div class="card p-3">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Apenas Comentarios</h4>
                                </div>
                                <div class="comment-widgets">
                                    <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row my-3">
                                        <div class="p-2"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583336/AAA/4.jpg" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium"> James Thomas</h6>
                                            <span class="m-b-15 d-block"> This is awesome website. I would love to comeback again. </span>
                                            <div class="comment-footer my-2"> <span class="text-muted float-right">April 14, 2019</span>
                                            <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                            </div>
                                        </div>
                                    </div> <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row my-3">
                                        <div class="p-2"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583319/AAA/3.jpg" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text active w-100 my-2">
                                            <h6 class="font-medium">Michael Hussey</h6>
                                            <span class="m-b-15 d-block">Thanks bbbootstrap.com for providing such useful snippets. </span>
                                            <div class="comment-footer">
                                            <span class="text-muted float-right">May 10, 2019</span>
                                            <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                            </div>
                                        </div>
                                    </div> <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row my-3">
                                        <div class="p-2"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583246/AAA/2.jpg" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text w-100 my-2">
                                            <h6 class="font-medium">Johnathan Doeting</h6>
                                            <span class="m-b-15 d-block">Great industry leaders are not the real heroes of stock market. </span>
                                            <div class="comment-footer">
                                            <span class="text-muted float-right">August 1, 2019</span>
                                            <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                            </div>
                                        </div>
                                    </div> <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row my-3">
                                        <div class="p-2"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583319/AAA/3.jpg" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text active w-100 my-2">
                                            <h6 class="font-medium">Michael Hussey</h6>
                                            <span class="m-b-15 d-block">Thanks bbbootstrap.com for providing such useful snippets. </span>
                                            <div class="comment-footer">
                                            <span class="text-muted float-right">May 10, 2019</span>
                                            <button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                            </div>
                                        </div>
                                    </div> <!-- Comment Row -->
                                </div> <!-- Card -->
                            </div>
                        </div>
                            </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="single-video-right">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="adblock">
                                    <div class="img">
                                       Google AdSense<br>
                                       336 x 280
                                    </div>
                                 </div>

                                 <div class="main-title">
                                    <div class="btn-group float-right right-action">
                                       <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right">
                                          <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> Top Rated</a>
                                          <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> Viewed</a>
                                          <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> Close</a>
                                       </div>
                                    </div>
                                    <h6>Up Next</h6>
                                 </div>

                              </div>
                            <div class="col-md-12">

                            @foreach($course->videos as $index => $video)

                                    @if($index > 0 && $index % 5 === 0 )
                                        <div class="adblock mt-0">
                                            <div class="img">
                                            Google AdSense<br>
                                            336 x 280
                                            </div>
                                        </div>
                                    @endif

                                    <div class="video-card video-card-list">
                                        <div class="video-card-image">
                                        <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                        <a href="#">

                                            @if($video->image_url)
                                                <img class="img-fluid" src="{{ asset('storage'. $video->image_url) }}" alt="">
                                            @else
                                                <img class="img-fluid" src="{{ asset('assets/img/v1.png') }}" alt="">
                                            @endif

                                        </a>
                                        <div class="time"></div>
                                        </div>
                                        <div class="video-card-body">
                                            <div class="btn-group float-right right-action">
                                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> Top Rated</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i>  Viewed</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>  Close</a>
                                            </div>
                                        </div>
                                        <div class="video-title">
                                            <a href="#">{{$video->title}}</a>
                                        </div>
                                        <div class="video-page text-success">
                                            Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                        </div>
                                        <div class="video-view">
                                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                        </div>
                                        </div>
                                    </div>
                             @endforeach

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
         <!-- /.content-wrapper -->
@endsection
