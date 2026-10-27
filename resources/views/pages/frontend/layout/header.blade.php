<style>
    .yru-topbar { position:sticky; top:0; z-index:1030; background:#fff; border-bottom:1px solid #ffd6ec;
                  box-shadow:0 2px 12px rgba(255,20,147,.14); }
    .yru-topbar::before { content:""; display:block; height:4px; background:linear-gradient(90deg,#ff3da5,#ff1493 60%,#6d6e71); }
    .yru-topbar-inner { max-width:none; margin:0; padding:10px 28px; display:flex; align-items:center;
                        justify-content:space-between; gap:16px; }

    .yru-brand { display:flex; align-items:center; gap:12px; text-decoration:none !important; min-width:0; }
    .yru-brand img { height:46px; width:auto; flex:none; }
    .yru-brand-text { display:flex; flex-direction:column; line-height:1.25; border-left:2px solid #ffc2e3; padding-left:12px; }
    .yru-brand-text b { color:#ff1493; font-size:19px; font-weight:700; }
    .yru-brand-text small { color:#6d6e71; font-size:13px; }

    .yru-actions { display:flex; align-items:center; gap:10px; flex:none; }
    .yru-btn { display:inline-flex; align-items:center; gap:8px; height:40px; padding:0 18px; border-radius:999px;
               font-size:15px; font-weight:600; text-decoration:none !important; white-space:nowrap;
               transition:background .15s, color .15s, box-shadow .15s, transform .15s; }
    .yru-btn .fa { padding:0; margin:0; width:auto; font-size:15px; border-radius:0; }
    .yru-btn-primary { background:#ff1493; color:#fff !important; box-shadow:0 4px 12px rgba(255,20,147,.35); }
    .yru-btn-primary:hover { background:#e0007a; transform:translateY(-1px); box-shadow:0 6px 16px rgba(255,20,147,.45); }
    .yru-btn-outline { background:#fff; color:#ff1493 !important; border:1.5px solid #ff8ccb; }
    .yru-btn-outline:hover { background:#ffe6f3; border-color:#ff3da5; }

    .yru-user .dropdown-toggle::after { margin-left:4px; }
    .yru-user .dropdown-menu { border:0; border-radius:12px; box-shadow:0 8px 24px rgba(0,0,0,.12); padding:6px; margin-top:8px; }
    .yru-user .dropdown-item { border-radius:8px; padding:8px 14px; font-size:15px; }
    .yru-user .dropdown-item .fa { padding:0; margin:0 8px 0 0; width:16px; font-size:14px; color:#ff3da5; border-radius:0; }
    .yru-user .dropdown-item:hover { background:#ffe6f3; color:#ff1493; }
    .yru-user .yru-user-name { max-width:220px; overflow:hidden; text-overflow:ellipsis; }

    .yru-banner { max-width:1440px; margin:20px auto 0; padding:0 28px; }
    .yru-banner img { display:block; width:100%; height:auto; border-radius:14px; }

    @media (max-width: 767px) {
        .yru-topbar-inner { padding:8px 14px; }
        .yru-brand img { height:36px; }
        .yru-brand-text b { font-size:16px; }
        .yru-brand-text small { display:none; }
        .yru-btn { height:36px; padding:0 12px; font-size:14px; }
        .yru-btn .yru-hide-sm { display:none; }
        .yru-banner { margin-top:12px; padding:0 12px; }
        .yru-banner img { border-radius:10px; }
    }
    @media (max-width: 575px) {
        .yru-brand-text { display:none; }
        .yru-btn .yru-hide-xs { display:none; }
        .yru-btn-outline { width:36px; padding:0; justify-content:center; }
        .yru-user .yru-user-name { max-width:130px; }
    }
</style>

<header class="yru-topbar">
    <div class="yru-topbar-inner">
        <a href="{{ url('/') }}" class="yru-brand" title="หน้าแรก">
            <img src="{{ asset('media/logos/yru-logo.png') }}" width="431" height="245" alt="YRU มหาวิทยาลัยราชภัฏยะลา">
            <span class="yru-brand-text">
                <b>ฐานข้อมูลกฎหมาย</b>
                <small>มหาวิทยาลัยราชภัฏยะลา</small>
            </span>
        </a>

        <div class="yru-actions">
            @guest
                @php
                    $http_build_query = http_build_query([
                        'client_id' => env('OAUTH_CLIENT_ID'),
                        'redirect_uri' => env('OAUTH_CLIENT_REDIRECT_URI'),
                        'response_type' => 'code',
                        'scope' => '*',
                    ]);
                    $URI = 'https://passport.yru.ac.th/oauth/authorize?'.$http_build_query;
                @endphp
                <a href="https://drive.google.com/file/d/10QiCNnqSIU0NvJfpwX-2TYa5caXM80wq/view?usp=sharing" target="_blank" rel="noopener" class="yru-btn yru-btn-outline">
                    <i class="fa fa-question-circle"></i><span class="yru-hide-xs">วิธีใช้งาน</span>
                </a>
                <a href="{{ $URI }}" class="yru-btn yru-btn-primary">
                    <i class="fa fa-sign-in"></i><span>Login<span class="yru-hide-sm"> YRU Passport</span></span>
                </a>
            @else
                <a href="https://drive.google.com/file/d/10QiCNnqSIU0NvJfpwX-2TYa5caXM80wq/view?usp=sharing" target="_blank" rel="noopener" class="yru-btn yru-btn-outline">
                    <i class="fa fa-question-circle"></i><span class="yru-hide-sm">วิธีใช้งาน</span>
                </a>
                <div class="dropdown yru-user">
                    <a class="yru-btn yru-btn-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle"></i><span class="yru-user-name">{{ session('name') }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if(session('stutas') == "1")
                            <a href="/law" class="dropdown-item"><i class="fa fa-briefcase"></i>เข้าสู่ระบบนิติกร</a>
                        @elseif(session('stutas') == "")
                            <a href="https://forms.gle/UaAPWHSkaUh2cYyo8" target="_blank" rel="noopener" class="dropdown-item"><i class="fa fa-key"></i>ขอเพิ่มสิทธิ์การใช้งาน</a>
                        @else
                            <a href="/lawyer" class="dropdown-item"><i class="fa fa-briefcase"></i>เข้าสู่ระบบนักกฎหมาย</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('auth.logout') }}" class="dropdown-item"><i class="fa fa-sign-out"></i>ออกจากระบบ</a>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</header>

<div class="yru-banner">
    <img data-fixed class="slide-bg" src="{{ asset('media/logos/banner_law_v2.jpg') }}" width="2880" height="720" alt="ฐานข้อมูลกฎหมาย มหาวิทยาลัยราชภัฏยะลา">
</div>
