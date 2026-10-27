


<?php
use Illuminate\Support\Facades\DB;
?>
@if($num=="1")
    <table class="table">

        <tbody>
            @foreach ($name as $key => $row1)
            <tr class='content'>
                    <td>
                        <div style="width:100%; word-wrap: break-word;" class="pointer">
                            <h6><a class="topic-link" href="{{ route('topic', ['name' => $row1->name_id]) }}">{{$row1->name_id}} ({{ $row1->cs }} ฉบับ)<i class="fa fa-angle-right"></i></a></h6>
                        </div>
                        <?php
                                $law1=DB::table('laws')
                                ->where('laws.deleted_at','=',null)
                                ->where('laws.name_id','=',$row1->name_id)
                                ->whereBetween('stutas', ['1', '2'])
                                ->orderByDesc('date_out')
                                ->paginate(5,['*'],"law_page_{$key}");
                                $mytime1 = Carbon\Carbon::now();
                                $mytime= Formatdate($mytime1);


                        ?>

                        <table class="table" id="form1" >
                                <tbody>
                                    @foreach($law1 as $row)
                                    <?php

                                        $date1=date_create("$row->date_out");
                                        $date2=date_create("$mytime");
                                        $diff=date_diff($date1,$date2);
                                    ?>
                                        @if($row1->name_id == $row->name_id )
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
    <div class="d-flex justify-content-end flex-wrap mt-3" style="overflow-x:auto;">
            <div>{{$name->appends(request()->all())->links()}}</div>
    </div>

@else
    <table class="table">

        <tbody>
            @foreach ($name as $row1)
            <tr class='content'>
                    <td>
                        <div style="width:100%; word-wrap: break-word;" class="pointer">
                            <h6><a class="topic-link" href="{{ route('topic', ['name' => $row1->name_id]) }}">{{$row1->name_id}} ({{ $row1->cs }} ฉบับ)<i class="fa fa-angle-right"></i></a></h6>
                        </div>

                        <table class="table" id="form1" >
                                <tbody>
                                    @foreach($law as $row)
                                        @if($row1->name_id == $row->name_id )
                                            @include('pages.frontend.law_row', ['row' => $row])
                                        @endif
                                    @endforeach
                                </tbody>
                        </table>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endif

