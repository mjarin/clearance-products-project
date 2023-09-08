
    <footer class="section-footer bg-dark footer-dark mt-5">
        <div class="container">
          <section class="footer-main padding-y">
            <div class="row">
              <aside class="col-12 col-sm-6 col-lg-3 col-md-6">
                <article class="me-lg-4">
                 <h6 class="title">Address :</h6>
                <ul class="list-menu">
                 <li><a class="text-decoration-none">
                  Flat# D-1 (1st Floor), <br> House# 345,
                  Afsar Tower <br>(Opposit of Eastern Mollika),<br>
                  Elephant Road, Dhaka - 1205
                  </a>
                 </li>
                 </ul>
                </article>
              </aside>
              <aside class="col-12 col-sm-6 col-lg-3 col-md-6">
                <h6 class="title">Useful Links</h6>
                <ul class="list-menu">
                  <li> <a class="text-decoration-none" target="_blank"  href="{{ url('/about-us') }}">About us</a></li>
                  <li> <a class="text-decoration-none" target="_blank"  href="{{ url('/terms-and-cndition') }}">Terms and Condition</a></li>
                  <li> <a class="text-decoration-none" target="_blank"  href="{{ url('/privacy-policy') }}">Privacy policy</a></li>
                <li> <a class="text-decoration-none" target="_blank"  href="{{ url('/return-policy') }}">Return Policy</a></li>
                </ul>
              </aside>
              

              <aside class="col-12 col-sm-6 col-lg-3 col-md-6">
                <h6 class="title">Top Categories</h6>
                <ul class="list-menu">
                  @php
                  $top_categories=App\Models\Category::where('status','=','1')->get();
                  @endphp
                @foreach ($top_categories as $category)

                <li>
                <a class="text-decoration-none" href="{{ url('footer-cate/'.$category->id) }}">
                    {{$category->category_name}}
                </a>
                </li>
                @endforeach
                </ul>
              </aside>
              
              
              <aside class="col-6 col-sm-6 col-lg-3 col-md-6">
                <h6 class="title">© 2022- bdclearance.com</h6>
                <ul class="list-menu">
                <li> <a class="text-decoration-none" >
                All rights reserve
                </a>
               </li>
                </ul>
              </aside>

            </div> <!-- row.// -->
          </section>  <!-- footer-top.// -->
          <hr class="my-0">
          <section class="footer-bottom d-flex justify-content-center">
            <div>
            <ul class="list-menu">
                <li> <a class="text-decoration-none" >
                <!--bdclearance.com-->
                </a>
               </li>
                </ul>
            <!--<p class="">bdclearance.com </p>-->
            </div>
          </section>
        </div> <!-- container end.// -->
        </footer>