@extends('pages.frontend.home')

{{-- หน้ารวมกฎหมายทั้งหมดของหัวข้อ (เรื่อง) ที่เลือก --}}
@section('content')
<div class="topic-bar">
    <a href="{{ url()->previous() !== url()->current() ? url()->previous() : url('/') }}" class="topic-back">
        <i class="fa fa-arrow-left"></i>ย้อนกลับ
    </a>
    <span class="topic-count">ทั้งหมด {{ number_format($laws->count()) }} ฉบับ</span>
</div>

@if($laws->isEmpty())
    <p style="color:#999; padding:16px 0;">ไม่พบกฎหมายในหัวข้อนี้</p>
@else
    <table class="table">
        <tbody>
            <tr class="content">
                <td>
                    <table class="table">
                        <tbody>
                            @foreach ($laws as $row)
                                @include('pages.frontend.law_row', ['row' => $row])
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
@endif
@endsection
