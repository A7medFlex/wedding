<!DOCTYPE html>
<html lang="ar" dir="rtl">

    <x-styles title="قاعة أوتار"></x-styles>

    <body>
        @if(session('success'))
            <div id="rated">
                {{session('success')}}
            </div>
        @endif
        <div class="header">
            <div class="logo">أوتار ..</div>
            <ul>
                <li><a href="#opinion">أراء العملاء</a></li>
                <li><a href="#rateus">قيمنا</a></li>
                <li><a href="#connect">تواصل معنا</a></li>
            </ul>
        </div>

        <div class="container gallery">
            <div class="image-grid">
                @foreach ($images as $image)
                    @if ($loop->first)
                        <img class="image-grid-col-2 image-grid-row-2 " src="{{ $image->image }}" alt="architecture">
                    @else
                        <img class="" src="{{ $image->image }}" alt="architecture">
                    @endif
                @endforeach
            </div>
        </div>
        <div class="container slider" id="opinion">
            <h3 class="client">أراء العملاء</h3>

            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($ratings as $rating )
                    <div class="swiper-slide">
                        <div class="div1 eachdiv">
                            <div class="userdetails">
                                <div class="img"><i class="fas fa-user"></i></div>
                            <div class="detbox">
                                <p class="name">{{ $rating->name }}</p>
                                <div class="rate">
                                    @if ($rating->rating == 1)
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="empty"><i class="fas fa-star"></i></span>
                                        <span class="empty"><i class="fas fa-star"></i></span>
                                        <span class="empty"><i class="fas fa-star"></i></span>
                                        <span class="empty"><i class="fas fa-star"></i></span>
                                    @endif
                                    @if ($rating->rating == 2)
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="empty"><i class="fas fa-star"></i></span>
                                        <span class="empty"><i class="fas fa-star"></i></span>
                                        <span class="empty"><i class="fas fa-star"></i></span>
                                    @endif
                                    @if($rating->rating == 3)
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="empty"><i class="fas fa-star"></i></span>
                                        <span class="empty"><i class="fas fa-star"></i></span>
                                    @endif
                                    @if ($rating->rating == 4)
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="empty"><i class="fas fa-star"></i></span>
                                    @endif
                                    @if ($rating->rating == 5)
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                        <span class="fill"><i class="fas fa-star"></i></span>
                                    @endif
                                </div>
                            </div>
                            </div>
                            @if ($rating->notes)
                                <div class="review">
                                    {{ $rating->notes }}
                                </div>
                            @else
                                <div class="review">
                                   لم يتم ادخال اي ملاحظات
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>


            </div>
        </div>
        {{-- rating form  --}}
        <div class="container rating" id="rateus">
            <h3 class="client">قيمنا</h3>
            <form action="{{ route('rate') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form first">
                    <div class="details">
                        <div class="fields">
                            <div class="input-field">
                                <label>الاسم</label>
                                <input value="{{ old('name') }}" name="name" type="text" placeholder="برجاء ادخال الاسم" required>
                                @error('name')
                                    <div id="danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-field">
                                <label>التقييم</label>
                                <div class="rate">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                                @error('rating')
                                    <div id="danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-field adjusted">
                                <label>ملاحظات</label>
                                <textarea value="{{ old('notes') }}" name="notes" placeholder="برجاء ادخال ملاحظاتك"></textarea>
                                @error('notes')
                                    <div id="danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit">تقييم</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <footer id="connect">
            <h3 class="client">تواصل معنا</h3>
            <div class="container" style="margin-top: 30px;">
                <div class="gr">
                    <p>موقع الصالة:</p>
                    @if ($details->location)
                        <p>{{ $details->location }}</p>
                    @endif
                </div>
                <div class="gr">
                    <p>التواصل:</p>
                    @if ($details->phoneone)
                        <p>{{ $details->phoneone }}</p>
                    @endif
                    @if($details->phonetwo)
                        <p>{{ $details->phonetwo }}</p>
                    @endif
                </div>
                <div class="gr">
                    <p>تجدنا ايضا هنا:</p>
                    <div class="social-icons">
                        @if ($details->instagram)
                            <a href="{{ $details->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if ($details->snapchat)
                            <a href="{{ $details->snapchat }}" target="_blank"><i class="fab fa-snapchat-square"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>
