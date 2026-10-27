<!----------- Footer ------------>
<style>
    .site-footer { background:#26272b; color:#b9bac2; border-top:3px solid #ff3da5; margin-top:0; font-size:14px; line-height:1.6; }
    .site-footer a { color:#c9cad1; text-decoration:none; transition:color .15s, background .15s; }
    .site-footer a:hover, .site-footer a:focus { color:#ff6bbd; text-decoration:none; }

    .sf-main { max-width:1440px; margin:0 auto; padding:36px 28px; display:flex; align-items:center;
               justify-content:space-between; gap:24px; }

    /* ซ้าย: โลโก้ + ข้อมูลมหาวิทยาลัย */
    .sf-brand { display:flex; align-items:center; gap:16px; min-width:0; }
    .sf-brand-logo { flex:none; display:flex; align-items:center; justify-content:center; width:112px; height:70px;
                     padding:8px 10px; border-radius:10px; background:#fff; box-shadow:0 2px 6px rgba(0,0,0,.25); }
    .sf-brand-logo img { display:block; max-width:100%; max-height:100%; width:auto; height:auto; }
    .sf-brand-text b { color:#fff; font-size:16px; }
    .sf-brand-text .sf-sub { color:#ff3da5; font-size:13px; margin-left:6px; }
    .sf-brand-text p { margin:2px 0 0; font-size:13px; }
    .site-footer .fa { padding:0; margin:0; width:auto; border-radius:0; font-size:inherit; }
    .sf-brand-text .fa { width:14px; margin-right:6px; color:#ff3da5; text-align:center; font-size:13px; }
    .sf-dot { margin:0 8px; color:#55565d; }

    /* ขวา: โซเชียล + ลิงก์ */
    .sf-side { flex:none; display:flex; flex-direction:column; align-items:flex-end; gap:10px; }
    .sf-social { display:flex; gap:8px; }
    .sf-social a { width:32px; height:32px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center;
                   background:#3a3b41; color:#fff; font-size:14px; padding:0; }
    .sf-social a .fa { background:none !important; color:inherit; font-size:14px; }
    .sf-social a:hover { background:#ff3da5; color:#fff; }
    .sf-social a.sf-line { font:700 9px/1 Arial,sans-serif; }
    .sf-links { list-style:none; padding:0; margin:0; display:flex; flex-wrap:wrap; justify-content:flex-end; }
    .sf-links li { font-size:13px; }
    .sf-links li + li::before { content:"|"; margin:0 10px; color:#4a4b52; }

    .sf-bottom { background:#1d1e21; color:#8d8f98; font-size:12px; }
    .sf-bottom .sf-inner { max-width:1440px; margin:0 auto; padding:12px 28px; display:flex; flex-wrap:wrap;
                           justify-content:space-between; gap:4px; }

    @media (max-width: 991px) {
        .sf-main { flex-direction:column; align-items:flex-start; gap:16px; }
        .sf-side { align-items:flex-start; }
        .sf-links { justify-content:flex-start; }
    }
    @media (max-width: 575px) {
        .sf-main { padding:28px 16px; }
        .sf-brand { align-items:flex-start; gap:12px; }
        .sf-brand-logo { width:92px; height:58px; padding:6px 8px; }
        .sf-brand-text .sf-sub { display:block; margin-left:0; }
        .sf-brand-text .sf-tel { display:block; }
        .sf-brand-text .sf-tel .sf-dot { display:none; }
        .sf-bottom .sf-inner { flex-direction:column; align-items:center; text-align:center; }
        .sf-links { gap:2px 16px; }
        .sf-links li + li::before { content:none; }
    }
</style>

<footer class="site-footer">
    <div class="sf-main">
        <div class="sf-brand">
            <a href="https://www.yru.ac.th/th/" target="_blank" rel="noopener" class="sf-brand-logo">
                <img src="{{ asset('media/logos/yru-logo.png') }}" width="431" height="245" alt="YRU มหาวิทยาลัยราชภัฏยะลา">
            </a>
            <div class="sf-brand-text">
                <div><b>มหาวิทยาลัยราชภัฏยะลา</b><span class="sf-sub"></span></div>
                <p><i class="fa fa-map-marker"></i>ถ.เทศบาล 3 ต.สะเตง อ.เมือง จ.ยะลา 95000</p>
                <p>
                    <span><i class="fa fa-phone"></i><a href="tel:073299699">073-299699</a></span>
                    <span class="sf-tel"><span class="sf-dot">•</span><i class="fa fa-fax"></i>073-299610, 073-299611, 073-299601</span>
                </p>
            </div>
        </div>

        <div class="sf-side">
            <div class="sf-social">
                <a href="https://www.facebook.com/yrupage/" target="_blank" rel="noopener" title="Facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://mobile.twitter.com/YInfomation" target="_blank" rel="noopener" title="X / Twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://www.yru.ac.th/th/" target="_blank" rel="noopener" title="เว็บไซต์มหาวิทยาลัย"><i class="fa fa-globe"></i></a>
                <a href="https://line.me/R/ti/p/%40yvm8524d" target="_blank" rel="noopener" title="LINE" class="sf-line">LINE</a>
            </div>
            <ul class="sf-links">
                <li><a href="https://www.yru.ac.th/th/admission" target="_blank" rel="noopener">การเข้าศึกษา</a></li>
                <li><a href="http://eduservice.yru.ac.th/newweb/page/?view=curriculum" target="_blank" rel="noopener">หลักสูตร</a></li>
                <li><a href="https://www.yru.ac.th/th/news" target="_blank" rel="noopener">ข่าวสาร มรย.</a></li>
                <li><a href="https://www.yru.ac.th/th/events" target="_blank" rel="noopener">ปฏิทิน</a></li>
                <li><a href="https://job.yru.ac.th/" target="_blank" rel="noopener">ร่วมงานกับเรา</a></li>
            </ul>
        </div>
    </div>
    <div class="sf-bottom">
        <div class="sf-inner">
            <span>© {{ date('Y') + 543 }} ฐานข้อมูลกฎหมาย มหาวิทยาลัยราชภัฏยะลา</span>
            <span>law.yru.ac.th</span>
        </div>
    </div>
</footer>
