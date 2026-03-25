<!DOCTYPE html>
<html lang="en">
  <head>
    <x-head-content />
  </head>
  <body>

  
    
  
  <div class="site-wrap">

    <x-navbar />

    @php $heroBg = asset('images/hero_bg_1.jpg'); @endphp
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('{{ $heroBg }}');"
    data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">

          <h1 class="text-white">Live A Life To The Fullest</h1>
          <p>Aug 30, 2019 <span class="mx-3">&bullet;</span> By Admin</p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
  
          <figure>
            <img src="{{ asset('images/hero_bg_1.jpg') }}" alt="Image" class="img-fluid">
            <figcaption>This is an image</figcaption>
          </figure>
  
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ratione dolores expedita id repudiandae
            nostrum aut, impedit repellat nam veritatis, pariatur facere reprehenderit alias atque molestias ipsum officia
            asperiores possimus eos, quis nemo hic. Autem molestias dolorum blanditiis quibusdam culpa nobis quam, soluta
            quasi quis, fugiat delectus pariatur, eos quae.</p>
          <p>Sequi mollitia architecto accusamus laborum nemo harum pariatur, earum magnam nihil consequuntur similique
            quas quae inventore dolorem ut quibusdam aliquam vel unde at explicabo! Esse saepe cupiditate nobis rerum
            soluta error alias explicabo reprehenderit pariatur! Architecto minus aliquid reiciendis iure, optio officia
            at a autem non blanditiis deserunt in labore.</p>
          <p>Quia mollitia, at labore eveniet perspiciatis accusantium molestiae tempore quos placeat quam laudantium
            tenetur ut distinctio maiores minus beatae et vero suscipit, excepturi veritatis veniam. Aliquam eaque laborum
            obcaecati. Perferendis, assumenda vel facilis fuga libero tempora reprehenderit dolorum corrupti eligendi ut
            rem aut magni eius possimus sed! Culpa, libero, eius.</p>
          <p>Optio repellat libero aliquam delectus ipsa officia voluptatibus repellendus fugiat earum? Nam, sunt? Dolor
            at ullam aperiam iusto deserunt, nulla libero illo veniam totam tenetur inventore voluptates nemo atque, nam.
            Voluptas dignissimos minus voluptatem molestiae? Nihil hic, consequuntur perspiciatis sapiente, doloremque
            impedit ipsa doloribus sed saepe ratione dicta voluptatibus at!</p>
          <p>Obcaecati voluptatem ea vitae id doloremque hic. Perspiciatis quia libero consectetur unde ullam, veritatis
            voluptate laborum enim quos, atque quasi animi sapiente beatae inventore obcaecati, esse rem ducimus quam
            officia ipsum temporibus repellendus facere. Explicabo delectus, magni eum voluptatibus nemo totam
            reprehenderit dolores deserunt rerum suscipit aperiam culpa, cupiditate nam.</p>
  
  
          <div class="pt-5">
            <p>Categories: <a href="#">Food</a>, <a href="#">Travel</a> Tags: <a href="#">#manila</a>, <a
                href="#">#asia</a></p>
          </div>
  
  
          <div class="pt-5">
            <h3 class="mb-5 text-white">6 Comments</h3>
            <ul class="comment-list">
              <li class="comment">
                <div class="vcard">
                  <img src="{{ asset('images/person_1.png') }}" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>Jean Doe</h3>
                  <div class="meta">January 9, 2018 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus,
                    ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                    impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply rounded">Reply</a></p>
                </div>
              </li>
  
              <li class="comment">
                <div class="vcard">
                  <img src="{{ asset('images/person_1.png') }}" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>Jean Doe</h3>
                  <div class="meta">January 9, 2018 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus,
                    ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                    impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply rounded">Reply</a></p>
                </div>
  
                <ul class="children">
                  <li class="comment">
                    <div class="vcard">
                      <img src="{{ asset('images/person_1.png') }}" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3>Jean Doe</h3>
                      <div class="meta">January 9, 2018 at 2:21pm</div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus,
                        ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                        impedit necessitatibus, nihil?</p>
                      <p><a href="#" class="reply rounded">Reply</a></p>
                    </div>
  
  
                    <ul class="children">
                      <li class="comment">
                        <div class="vcard">
                          <img src="{{ asset('images/person_1.png') }}" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                          <h3>Jean Doe</h3>
                          <div class="meta">January 9, 2018 at 2:21pm</div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                            necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure!
                            Quam voluptas earum impedit necessitatibus, nihil?</p>
                          <p><a href="#" class="reply rounded">Reply</a></p>
                        </div>
  
                        <ul class="children">
                          <li class="comment">
                            <div class="vcard">
                              <img src="{{ asset('images/person_1.png') }}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                              <h3>Jean Doe</h3>
                              <div class="meta">January 9, 2018 at 2:21pm</div>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste
                                iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                              <p><a href="#" class="reply rounded">Reply</a></p>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
  
              <li class="comment">
                <div class="vcard">
                  <img src="{{ asset('images/person_1.png') }}" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>Jean Doe</h3>
                  <div class="meta">January 9, 2018 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus,
                    ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                    impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply rounded">Reply</a></p>
                </div>
              </li>
            </ul>
            <!-- END comment-list -->
  
            <div class="comment-form-wrap">
              <h3 class="mb-5">Leave a comment</h3>
              <form action="#" class="">
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control" id="website">
                </div>
  
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn btn-primary px-4 py-3">
                </div>
  
              </form>
            </div>
          </div>
  
        </div>
  
  
        <div class="col-md-3 ml-auto">
          <div class="mb-5">
            <h3 class="h5 text-white mb-3">Search</h3>
            <form action="#" method="post">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
              </div>
            </form>
          </div>
  
          <div class="mb-5">
            <h3 class="h5 text-white mb-3">Popular Posts</h3>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="#">Lorem ipsum dolor sit amet</a></li>
              <li class="mb-2"><a href="#">Quaerat rerum voluptatibus veritatis</a></li>
              <li class="mb-2"><a href="#">Maiores sapiente veritatis reprehenderit</a></li>
              <li class="mb-2"><a href="#">Natus eligendi nobis</a></li>
            </ul>
          </div>
  
          <div class="mb-5">
            <h3 class="h5 text-white mb-3">Recent Comments</h3>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="#">James</a> <em>in</em> <a href="#">Lorem ipsum dolor sit amet</a></li>
              <li class="mb-2"><a href="#">James</a> <em>in</em> <a href="#">Quaerat rerum voluptatibus veritatis</a>
              </li>
              <li class="mb-2"><a href="#">James</a> <em>in</em> <a href="#">Maiores sapiente veritatis
                  reprehenderit</a></li>
              <li class="mb-2"><a href="#">James</a> <em>in</em> <a href="#">Natus eligendi nobis</a></li>
            </ul>
          </div>
  
        </div>
  
      </div>
    </div>
  </div>


  <div class="bg-primary" data-aos="fade">
    <div class="container">
      <div class="row">
        <a href="#" class="col-2 text-center py-4 social-icon d-block"><span
            class="icon-facebook text-white"></span></a>
        <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-twitter text-white"></span></a>
        <a href="#" class="col-2 text-center py-4 social-icon d-block"><span
            class="icon-instagram text-white"></span></a>
        <a href="#" class="col-2 text-center py-4 social-icon d-block"><span
            class="icon-linkedin text-white"></span></a>
        <a href="#" class="col-2 text-center py-4 social-icon d-block"><span
            class="icon-pinterest text-white"></span></a>
        <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-youtube text-white"></span></a>
      </div>
    </div>
  </div>

    <x-footer />

  </div>

  <x-scripts />
    
  </body>
</html>
