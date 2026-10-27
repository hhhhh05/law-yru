{{-- ผลการค้นหาภายในหมวด (เรียกจาก FRontendController::categorySearch) --}}
<p style="color:#555; margin:8px 0 4px;">
    ผลการค้นหา “{{ $keyword }}” พบ {{ number_format($laws->count()) }} ฉบับ
</p>

@if($laws->isEmpty())
    <p style="color:#999; padding:16px 0;">ไม่พบกฎหมายที่ตรงกับคำค้นในหมวดนี้</p>
@else
    <table class="table">
        <tbody>
            @foreach ($groups as $groupName => $items)
            <tr class="content">
                <td>
                    <div style="width:100%; word-wrap: break-word;" class="pointer">
                        <h6><a class="topic-link" href="{{ route('topic', ['name' => $groupName]) }}">{{ $groupName }} ({{ $items->count() }} ฉบับ)<i class="fa fa-angle-right"></i></a></h6>
                    </div>
                    <table class="table">
                        <tbody>
                            @foreach ($items as $row)
                            @include('pages.frontend.law_row', ['row' => $row])
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
