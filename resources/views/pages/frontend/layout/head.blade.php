<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="https://upload.wikimedia.org/wikipedia/th/7/7a/Emblem_of_Rajabhat_Yala.png" >
<title>{{$page_title}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.csss">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .modal-footer  > [data-dismiss="modal"]{
	margin-left:5px;
}
</style>


<style>

    /* footer */

    .fa {
    padding: 15px;
    font-size: 20px;
    width: 50px;
    text-align: center;
    text-decoration: none;
    margin: 5px 5px 10px 5px;
    border-radius: 50%;
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-facebook {
    background: #3B5998;
    color: white;
    }
    .fa-twitter {
    background: #55ACEE;
    color: white;
    }
    .fa-google {
    background: #dd4b39;
    color: white;
    }

    .footer-bs {
        background-color: #C0C0C0;
        padding: 60px 40px;
        color: rgba(255,255,255,1.00);
        margin-bottom: 20px;
        border-bottom-right-radius: 6px;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 6px;
    }
    .footer-bs .footer-brand, .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { padding:10px 25px; }
    .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-color: transparent; }
    .footer-bs .footer-brand h2 { margin:0px 0px 10px; }
    .footer-bs .footer-brand p { font-size:12px; color:rgba(255,255,255,0.70); }

    .footer-bs .footer-nav ul.pages { list-style:none; padding:0px; }
    .footer-bs .footer-nav ul.pages li { padding:5px 0px;}
    .footer-bs .footer-nav ul.pages a { color:rgba(255,255,255,1.00); font-weight:bold; text-transform:uppercase; }
    .footer-bs .footer-nav ul.pages a:hover { color:rgba(255,255,255,0.80); text-decoration:none; }
    .footer-bs .footer-nav h4 {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom:10px;
    }

    .footer-bs .footer-nav ul.list { list-style:none; padding:0px; }
    .footer-bs .footer-nav ul.list li { padding:5px 0px;}
    .footer-bs .footer-nav ul.list a { color:rgba(255,255,255,0.80); }
    .footer-bs .footer-nav ul.list a:hover { color:rgba(255,255,255,0.60); text-decoration:none; }

    .footer-bs .footer-social ul { list-style:none; padding:0px; }
    .footer-bs .footer-social h4 {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 3px;
    }
    .footer-bs .footer-social li { padding:5px 4px;}
    .footer-bs .footer-social a { color:rgba(255,255,255,1.00);}
    .footer-bs .footer-social a:hover { color:rgba(255,255,255,0.80); text-decoration:none; }

    .footer-bs .footer-ns h4 {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom:10px;
    }
    .footer-bs .footer-ns p { font-size:12px; color:rgba(255,255,255,0.70); }

    @media (min-width: 768px) {
        .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-left:solid 1px rgba(255,255,255,0.10); }
    }

    .pointer {cursor: pointer;}
    .container > .row > .table > tr .active {
        background-color:#123456;
    }

    .nav li {
    border-bottom: 3px solid rgba(0, 0, 0, 0);
    }
    .nav li:hover {
    border-bottom: 3px solid #eee;
    }
    .nav li.active {
    border-bottom: 3px solid #338ecf;
    background: #eee
    }
</style>
<style>
    /* ป้าย NEW สำหรับกฎหมายที่ประกาศใช้ภายใน 30 วัน */
    .new-badge { display:inline-block; margin-left:8px; padding:1px 8px; border-radius:10px; background:#e53935; color:#fff;
                 font:700 12px/18px Arial,sans-serif; letter-spacing:.5px; vertical-align:middle; animation:new-badge-blink 1.1s steps(2,start) infinite; }
    @keyframes new-badge-blink { to { visibility:hidden; } }
    @media (prefers-reduced-motion: reduce) { .new-badge { animation:none; } }
