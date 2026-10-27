<?php

namespace App\Http\Controllers;
use App\LAW;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class FRontendController extends Controller
{
    public function home1(Request $request)
    {

        $page_title = 'กฎหมาย';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id');

        return view('pages.frontend.home1',compact('page_title','name'));
    }

    public function constitution(Request $request)
    {

        $page_title = 'รัฐธรรมนูญ';
        if ($request->filled('keyword')) {
            return $this->categorySearch($request, '2', $page_title);
        }
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','2')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        return view('pages.frontend.home1',compact('page_title','name'));
    }

    public function enactment(Request $request)
    {
        $page_title = 'พระราชบัญญัติ';
        if ($request->filled('keyword')) {
            return $this->categorySearch($request, '3', $page_title);
        }
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','3')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);



        return view('pages.frontend.home1',compact('page_title','name'));
    }

    public function royal_enactment(Request $request)
    {
        $page_title = 'พระราชกำหนด';
        if ($request->filled('keyword')) {
            return $this->categorySearch($request, '4', $page_title);
        }
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','4')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);


        return view('pages.frontend.home1',compact('page_title','name'));
    }

    public function decree(Request $request)
    {
        $page_title = 'พระราชกฤษฎีกา';
        if ($request->filled('keyword')) {
            return $this->categorySearch($request, '5', $page_title);
        }
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','5')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);



        return view('pages.frontend.home1',compact('page_title','name'));
    }

    public function ministry(Request $request)
    {
        $page_title = 'กฎกระทรวง';
        if ($request->filled('keyword')) {
            return $this->categorySearch($request, '6', $page_title);
        }
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','6')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);



        return view('pages.frontend.home1',compact('page_title','name'));
    }

    public function regularity(Request $request)
    {
        $page_title = 'ระเบียบ';
        if ($request->filled('keyword')) {
            return $this->categorySearch($request, '7', $page_title);
        }
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','7')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);




        return view('pages.frontend.home1',compact('page_title','name'));
    }

    public function rules(Request $request)
    {
        $page_title = 'ข้อบังคับ';
        if ($request->filled('keyword')) {
            return $this->categorySearch($request, '8', $page_title);
        }
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','8')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);



        return view('pages.frontend.home1',compact('page_title','name'));
    }

    public function declare(Request $request)
    {
        $page_title = 'ประกาศ';
        if ($request->filled('keyword')) {
            return $this->categorySearch($request, '9', $page_title);
        }
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','9')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);
        //dd($name);
        return view('pages.frontend.home1',compact('page_title','name'));
    }

    public function dictation(Request $request)
    {
        $page_title = 'คำสั่ง';
        if ($request->filled('keyword')) {
            return $this->categorySearch($request, '1', $page_title);
        }
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','1')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        return view('pages.frontend.home1',compact('page_title','name'));
    }

    public function announcement(Request $request)
    {
        $page_title = 'ประกาศกระทรวง';
        if ($request->filled('keyword')) {
            return $this->categorySearch($request, '10', $page_title);
        }
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','10')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        return view('pages.frontend.home1',compact('page_title','name'));
    }

    public function practice(Request $request)
    {

        $page_title = 'แนวปฏิบัติ';
        if ($request->filled('keyword')) {
            return $this->categorySearch($request, '11', $page_title);
        }
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','11')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        return view('pages.frontend.home1',compact('page_title','name'));
    }

    public function other(Request $request)
    {

        $page_title = 'อื่นๆ';
        if ($request->filled('keyword')) {
            return $this->categorySearch($request, '12', $page_title);
        }
        $name=DB::table('laws')
        ->select('name_id',DB::raw('COUNT(name_id) as cs'),DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','12')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        return view('pages.frontend.home1',compact('page_title','name'));
    }

    /**
     * แสดงกฎหมายทั้งหมดของหัวข้อ (name_id) ที่กดจากหน้ารายการ
     */
    public function topic(Request $request)
    {
        $name = trim((string) $request->query('name', ''));
        if ($name === '') {
            return redirect('/');
        }

        $laws = DB::table('laws')
            ->where('name_id', '=', $name)
            ->whereNull('laws.deleted_at')
            ->whereBetween('stutas', ['1', '2'])
            ->orderByDesc('date_out')
            ->get();

        $page_title = $name;
        return view('pages.frontend.topic', compact('page_title', 'name', 'laws'));
    }

    /**
     * ค้นหากฎหมายทั้งหมดในหมวดที่เลือก (ใช้กับช่องค้นหาในหน้าหมวด เช่น พระราชบัญญัติ)
     */
    private function categorySearch(Request $request, $type, $page_title)
    {
        $keyword = trim($request->keyword);
        $like = '%'.str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $keyword).'%';

        $laws = DB::table('laws')
            ->where('type', '=', $type)
            ->whereNull('laws.deleted_at')
            ->whereBetween('stutas', ['1', '2'])
            ->where(function ($q) use ($like) {
                $q->where('law_name', 'like', $like)
                  ->orWhere('name_id', 'like', $like)
                  ->orWhere('year', 'like', $like);
            })
            ->orderByDesc('date_out')
            ->get();

        $groups = $laws->groupBy('name_id');

        if ($request->ajax()) {
            return view('pages.frontend.category_search', compact('groups', 'keyword', 'laws'));
        }
        $name = collect();
        return view('pages.frontend.home1', compact('page_title', 'name', 'groups', 'keyword', 'laws'));
    }
}
