{{-- แถวกฎหมาย 1 ฉบับ: ชื่อเรื่อง [NEW] ............ วันที่ (ใช้ร่วมกันทุกหน้า) --}}
<tr class="target">
    <td class="law-cell">
        <div class="law-line{{ $row->stutas == 1 ? '' : ' is-cancel' }}">
            <span class="law-title">
                <a target="_blank" href="{{ asset('@laravel/storage/app/public/law/'.$row->file_law) }}">{{ $row->law_name }}</a>
                @if($row->stutas == 1 && isNewLaw($row->date_out))<span class="new-badge">NEW</span>@endif
            </span>
            <span class="law-date">{{ $row->stutas == 1 ? 'ประกาศใช้' : 'ยกเลิก' }} {{ DateThaiFull($row->date_out) }}</span>
        </div>
    </td>
</tr>
