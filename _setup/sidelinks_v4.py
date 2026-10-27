import sys,re
p=sys.argv[1]; s=open(p,encoding='utf-8',newline='').read()
NL='\r\n'
lines=s.split(NL)
out=[]; i=0; inserted=False
new='''    .side-links { display:flex; flex-direction:column; gap:2px; padding:8px; }
    .side-links a { display:flex; align-items:center; gap:12px; padding:8px 10px; border-radius:10px; color:#333; text-decoration:none; transition:background .15s, color .15s; }
    .side-links a:hover { background:#ffe6f3; color:#ff1493; text-decoration:none; }
    .side-links .fa { padding:0; margin:0; width:auto; border-radius:0; background:none; font-size:15px; }
    .side-link-icon { flex:none; width:34px; height:34px; border-radius:50%; background:#ffe6f3; color:#ff1493;
                      display:inline-flex; align-items:center; justify-content:center; transition:background .15s, color .15s; }
    .side-links a:hover .side-link-icon { background:#ff1493; color:#fff; }
    .side-link-name { flex:1; min-width:0; font-size:14.5px; line-height:1.35; }
    .side-links .side-link-go { flex:none; font-size:11px; color:#e3a9c8; }'''.split('\n')
while i < len(lines):
    l=lines[i]
    if l.startswith('    .side-links'):
        # skip this rule (and continuation lines starting with many spaces)
        i+=1
        while i < len(lines) and lines[i].startswith('                    ') and not lines[i].strip().startswith('.'):
            i+=1
        if not inserted: out.extend(new); inserted=True
        continue
    out.append(l); i+=1
s2=NL.join(out)
assert inserted
open(p,'w',encoding='utf-8',newline='').write(s2)
print('ok', s2.count('.side-links'))
