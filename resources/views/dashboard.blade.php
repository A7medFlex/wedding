<!DOCTYPE html>
<html lang="ar" dir="rtl">

    <x-styles title="لوحة التحكم"></x-styles>

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
        <div class="container data">
            <h3 class="client">تقييمات العملاء</h3>
            <table class="rwd-table" style="table-layout: fixed;width: 100%;border-spacing: 3px 20px;">
                <tr>
                    <th>الاسم</th>
                    <th>التقييم</th>
                    <th>ملاحظات</th>
                    <th>اظهار/اخفاء</th>
                </tr>
                @foreach ($ratings as $rating)
                    <tr>
                        <td data-th="الاسم">{{ $rating->name }}</td>
                        <td data-th="التقييم">
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
                        </td>
                        <td data-th="ملاحظات" class="notes">
                            @if ($rating->notes)
                                {{ $rating->notes }}
                            @else
                                <span class="empty">لا يوجد</span>
                            @endif
                        </td>
                        <td data-th="اظهار/اخفاء">
                            @if ($rating->hide == false)
                                <div class="flexing">
                                    <form action="{{ route('edit-rating', $rating->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="red">اخفاء</button>
                                    </form>
                                    <form action="{{ route('delete-rating', $rating->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="del">حذف</button>
                                    </form>
                                </div>
                            @else
                                <div class="flexing">
                                    <form action="{{ route('edit-rating', $rating->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="green">اظهار</button>
                                    </form>
                                    <form action="{{ route('delete-rating', $rating->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="del">حذف</button>
                                    </form>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $ratings->links('vendor.pagination.custom-pagination') }}
        </div>
        <script src="/js/main.js"></script>
    </body>
</html>
