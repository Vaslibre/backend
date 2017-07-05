@extends('layouts.front')

@section('content')
<section class="p-y-md">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-list">    
                    <div class="blog-post">
                        <img src="images/bg-1.jpg" alt="">
                        <h4><a href="#">Standard blog post with photo</a></h4>
                        <ul class="post-meta">
                            <li class="text-edit">
                                <i class="fa fa-user"></i>Posted by <a href="#">John Doe</a>
                            </li>
                            <li class="text-edit">
                                <i class="fa fa-folder-open"></i> <a href="#">Web Marketing</a>, <a href="#">Seo</a>, <a href="#">Startup</a>
                            </li>
                            <li class="text-edit">
                                <i class="fa fa-comments"></i> <a href="#">4 comments</a>
                            </li>
                            <li class="text-edit">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> 29 OCT 2015</a>
                            </li>
                        </ul>
                        <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                        <a href="" class="btn btn-blue m-t"> Continue Reading</a>
                    </div>
                </div>
                <div class="text-center">
                    <ul class="pagination">
                        <li class="text-edit"><a href="#">Prev</a></li>
                        <li class="active text-edit"><a href="#">1</a></li>
                        <li class="text-edit"><a href="#">2</a></li>
                        <li class="text-edit"><a href="#">3</a></li>
                        <li class="text-edit"><a href="#">4</a></li>
                        <li class="text-edit"><a href="#">5</a></li>
                        <li class="text-edit"><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget hidden-sm">
                    <form role="form">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-search"></i>
                            </span>
                            <input type="text" class="form-control addon-left" placeholder="Search for...">
                        </div>
                    </form>
                </div>
                <div class="widget">
                    <div class="w-title">
                        <h5>sobre vaslibre</h5>
                    </div>
                    <img src="https://vaslibre.org.ve/img/vaslibre_log.png" class="img-responsive m-b" alt="VaSLibre">
                    <p><strong>VaSLibre</strong> (Valencia/Venezuela Software Libre) nació de la nada, de un solo pensamiento, como un pensamiento radical, donde muchos de nosotros teníamos la misma meta, construir un grupo fuerte y solidario, contando para ello con una buena base de colaboradores. </p>
                </div>
                <div class="widget">
                    <div class="w-title">
                        <h5>últimas publicaciones</h5>
                    </div>
                    <ul class="latest-post">
                    @for($i = 0; $i < 4; $i++)
                        <li>
                            <a href="#"><img src="images/bg-2.jpg" alt="" class="img-latest"></a>
                            <div class="title-latest text-edit">
                                <a href="">Using Modern SEO</a>
                                    August 25, 2014
                            </div>
                        </li>                        
                    @endfor
                    </ul>
                </div>
                <div class="widget">
                    <div class="w-title">
                        <h5 class="m-b-md">
                            nuestras redes
                        </h5>
                    </div>
                    <div class="w-social social-btn">
                        <a href="#" class="sb-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="sb-instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="sb-linkedin"><i class="fa fa-linkedin"></i></a>
                        <a href="#" class="sb-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="sb-pinterest"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
                <div class="widget">
                    <div class="w-title">
                        <h5 class="m-b-md">
                            nube de tags
                        </h5>
                    </div>
                    <div class="w-tags">
                        <a href="" class="text-edit">Portfolio</a>
                        <a href="" class="text-edit">Design</a>
                        <a href="" class="text-edit">Link</a>
                        <a href="" class="text-edit">Gallery</a>
                        <a href="" class="text-edit">Video</a>
                        <a href="" class="text-edit">Clean</a>
                        <a href="" class="text-edit">Retina</a>
                    </div>
                </div>
                <div class="widget">
                    <div class="w-title">
                        <h5 class="m-b-md">
                            archivos
                        </h5>
                    </div>
                    <div class="w-tags">
                        <ol class="list-unstyled">
                            <li><a href="#">March 2014</a></li>
                            <li><a href="#">February 2014</a></li>
                            <li><a href="#">January 2014</a></li>
                            <li><a href="#">December 2013</a></li>
                            <li><a href="#">November 2013</a></li>
                            <li><a href="#">October 2013</a></li>
                            <li><a href="#">September 2013</a></li>
                            <li><a href="#">August 2013</a></li>
                            <li><a href="#">July 2013</a></li>
                            <li><a href="#">June 2013</a></li>
                            <li><a href="#">May 2013</a></li>
                            <li><a href="#">April 2013</a></li>
                        </ol>
                    </div>
                </div>
                <div class="widget">
                    <div class="w-title">
                        <h5 class="m-b-md">
                            SITIOS AMIGOS
                        </h5>
                    </div>
                    <div class="w-tags">
                        <ol class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ol>
                    </div>
                </div>
                <div class="widget">
                    <div class="w-title">
                        <h5 class="m-b-md">
                            planeta vaslibre
                        </h5>
                    </div>                    
                    <img src="http://planeta.vaslibre.org.ve/img/planeta_vaslibre_rss_200x200.png" class="img-responsive m-b" alt="VaSLibre">
                </div>              
            </div>
        </div>
    </div>
</section>
@endsection