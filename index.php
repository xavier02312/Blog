<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>Bootstrap</title>
        </head>
        <body>
            <header class="bg-dark py-4"> <!--on rajoute avec le site bootstrap du CSS-->
                <div class="container">
                    <!--en tête-->
                    <div class="row">
                      <!--ligne-->
                      <!--titre du site-->
                        <div class="col-6 col-lg-12 text-start text-lg-center">
                         <a href="#" title="Philosophy" class="text-white text-decoration-none h1 logo">
                            Philosophy.</a>
                        </div>
                          <!--menu burger-->
                        <div class="col-6 d-block d-lg-none text-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list text-white" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                              </svg>
                        </div>
                        <!--navigation-->
                        <div class="col-12 d-none d-lg-block">
                          <nav> 
                            <ul class="d-flex align-items-center justify-content-center gap-5 py-3">
                                <li class="nav-item">
                                <a href="#" title="Home" class="text-secondary text-decoration-none">Home</a>
                                </li>
                                <li class="nav-item">
                                <a  href="#" title="Categories" class="text-secondary text-decoration-none">Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" title="Style" class="text-secondary text-decoration-none">Style</a>
                                </li>
                                <li class="nav-item">
                                <a href="#" title="About" class="text-secondary text-decoration-none">About</a>
                                </li>
                                <li class="nav-item">
                                <a href="#" title="Contact" class="text-secondary text-decoration-none">Contact</a>
                                </li>
                            </ul>
                          </nav>
                        </div>
                        <!--carousel-->
                        <div class="col-12">
                          <div class="row d-flex align-items-center">
                            <!--fleche gauche-->
                            <div class="col-lg-3 d-none d-lg-block text-end">
                              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-caret-left-fill text-white" viewBox="0 0 16 16">
                                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                              </svg> 
                            </div>
                            <!--image du carousel-->
                              <div class="col-12 col-lg-6 pt-4 pt-lg-0"><img src="images/slide/02.jpg" alt="slide 02" class="w-100 rounded carousel-img">
                              </div>                
                            <!--fleche droite-->
                            <div class="col-lg-3 d-none d-lg-block text-start">
                              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-caret-right-fill text-white" viewBox="0 0 16 16">
                                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                              </svg>
                            </div>
                          </div>
                        </div>                   
                      </div> 
                    </div>                 
            </header>
                        <!--Dégrader-->
            <div class="gradient"></div>
                <main>  <!--contenue en mettent du bootstrap-->
                      <div class="container">
                        <div class="row">
                          <div class="col-12 col-lg-6 pb-5">
                            <article>
                              <a href="#" title="Titre de mon article" class="text-dark text-decoration-none">
                                <img src="images/01.jpg" alt="Image de mon article" class="w-100 rounded">
                                <h1 class="pt-2"> Just a standard Format Post</h1>
                              </a>
                              <p class="text-secondary">December 12,2021</p>
                              <P class="py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime ab quod dignissimos mollitia ex possimus distinctio quia commodi voluptatem deserunt...</P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
                                <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a>
                              </div>
                            </article>                            
                          </div>
                          <div class="col-12 col-lg-6 pb-5">
                            <article>
                              <a href="#" title="Titre de mon article" class="text-dark text-decoration-none">
                                <img src="images/01.jpg" alt="Image de mon article" class="w-100 rounded">
                                <h1 class="pt-2"> Just a standard Format Post</h1>
                              </a>
                              <p class="text-secondary">December 12,2021</p>
                              <P class="py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime ab quod dignissimos mollitia ex possimus distinctio quia commodi voluptatem deserunt...</P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
                                <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a>
                              </div>
                            </article>                            
                          </div>
                          <div class="col-12 col-lg-6 pb-5">
                            <article>
                              <a href="#" title="Titre de mon article" class="text-dark text-decoration-none">
                                <img src="images/01.jpg" alt="Image de mon article" class="w-100 rounded">
                                <h1 class="pt-2"> Just a standard Format Post</h1>
                              </a>
                              <p class="text-secondary">December 12,2021</p>
                              <P class="py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime ab quod dignissimos mollitia ex possimus distinctio quia commodi voluptatem deserunt...</P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
                                <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a>
                              </div>
                            </article>                            
                          </div>
                          <div class="col-12 col-lg-6 pb-5">
                            <article>
                              <a href="#" title="Titre de mon article" class="text-dark text-decoration-none">
                                <img src="images/01.jpg" alt="Image de mon article" class="w-100 rounded">
                                <h1 class="pt-2"> Just a standard Format Post</h1>
                              </a>
                              <p class="text-secondary">December 12,2021</p>
                              <P class="py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime ab quod dignissimos mollitia ex possimus distinctio quia commodi voluptatem deserunt...</P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
                                <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a>
                              </div>
                            </article>                            
                          </div>
                          <div class="col-12 col-lg-6 pb-5">
                            <article>
                              <a href="#" title="Titre de mon article" class="text-dark text-decoration-none">
                                <img src="images/01.jpg" alt="Image de mon article" class="w-100 rounded">
                                <h1 class="pt-2"> Just a standard Format Post</h1>
                              </a>
                              <p class="text-secondary">December 12,2021</p>
                              <P class="py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime ab quod dignissimos mollitia ex possimus distinctio quia commodi voluptatem deserunt...</P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
                                <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a>
                              </div>
                            </article>                            
                          </div>
                          <div class="col-12 col-lg-6 pb-5">
                            <article>
                              <a href="#" title="Titre de mon article" class="text-dark text-decoration-none">
                                <img src="images/01.jpg" alt="Image de mon article" class="w-100 rounded">
                                <h1 class="pt-2"> Just a standard Format Post</h1>
                              </a>
                              <p class="text-secondary">December 12,2021</p>
                              <P class="py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime ab quod dignissimos mollitia ex possimus distinctio quia commodi voluptatem deserunt...</P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
                                <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a>
                              </div>
                            </article>                            
                          </div>
                          <div class="col-12 col-lg-6 pb-5">
                            <article>
                              <a href="#" title="Titre de mon article" class="text-dark text-decoration-none">
                                <img src="images/01.jpg" alt="Image de mon article" class="w-100 rounded">
                                <h1 class="pt-2"> Just a standard Format Post</h1>
                              </a>
                              <p class="text-secondary">December 12,2021</p>
                              <P class="py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime ab quod dignissimos mollitia ex possimus distinctio quia commodi voluptatem deserunt...</P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
                                <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a>
                              </div>
                            </article>                            
                          </div>
                          <div class="col-12 col-lg-6 pb-5">
                            <article>
                              <a href="#" title="Titre de mon article" class="text-dark text-decoration-none">
                                <img src="images/01.jpg" alt="Image de mon article" class="w-100 rounded">
                                <h1 class="pt-2"> Just a standard Format Post</h1>
                              </a>
                              <p class="text-secondary">December 12,2021</p>
                              <P class="py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime ab quod dignissimos mollitia ex possimus distinctio quia commodi voluptatem deserunt...</P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
                                <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a>
                              </div>
                            </article>                            
                          </div>
                          <div class="col-12 col-lg-6 pb-5">
                            <article>
                              <a href="#" title="Titre de mon article" class="text-dark text-decoration-none">
                                <img src="images/01.jpg" alt="Image de mon article" class="w-100 rounded">
                                <h1 class="pt-2"> Just a standard Format Post</h1>
                              </a>
                              <p class="text-secondary">December 12,2021</p>
                              <P class="py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime ab quod dignissimos mollitia ex possimus distinctio quia commodi voluptatem deserunt...</P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
                                <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a>
                              </div>
                            </article>                            
                          </div>
                          <div class="col-12 col-lg-6 pb-5">
                            <article>
                              <a href="#" title="Titre de mon article" class="text-dark text-decoration-none">
                                <img src="images/01.jpg" alt="Image de mon article" class="w-100 rounded">
                                <h1 class="pt-2"> Just a standard Format Post</h1>
                              </a>
                              <p class="text-secondary">December 12,2021</p>
                              <P class="py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime ab quod dignissimos mollitia ex possimus distinctio quia commodi voluptatem deserunt...</P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
                                <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a>
                              </div>
                            </article>                            
                          </div>
                          <div class="col-12 col-lg-6 pb-5">
                            <article>
                              <a href="#" title="Titre de mon article" class="text-dark text-decoration-none">
                                <img src="images/01.jpg" alt="Image de mon article" class="w-100 rounded">
                                <h1 class="pt-2"> Just a standard Format Post</h1>
                              </a>
                              <p class="text-secondary">December 12,2021</p>
                              <P class="py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime ab quod dignissimos mollitia ex possimus distinctio quia commodi voluptatem deserunt...</P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="#" title="Design" class="badge rounded-pill bg-primary text-decoration-none">Design</a>
                                <a href="#" title="Photography" class="badge rounded-pill bg-primary text-decoration-none">Photography</a>
                              </div>
                            </article>                            
                          </div>
                        </div>
                      </div>                      
                </main>        
                <!--footer en mettent du bootstrap-->
                <footer class="bg-dark py-4">
                  <div class="container">
                        <p class="m-0 text-white">&copy; Copyright Philosophy 2022</p>
                  </div>
              </footer>
        </body>
        </html>