<!DOCTYPE html>
<html lang="ar" dir="rtl">

    <x-styles title="قاعة أوتار"></x-styles>

    <body>
        @if(session('success'))
            <div id="rated">
                {{session('success')}}
            </div>
        @endif
        <header>
            <span class="logo"><img src="https://i.im.ge/2022/07/07/u3Pd5p.png" alt=""></span>
            <p>قاعة أوتار للحفلات والمناسبات</p>
            <span class="logo"><img src="https://i.im.ge/2022/07/07/u3Pd5p.png" alt=""></span>
        </header>

        <div class="container gallery">
            <div class="image-grid">
                <img class="image-grid-col-2 image-grid-row-2" src="https://images.unsplash.com/photo-1568574437205-11a959e9df9c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8d3JhdGh8ZW58MHx8MHx8&w=1000&q=80" alt="architecture">
                <img src="https://images.pexels.com/photos/1172253/pexels-photo-1172253.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="architecture">
                <img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aHVtYW58ZW58MHx8MHx8&w=1000&q=80" alt="architecture">
                <img src="https://media.istockphoto.com/photos/villefranche-on-sea-in-evening-picture-id1145618475?k=20&m=1145618475&s=612x612&w=0&h=_mC6OZt_eWENYUAZz3tLCBTU23uvx5beulDEZHFLsxI=" alt="architecture">
                <img src="https://st.depositphotos.com/1609126/3295/i/600/depositphotos_32954869-stock-photo-niagara-falls.jpg" alt="architecture">
              </div>
        </div>
        <div class="container slider">
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
                            <div class="review">
                                {{ $rating->notes }}
                            </div>
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
        <div class="container rating">
            <header>تقييم قاعة أوتار</header>
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

        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>
