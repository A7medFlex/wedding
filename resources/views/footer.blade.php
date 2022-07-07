<!DOCTYPE html>
<html lang="ar" dir="rtl">

    <x-styles title="معلومات القاعة"></x-styles>


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
        <div class="container rating" style="margin-top:40px;">
            <h3 class="client">تعديل بيانات الصالة</h3>

            @if($detail == null)
                <form action="{{ route('details-create') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form first">
                        <div class="details">
                            <div class="fields">
                                <div class="input-field">
                                    <label>موقع القاعة</label>
                                    <input name="location" type="text" placeholder="موقع القاعة">
                                </div>

                                <div class="input-field">
                                    <label>رقم هاتف ١</label>
                                    <input name="phoneone" type="text" placeholder="رقم الهاتف الأول">
                                </div>

                                <div class="input-field">
                                    <label>رقم هاتف ٢</label>
                                    <input name="phonetwo" type="text" placeholder="رقم الهاتف الثاني">
                                </div>

                                <div class="input-field">
                                    <label>رابط حساب سناب شات</label>
                                    <input name="snapchat" type="text" placeholder="رابط حساب السناب شات">
                                </div>

                                <div class="input-field">
                                    <label>رابط حساب سناب شات</label>
                                    <input name="instagram" type="text" placeholder="رابط حساب انستجرام ">
                                </div>


                                <button style="margin-top: 40px;" type="submit">تأكيد</button>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <form action="{{ route('details-create') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form first">
                        <div class="details">
                            <div class="fields">
                                <div class="input-field">
                                    <label>موقع القاعة</label>
                                    <input value="{{ $detail->location }}" name="location" type="text" placeholder="موقع القاعة">
                                </div>

                                <div class="input-field">
                                    <label>رقم هاتف ١</label>
                                    <input value="{{ $detail->phoneone }}" name="phoneone" type="text" placeholder="رقم الهاتف الأول">
                                </div>

                                <div class="input-field">
                                    <label>رقم هاتف ٢</label>
                                    <input value="{{ $detail->phonetwo }}" name="phonetwo" type="text" placeholder="رقم الهاتف الثاني">
                                </div>

                                <div class="input-field">
                                    <label>رابط حساب سناب شات</label>
                                    <input value="{{ $detail->snapchat }}" name="snapchat" type="text" placeholder="رابط حساب السناب شات">
                                </div>

                                <div class="input-field">
                                    <label>رابط حساب انستجرام </label>
                                    <input value="{{ $detail->instagram }}" name="instagram" type="text" placeholder="رابط حساب انستجرام ">
                                </div>


                                <button style="margin-top: 40px;" type="submit">تأكيد</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </body>
</html>
