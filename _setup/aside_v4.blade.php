@php
    $menu = [
        ''                => 'หน้าแรก',
        'constitution'    => 'รัฐธรรมนูญ',
        'enactment'       => 'พระราชบัญญัติ',
        'royal_enactment' => 'พระราชกำหนด',
        'decree'          => 'พระราชกฤษฎีกา',
        'ministry'        => 'กฎกระทรวง',
        'announcement'    => 'ประกาศกระทรวง',
        'regularity'      => 'ระเบียบ',
        'rules'           => 'ข้อบังคับ',
        'declare'         => 'ประกาศ',
        'dictation'       => 'คำสั่ง',
        'practice'        => 'แนวปฏิบัติ',
        'other'           => 'อื่นๆ',
    ];
    $current = trim(optional(app('request')->route())->uri() ?? '', '/');
    if ($current === 'index') { $current = 'constitution'; }

    // [ไอคอน Font Awesome, ชื่อหน่วยงาน, ลิงก์]
    $agencies = [
        ['fa-balance-scale', 'สำนักงานคณะกรรมการกฤษฎีกา',            'https://www.krisdika.go.th/law'],
        ['fa-graduation-cap','กระทรวงการอุดมศึกษาฯ (อว.)',           'https://www.mhesi.go.th/'],
        ['fa-gavel',         'ศาลปกครอง',                            'https://www.admincourt.go.th/admincourt/site/'],
        ['fa-shield',        'สำนักงาน ป.ป.ช.',                      'https://www.nacc.go.th/'],
        ['fa-calculator',    'สำนักงานการตรวจเงินแผ่นดิน',             'https://www.audit.go.th/th/home'],
        ['fa-info-circle',   'สำนักงานคณะกรรมการข้อมูลข่าวสารของราชการ', 'http://www.oic.go.th/web2017/main_.html'],
        ['fa-money',         'กรมบัญชีกลาง',                         'https://www.cgd.go.th/cs/internet/internet/%E0%B8%AB%E0%B8%99%E0%B9%89%E0%B8%B2%E0%B8%AB%E0%B8%A5%E0%B8%B1%E0%B8%812.html'],
        ['fa-flag',          'รัฐบาลไทย',                            'https://www.thaigov.go.th/'],
        ['fa-globe',         'เว็บไซต์ที่เกี่ยวข้อง',                   'http://61.19.244.196/'],
    ];

@endphp
<div class="col-lg-3 col-md-4 side-col">
    <aside class="side-wrap">
        <div class="side-card side-menu-card">
            <div class="side-head">หมวดกฎหมาย</div>
            <nav class="side-menu">
                @foreach ($menu as $uri => $label)
                    <a href="/{{ $uri }}" class="{{ $current === $uri ? 'active' : '' }}">{{ $label }}</a>
                @endforeach
            </nav>
        </div>

        <div class="side-card side-agency">
            <div class="side-head">หน่วยงานที่เกี่ยวข้อง</div>
            <div class="side-links">
                @foreach ($agencies as [$icon, $name, $url])
                    <a href="{{ $url }}" target="_blank" rel="noopener" title="{{ $name }}">
                        <span class="side-link-icon"><i class="fa {{ $icon }}"></i></span>
                        <span class="side-link-name">{{ $name }}</span>
                        <i class="fa fa-external-link side-link-go"></i>
                    </a>
                @endforeach
            </div>
        </div>
    </aside>
</div>
<script>
    // มือถือ: เลื่อนแถบเมนูให้เห็นหมวดที่เลือกอยู่
    document.addEventListener("DOMContentLoaded", function () {
        var a = document.querySelector(".side-menu a.active");
        if (a) { a.parentNode.scrollLeft = a.offsetLeft - 12; }
    });
</script>
