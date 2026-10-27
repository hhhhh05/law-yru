@extends('pages.frontend.home')

<?php
use Illuminate\Support\Facades\DB;
?>

{{-- Content --}}
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="row">
    <div class="col-md-12">
        <input type="text" class="form-control" placeholder="ค้นหา..."  name="search" id='Search' value="{{ $keyword ?? '' }}" autocomplete="off" />
        <span>
            <i class="flaticon2-search-1 text-muted"></i>
        </span><br>
    </div>
</div>
<div id="category_container">
@isset($keyword)
    @include('pages.frontend.category_search')
@else
<div class="row">
    <div class="col-md-12">
            <table class="table" id="list">
                <tbody>
                    @foreach ($name as $key => $row1)
                            <tr class='content'>

                                <td>
                                    <div  style="width:100%; word-wrap: break-word;" class="pointer">
                                        <h6><a class="topic-link" href="{{ route('topic', ['name' => $row1->name_id]) }}">{{$row1->name_id}} ({{ $row1->cs }} ฉบับ)<i class="fa fa-angle-right"></i></a></h6>
                                    </div>
                                    <?php
                                        $law1=DB::table('laws')
                                        ->where('laws.deleted_at','=',null)
                                        ->where('laws.name_id','=',$row1->name_id)
                                        ->whereBetween('stutas', ['1', '2'])
                                        ->orderByDesc('date_out')
                                        ->paginate(5,['*'],"law_page_{$key}");

                                    ?>
                                    <table class="table" id="form1" >
                                        <tbody>
                                            @foreach ($law1 as $row)
                                                <?php
                                                $mytime1 = Carbon\Carbon::now();
                                                $mytime= Formatdate($mytime1);
                                                $date1=date_create("$row->date_out");
                                                $date2=date_create("$mytime");
                                                $diff=date_diff($date1,$date2);
                                                ?>
                                                @if($row1->name_id==$row->name_id)
                                                    @include('pages.frontend.law_row', ['row' => $row])
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$law1->appends(request()->all())->links()}}
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
<div class="d-flex justify-content-end flex-wrap mt-3" style="overflow-x:auto;">
    <div>{{$name->appends(request()->all())->links()}}</div>
</div>
@endisset
</div>



@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    // ค้นหากฎหมายทั้งหมดในหมวดนี้จากฐานข้อมูล (ไม่ใช่แค่รายการที่แสดงในหน้าปัจจุบัน)
    (function () {
        var box = document.getElementById('category_container');
        var original = box.innerHTML;
        var startedWithKeyword = {{ isset($keyword) ? 'true' : 'false' }};
        var timer, xhr;

        $('#Search').on('input', function () {
            var q = $.trim($(this).val());
            clearTimeout(timer);
            timer = setTimeout(function () {
                if (xhr) { xhr.abort(); }
                if (q === '') {
                    if (startedWithKeyword) { window.location.href = window.location.pathname; }
                    else { box.innerHTML = original; }
                    return;
                }
                box.innerHTML = '<p style="color:#999; padding:16px 0;">กำลังค้นหา...</p>';
                xhr = $.ajax({ url: window.location.pathname, data: { keyword: q }, dataType: 'html' })
                    .done(function (html) { box.innerHTML = html; })
                    .fail(function (x, status) {
                        if (status !== 'abort') { box.innerHTML = '<p style="color:red; padding:16px 0;">ค้นหาไม่สำเร็จ กรุณาลองใหม่</p>'; }
                    });
            }, 300);
        }).on('keydown', function (e) {
            if (e.key === 'Enter') { e.preventDefault(); }
        });
    })();
</script>


@endsection