</style>
<style>
    /* ปุ่มเข้าสู่ระบบ YRU Passport */
    .btn-yru-login { display:inline-block; padding:8px 18px; border-radius:4px; background:#ff4081; color:#fff !important;
                     font:700 15px/1.4 Arial,"Leelawadee UI",Tahoma,sans-serif; text-decoration:none !important; vertical-align:middle;
                     box-shadow:0 1px 3px rgba(0,0,0,.15); transition:background .15s; }
    .btn-yru-login:hover, .btn-yru-login:focus { background:#e91e63; color:#fff; }
</style>
<style>
    /* ความกว้างหน้าเว็บ */
    .page-wide { max-width:1440px; padding-left:28px; padding-right:28px; }
    @media (max-width: 767px) { .page-wide { padding-left:15px; padding-right:15px; } }

    /* แถวกฎหมาย: [NEW] ชื่อเรื่อง ...... วันที่ */
    .table td.law-cell { padding:10px 8px 10px 5%; }
    .law-line { display:flex; align-items:flex-start; gap:12px; }
    .law-line .law-title .new-badge { margin-left:8px; vertical-align:2px; }
    .law-line .law-title { flex:1; min-width:0; }
    .law-line .law-title a { color:#000; }
    .law-line .law-title a:hover { color:#ff1493; text-decoration:none; }
    .law-line .law-date { flex:none; white-space:nowrap; color:#778899; font-size:.95em; }
    .law-line.is-cancel .law-date { color:#d00; }
    @media (max-width: 600px) {
        .table td.law-cell { padding-left:12px; }
        .law-line { flex-wrap:wrap; row-gap:2px; }
        .law-line .law-title { flex-basis:100%; }
    }
</style>
<style>
    /* ===== จัดหน้าให้สมดุล ===== */
    body { background:#faf6f9; }
    .page-wide { padding-top:4px; }

    /* เมนูด้านซ้าย */
    .side-wrap { position:sticky; top:96px; display:flex; flex-direction:column; gap:18px; margin-bottom:24px; }
    .side-card { background:#fff; border:1px solid #f3dce9; border-radius:14px; overflow:hidden; box-shadow:0 4px 14px rgba(255,20,147,.06); }
    .side-head { padding:12px 18px; font-weight:700; font-size:16px; color:#fff; background:linear-gradient(90deg,#ff1493,#ff5cb3); }
    .side-menu { display:flex; flex-direction:column; padding:8px; }
    .side-menu a { display:block; padding:9px 14px; border-radius:9px; color:#333; font-size:16px; text-decoration:none; transition:background .15s,color .15s; }
    .side-menu a:hover { background:#ffe6f3; color:#ff1493; text-decoration:none; }
    .side-menu a.active { background:#ff1493; color:#fff; font-weight:600; box-shadow:0 3px 10px rgba(255,20,147,.3); }
    .side-links { display:flex; flex-direction:column; gap:2px; padding:8px; }
    .side-links a { display:flex; align-items:center; gap:12px; padding:8px 10px; border-radius:10px; color:#333; text-decoration:none; transition:background .15s, color .15s; }
    .side-links a:hover { background:#ffe6f3; color:#ff1493; text-decoration:none; }
    .side-links .fa { padding:0; margin:0; width:auto; border-radius:0; background:none; font-size:15px; }
    .side-link-icon { flex:none; width:34px; height:34px; border-radius:50%; background:#ffe6f3; color:#ff1493;
                      display:inline-flex; align-items:center; justify-content:center; transition:background .15s, color .15s; }
    .side-links a:hover .side-link-icon { background:#ff1493; color:#fff; }
    .side-link-name { flex:1; min-width:0; font-size:14.5px; line-height:1.35; }
    .side-links .side-link-go { flex:none; font-size:11px; color:#e3a9c8; }

    /* หัวข้อหน้า */
    .mu-title h2 { font-size:26px; font-weight:700; color:#2b2b33; margin:0; padding-left:14px; border-left:5px solid #ff1493; line-height:1.3; }
    .mu-title + br { display:none; }

    /* ช่องค้นหา */
    #Search, #search { height:48px; padding:0 18px 0 46px; border:1.5px solid #f3c2dc; border-radius:999px; font-size:16px; background:#fff
        url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='%23ff1493' stroke-width='2.4' stroke-linecap='round'%3E%3Ccircle cx='11' cy='11' r='7'/%3E%3Cline x1='16.5' y1='16.5' x2='21' y2='21'/%3E%3C/svg%3E") no-repeat 18px center;
        box-shadow:0 2px 8px rgba(0,0,0,.03); margin:14px 0 18px; }
    #Search:focus, #search:focus { border-color:#ff1493; box-shadow:0 0 0 4px rgba(255,20,147,.12); outline:none; }
    #Search + span, #Search ~ br { display:none; }

    /* กลุ่มเรื่อง: การ์ด */
    #tag_container, #category_container { padding:0; }
    tr.content { display:block; }
    tr.content > td { display:block; background:#fff; border:1px solid #f1e4ec !important; border-radius:14px; padding:14px 18px 6px;
                      margin-bottom:16px; box-shadow:0 3px 12px rgba(0,0,0,.035); }
    tr.content .pointer h6 { color:#c2185b !important; font-size:16px; font-weight:700; margin:0 0 6px; }
    tr.content .table { margin-bottom:6px; }
    tr.content .table tr:first-child td { border-top:0; }
    .table td.law-cell { padding:10px 4px 10px 14px; border-top:1px dashed #efe3ea; }
    .table td.law-cell:hover { background:#fff8fc; }
    .pagination .page-link { color:#ff1493; border-color:#f3dce9; }
    .pagination .page-item.active .page-link { background:#ff1493; border-color:#ff1493; color:#fff; }

    @media (max-width: 767px) {
        /* มือถือ: เมนูเป็นแถบเลื่อนด้านบน เนื้อหาตามมา หน่วยงานไว้ท้ายสุด */
        .side-col, .side-wrap { display:contents; }
        .side-card { width:calc(100% - 30px); margin:0 15px 14px; }
        .side-menu-card { order:1; }
        .main-col { order:2; }
        .side-agency { order:3; margin-top:6px; }
        .side-menu-card .side-head { display:none; }
        .side-menu { flex-direction:row; gap:6px; overflow-x:auto; padding:10px; -webkit-overflow-scrolling:touch; }
        .side-menu a { flex:none; white-space:nowrap; padding:7px 14px; border:1px solid #f3dce9; border-radius:999px; font-size:15px; }
        .mu-title h2 { font-size:22px; }
        tr.content > td { padding:12px 12px 4px; }
        .table td.law-cell { padding-left:8px; }
    }
</style>
<style>
    /* ฟอนต์หน้าเว็บ: Kanit (เก็บไว้ในเว็บเอง public/fonts/kanit, สัญญาอนุญาต OFL) */
    @font-face { font-family:'Kanit'; font-style:normal; font-weight:300; font-display:swap;
                  src:url("{{ asset('fonts/kanit/Kanit-Light.woff2') }}") format('woff2'); }
    @font-face { font-family:'Kanit'; font-style:normal; font-weight:400; font-display:swap;
                  src:url("{{ asset('fonts/kanit/Kanit-Regular.woff2') }}") format('woff2'); }
    @font-face { font-family:'Kanit'; font-style:normal; font-weight:500; font-display:swap;
                  src:url("{{ asset('fonts/kanit/Kanit-Medium.woff2') }}") format('woff2'); }
    @font-face { font-family:'Kanit'; font-style:normal; font-weight:600; font-display:swap;
                  src:url("{{ asset('fonts/kanit/Kanit-SemiBold.woff2') }}") format('woff2'); }
    body, button, input, select, textarea, .btn, .table, .dropdown-item, .pagination,
    h1, h2, h3, h4, h5, h6 { font-family:'Kanit', 'Leelawadee UI', Tahoma, sans-serif; }
    body { font-weight:300; }
    b, strong, h1, h2, h3, h4, h5, h6, .mu-title h2, .side-head, .side-menu a.active,
    tr.content .pointer h6, .yru-brand-text b, .sf-brand-text b, .yru-btn { font-weight:500; }
</style>
<style>
    /* หัวข้อกลุ่ม: กดเพื่อดูทั้งหมด */
    a.topic-link { color:#c2185b; text-decoration:none; }
    a.topic-link .fa { padding:0; margin:0 0 0 8px; width:auto; border-radius:0; font-size:15px; transition:transform .15s; }
    a.topic-link:hover { color:#ff1493; text-decoration:underline; }
    a.topic-link:hover .fa { transform:translateX(3px); }
    .topic-bar { display:flex; align-items:center; justify-content:space-between; gap:12px; margin:14px 0 16px; }
    .topic-back { display:inline-flex; align-items:center; gap:8px; height:38px; padding:0 16px; border-radius:999px; border:1.5px solid #ff8ccb;
                  background:#fff; color:#ff1493 !important; font-weight:500; text-decoration:none !important; }
    .topic-back:hover { background:#ffe6f3; }
    .topic-back .fa { padding:0; margin:0; width:auto; border-radius:0; font-size:14px; }
    .topic-count { color:#778899; }
</style>
</head>
