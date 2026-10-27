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

    $agencies = [
        ['kk_logo.png',  'สำนักงานคณะกรรมการกฤษฎีกา',            'https://www.krisdika.go.th/law'],
        ['aw_logo.png',  'กระทรวงการอุดมศึกษาฯ (อว.)',            'https://www.mhesi.go.th/'],
        ['pp_logo.png',  'ศาลปกครอง',                             'https://www.admincourt.go.th/admincourt/site/'],
        ['mm_logo.png',  'เว็บไซต์ที่เกี่ยวข้อง',                    'http://61.19.244.196/'],
        ['bb_logo.png',  'สำนักงาน ป.ป.ช.',                       'https://www.nacc.go.th/'],
        ['ss_logo.png',  'สำนักงานการตรวจเงินแผ่นดิน',              'https://www.audit.go.th/th/home'],
        ['sk_logo.png',  'สำนักงานคณะกรรมการข้อมูลข่าวสารของราชการ', 'http://www.oic.go.th/web2017/main_.html'],
        ['bk1_logo.png', 'กรมบัญชีกลาง',                          'https://www.cgd.go.th/cs/internet/internet/%E0%B8%AB%E0%B8%99%E0%B9%89%E0%B8%B2%E0%B8%AB%E0%B8%A5%E0%B8%B1%E0%B8%812.html'],
        ['rr_logo.png',  'รัฐบาลไทย',                             'https://www.thaigov.go.th/'],
    ];
@endphp
<div class="col-lg-3 col-md-4">
    <aside class="side-wrap">
        <div class="side-card">
            <div class="side-head">หมวดกฎหมาย</div>
            <nav class="side-menu">
                @foreach ($menu as $uri => $label)
                    <a href="/{{ $uri }}" class="{{ $current === $uri ? 'active' : '' }}">{{ $label }}</a>
                @endforeach
            </nav>
        </div>

        <div class="side-card">
            <div class="side-head">หน่วยงานที่เกี่ยวข้อง</div>
            <div class="side-links">
                @foreach ($agencies as [$img, $name, $url])
                    <a href="{{ $url }}" target="_blank" rel="noopener" title="{{ $name }}">
                        <img src="{{ asset('media/logos/'.$img) }}" alt="{{ $name }}" loading="lazy">
                    </a>
                @endforeach
            </div>
        </div>
    </aside>
</div>
