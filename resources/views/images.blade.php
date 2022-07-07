<!DOCTYPE html>
<html lang="ar" dir="rtl">

    <x-styles title="صور القاعة"></x-styles>

    <body class="special">
        <div class="header">
            <div class="logo">أوتار ..</div>
            <ul>
                <li><a href="/">الرئيسية</a></li>
                <li><a href="/images">تعديل صور الصالة</a></li>
                <li><a href="/details">تعديل بيانات الصالة</a></li>
                <li><a href="/dashboard">تقييمات العملاء</a></li>
            </ul>
        </div>
        <div class="container add-images">
            <h3 class="client">تعديل صور الصالة</h3>
            <form action="{{ route('images-upload') }}" enctype="multipart/form-data" method="POST" class="upload-images">
                @csrf
                @method('POST')
                <div class="form-group">
                    <input style="display: none" type="file" name="images[]" multiple id="wedding-images">
                    <span class="input">رفع صور  / صورة</span>
                </div>
            </form>
        </div>


        <div class="container gallery">
            <div class="image-grid">
                @foreach ($images as $image)
                    @if ($loop->first)
                        <img class="image-grid-col-2 image-grid-row-2 img-del" src="{{ $image->image }}" alt="architecture">
                        <form style="display: none;" action="{{ route('delete-image', $image->id) }}" class="delete-image" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    @else
                        <img class="img-del" src="{{ $image->image }}" alt="architecture">
                        <form style="display:none;" action="{{ route('delete-image', $image->id) }}" class="delete-image" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endif
                @endforeach
            </div>
        </div>

        <script>
            document.querySelector('.input').addEventListener('click', function() {
                document.querySelector('#wedding-images').click();
            });
            document.querySelector('#wedding-images').addEventListener('change', function(e) {
                var form = document.querySelector('.upload-images');
                form.submit();
            });

            document.querySelectorAll('.img-del').forEach(function(img) {
                img.addEventListener('dblclick', function(e) {
                    console.log(e);
                    e.preventDefault();
                    var form = this.nextElementSibling;
                    form.submit();
                });
            });
        </script>
        {{-- <script src="/js/main.js"></script> --}}
    </body>
</html>
